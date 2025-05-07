<?php
require 'vendor/autoload.php';  // Carica l'autoloader di Composer

use Doctrine\DBAL\DriverManager;

// Imposta i dettagli della connessione al database
$connectionParams = [
    'dbname' => 'PetHouse_project',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost', // o il tuo host
    'driver' => 'pdo_mysql', // o il driver che stai utilizzando
];
$conn = DriverManager::getConnection($connectionParams);

// Disabilita i vincoli delle chiavi esterne
$conn->executeQuery('SET FOREIGN_KEY_CHECKS = 0');

// Recupera tutte le tabelle nel database
$tables = $conn->fetchAllAssociative('SHOW TABLES');

foreach ($tables as $table) {
    $tableName = reset($table); // Ottieni il nome della tabella
    echo "Dropping table: $tableName\n";
    $conn->executeQuery('DROP TABLE IF EXISTS ' . $tableName);  // Rimuovi la tabella
}

// Riabilita i vincoli delle chiavi esterne
$conn->executeQuery('SET FOREIGN_KEY_CHECKS = 1');

echo "Database completamente svuotato.\n";
