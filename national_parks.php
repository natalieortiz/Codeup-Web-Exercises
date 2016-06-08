<?php 

define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'parks_db');

define('DB_USER', 'parks_user');

define('DB_PASS', 'codeup');

require 'db_connect.php';

function getParks()
{
    // Bring the $dbc variable into scope somehow

    $parks = array();

    $parks = $dbc->query('SELECT * FROM national_parks')->fetchAll(PDO::FETCH_ASSOC);

    return $parks; 
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>National Parks</title>
</head>
<body>
<p><?= $parks; ?></p>
</body>
</html>


