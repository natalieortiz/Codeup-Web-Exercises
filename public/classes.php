<?php 

//This is the class (blueprint, the plan)
class Person 
{
	public $firstname;
	public $lastname;
	public $fruit = array();

	function __construct($firstname, $lastname)
	{
		$this->firstname = $firstname;
		$this->lastname = $lastname;
	}
}



//Instantiated class ($person is the object, instance of the plan)

$person = new Person;
$person->firstname = 'Natalie';
$person->lastname = 'Ortiz';
$person->fruit = ['apple','orange'];

var_dump($person);

$person2 = new Person;
$person->firstname = 'John';
$person->lastname = 'Pearce';

$isaac = new Person('Isaac', 'Castillo');
echo $isaac->firstname, PHP_EOL;

