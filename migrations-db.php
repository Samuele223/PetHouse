<?php
use Doctrine\DBAL\DriverManager;
require_once __DIR__ . '/vendor/autoload.php';


return DriverManager::getConnection([
    'dbname' => 'PetHouse_project',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
]);