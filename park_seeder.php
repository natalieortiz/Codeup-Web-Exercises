<?php 

define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'parks_db');

define('DB_USER', 'parks_user');

define('DB_PASS', 'codeup');

require 'db_connect.php';


$dbc->exec('TRUNCATE national_parks');

$parks = [
	['name' => 'Acadia', 'location' => 'Maine', 'date_established' => '1919-02-26', 'area_in_acres' => '47389.67'],
	['name' => 'Arches', 'location' => 'Utah', 'date_established' => '1929-04-12', 'area_in_acres' => '76518.98'],
	['name' => 'Badlands', 'location' => 'South Dakota', 'date_established' => '1978-11-10', 'area_in_acres' => '242755.94'],
	['name' => 'Big Bend', 'location' => 'Texas', 'date_established' => '1944-06-12', 'area_in_acres' => '801163.21'],
	['name' => 'Carlsbad Caverns', 'location' => 'New Mexico', 'date_established' => '1930-05-14', 'area_in_acres' => '46766.45'],
	['name' => 'Glacier', 'location' => 'Montana', 'date_established' => '1910-05-11', 'area_in_acres' => '1013572.41'],
	['name' => 'Grand Canyon', 'location' => 'Arizona', 'date_established' => '1919-02-26', 'area_in_acres' => '1217403.32'],
	['name' => 'Joshua Tree', 'location' => 'California', 'date_established' => '1994-10-31', 'area_in_acres' => '789745.47'],
	['name' => 'Rocky Mountain', 'location' => 'Colorado', 'date_established' => '1915-01-26', 'area_in_acres' => '265828.41'],
	['name' => 'Shenandoah', 'location' => 'Virginia', 'date_established' => '1926-05-22', 'area_in_acres' => '199045.23']
];

foreach ($parks as $park){
	$query = "INSERT INTO national_parks (name, location, date_established, area_in_acres) 
	VALUES ('{$park['name']}', '{$park['location']}', '{$park['date_established']}','{$park['area_in_acres']}')";
	$dbc->exec($query);
}