<?php 

$dvds = require 'movies.php';

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>My DVDs</title>
 	<meta charset="UTF-8">

 </head>
 <body>
 	<h1>My Movies</h1>
 	<ul>
 	<?php foreach ($dvds as $dvd) : ?>
 		<a href="showdvd.php?title=<?= $dvd['title']?>">
 		<li><?= $dvd['title'] ?></li>
 		</a>
 	<?php endforeach; ?>
 	</ul>
 </body>
 </html>