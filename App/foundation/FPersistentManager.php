<?php

class FPersistentManager{

    /**                                                     non mi funziona retrive obj
     * Singleton Class
     */

    private static $instance;


    private function __construct(){}

    public static function getInstance(): FPersistentManager{
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // metodi che usa anche agorà


    public static function retriveObj($Mclass, $id) // penso sia da validare l' imput delle funzioni che prendono in imput il nome di una classe
    {
        $result = FEntityManager::getInstance()::retriveObj($Mclass,$id);
        return $result;
    }
     

    public static function uploadObj($obj): bool{

        $result = FEntityManager::getInstance()->saveObject($obj);

        return $result;
    }
    
    public static function deleteObj($obj)
    {
        $result = FEntityManager::getInstance()::deleteObj($obj);
        return $result;
    }


    public static function updateObj($obj) { // non so se ha senso avere una funzione che aggiorna
    $result = FEntityManager::getInstance()->updateObj($obj);
    return $result;
}


    
    public static function getUserByUsername($username): object|null
    {
        $result = FUser::getUserByUsername($username);
        return $result;
    }
 



    // sta roba penso sia da toglie non la capisco poi mi spiega andrea__________________-_______-----___--_-----_----_--_-_

     // ----- REPOSITORY ADMIN -----

    /** @var Fadmin|null $adminRepo */
    private static ?Fadmin $adminRepo = null;

    /**
     * Inizializza (una sola volta) il repository Admin
     * ottenendo l’EntityManager dal singleton FEntityManager.
     *
     * @return Fadmin
     */
    private static function adminRepo(): Fadmin
    {
        // Se non esiste ancora l’istanza, la crea
        if (self::$adminRepo === null) {
            $em = FEntityManager::getInstance()->getEntityManager();
            self::$adminRepo = new Fadmin($em);
        }
        // Restituisce l’istanza singleton
        return self::$adminRepo;
    }



    // ----- REPOSITORY UTENTE (che sarebbero i metodi che sono utili) -----




    /**
     * Elenca tutti i report associati a un post.
     *
     * @param int $postId  ID del post segnalato
     * @return Mreport[]  Array di oggetti Mreport (vuoto se nessuno)
     */
    public static function listReportsByPost(int $postId): array
    {
        return self::reportRepo()->listByPost($postId);
    }

    //----------------------------------DELETE , ----------------------------------------------------

    public static function deleteImage($idImage){
        $image = self::retriveObj(Mphoto::getEntity(), $idImage);
        $result = FEntityManager::getInstance()->deleteObj($image);
        return $result;
    }

    public static function deleteRelatedReports($id, $field = null){
        $result = FReport::deleteReports($id, $field);
        return $result;
    }

    public static function DeleteObjFromId($Mclass, $id){  //non si comporta bene con le eccezioni
        $obj = FEntityManager::getInstance()->retriveObj($Mclass,$id);
        FEntityManager::getInstance()->deleteObj($obj);
    }
        
        
        
      
    
}
