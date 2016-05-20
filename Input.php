<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        return isset($_REQUEST[$key]);
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        return self::has($key) ? $_REQUEST[$key] : $default;
    }

    public static function getString($key)
    {
        if (!is_string(self::get($key)) || is_numeric(self::get($key)))
        {
            throw new Exception('Value must be a string.');
        } 

        return trim(self::get($key));
    }

    public static function getNumber($key)
    {   
        $potentialNumber = self::get($key);

        if(!is_numeric($potentialNumber))
        {
            throw new Exception('Value must be an integer.');
        }

        $findme = '.';
        if (strpos($potentialNumber, $findme) === false){
            return intval($potentialNumber);
        } else {
            return floatval($potentialNumber);
        }

    }

    
    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
