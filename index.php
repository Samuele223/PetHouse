<?php
require_once __DIR__ . '/vendor/autoload.php';  
require_once __DIR__ . '/config/autoloader.php'; 
require_once 'config/doctrine-config.php'; 
require_once __DIR__ . '/App/controller/CfrontController.php'; 

$persistentManager = FpersistentManager::getInstance();

$fc = new CfrontController();
$fc->run($_SERVER['REQUEST_URI']);

?>