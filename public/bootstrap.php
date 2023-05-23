<?php

use app\framework\database\Connection;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__FILE__,2));
$dotenv->load();

routerExecute();