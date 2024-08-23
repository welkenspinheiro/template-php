<?php

namespace app\Models;

use app\framework\classes\Cache;
use app\framework\database\Connection;

class User
{
    public function getUser()
    {
        return Cache::get('users', function () {
            $connect = Connection::getConnection();
            $query = $connect->query("select * from users");
            return $query->fetchAll();
        }, 5);
    }
}
