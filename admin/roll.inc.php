<?php
if (isset($_POST['roll'])){
	include 'dhb.inc.php';
	$sql = "SELECT name FROM users ORDER BY RAND() LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$winner = $row['name'];
	echo $winner;
}