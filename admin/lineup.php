<?php
if (isset($_POST['szin'])) {
    include 'dhb.inc.php';
    $szin = $_POST['szin']; // a szín, amit a felhasználó kiválasztott
    $valasz = array();  // ebbe gyűjtjük a választ

    $sql = "SELECT korok.ora, orak.kezdete, orak.vege, oktatok.nev, korok.tantargy, korok.tanterem, korok.csoport, korok.holvan FROM korok INNER JOIN orak ON orak.id = korok.ora INNER JOIN oktatok ON oktatok.id = korok.oktato WHERE szin='$szin' AND rendezveny='1' ORDER BY orak.kezdete ASC";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($valasz, $row);
        }
    }

    // a válasz kész, visszaküldjük JSON formátumban
    echo json_encode($valasz);
}
?>