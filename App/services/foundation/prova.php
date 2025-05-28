<?php
require_once 'FEntityManager.php';
require_once '../../model/Mpost.php';
require_once '../../model/Madmin.php';
require_once 'FPersistentManager.php';
require_once '../../model/Muser.php';
require_once '../../model/Mreport.php'; // bisogna vede come liberarci di questa schifezza
require_once '../../model/Mposition.php';
require_once '../../model/Moffer.php';
require_once '../../model/Mreview.php';
require_once '../../../bootstrap.php'; 
require_once '../../model/Mphoto.php';
require_once 'Fpost.php';
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../../config/doctrine-config.php';

/*
for($i = 0; $i<10; $i++){
$pet = ["DOG","DOG",'CAT','PARROT'];
$a = FEntityManager::getInstance()::getEntityManager();
$b = new DateTime('22-05-2025');
echo 1;
$c = new DateTime('29-05-2025');
$user = new Muser('andrea','frozzo','frozzo','Jhonny@gmail.com');
$position = new MPosition('roma','casa nonna','Roma','PM','italy',$user);
$a = new Mpost('ao',$pet,6.33,'casa','romanina',$user,$position,$b,$c);
 //devo provare la nuova funzione di mpost per le date
FPersistentManager::saveObj($user);

FPersistentManager::saveObj($position);
FPersistentManager::saveObj($a);}

$ao = ["DOG" =>1,'CAT' =>1];
$in = new DateTime('23-05-2025');
$out = new DateTime('27-05-2025');
$b = Fpost::listOfPostFilterDate($in,$out);
$c = Fpost::listPostByCity('Roma','PM');
$d = Fpost::findPostsByAcceptedPets($ao);


$start = microtime(true);

// Funzione da profilare
$a = Fpost::filterPost($ao,'Roma',$in->format('Y-m-d'),$out->format('Y-m-d'));

$end = microtime(true);
$executionTime = $end - $start;
echo "Tempo di esecuzione: " . $executionTime . " secondi";



$start = microtime(true);

// Funzione da profilare
$a = FPersistentManager::serachPost('Roma','PM',$in,$out,$ao);

$end = microtime(true);
$executionTime = $end - $start;
echo "Tempo di esecuzione: " . $executionTime . " secondi";



echo count($a);
echo count($b);
echo count($c);
echo count($d);
*/
$a = FPersistentManager::retriveObj(MPosition::getEntity(),2);
$b = $a->getPost();
echo json_encode($b);
$in = new DateTime('22-05-2025');
$out = new DateTime('29-05-2025');
$user = FPersistentManager::retriveObj(Muser::getEntity(),2);
$c = new Mpost('casa bellissima',['DOG','CAT'],20,'giacomo','info',$user,$a,$in,$out);
FPersistentManager::saveObj($c);





?>