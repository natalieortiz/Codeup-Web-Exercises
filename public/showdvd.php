<?php 

$dvds = require 'movies.php';


$title = $_GET['title'];

die;

foreach ($dvds as $dvd) {
	if ( $dvd['title'] == $title ) {
		break;
	}
}

var_dump($dvds);
echo "why isn't this working?";

?>

<!DOCTYPE html>
<html>
<head>
	<title>This is Dumb</title>
</head>
<body>
	<h1><?= $title ?></h1>
	<h2><?= $dvd['year']?></h2>
	<h3>hello!</h3>


</body>
</html>
