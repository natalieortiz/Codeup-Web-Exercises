<?php 


require '../db_credentials.php';

require '../db_connect.php';

require_once '../Input.php';



function pageController($dbc)
{

	$stmt = $dbc->query('SELECT * FROM national_parks');
    $rows = $stmt->rowCount();

    $maxpage = ceil($rows / 4);

    $minpage = 0;

	$page = !isset($_GET['page']) ? 1 : $_GET['page'];

	$states = [ 'Alabama' , 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];

    $parks = array();
	$offset = ($page -1) * 4;
	$stmt = $dbc->prepare("SELECT * FROM national_parks ORDER BY name ASC LIMIT 4 OFFSET :offset");
	$stmt->bindValue(':offset',$offset, PDO::PARAM_INT);
	$stmt->execute();
	$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return [
		'page' => $page,
		'maxpage' => $maxpage,
		'minpage' => $minpage,
		'parks' => $parks,
		'states' => $states
	];

} 

extract(pageController($dbc));

	$errors = [];

	if ($_SERVER['REQUEST_METHOD'] === 'POST'){

		
		try {
			$park_name = Input::getString('park_name');	
		} catch (OutOfRangeException $e){
			$errors[] = 'Must enter a value for park name.';
		} catch (DomainException $e){
			$errors[] = 'Park name must have a text value.';
		} catch (LengthException $e){
			$errors[] = 'Park name must be greater than 1 character and less than 255 characters.';
		}

		try {
			$location = Input::getString('location');
		} catch (OutOfRangeException $e){
			$errors[] = 'Must select a state for location.';
		} catch (DomainException $e){
			$errors[] = 'Location must be a state.';
		} catch (LengthException $e){
			$errors[] = 'Location name must be greater than 1 character and less than 255 characters.';
		}

		try {
			$date_established = Input::getDate('date_established');
		} catch (Exception $e){
			$errors[] = $e->getmessage();
		}

		try {
			$area_in_acres = Input::getNumber('area_in_acres');
		} catch (OutOfRangeException $e){
			$errors[] = 'Must enter a value for area in acres.';
		} catch (DomainException $e){
			$errors[] = 'Area in acres must be a number.';
		} catch (RangeException $e){
			$errors[] = 'Value for area in acres must be greater than 1 and less than 10,000,000.';
		}

		try {
			$description = Input::getText('park_description');
		} catch (OutOfRangeException $e){
			$errors[] = 'Must enter a park description.';
		} catch (DomainException $e){
			$errors[] = 'Park description cannot be a number.';
		} 

		if (empty($errors)){
			$stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)');

			$stmt->bindValue(':name', $park_name, PDO::PARAM_STR);
			$stmt->bindValue(':location', $location, PDO::PARAM_STR);
			$stmt->bindValue(':date_established', $date_established, PDO::PARAM_STR);
			$stmt->bindValue(':area_in_acres', $area_in_acres, PDO::PARAM_STR);
			$stmt->bindValue(':description', $description, PDO::PARAM_STR);
			$stmt->execute();
		}

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
<body class="background">
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
				    <input type="text"
				    	name="park_name"
				    	class="form-control"
				    	id="park_name"
				    	placeholder="Park Name"
				    	value="<?= (isset($_POST['park_name'])) ? $_POST['park_name'] : '' ?>">
				  </div>
				  <div class="form-group">
				    <label for="location">Location</label>
					<select class="form-control" id="location" name="location">

						<?php foreach($states as $state) :
							if($state == $_POST['location']) { ?>
								<option selected><?= $state ?></option>
							<?php }
							endforeach; ?>

						<?php foreach ($states as $state) : ?>
							<option><?= $state ?></option>
						<?php endforeach; ?>
					</select>
				  </div>
				  <div class="form-group">
				    <label for="date_established">Date Established</label>
				    <input type="text" 
				    format="YYYY-MM-DD" 
				    class="form-control" 
				    id="date_established" 
				    name="date_established" 
				    placeholder="YYYY-MM-DD" 
				    value="<?= (isset($_POST['date_established'])) ? $_POST['date_established'] : '' ?>">
				  </div>
				  <div class="form-group">
				    <label for="area_in_acres">Area in Acres</label>
				    <input type="number" min="0" step="0.01" 
				    class="form-control" id="area_in_acres" 
				    name="area_in_acres" placeholder="Area in Acres" 
				    value="<?= (isset($_POST['area_in_acres'])) ? $_POST['area_in_acres'] : '' ?>">
				  </div>

				  <div class="form-group">
				    <label for="park_description">Park Description</label>
				    <textarea class="form-control" 
				    rows="3" 
				    name="park_description" 
				    id="park_description" 
				    placeholder="Description"
				    ><?= (isset($_POST['park_description'])) ? $_POST['park_description'] : '' ?></textarea>
				  </div>
				  <button type="submit" class="btn btn-default btn-primary">Submit</button>
				<div id="error">
					<?php if (!empty($errors)) { 
					foreach ($errors as $error): ?>
						<p class="errorMessage"><?= $error ?></p>
					<?php endforeach; 
					} ?>
				</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Body -->
<div class="container-fluid">
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
	<div class="row">
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

<script type="text/javascript">
(function (){
    "use strict";
    $(document).ready(function(){

    	//checking to see if the number of .errorMessage class is more than 0.  If I get an error, .errorMessage is generated. 
		if($('.errorMessage').length > 0) {
			$("#park_modal").modal("show");
		}



    });

})();
</script>

</body>
</html>


