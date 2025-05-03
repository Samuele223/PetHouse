<?php
require_once __DIR__ . '/../PetHouse/vendor/autoload.php';
require_once __DIR__ . '/../PetHouse/config/doctrine-config.php';

use Doctrine\ORM\Tools\SchemaTool;
$entityManager = $entityManager; // da doctrine-config.php
$metadata = $entityManager->getMetadataFactory()->getAllMetadata();

$schemaTool = new SchemaTool($entityManager);
$schemaTool->updateSchema($metadata);

echo "Schema del database creato!\n";