<?php
require __DIR__ . '/admin/dhb.inc.php';
$sql = "SELECT * FROM korok INNER JOIN oktatok ON oktatok.id = korok.oktato ORDER BY szin, ora";
$valasz = $conn->query($sql)->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>szín</th>
            <th>óra</th>
            <th>oktató</th>
            <th>tantárgy</th>
            <th>tanterem</th>
            <th>csoport</th>
            <th>holvan</th>
        </tr>
        <?php foreach ($valasz as $sor) : ?>
            <tr>
                <td><?php echo $sor['szin']; ?></td>
                <td><?php echo $sor['ora']; ?></td>
                <td><?php echo $sor['nev']; ?></td>
                <td><?php echo $sor['tantargy']; ?></td>
                <td><?php echo $sor['tanterem']; ?></td>
                <td><?php echo $sor['csoport']; ?></td>
                <td><?php echo $sor['holvan']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>