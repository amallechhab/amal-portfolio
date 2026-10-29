<?php
require __DIR__ . '/../config/db.php';
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] !== 'GET') { http_response_code(405); exit; }
try {
    $pdo = getDatabase();
    $stmt = $pdo->query('SELECT id, nom, prenom, ville, photo, date_inscription FROM stagiaires ORDER BY id DESC');
    echo json_encode($stmt->fetchAll());
} catch (Throwable $e) {
    error_log((string) $e);
    http_response_code(503);
    echo json_encode(['error' => 'La liste est indisponible. Vérifie la configuration de la base de données.']);
}