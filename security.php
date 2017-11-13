<?php
// if (!isset($_COOKIE['email'])) {
// 	echo '<p>Please <a href="admin.php">Log in</a> to access this page</p>';
// 	exit();
// }
session_start();
//print_r($_SESSION);

if(!isset($_SESSION['login'])){
	echo '<p>Please <a href="admin.php">Log in</a> to access this page</p>';
	//header("location: profile.php");
	exit();
}
?>