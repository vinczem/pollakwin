<?php
/*

if (isset($_POST['roll'])){
	include 'dhb.inc.php';
	$sql = "SELECT name FROM users ORDER BY RAND() LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$winner = $row['name'];
	echo $winner;
}*/

//make the above code more secure
if (isset($_POST['roll'])) {
    include 'dhb.inc.php';
    $sql = "SELECT name FROM users WHERE won='False' ORDER BY RAND() LIMIT 1";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $winner = $row['name'];
        $sql = "UPDATE users SET won='True' WHERE name='$winner'";
        mysqli_query($conn, $sql);
        echo $winner;
    }
}