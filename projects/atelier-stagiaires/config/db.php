<?php
declare(strict_types=1);

function getDatabase(): PDO
{
    if (!extension_loaded('pdo_mysql')) {
        throw new RuntimeException('PDO MySQL extension unavailable');
    }

    $host = getenv('DB_HOST') ?: '';
    $port = getenv('DB_PORT') ?: '3306';
    $name = getenv('DB_NAME') ?: '';
    $user = getenv('DB_USER') ?: '';
    $password = getenv('DB_PASSWORD');

    if ($host === '' || $name === '' || $user === '' || $password === false || $password === '') {
        throw new RuntimeException('MySQL environment configuration is incomplete');
    }

    $caPath = dirname(__DIR__) . '/certs/ca.pem';
    if (!is_readable($caPath)) {
        throw new RuntimeException('MySQL TLS certificate is unavailable');
    }

    $dsn = "mysql:host=$host;port=$port;dbname=$name;charset=utf8mb4";

    // PDO::MYSQL_ATTR_* works on PHP versions older than 8.4.
    // Pdo\Mysql::ATTR_* requires PHP 8.4 or later.
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_SSL_CA => $caPath,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => true,
    ];

    return new PDO($dsn, $user, $password, $options);
}
