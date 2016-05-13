<?php 

define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'parks_db');

define('DB_USER', 'parks_user');

define('DB_PASS', 'codeup');

require '../db_connect.php';


	$page = !isset($_GET['page']) ? 0 : $_GET['page'];

    $parks = array();

    if ($page == 0) {
	    $parks = $dbc->query("SELECT * FROM national_parks LIMIT 4")->fetchAll(PDO::FETCH_ASSOC);	
    } else if ($page >= 1) {
    	$offset = $page * 4;
    	$parks = $dbc->query("SELECT * FROM national_parks LIMIT 4 OFFSET {$offset}")->fetchAll(PDO::FETCH_ASSOC);
    }

?>


<!DOCTYPE html>
<html>
<head>
	<title>National Parks</title>
</head>
<body>

    <?php foreach ($parks as $park) : ?>
 		<h3><?= $park['name'] ?> National Park</h3>
 		<li>Located: <?= $park['location'] ?></li>
 		<li>Date Established: <?= $park['date_established'] ?></li>
 		<li>Area in Acres: <?= $park['area_in_acres'] ?></li>
 	<?php endforeach; ?>
 	<br>
 	<?php if ($page >= 1 ) {  ?>
		<a href="?page=<?= $page - 1 ?>">Previous Page</a>
	<?php } ?>
 	<?php if ($page >= 0 and $page < 2) { ?>
	 	<a href="?page=<?= $page + 1 ?>">Next Page</a>
 	<?php } ?>
</body>
</html>


