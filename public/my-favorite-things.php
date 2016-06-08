<?php 


function pageController()
{
	$favoriteThings = ['Dogs','iPhone','Apple Music','Craft Beer','Pizza','Notre Dame Football', 'Air Conditioning'];

    // Initialize an empty data array.
    $data = array();

    // Add data to be used in the html view.
    $data['favorites'] = $favoriteThings;

    // Return the completed data array.
    return $data;
}

extract(pageController());

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Favorite Things Table</title>
 	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Cabin+Sketch|Merriweather' rel='stylesheet' type='text/css'>
 	<style type="text/css">
 	.area {
 		margin-top: 60px; 
 		background-color: white;
 		width: 400px;
 		margin-left: auto;
 		margin-right: auto;
 	}
 	.background{
 		background: url('img/green_hearts.png');
 	}
 	.favorites {
 		width: 400px; 
 		margin: auto;
 	}

 	.filler{
 		font-size: 1.5em;
 		font-family: 'Merriweather', serif;
 		padding-left: 10px;
 	}

 	.headerrow{
 		text-align: center;
 		background-color: rgb(120,120,120);
 		color: white;
 		font-size: 32px;
 		font-family: 'Cabin Sketch', cursive;
 	}

 	</style>

 </head>
 <body class="background">
 <div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="area">
				<table class="favorites table table-bordered table-striped">
					<tr>
					<th class="headerrow">My Favorite Things</th>
				</tr>
				<?php foreach ($favorites as $key => $value) : ?>
						<tr class="filler">
							<td><?= $value ?></td>
						</tr>
				<?php endforeach; ?>
				</table>
			</div>
	</div>
 </div>
 </body>
 </html>