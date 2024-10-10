<?php

$dbServername = getenv('DB_HOST');
$dbUsername = getenv('DB_USER');
$dbPassword = getenv('DB_PASS');
$dbName = "pollakrendezvenyek";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$conn->set_charset("utf8");
