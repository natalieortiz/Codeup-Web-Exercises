<?php 

require 'adlister_credentials.php';

require 'db_connect.php';


$dropTable = 'DROP TABLE IF EXISTS users';


$createTable = 'CREATE TABLE users(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(150),
	email VARCHAR(150),
	password VARCHAR(150),
	PRIMARY KEY (id)
)';

$dbc->exec($dropTable);
$dbc->exec($createTable);
 ?>