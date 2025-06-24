<?php
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/vendor/autoload.php';

function getEntityManager() {
    $paths = [__DIR__ . '/App/model'];
    $isDevMode = true;
    $proxyDir = __DIR__ . '/Proxies';

    $dbParams = [
        'driver'   => 'pdo_mysql',
        'user'     => 'root',
        'password' => '',
        'dbname'   => 'PetHouse_project',
    ];

    $config = ORMSetup::createAttributeMetadataConfiguration(
        paths: $paths,
        isDevMode: $isDevMode,
        proxyDir: $proxyDir,
        cache: null
    );

    $config->setProxyDir($proxyDir); // forza

    $conn = DriverManager::getConnection($dbParams, $config);
    $entityManager = new EntityManager($conn, $config);

    return $entityManager;
}

