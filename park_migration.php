<?php 

define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'parks_db');

define('DB_USER', 'parks_user');

define('DB_PASS', 'codeup');

require 'db_connect.php';

$dropTable = 'DROP TABLE IF EXISTS national_parks';

$dbc->exec($dropTable);

$createTable = 'CREATE TABLE national_parks(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	name VARCHAR(100),
	location VARCHAR(100),
	date_established DATE,
	area_in_acres DOUBLE,
	description TEXT,
	PRIMARY KEY (id)
)';

$dbc->exec($createTable);
