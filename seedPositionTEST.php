#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap.php';   // getEntityManager()

// Hardcoded user ID for 'Paperone'
$userId = 12;

// Retrieve the user by ID via the persistent manager
/** @var Muser|null $user */
$user = FPersistentManager::retriveObj('Muser', $userId);
if (!$user) {
    echo "Error: User with ID {$userId} not found.\n";
    exit(1);
}

// Define two sets of fixed position data
$positionsData = [
    [
        'description' => '1 Villa Rosa con giardino ampio',
        'address'     => '1 Via Roma 1',
        'city'        => '1 Milano',
        'province'    => 'MI',
        'country'     => 'Italy',
    ],
    [
        'description' => '1 Appartamento moderno al centro',
        'address'     => '1 Corso Italia 10',
        'city'        => '1 Roma',
        'province'    => 'RM',
        'country'     => 'Italy',
    ],
];

// Loop to create and persist positions
foreach ($positionsData as $data) {
    // Note: class name is case-sensitive
    $position = new MPosition(
        $data['address'],
        $data['description'],
        $data['city'],
        $data['province'],
        $data['country'],
        $user
    );

    $success = FPersistentManager::saveObj($position);
    if ($success) {
        echo "Position created: ID = " . $position->getId() . " (" . $data['description'] . ")\n";
    } else {
        echo "Error: Failed to save position ('" . $data['description'] . "').\n";
    }
}
