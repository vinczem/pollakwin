<?php
/*
if(isset($_POST['adduser'])) {
	include "dhb.inc.php";
    $name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$sql = "INSERT INTO users (name, email) VALUES ('$email', '$email')";
	if ($conn->query($sql) === TRUE) {
		header("Location: ../index.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
*/

if(isset($_POST['adduser'])) {
    include "dhb.inc.php";
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    header("Location: ../index.php");
    $stmt->close();
    $conn->close();
}