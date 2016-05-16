<?php 

define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'parks_db');

define('DB_USER', 'parks_user');

define('DB_PASS', 'codeup');

require 'db_connect.php';


$dbc->exec('TRUNCATE national_parks');

$parks = [
	['name' => 'Acadia', 'location' => 'Maine', 'date_established' => '1919-02-26', 'area_in_acres' => '47389.67', 'description'=>'Covering most of Mount Desert Island and other coastal islands, Acadia features the tallest mountain on the Atlantic coast of the United States, granite peaks, ocean shoreline, woodlands, and lakes. There are freshwater, estuary, forest, and intertidal habitats.'],
	['name' => 'Arches', 'location' => 'Utah', 'date_established' => '1929-04-12', 'area_in_acres' => '76518.98', 'description'=>'This site features more than 2,000 natural sandstone arches, including the famous Delicate Arch. In a desert climate, millions of years of erosion have led to these structures, and the arid ground has life-sustaining soil crust and potholes, which serve as natural water-collecting basins. Other geologic formations are stone columns, spires, fins, and towers.'],
	['name' => 'Badlands', 'location' => 'South Dakota', 'date_established' => '1978-11-10', 'area_in_acres' => '242755.94','description'=>'The Badlands are a collection of buttes, pinnacles, spires, and grass prairies. It has the world\'s richest fossil beds from the Oligocene epoch, and the wildlife includes bison, bighorn sheep, black-footed ferrets, and swift foxes.'],
	['name' => 'Big Bend', 'location' => 'Texas', 'date_established' => '1944-06-12', 'area_in_acres' => '801163.21', 'description'=>'Named for the prominent bend in the Rio Grande along the US–Mexico border, this park encompasses a large and remote part of the Chihuahuan Desert. Its main attraction is backcountry recreation in the arid Chisos Mountains and in canyons along the river. A wide variety of Cretaceous and Tertiary fossils as well as cultural artifacts of Native Americans also exist within its borders.'],
	['name' => 'Carlsbad Caverns', 'location' => 'New Mexico', 'date_established' => '1930-05-14', 'area_in_acres' => '46766.45','description'=>'Carlsbad Caverns has 117 caves, the longest of which is over 120 miles (190 km) long. The Big Room is almost 4,000 feet (1,200 m) long, and the caves are home to over 400,000 Mexican free-tailed bats and sixteen other species. Above ground are the Chihuahuan Desert and Rattlesnake Springs.'],
	['name' => 'Glacier', 'location' => 'Montana', 'date_established' => '1910-05-11', 'area_in_acres' => '1013572.41','description'=>'The U.S. half of Waterton-Glacier International Peace Park, this park hosts 26 glaciers and 130 named lakes beneath a stunning canopy of Rocky Mountain peaks. There are historic hotels and a landmark road in this region of rapidly receding glaciers. The local mountains, formed by an overthrust, expose the world\'s best-preserved sedimentary fossils from the Proterozoic era.'],
	['name' => 'Grand Canyon', 'location' => 'Arizona', 'date_established' => '1919-02-26', 'area_in_acres' => '1217403.32','description'=>'The Grand Canyon, carved by the mighty Colorado River, is 277 miles (446 km) long, up to 1 mile (1.6 km) deep, and up to 15 miles (24 km) wide. Millions of years of erosion have exposed the colorful layers of the Colorado Plateau in countless mesas and canyon walls, visible from both the north and south rims, or from a number of trails that descend into the canyon itself.'],
	['name' => 'Joshua Tree', 'location' => 'California', 'date_established' => '1994-10-31', 'area_in_acres' => '789745.47','description'=>'Covering large areas of the Colorado and Mojave Deserts and the Little San Bernardino Mountains, this exotic desert landscape is populated by vast stands of the famous Joshua tree. Great changes in elevation reveal starkly contrasting environments including bleached sand dunes, dry lakes, rugged mountains, and maze-like clusters of monzogranite monoliths.'],
	['name' => 'Rocky Mountain', 'location' => 'Colorado', 'date_established' => '1915-01-26', 'area_in_acres' => '265828.41','description'=>'Bisected north to south by the Continental Divide, this portion of the Rockies has ecosystems varying from over 150 riparian lakes to montane and subalpine forests to treeless alpine tundra. Wildlife including mule deer, bighorn sheep, black bears, and cougars inhabit its igneous mountains and glacier valleys. Longs Peak, a classic Colorado fourteener, and the scenic Bear Lake are popular destinations, as well as the famous Trail Ridge Road, which reaches an elevation of more than 12,000 feet (3,700 m).'],
	['name' => 'Shenandoah', 'location' => 'Virginia', 'date_established' => '1926-05-22', 'area_in_acres' => '199045.23','description'=>'Shenandoah\'s Blue Ridge Mountains are covered by sprawling hardwood forests that teem with tens of thousands of animals. The Skyline Drive and Appalachian Trail run the entire length of this narrow park, along with more than 500 miles (800 km) of hiking trails passing scenic overlooks and cataracts of the Shenandoah River.']
];


$stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)');

foreach ($parks as $park){
	$stmt->bindValue(':name', $park['name'],PDO::PARAM_STR);
	$stmt->bindValue(':location', $park['location'],PDO::PARAM_STR);
	$stmt->bindValue(':date_established', $park['date_established'],PDO::PARAM_STR);
	$stmt->bindValue(':area_in_acres', $park['area_in_acres'],PDO::PARAM_STR);
	$stmt->bindValue(':description', $park['description'],PDO::PARAM_STR);
	$stmt->execute();
}