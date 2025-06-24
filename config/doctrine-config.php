<?php
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../vendor/autoload.php';

$isDevMode = true;

$dbParams = [
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'PetHouse_project',
    'host'     => 'localhost',
    'port'     => 3306,
    'charset'  => 'utf8mb4',
];

// 🔧 aggiunto proxyDir
$proxyDir = __DIR__ . '/../Proxies';


$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/../App/model'],
    isDevMode: true,
    proxyDir: __DIR__ . '/../Proxies',
    cache: null
);

// 🔧 forza la directory anche a mano
$config->setProxyDir(__DIR__ . '/../Proxies');




$conn = DriverManager::getConnection($dbParams, $config);
$entityManager = new EntityManager($conn, $config);

define('COOKIE_EXP_TIME', 2592000); // 30 days

