<?php

namespace App\Provider;

use PDO;

class DataProvider
{
    private static $dataBaseName ='cinema';
    private static $server = '127.0.0.1';
    private static $port = '3306';
    private static $login = 'root';
    private static $pwd = '';
    private static $connexion;

    public static function getConnexion()
    {
        if(self::$connexion === null) {
            self::$connexion = new PDO('mysql:host='.self::$server.';port='.self::$port.';dbname='.self::$dataBaseName ,self::$login, self::$pwd);
            self::$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            self::$connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        }

        return self::$connexion;
    }
}