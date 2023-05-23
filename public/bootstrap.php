<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__FILE__,2));
$dotenv->load();

routerExecute();