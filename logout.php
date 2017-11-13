<?php
session_start();
	  //setcookie('email', '', time() - 3600);
		session_unset();
		session_destroy();
      	header('Location: index.php');
?>
<!-- <?php
// session_start();
// if(isset($_SESSION['email'])) // Destroying All Sessions
// {
// 	session_unset($_SESSION['email']);
// 	header("Location: index.php"); // Redirecting To Home Page
// }
?> -->