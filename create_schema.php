<?php
require_once __DIR__ . '/../PetHouse/vendor/autoload.php';
require_once __DIR__ . '/../PetHouse/config/doctrine-config.php';

use Doctrine\ORM\Tools\SchemaTool;
$entityManager1 = $entityManager; // da doctrine-config.php l' ho rinominato più carino 
$metadata = $entityManager->getMetadataFactory()->getAllMetadata();

$schemaTool = new SchemaTool($entityManager1);
$schemaTool->updateSchema($metadata);

echo "Schema del database creato!\n";