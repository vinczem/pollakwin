<?php

if(isset($_POST['addfeedback'])) {
    include "dhb.inc.php";
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $holhallott = htmlspecialchars($_POST['holhallott']);
    $elegedettseg = htmlspecialchars($_POST['btnradio']);
    $szakirany = htmlspecialchars($_POST['szakirany']);
    $egyeb = htmlspecialchars($_POST['egyeb']);

    $sql = "INSERT INTO feedback (nev, email, holhallott, mennyielegedett, szakirany, szoveg) VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiiis", $name, $email, $holhallott, $elegedettseg, $szakirany, $egyeb);
    
    $stmt->execute();
    
    header("Location: ../feedback/success.php");
    
    $stmt->close();
    $conn->close();
}