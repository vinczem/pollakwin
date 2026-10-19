<?php
if (isset($_POST['szin'])) {
    require __DIR__ . '/dhb.inc.php';
    $stmt = $conn->prepare(
        'SELECT korok.ora, orak.kezdete, orak.vege, oktatok.nev,
                korok.tantargy, korok.tanterem, korok.csoport, korok.holvan
         FROM korok
         INNER JOIN orak ON orak.id = korok.ora
         INNER JOIN oktatok ON oktatok.id = korok.oktato
         WHERE korok.szin = ? AND korok.rendezveny = 1
         ORDER BY orak.kezdete ASC'
    );
    $stmt->execute([$_POST['szin']]);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($stmt->fetchAll());
}
