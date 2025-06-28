<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/bootstrap.php'; // Ensure Doctrine and DB are initialized
require_once __DIR__ . '/config/autoloader.php';

$admin = new Madmin("admin@example.com");
$admin->setPassword("adpass");

FPersistentManager::saveObj($admin);

echo "Admin created successfully with email: " . $admin->getEmail() . "\n";