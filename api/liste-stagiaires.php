<?php
ini_set('display_errors', '0');
ini_set('html_errors', '0');
error_reporting(E_ALL);
header('Content-Type: application/json; charset=utf-8');

$handler = dirname(__DIR__) . '/projects/atelier-stagiaires/api/liste.php';

try {
    if (!is_file($handler)) {
        throw new RuntimeException('Trainee directory handler not packaged');
    }
    require $handler;
} catch (Throwable $e) {
    error_log('Trainee directory boot error: ' . get_class($e));
    http_response_code(503);
    echo json_encode([
        'error' => 'Répertoire indisponible. Vérifiez le déploiement PHP sur Vercel.'
    ], JSON_UNESCAPED_UNICODE);
}
