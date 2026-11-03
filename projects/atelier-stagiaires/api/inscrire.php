<?php
use Cloudinary\Cloudinary;

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Méthode non autorisée']);
    exit;
}

$nom    = trim($_POST['nom'] ?? '');
$prenom = trim($_POST['prenom'] ?? '');
$ville  = trim($_POST['ville'] ?? '');

if ($nom === '' || $prenom === '' || $ville === '') {
    http_response_code(400);
    echo json_encode(['error' => 'Champs obligatoires']);
    exit;
}

if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode(['error' => 'Photo obligatoire']);
    exit;
}

$mime = mime_content_type($_FILES['photo']['tmp_name']);
if (!in_array($mime, ['image/jpeg', 'image/png', 'image/webp'], true) || $_FILES['photo']['size'] > 4 * 1024 * 1024) {
    http_response_code(400);
    echo json_encode(['error' => 'Image invalide (jpg/png/webp, max 4 Mo)']);
    exit;
}

// Composer dependencies may be installed at repository or project level.
$autoload = dirname(__DIR__, 3) . '/vendor/autoload.php';
if (!is_file($autoload)) {
    $autoload = dirname(__DIR__) . '/vendor/autoload.php';
}
if (!is_file($autoload)) {
    error_log('Inscription stagiaires: Composer autoload missing');
    http_response_code(503);
    echo json_encode(['error' => 'Dépendances PHP indisponibles sur le serveur. Vérifiez le déploiement Composer.']);
    exit;
}
require_once $autoload;

if (!class_exists(Cloudinary::class)) {
    error_log('Inscription stagiaires: Cloudinary package unavailable');
    http_response_code(503);
    echo json_encode(['error' => 'Bibliothèque Cloudinary indisponible sur le serveur.']);
    exit;
}
require_once __DIR__ . '/../config/db.php';

$cloudinaryUrl = getenv('CLOUDINARY_URL');
if (!is_string($cloudinaryUrl) || trim($cloudinaryUrl) === '') {
    error_log('Inscription stagiaires: missing CLOUDINARY_URL');
    http_response_code(503);
    echo json_encode(['error' => 'Le stockage des photos n’est pas configuré sur le serveur.']);
    exit;
}

// Vérifier la base avant l’upload, pour éviter de stocker des photos orphelines
// lorsque la connexion MySQL ne fonctionne pas.
try {
    $pdo = getDatabase();
} catch (Throwable $e) {
    error_log('Inscription stagiaires: MySQL connection failed (' . get_class($e) . ')');
    http_response_code(503);
    echo json_encode(['error' => 'Connexion MySQL indisponible. Vérifiez la configuration du serveur.']);
    exit;
}

$step = 'upload';
try {
    $cloudinary = new Cloudinary($cloudinaryUrl);
    $result = $cloudinary->uploadApi()->upload($_FILES['photo']['tmp_name'], ['folder' => 'stagiaires']);
    $photoUrl = $result['secure_url'];

    $step = 'insert';
    $stmt = $pdo->prepare('INSERT INTO stagiaires (nom, prenom, ville, photo) VALUES (?, ?, ?, ?)');
    $stmt->execute([$nom, $prenom, $ville, $photoUrl]);

    echo json_encode(['success' => true, 'photo' => $photoUrl]);
} catch (Throwable $e) {
    // No tokens, passwords or raw SQL exceptions are logged or returned.
    error_log('Inscription stagiaires: ' . $step . ' failed (' . get_class($e) . ')');
    http_response_code(500);
    echo json_encode(['error' => $step === 'upload'
        ? 'Impossible d’enregistrer la photo. Vérifiez Cloudinary.'
        : 'Impossible d’enregistrer le stagiaire dans MySQL.']);
}