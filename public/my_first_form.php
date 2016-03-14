<?php
	var_dump($_GET);
	var_dump($_POST);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My First HTML Form</title>
	</head>
	<body>
	<form method="POST" action="/my_first_form.php">
		<h1>My First HTML Form</h1>
		<h2>User Login</h2>
		<p>
			<label for="username">Username</label>
			<input id="name" name="username" type="text" placeholder="Enter username">
		</p>
		<p>
			<label for="password">Password</label>
			<input id="password" name="password" type="password" placeholder="Password">
		</p>
		<p>
			<button type="submit">Login</button>
		</p>
	</form>
	
	<h2>Compose an Email</h2>
	<form method="POST" action="/my_first_form.php">
		<p>
			<label for="recipient">To:</label>
			<input id="recipient" name="recipient" type="email" placeholder="Recipient Email">
		</p>
		<p>
			<label for="sender">From:</label>
			<input id="sender" name="sender" type="email" placeholder="Sender Email">
		</p>
		<p>
			<label for="subject">Re:</label>
			<input id="subject" name="subject" type="text" placeholder="Subject">
		</p>
		<p>
			<textarea id="email_body" name="email_body" placeholder="Content Here"></textarea>
		</p>
		<p>
			<input type="checkbox" id="save_copy" name="save_copy" value="yes" checked>
			<label for="save_copy">Save a copy to sent folder</label>
		</p> 
	<button type="submit">Send Email</button>
	</form>
	<form method="POST" action="/my_first_form.php">
		<h2>Multiple Choice Test</h2>
		<p><h3>What is your favorite ice cream flavor?</h3></p>
		<label>
			<input type="radio" name="flavor" value="chocolate">
			Chocolate
		</label>
		
		<label>
			<input type="radio" name="flavor" value="vanilla">Vanilla
		</label>
		
		<label>
			<input type="radio" name="flavor" value="strawberry">Strawberry
		</label>

		<p><h3>Which is your favorite adult beverage?</h3></p>
		<label>
			<input type="radio" name="drink" value="beer">Beer
		</label>
		<label>
			<input type="radio" name="drink" value="wine">Wine
		</label>
		<label>
			<input type="radio" name="drink" value="cocktail">Cocktail
		</label>
		<label>
			<input type="radio" name="drink" value="none">None 
		</label>
	
		<p><h3>What is your favorite type of pet?</h3></p>
		<label>
			<input type="radio" name="pet" value="dog">Dog
		</input>
		<label>
			<input type="radio" name="pet" value="cat">Cat
		</label>
		<label>
			<input type="radio" name="pet" value="reptile">Reptile
		</label>
		<label>
			<input type="radio" name="pet" value="fish">Fish
		</label>
		<br>
		
		<p><h3>What toppings do you like on your pizza?</h3></p>
		<label>
			<input type="checkbox" id="pepperoni" name="toppings[]" value="pepperoni">Pepperoni
		</label>
		<label>
			<input type="checkbox" id="sausage" name="toppings[]" value="sausage">Sausage
		</label>
		<label>
			<input type="checkbox" id="mushrooms" name="toppings[]" value="mushrooms">Mushrooms
		</label>
		<label>
			<input type="checkbox" id="olives" name="toppings[]" value="olives">Olives
		</label>
		<label>
			<input type="checkbox" id="peppers" name="toppings[]" value="peppers">Peppers
		</label>
		<br>
			<label for="music"><h3>What are your favorite types of music?</h3></label>
		<select id="music" name="music[]" multiple>
			<option selected disabled>Select Type(s)</option>
			<option value="rock">Rock</option>
			<option value="pop">Pop</option>
			<option value="rap">Rap</option>
			<option value="country">Country</option>
			<option value="indie">Indie</option>
		</select>
		<br>
		<button type="submit">Submit Answers</button>
	</form>
	<form method="POST" action="/my_first_form.php">
		<h2>Select Testing</h2>
		<label for="international">Have you traveled outside the country?</label>
		<select id="international" name="international">
			<option value="1" selected>Yes</option>
			<option value="0">No</option>
		</select>

	<button type="submit">Submit Answers</button>	
	</form>

</body>
</html>
