<?php 

class Log
{	
	public static $filename; 

	public static $handle; 

	public static function openFile($prefix = "log")
	{
		self::$filename = $prefix . '-' . date('Y-m-d') . ".log";
		self::$handle = fopen(self::$filename, 'a');
		
	}

	public static function logMessage ($logLevel, $message = 'This was left blank')
	{	
		self::openFile();
		fwrite(self::$handle, PHP_EOL . date('Y-m-d H:i:s'). " " . $logLevel . " " . $message);
		self::closeFile();

	}

	public static function logInfo($message)
	{	
		//$this-> allows you to grab a function inside the class. 
		self::logMessage("INFO", $message);
	}

	public static function logError($message)
	{
		self::logMessage("ERROR",$message);
	}

	public static function closeFile()
	{
		fclose(self::$handle);
	}
}

 ?>