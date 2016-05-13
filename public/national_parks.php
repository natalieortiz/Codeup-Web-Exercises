<?php 

define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'parks_db');

define('DB_USER', 'parks_user');

define('DB_PASS', 'codeup');

require '../db_connect.php';


    $parks = array();

    $parks = $dbc->query('SELECT * FROM national_parks')->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
<head>
	<title>National Parks</title>
</head>
<body>


    <?php foreach ($parks as $park) : ?>
 		<h3><?= $park['name'] ?></h3>
 		<li><?= $park['location'] ?></li>
 		<li><?= $park['date_established'] ?></li>
 		<li><?= $park['area_in_acres'] ?></li>
 	<?php endforeach; ?>

</body>
</html>


