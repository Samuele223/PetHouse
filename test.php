<?php
$admin = new Madmin("admin@example.com");
$admin->setPassword("adpass");

FPersistentManager::saveObj($admin);