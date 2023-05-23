<?php

namespace app\framework\database;

use PDO;

class Connection
{
    private static $connection = null;

    public static function getConnection()
    {
        try {
            if(empty(self::$connection)){
                self::$connection = new PDO("mysql:host={$_ENV['DATABASE_HOST']};dbname={$_ENV['DATABASE_NAME']}",$_ENV['DATABASE_USER'],$_ENV['DATABASE_PASS'],[
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);
            }
            return self::$connection;
        } catch (\Exception $th) {
            var_dump($th->getMessage());
        }
        
    }
}