<?php
	date_default_timezone_set('America/Chicago');
	require_once '../functions/functions.php'; 
	require_once '../Auth.php';
	require_once '../Input.php';

	session_start();

	$username = Input::get('username');

	$password = Input::get('password');

	$message = '';


	if (Auth::check()) {
		header('Location: authorized.php');
		exit();
	} 

	// if (!empty('POST'){
	// 	if (Auth::attempt($username,$password)) {
	// 		header('Location: authorized.php');
	// 		exit();	
	// 	} else if ($username != ''){
	// 		$message = 'Login Failed';
	// 	}
	// }
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		if (Auth::attempt($username,$password)) {
			header('Location: authorized.php');
			exit();	
		} else if ($username != ''){
			$message = 'Login Failed';
		}
	}

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login PHP</title>
 </head>
 <body>
 	<form method="POST">
        <label>Username</label>
        <input type="text" name="username"><br>
        <label>Password</label>
        <input type="text" name="password"><br>
        <input type="submit">
    </form>

	<p><?= $message; ?> </p>
 </body>
 </html>

