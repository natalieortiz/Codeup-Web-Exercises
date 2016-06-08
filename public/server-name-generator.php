<?php 

require_once '../ServerName.php';


function pageController()
{

	$serverName = new ServerName();

    // Initialize an empty data array.
    $data = array();

    // Add data to be used in the html view.
    $data['serverName'] = $serverName->newServer();

    // Return the completed data array.
    return $data;

}

extract(pageController());

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 	<link href='https://fonts.googleapis.com/css?family=Montserrat|Oleo+Script:400,700' rel='stylesheet' type='text/css'>
 	<title>Server Name Generator</title>
 	<link rel="stylesheet" href="/css/server-generator.css">
 	

 </head>
 <body class="background">
 	<div class="container-fluid">
 		<div class="row buffer">
 		</div>
 		<div class="row">
 			<div class="col-md-6 col-md-offset-3">
			 	<div class="area">
			 	<h1 class="header">Here Is Your New Server Name:</h1>
				 	<div class="salmon">
					 	<p class="server"><?= $serverName; ?></p>
					</div>
			 	</div><!-- end of area -->
			 </div>
		 </div><!-- end of row -->
		 <div class="row">
 			<div class="col-md-4 col-md-offset-4">
 				<div class="button-space">
		 			<button class="btn btn-default center-block button-style" id="button" type="submit">Get New Server Name</button>
	 			</div>
			</div>
		 </div><!-- end of row -->
	 </div>
 </body>
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript">
 	(function(){
		"use strict"
		$(document).ready(function(){

			//Start game button
			$('#button').click(function(event){
				location.reload();
			})
			
		});


	})();
	</script>
 </html>