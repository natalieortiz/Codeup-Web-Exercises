<?php 

	require_once '../Input.php'; 
	require_once '../Auth.php'; 

	session_start();

	Auth::logout();

	header('Location: login.php');
	exit();

 ?>
