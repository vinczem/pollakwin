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
    $uniqueCheck = "SELECT email FROM users WHERE email = ?";
    $stmt1 = $conn->prepare($uniqueCheck);
    $stmt1->bind_param("s",$email);
    $stmt1->execute();
    //mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt1);
    $row = mysqli_fetch_assoc($result);
       // print_r($row); 
       // die;
	if (count($row) == 0){
        $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        header("Location: ../index.php?signup=success");
        $stmt->close();
    }else{
        header("Location: ../index.php?signup=failed");

    }
    $stmt1->close();
    $conn->close();
}