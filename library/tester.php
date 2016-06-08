<?php 

//require User class here.
require 'User.php';

// $user = new User;
// $user->name = "Natalie";
// $user->email = "ndnatalie@gmail.com";
// $user->password = password_hash("password", PASSWORD_BCRYPT);
// $user->save();

// echo "The id of the last inserted row in the db is " . $user->id . PHP_EOL;

// $user = new User;
// $user->name = "John";
// $user->email = "ndnatalie@gmail.com";
// $user->password = password_hash("mypassword", PASSWORD_BCRYPT);
// $user->save();

// echo "The id of the last inserted row in the db is " . $user->id . PHP_EOL;


// echo "first user below " . PHP_EOL; 
// $user = User::find(2);
// $user->email = 'jwpearc@gmail.com';
// $user->save();



echo "Delete user" . PHP_EOL; 
$user = User::find(2);
$user->delete();

// echo "All users below " . PHP_EOL;
// $allusers = User::all();
// var_dump($allusers);



 ?>