<?php
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../vendor/autoload.php';
//..

$isDevMode = true;

$dbParams = [
    'driver'   => 'pdo_mysql',
    'user'     => 'root',           // metti il tuo utente MySQL
    'password' => '',               // metti la tua password MySQL
    'dbname'   => 'PetHouse_project',       // metti il nome del tuo database
    'host'     => 'localhost',
    'port'     => 3306,
    'charset'  => 'utf8mb4',
];

$config = ORMSetup::createAttributeMetadataConfiguration(['App/model'], $isDevMode); //samuele se devi modificare le cose, falle bene
$conn = DriverManager::getConnection($dbParams, $config);
$entityManager = new EntityManager($conn, $config);
