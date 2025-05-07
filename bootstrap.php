<?php
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/vendor/autoload.php';

// Percorso delle tue entità (modifica se diverso)
$paths = [__DIR__ . '/App/model'];
$isDevMode = true;

// Parametri di connessione al DB (modifica in base al tuo ambiente)
$dbParams = [
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'PetHouse_project',
];


$config = ORMSetup::createAttributeMetadataConfiguration(['/Users/rara/Documents/PetHouse_project/PetHouse/App/model'], $isDevMode);
$conn = DriverManager::getConnection($dbParams, $config);
$entityManager = new EntityManager($conn, $config);


return $entityManager;
