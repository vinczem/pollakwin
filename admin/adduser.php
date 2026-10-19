<?php
if (isset($_POST['adduser'])) {
    require __DIR__ . '/dhb.inc.php';
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $stmt = $conn->prepare(
        'INSERT INTO users (name, email) VALUES (?, ?) ON CONFLICT (email) DO NOTHING RETURNING id'
    );
    $stmt->execute([$name, $email]);
    $status = $stmt->fetchColumn() !== false ? 'success' : 'failed';
    header('Location: ../index.php?signup=' . $status);
    exit;
}
