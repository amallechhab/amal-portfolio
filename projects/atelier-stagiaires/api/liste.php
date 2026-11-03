<?php
require __DIR__ . '/../config/db.php';
header('Content-Type: application/json; charset=utf-8');

try {
    $pdo = getDatabase();
    $stmt = $pdo->query('SELECT id, nom, prenom, ville, photo, date_inscription FROM stagiaires ORDER BY id DESC');
    echo json_encode($stmt->fetchAll());
} catch (Throwable $e) {
    // Keep credentials and raw database errors out of the public JSON response.
    error_log('Liste stagiaires: MySQL query failed (' . get_class($e) . ')');
    http_response_code(503);
    echo json_encode(['error' => 'Répertoire indisponible. Vérifiez la configuration MySQL du serveur.']);
}