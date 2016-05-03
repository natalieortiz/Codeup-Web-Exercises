<?php 

require_once '../Input.php'; 

function pageController ()
{	

	$count = Input::get('count',0);
	return ['count' => $count];
}

extract(pageController());

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Ping</title>
 	<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
 	<style type="text/css">
 	.area {
 		width: 850px;
 		height: 400px;
 		margin: auto;
 	}

 	.background {
 		background: rgba(101,168,255, .5);
 	}

 	.table {

 		width: 400px;
 		height: 360px;
 		background: rgb(0,115,18);
 		border: solid 5px white;
 		margin: auto;
 		float: left;
 		margin-top: 30px;
 	}

 	.counter {
 		color: white;
 		text-align: center;
 		padding-top: 30px;
 		font-size: 32px; 
 		font-family: 'Droid Sans', sans-serif;
 	}

 	.counter a:hover {
 		color: white;
 	}

 	.paddle {
 		width: 225px;
 		padding-top: 20px;
 		margin: auto;
 	}

 	.paddle img {
 		width: 200px;
 	}
 	.play {
 		padding-top: 60px;
 	}

 	</style>
 </head>
 <body class="background">

	<div class="area">
		<div class="table">
			<h1 class="counter">Ping Counter:</h2>
			<h2 class="counter"><?= $count?></h3>
		</div>
		<div class="table">
			<div class="counter play"><a href="pong.php?count=<?= $count + 1 ?>">Hit</a></div>
			<div class="counter play"><a href="ping.php?count=0">Miss</a></div>
		</div>
	</div>
	<div class="paddle">
		<img src="/img/paddle.png">
	</div>

 </body>
 </html>