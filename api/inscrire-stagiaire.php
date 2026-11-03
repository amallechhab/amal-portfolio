<?php
// Return JSON even when a required server file or PHP dependency is unavailable.
ini_set('display_errors', '0');
ini_set('html_errors', '0');
error_reporting(E_ALL);
header('Content-Type: application/json; charset=utf-8');

$handler = dirname(__DIR__) . '/projects/atelier-stagiaires/api/inscrire.php';

try {
    if (!is_file($handler)) {
        throw new RuntimeException('Trainee registration handler not packaged');
    }
    require $handler;
} catch (Throwable $e) {
    error_log('Registration endpoint boot error: ' . get_class($e));
    http_response_code(503);
    echo json_encode([
        'error' => 'Service d’inscription indisponible. Vérifiez le déploiement PHP sur Vercel.'
    ], JSON_UNESCAPED_UNICODE);
}
