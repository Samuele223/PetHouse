<?php
require_once 'FEntityManager.php';
require_once '../model/Mpost.php';
require_once '../model/Muser.php';
require_once '../model/Mreport.php';
require_once '../model/Mposition.php';
require_once '../model/Moffer.php';
require_once '../model/Mreview.php';
require_once '../../bootstrap.php';
require_once '../model/Mphoto.php';
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/doctrine-config.php';

//$a = FEntityManager::getInstance()::getEntityManager();
$b = FEntityManager::getInstance()::getObjByTwoAttribute('Mpost','description','title','primo post','gatto matto');
echo $b[0]->getTitle();
?>