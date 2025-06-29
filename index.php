<?php
require_once __DIR__ . '/vendor/autoload.php';   // <--- AGGIUNTA QUESTA RIGA QUI per smarty
require_once __DIR__ . '/config/autoloader.php'; //i path mannaggia a voi aaaaaaaaaaaa
require_once 'config/doctrine-config.php'; 
require_once __DIR__ . '/App/controller/CfrontController.php'; // <-- THIS IS NEEDED!

//require_once "/install/Installation.php";
//Installation::install();


// Supponiamo che la tua classe si chiami FpersistentManager e abbia un getInstance()
$persistentManager = FpersistentManager::getInstance();

$fc = new CfrontController();
$fc->run($_SERVER['REQUEST_URI']);

?>