<?php
require_once __DIR__ . '/../../../config/autoloader.php';
/*
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


for($i = 0; $i<1000; $i++){
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
$a = Fpost::filterPost('PM',$ao,'Roma',$in->format('Y-m-d'),$out->format('Y-m-d'));

$end = microtime(true);
$executionTime = $end - $start;
echo "Tempo di esecuzione: " . $executionTime . " secondi";


/*
$start = microtime(true);

// Funzione da profilare
$a = FPersistentManager::serachPost('Roma','PM',$in,$out,$ao);

$end = microtime(true);
$executionTime = $end - $start;
echo "Tempo di esecuzione: " . $executionTime . " secondi";

$in = new DateTime('23-05-2025');
$out = new DateTime('27-05-2025');
$user = new Muser('mario','cesile','surgo','surgo@gg');
$post = FPersistentManager::retriveObj(Mpost::getEntity(),12);
$offer = new Moffer($in,$out,$post,['DOG'],$user);

$offer = FPersistentManager::retriveObj(Moffer::getEntity(),1);
$offer->acceptOffer();
FPersistentManager::saveObj($offer);

//$foto = FPersistentManager::retriveObj(Mphoto::getEntity(),1);
//echo stream_get_contents($foto->getImageData());
//echo $foto->getType(); 
$user = FPersistentManager::retriveObj(Muser::getEntity(), 1);
$house = FPersistentManager::retriveObj(MPosition::getEntity(), 1);
$post = FPersistentManager::retriveObj(Mpost::getEntity(), 1);
$offer = FPersistentManager::retriveObj(Moffer::getEntity(), 1);
$ppost = new Mpost('ao', ['DOG' => 1, 'CAT' => 1], 6.33, 'casa', 'romanina', $user, $house, new DateTime('2025-05-22'), new DateTime('2025-05-29'));
$ppost->setBooked('booked');
FPersistentManager::saveObj($ppost);
$offer = new Moffer(new DateTime('2025-05-23'), new DateTime('2025-05-27'), $post, ['DOG' => 1], $user);
$offer->setState(stateoffer::FINISHED);
FPersistentManager::saveObj($offer);*/
$reviewed = FPersistentManager::retriveObj(Muser::getEntity(), 1);
$rv = FPersistentManager::retriveObj(Muser::getEntity(), 2);
$review = new Mreview('molto puzzolente',rating::one, $rv, $reviewed);
FPersistentManager::saveObj($review);

?>