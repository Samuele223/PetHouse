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

$a = FEntityManager::getInstance()::getEntityManager();
$b = new DateTime('22-05-2025');
$c = new DateTime('29-05-2025');
$user = new Muser('jon','stecchino','jhonny33','Jhonny@gmail.com');
$position = new MPosition('roma','casa nonna','Roma','PM','italy',$user);
$a = new Mpost('ao','DOG',6.33,'casa','romanina',$user,$position,$b,$c); //devo provare la nuova funzione di mpost per le date
//FPersistentManager::saveObj($user);

//FPersistentManager::saveObj($position);
//FPersistentManager::saveObj($a);
$list = FPersistentManager::listOfPostFilterDate($b,$c);
         
$r = FEntityManager::getInstance()::getEntityManager()->createQueryBuilder()
        ->select('p')
        ->from(Mpost::getEntity(), 'p')
        ->join('p.house', 'pos') // join con la relazione posizione
        ->where('pos.city = :city')
        ->andWhere('pos.province = :province')
        ->setParameter('city', 'Roma')
        ->setParameter('province', 'rm')
        ->getQuery();

$sql = $r->getSQL();
echo $sql;




?>