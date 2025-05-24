<?php
require_once 'FEntityManager.php';
require_once '../model/Mpost.php';
require_once '../model/Madmin.php';
require_once 'FPersistentManager.php';
require_once '../model/Muser.php';
require_once '../model/Mreport.php';
require_once '../model/Mposition.php';
require_once '../model/Moffer.php';
require_once '../model/Mreview.php';
require_once '../../../bootstrap.php'; 
require_once '../model/Mphoto.php';
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/doctrine-config.php';

//$a = FEntityManager::getInstance()::getEntityManager();
$b = new DateTime('22/05/2025');
$c = new DateTime(25/05/2025);
$user = new Muser('jonny','stecchino','jhonny33','Jhonny@gmail.com','jhonnybellissimo',0);
$position = new MPosition('roma','casa nonna','Roma','PM','italy',$user);
$a = new Mpost('ao','DOG',6.33,'casa','romanina',$user,$position,$b,$c); //devo provare la nuova funzione di mpost per le date
FPersistentManager::saveObj($user);
FPersistentManager::saveObj($position);
FPersistentManager::saveObj($a);

?>