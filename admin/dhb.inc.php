<?php
$dbServername = getenv('DB_HOST') ?: "localhost";
$dbPort = getenv('DB_PORT') ?: "5432";
$dbUsername = getenv('DB_USER') ?: "pollakwin";
$dbPassword = getenv('DB_PASS') ?: "";
$dbName = getenv('DB_NAME') ?: "pollakrendezvenyek";

try {
    $conn = new PDO(
        "pgsql:host=$dbServername;port=$dbPort;dbname=$dbName;options='--client_encoding=UTF8'",
        $dbUsername,
        $dbPassword,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
         PDO::ATTR_EMULATE_PREPARES => false]
    );
} catch (PDOException $exception) {
    error_log('PostgreSQL connection failed: ' . $exception->getMessage());
    if (PHP_SAPI === 'cli') {
        exit(1);
    }
    http_response_code(500);
    exit('Database connection failed.');
}
