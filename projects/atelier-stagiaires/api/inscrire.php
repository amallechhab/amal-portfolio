<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/db.php';

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
if (!in_array($mime, ['image/jpeg', 'image/png', 'image/webp'], true) || $_FILES['photo']['size'] > 5 * 1024 * 1024) {
    http_response_code(400);
    echo json_encode(['error' => 'Image invalide (jpg/png/webp, max 5 Mo)']);
    exit;
}

try {
    $cloudinary = new Cloudinary(getenv('CLOUDINARY_URL'));
    $result = $cloudinary->uploadApi()->upload($_FILES['photo']['tmp_name'], ['folder' => 'stagiaires']);
    $photoUrl = $result['secure_url'];

    $pdo = getDatabase();
    $stmt = $pdo->prepare('INSERT INTO stagiaires (nom, prenom, ville, photo) VALUES (?, ?, ?, ?)');
    $stmt->execute([$nom, $prenom, $ville, $photoUrl]);

    echo json_encode(['success' => true, 'photo' => $photoUrl]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erreur serveur']);
}