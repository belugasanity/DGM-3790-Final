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

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 240)) {
    // last request was more than 4 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header('Location: admin.php');
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>