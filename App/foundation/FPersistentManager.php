<?php

use App\Foundation\Exception\EntityNotFoundException;

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
        $result = FEntityManager::getInstance()::retrieveObj($Mclass,$id);
        return $result;
    }
     

    public static function saveObj($obj): bool{

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




  
    //----------------------------------DELETE , ----------------------------------------------------

    public static function deleteImage($idImage){
        $image = self::retriveObj(Mphoto::getEntity(), $idImage);
        $result = FEntityManager::getInstance()->deleteObj($image);
        return $result;
    }

    public static function deleteRelatedReports($id, $field = null): bool{
        $result = FReport::deleteReports($id, $field);
        return $result;
    }

    public static function DeleteObjFromId($Mclass, $id): void
    {  
        $obj = FEntityManager::getInstance()->retrieveObj($Mclass,$id);
        if(!$obj){
            throw new EntityNotFoundException("Oggetto di tipo $Mclass con id $id non trovato."); // faccio lanciare un eccezione perche se non esite l' ogetto non lo posso cancellare
        }
        FEntityManager::getInstance()->deleteObj($obj);
    }
    /**
     * return only one object 
     * @param mixed $class
     * @param mixed $columnName
     * @param mixed $attribute
     * @return object|null
     */
    public static function findObjNOtId($class, $columnName, $attribute)
    {
        $obj = FEntityManager::getInstance()::retrieveObjNotOnId(class: $class, columnName: $columnName, attribute: $attribute);
        return $obj;
    }
    /**
     * return an array of objects or null
     * @param mixed $class
     * @param mixed $columnName
     * @param mixed $attribute
     * @return array|null
     */
    public static function listOfObj($class, $columnName, $attribute)
    {
        $a = FEntityManager::getInstance()::listOfObj($class, $columnName, $attribute);
        return $a;
    }

    /**
 * Recupera una lista di oggetti di una determinata entità in cui
 * due attributi corrispondono ai valori specificati.
 *
 * Questa funzione utilizza l'EntityManager per interrogare il repository
 * dell'entità specificata e restituisce tutti i record in cui entrambi i campi
 * indicati corrispondono ai rispettivi valori forniti.
 * In caso di errore, stampa un messaggio e restituisce null.
 *
 * @param string $class Il nome completo della classe entità (es. App\Entity\User::class).
 * @param string $col1 Il nome del primo attributo da filtrare.
 * @param string $col2 Il nome del secondo attributo da filtrare.
 * @param mixed $val1 Il valore da confrontare per il primo attributo.
 * @param mixed $val2 Il valore da confrontare per il secondo attributo.
 *
 * @return array|null Restituisce un array di oggetti dell'entità se la query ha successo,
 *                     oppure null in caso di eccezione.
 *
 * @throws \Exception Se si verifica un'eccezione durante l'esecuzione della query.
 */
    public static function getObjbytwoattributes($class, $col1, $col2, $val1, $val2)
    {
        $a = FEntityManager::getInstance()::getObjByTwoAttribute($class, $col1, $col2, $val1, $val2);
        return $a;
    }   
        
        
      
    
}
