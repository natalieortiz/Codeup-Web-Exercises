<?php 

require 'db_credentials.php';

require 'db_connect.php';


echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$query = 'CREATE TABLE users(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name TEXT,
	PRIMARY KEY (id)
)';

$users = [
	'natalie',
	'john',
	'rita',
	'moni',
	'oscar'
];

foreach ($users as $name){
	$query = 'INSERT INTO users (name) VALUES ("' . $name . '")';
	$dbc->exec($query);
}

$result = $dbc->exec($query);

var_dump($result);