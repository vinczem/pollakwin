<?php
if (isset($_POST['addfeedback'])) {
    require __DIR__ . '/dhb.inc.php';
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $holhallott = (int) $_POST['holhallott'];
    $elegedettseg = (int) $_POST['btnradio'];
    $szakirany = (int) $_POST['szakirany'];
    $egyeb = htmlspecialchars($_POST['egyeb']);

    $stmt = $conn->prepare('SELECT email FROM users WHERE email = ?');
    $stmt->execute([$email]);
    if ($stmt->fetchColumn() === false) {
        header('Location: ../feedback/error.php?failed=1');
        exit;
    }

    $stmt = $conn->prepare(
        'INSERT INTO feedback (nev, email, holhallott, mennyielegedett, szakirany, szoveg)
         VALUES (?, ?, ?, ?, ?, ?) ON CONFLICT (email) DO NOTHING RETURNING id'
    );
    $stmt->execute([$name, $email, $holhallott, $elegedettseg, $szakirany, $egyeb]);
    header($stmt->fetchColumn() !== false
        ? 'Location: ../feedback/success.php'
        : 'Location: ../feedback/error.php?failed=2');
    exit;
}
