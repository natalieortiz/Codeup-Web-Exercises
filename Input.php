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

    public static function getString($key, $min = 1, $max = 255 )
    {   

        $stringlength = strlen($key);

        if (empty(self::get($key)))
        {
            throw new OutOfRangeException('Value is missing');
        }

        if (!is_string(self::get($key)) || is_numeric(self::get($key)))
        {
            throw new DomainException('Value must be a string.');
        } 

        if ($stringlength < $min || $stringlength > $max)
        {
            throw new LengthException('Sting must be greater than 1 and less than 255 characters.');
        }


        return trim(self::get($key));
    }
    
    public static function getText ($key)
    {   
        
        if (empty(self::get($key)))
        {
            throw new OutOfRangeException('Value is missing');
        }

        if (!is_string(self::get($key)) || is_numeric(self::get($key)))
        {
            throw new DomainException('Value must be a string.');
        } 

        return trim(self::get($key));
    }

    public static function getNumber($key, $min = 1, $max = 9)
    {   
        $potentialNumber = self::get($key);
        $stringlength = strlen(self::get($key));

        if (empty(self::get($key)))
        {
            throw new OutOfRangeException('Value is missing');
        }

        if(!is_numeric($potentialNumber))
        {
            throw new DomainException('Value must be an integer.');
        }

        if (!is_numeric($min) || !is_numeric($max)) 
        {
            throw new InvalidArgumentException('Min or max must be a number.');
        }

        if ($potentialNumber < $min || strlen($potentialNumber) > $max)
        {
            throw new RangeException('Number must be greater than 1 and less than 10,000,000.');
        }

        $findme = '.';
        if (strpos($potentialNumber, $findme) === false){
            return intval($potentialNumber);
        } else {
            return floatval($potentialNumber);
        }

    }

    public static function getDate($key)
    {
        $getdate = self::get($key);
        $date = date_create($getdate);
        if ($date === false) {
            throw new Exception ('Please enter in YYYY-MM-DD format.');
        }

        return $date->format('Y-m-d');



    }

    
    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
