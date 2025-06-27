<?php
require_once __DIR__ . '/App/config/autoloader.php';


$admin = new Madmin("admin@example.com");
$admin->setPassword("adpass");

FPersistentManager::saveObj($admin);