<?php 

require '../db_credentials.php';


require_once '../Input.php';



class Park
{

	protected static $dbc = null;

	public static $page;

	public static $minpage = 0;

	public static $states = [ 'Alabama' , 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];

	public static function dbConnect()
    {

        if (!self::$dbc) {
            //Connects to DB.
            self::$dbc = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);

            //Tell PDO to throw exceptions on error.
            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

    }

	public function getPage()
	{

		self::$page = !isset($_GET['page']) ? 1 : $_GET['page'];
		return self::$page; 

	}

	pulic function getMaxPage()
	{	

		self::dbConnect();
		$stmt = $dbc->query('SELECT * FROM national_parks');
	    $rows = $stmt->rowCount();
	    $maxpage = ceil($rows / 4);
	    return $maxpage;
		
	}
	
	public static function displayRows()
	{	
		self::dbConnect();
	    $parks = array();
		$offset = (self::$page -1) * 4;
		$stmt = $dbc->prepare("SELECT * FROM national_parks ORDER BY name ASC LIMIT 4 OFFSET :offset");
		$stmt->bindValue(':offset',$offset, PDO::PARAM_INT);
		$stmt->execute();
		$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $parks;
	}


	public function insertPark()
	{	
		self::dbConnect();
		$stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)');

		$stmt->bindValue(':name', $park_name, PDO::PARAM_STR);
		$stmt->bindValue(':location', $location, PDO::PARAM_STR);
		$stmt->bindValue(':date_established', $date_established, PDO::PARAM_STR);
		$stmt->bindValue(':area_in_acres', $area_in_acres, PDO::PARAM_STR);
		$stmt->bindValue(':description', $description, PDO::PARAM_STR);
		$stmt->execute();
		
	}

}