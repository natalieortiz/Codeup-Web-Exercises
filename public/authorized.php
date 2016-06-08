<?php 

require_once '../Auth.php'; 

	session_start();

 	$name = '';


	if (Auth::check()) {
		$name = $_SESSION['logged_in_user'];
	}  else {
		header('Location: login.php');
		exit();
	}



 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <h1>Authorized</h1>

 <?= $name; ?><?= " is logged in.";?>

 	<a href="logout.php">Logout</a>

 </body>
 </html>