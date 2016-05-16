<?php 

require '../db_credentials.php';

require '../db_connect.php';

require_once '../Input.php';


    $stmt = $dbc->query('SELECT * FROM national_parks');
    $rows = $stmt->rowCount();

    $maxpage = ceil($rows / 4);

    $minpage = 0;

	$page = !isset($_GET['page']) ? 1 : $_GET['page'];


    $parks = array();
    if ($page == 1) {
	    $parks = $dbc->query("SELECT * FROM national_parks ORDER BY name ASC LIMIT 4")->fetchAll(PDO::FETCH_ASSOC);

    } else if ($page >= 2) {
    	$offset = ($page -1) * 4;
    	$stmt = $dbc->prepare("SELECT * FROM national_parks ORDER BY name ASC LIMIT 4 OFFSET :offset");
    	$stmt->bindValue(':offset',$offset, PDO::PARAM_INT);
    	$stmt->execute();
    	$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


	if ($_SERVER['REQUEST_METHOD'] === 'POST' && Input::has('park_name') && Input::has('location') && Input::has('date_established') && Input::has('area_in_acres') && Input::has('description')){

		$park_name = Input::get('park_name');
		$location = Input::get('location');
		$date_established = Input::get('date_established');
		$area_in_acres = Input::get('area_in_acres');
		$description = Input::get('park_description');

		$stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)');

		$stmt->bindValue(':name', $park_name, PDO::PARAM_STR);
		$stmt->bindValue(':location', $location, PDO::PARAM_STR);
		$stmt->bindValue(':date_established', $date_established, PDO::PARAM_STR);
		$stmt->bindValue(':area_in_acres', $area_in_acres, PDO::PARAM_STR);
		$stmt->bindValue(':description', $description, PDO::PARAM_STR);
		$stmt->execute();

	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>National Parks</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<link rel="stylesheet" href="/css/national_parks_css.css">

</head>
<body>
<!-- Modal -->
<div class="modal fade" id="park_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add a New National Park</h4>
      </div>
      <div class="modal-body">
      		<form method="POST">
				  <div class="form-group">
				    <label for="park_name">Park Name</label>
				    <input type="text" name="park_name" class="form-control" id="park_name" placeholder="Park Name">
				  </div>
				  <div class="form-group">
				    <label for="location">Location</label>
					<select class="form-control" id="location" name="location">
						<option>Alabama</option>
						<option>Alaska</option>
						<option>Arizona</option>
						<option>Arkansas</option>
						<option>California</option>
						<option>Colorado</option>
						<option>Connecticut</option>
						<option>Delaware</option>
						<option>Florida</option>
						<option>Georgia</option>
						<option>Hawaii</option>
						<option>Idaho</option>
						<option>Illinois</option>
						<option>Indiana</option>
						<option>Iowa</option>
						<option>Kansas</option>
						<option>Kentucky</option>
						<option>Louisiana</option>
						<option>Maine</option>
						<option>Maryland</option>
						<option>Massachusetts</option>
						<option>Michigan</option>
						<option>Minnesota</option>
						<option>Mississippi</option>
						<option>Missouri</option>
						<option>Montana</option>
						<option>Nebraska</option>
						<option>Nevada</option>
						<option>New Hampshire</option>
						<option>New Jersey</option>
						<option>New Mexico</option>
						<option>New York</option>
						<option>North Carolina</option>
						<option>North Dakota</option>
						<option>Ohio</option>
						<option>Oklahoma</option>
						<option>Oregon</option>
						<option>Pennsylvania</option>
						<option>Rhode Island</option>
						<option>South Carolina</option>
						<option>South Dakota</option>
						<option>Tennessee</option>
						<option>Texas</option>
						<option>Utah</option>
						<option>Vermont</option>
						<option>Virginia</option>
						<option>Washington</option>
						<option>West Virginia</option>
						<option>Wisconsin</option>
						<option>Wyoming</option>
					</select>
				  </div>
				  <div class="form-group">
				    <label for="date_established">Date Established</label>
				    <input type="text" format="YYYY-MM-DD" class="form-control" id="date_established" name="date_established" placeholder="YYYY-MM-DD">
				  </div>
				  <div class="form-group">
				    <label for="area_in_acres">Area in Acres</label>
				    <input type="number" min="0" step="0.01" class="form-control" id="area_in_acres" name="area_in_acres" placeholder="Area in Acres">
				  </div>

				  <div class="form-group">
				    <label for="park_description">Park Description</label>
				    <textarea class="form-control" rows="3" name="park_description" id="park_description" placeholder="Description"></textarea>
				  </div>
				  <button type="submit" class="btn btn-default btn-primary">Submit</button>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Body -->
<div class="container-fluid background">
	<div class="row">
		<div class="col-md-12 header">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
			<h1 class="heading">United States National Parks</h1>
			</div>
			<div class="col-md-2">
				<img src="/img/nps_logo.png" class="logo">
			</div>
		</div>
	</div>
	<div class="rowd">
		<div class="col-md-10 col-md-offset-1">
			<div class="table_area">
			<table class="table table-striped table-hover">
			<tr>
				<th>Park Name</th>
				<th>Location</th>
				<th>Date Established</th>
				<th>Area in Acres</th>
				<th>Description</th>
			</tr>
				<?php foreach ($parks as $park) : ?>
				<tr>
			 		<td><?= $park['name'] ?></td>
			 		<td><?= $park['location'] ?></td>
			 		<td><?= $park['date_established'] ?></td>
			 		<td><?= $park['area_in_acres'] ?></td>
			 		<td><?= $park['description'] ?></td>
			 	</tr>
			 	<?php endforeach; ?>
			</table>
			</div>
		</div>
	</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="col-md-6 previous links">
				 	<?php if ($page > 1 ) {  ?>
						<a class="btn btn-default" href="?page=<?= $page - 1 ?>" role="button" >Previous Page</a>
					<?php } ?>
				</div>
				<div class="col-md-6 next links">
				 	<?php if ($page < $maxpage) { ?>
				 		<a class="btn btn-default" href="?page=<?= $page + 1 ?>" role="button" >Next Page</a>
				 	<?php } ?>
			 	</div>
			</div>
	 	</div>
	 	<div class="row">
	 	<div class="col-md-1 col-md-offset-5 spacer">
	 	<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#park_modal" id="add_a_park">Add a Park</button>
	 	</div>
 	</div>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<script type="text/javascript">
(function (){
    "use strict";
    $(document).ready(function(){


    	$('#add_a_park').click(function(event){
			$("#park_modal").modal("show");
		})


    });

})();
</script>

</body>
</html>


