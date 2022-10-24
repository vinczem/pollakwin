<?php
if(isset($_POST['adduser'])) {
	include "dhb.inc.php";
	$email = $_POST['email'];
	$sql = "INSERT INTO users (email) VALUES ('$email')";
	if ($conn->query($sql) === TRUE) {
		header("Location: ../index.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}