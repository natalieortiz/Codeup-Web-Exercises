<?php 


require_once '../Input.php';
session_start();


$min = 1;
$max = 100;


if (isset($_SESSION['number'])) {
	$number = $_SESSION['number'];
} else {
	$number = rand($min, $max);
	$_SESSION['number'] = $number;
}

$guess = Input::get('guess');

// //If user enters the max first, it switches value. 
// if ($min > $max){
// 	$max = $argv[1];
// 	$min = $argv[2];
// }

//Asks user for a number to guess. Assigned to $guess. 
$message = "Guess a number between {$min} and {$max}.\n";


//Counts the number of trys that the user enters. 
$trys = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	// 	//if user enters something other than a number. 
	// do {
	// 	echo "Guess a number PLEASE.\n";
	// 	$guess = trim(fgets(STDIN)); 
	// } while (ctype_digit ($guess) == false);

	//Loop checking user guesses against randomly selected number. 

	if ($guess < $number) {
			$message = "Higher";
			$trys++;
			// $guess = trim(fgets(STDIN)); 
	} else if ($guess > $number) {
			$message ="Lower!";
			// $guess = trim(fgets(STDIN));
			$trys++;
	} 

	//Entering zero will exit the game. 
	if ($guess == 0){
		$message = "End game.";
	}

	//If user guesses the right number. 
	if ($guess == $number){
		$trys++;
		$message = "You guessed my number!";
	}

}


// $guess = trim(fgets(STDIN)); 

?>

<!DOCTYPE html>
<html>
<head>
	<title>High Low</title>
</head>
<body>
<h2><?= $number; ?></h2>
	<form method="POST">
	<h1>Guess the number!</h1>
	<br>
	<h2><?= $message; ?></h2>
	<br>
	<input type="text" name="guess">
	<input type="submit">
	</form>

</body>
</html>