<?php

namespace App\Provider;

use PDO;

class DataProvider 
{
    /**
     * @var PDO
     */
    private static $db;

    /**
     * getConnexion
     *
     * @return PDO
     */
    public static function getConnexion() : PDO
    {
        if(self::$db == null) {
            $user = 'root';
            $pwd = '';
            self::$db = new PDO('mysql:host=localhost;port=3306;dbname=cinema',$user, $pwd);
            self::$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        }

        return self::$db;
    }
}