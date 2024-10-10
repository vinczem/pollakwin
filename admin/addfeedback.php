<?php

if(isset($_POST['addfeedback'])) {
    include "dhb.inc.php";
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $holhallott = htmlspecialchars($_POST['holhallott']);
    $elegedettseg = htmlspecialchars($_POST['btnradio']);
    $szakirany = htmlspecialchars($_POST['szakirany']);
    $egyeb = htmlspecialchars($_POST['egyeb']);

    $uniqueCheck = "SELECT email FROM users WHERE email = ?";
    $uniqueCheck = "SELECT `users`.`email` FROM `users` LEFT JOIN `feedback` ON `feedback`.`email` = `users`.`email`  where users.email = ?";
    $stmt1 = $conn->prepare($uniqueCheck);
    $stmt1->bind_param("s",$email);
    $stmt1->execute();
    $result = mysqli_stmt_get_result($stmt1);
   // $row = mysqli_fetch_assoc($result);
    if ($result->num_rows > 0)
  {
  
    mysqli_free_result($result);
    $uniqueCheck2 = "SELECT `email` FROM `feedback` where email = ?";
    $stmt2 = $conn->prepare($uniqueCheck2);
    $stmt2->bind_param("s",$email);
    $stmt2->execute();
    $result1 = mysqli_stmt_get_result($stmt2);


    if ($result1->num_rows == 0)
    {
  //  if (count($row) != 0){
    $sql = "INSERT INTO feedback (nev, email, holhallott, mennyielegedett, szakirany, szoveg) VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiiis", $name, $email, $holhallott, $elegedettseg, $szakirany, $egyeb);
    
    $stmt->execute();
    $stmt->close();
    header("Location: ../feedback/success.php");
  }else{
    header("Location: ../feedback/error.php?failed=2");
  }
    }else{
        header("Location: ../feedback/error.php?failed=1");
    }
    $stmt1->close();
    $conn->close();
}