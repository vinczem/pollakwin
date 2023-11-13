<?php

$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pollakrendezvenyek";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$conn->set_charset("utf8");
