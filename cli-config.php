<?php

require 'vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\DBAL\DriverManager;

$config = new PhpFile('migrations.php'); // Or use one of the Doctrine\Migrations\Configuration\Configuration\* loaders

$paths = [__DIR__.'/App/model'];
$isDevMode = true;
$proxyDir = __DIR__ . '/Proxies';

// Configurazione ORM
$ORMConfig = ORMSetup::createAttributeMetadataConfiguration(
    paths: $paths,
    isDevMode: $isDevMode,
    proxyDir: $proxyDir,
    cache: null
);
$connection = DriverManager::getConnection(['driver' => 'pdo_sqlite', 'memory' => true]);

$entityManager = new EntityManager($connection, $ORMConfig);

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));