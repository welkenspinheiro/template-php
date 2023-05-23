<?php

use app\framework\database\Connection;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__FILE__,2));
$dotenv->load();

$connection = Connection::getConnection();
$query = $connection->query("select * from users");

var_dump($query->fetchAll());
die;

routerExecute();