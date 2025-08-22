<?php

// Use environment variables for Docker deployment
$dbServername = getenv('DB_HOST') ?: "localhost";
$dbUsername = getenv('DB_USER') ?: "root";
$dbPassword = getenv('DB_PASS') ?: "";
$dbName = getenv('DB_NAME') ?: "pollakrendezvenyek";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$conn->set_charset("utf8mb4");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
