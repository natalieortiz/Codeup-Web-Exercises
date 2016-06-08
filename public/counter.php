<?php 


function pageController ()
{	
	// if (!isset($_GET['count'])){
	// 	$count = 0;
	// } else {
	// 	$count = $_GET['count'];
	// }
	$count = !isset($_GET['count']) ? 0 : $_GET['count'];
	return ['count' => $count];
}

extract(pageController());

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="UTF-8">
 	<title>Counter</title>
 </head>
 <body>
 
 <h2>Counter</h2>
 <h3><?= $count ?></h3>

 <a href="?count=<?= $count + 1 ?>">Up</a>
 <a href="?count=<?= $count - 1 ?>">Down</a>
 </body>
 </html>