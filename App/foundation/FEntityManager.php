<?php

require_once(__DIR__ . '/../../bootstrap.php');
//Signleton da implementare per ora faccio tutto static
class FEntityManager
{
private static $instance;
private static $entityManager;


private function __construct() 
{
    self::$entityManager = getEntityManager();
}
public static function getInstance(): FEntityManager
{ 
    if (!self::$instance) 
    {
        self::$instance = new self();
    }

    return self::$instance;
}

public static function getEntityManager() 
{
    return self::$entityManager;
}
public static function retriveObj($class, $id)
{
    try
    {
        $obj = self::$entityManager->find(className: $class, id: $id);
        return $obj;
    }catch(Exception $e)
    {
        echo "ERROR: ". $e->getMessage();
        return null;
    }
}
/**
 * Finds and returns the first object that matches a given attribute value.
 *
 * This method queries the repository of the specified class and returns the first 
 * matching object based on the provided field and value. If no matching object 
 * is found, it returns null.
 * 
 * Note: Use this method when you expect at most one result, such as when the field 
 * is unique (e.g., email or username).
 *
 * @param string $class The name of the class (entity) to search in.
 * @param string $columName The name of the column to match against.
 * @param mixed $attribute The value of the field to search for.
 * 
 * @return object|null The first matching object, or null if no match is found.
 */

public static function retriveObjNotOnId($class, $columnName, $attribute)
{
    try {
        // Usa l'EntityManager per accedere al repository della classe specificata
        $obj = self::$entityManager
        ->getRepository(className: $class)
        ->findOneBy(criteria: [$columnName => $attribute]);  // Cerca l'entità in base al campo e al valore specificat
        
        return $obj; 
        } 
    catch (Exception $e) 
    {
        
        echo "ERROR: " . $e->getMessage();
        return null;
    }
}
/**
 * Finds and returns all objects of a given class that match a specific attribute value.
 *
 * This method queries the repository of the specified class and returns a list of 
 * matching objects based on the provided field and value.
 * 
 * @param string $class The name of the class (entity) to search in.
 * @param string $columnName The name of the attribute (field) to match against.
 * @param mixed $value The value of the field to search for.
 * 
 * @return array|null An array of matching objects, or null if an error occurs.
 */
public static function listOfObj($class, $columName, $value): array|null
{
    try
    {
        $Listobj = self::$entityManager
        ->getRepository(className: $class)
        ->findBy(criteria: [$columName => $value]);
        return $Listobj;
    }
    catch(Exception $e)
    {
        echo "ERROR: " . $e->getMessage();
        return null;
    }
}

/**
 * Recupera una lista di oggetti di una determinata entità in cui
 * un attributo specificato ha valore null.
 *
 * Questa funzione utilizza l'EntityManager per interrogare il repository
 * dell'entità specificata e restituisce tutti i record dove il valore del campo
 * indicato è null. In caso di errore, stampa un messaggio e restituisce null.
 *
 * @param string $class Il nome completo della classe entità (es. App\Entity\User::class).
 * @param string $columnName Il nome dell'attributo della classe da controllare per valore null.
 *
 * @return array|null Restituisce un array di oggetti dell'entità se la query ha successo,
 *                     oppure null in caso di errore.
 *
 * @throws \Exception Se si verifica un'eccezione durante l'esecuzione della query.
 */
public static function objNullAttributeList($class, $columnName)
{
    try
    {
        $listObj = self::$entityManager
        ->getRepository($class)
        ->findBy([$columnName=>null]);
        return $listObj;
    }
    catch(Exception $e)
    {
        echo "ERROR: ". $e->getMessage();
        return null;
    }
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
public static function getObjByTwoAttribute($class, $col1, $col2, $val1, $val2)
{
    try
    {
       $listObj = self::$entityManager
       ->getRepository($class)
       ->findBy([$col1=>$val1, $col2=>$val2]); 
       return $listObj;
    }
    catch(Exception $e)
    {
        echo "ERROR: ". $e->getMessage();
        return null;
    }
}
 public static function saveObject($obj) //non l ho controllata
    {
        try{
            self::$entityManager->getConnection()->beginTransaction();
            self::$entityManager->persist($obj);
            self::$entityManager->flush();
            self::$entityManager->getConnection()->commit();
            return true;
        }catch(Exception $e){
            self::$entityManager->getConnection();
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }
    /**
     * delete an object from the db
     * @return boolean
     */
    public static function deleteObj($obj){
        try{
            self::$entityManager->getConnection()->beginTransaction();
            self::$entityManager->remove($obj);
            self::$entityManager->flush();
            self::$entityManager->getConnection()->commit();
            return true;
        }catch(Exception $e){
            self::$entityManager->getConnection();
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }
    /**
 * Aggiorna un oggetto esistente nel database.
 *
 * Il metodo si occupa di:
 *  1. Recuperare l’entità managed via find()
 *  2. Copiare i campi modificati
 *  3. Chiamare flush()
 *
 * @param object $obj Un’istanza “detached” con ID valorizzato e campi modificati
 * @return bool       True se l’operazione ha avuto successo, false altrimenti
 */
public static function updateObj($obj) {
    try {
        $em = self::$entityManager;
        $em->getConnection()->beginTransaction();

        $class = get_class($obj);
        // 1) Trovo l’istanza managed a partire dall’ID
        $idGetter = 'getId'; // o il metodo getter del tuo PK
        $managed = $em->find($class, $obj->$idGetter());
        if (! $managed) {
            throw new \Exception("Entità non trovata per aggiornamento");
        }

        // 2) Copio tutti i campi modificati da $obj a $managed
        //    Qui serve del codice “boilerplate” o reflection per ogni proprietà.
        //    Esempio manuale per le proprietà comuni:
        // $managed->setTitle($obj->getTitle());
        // $managed->setContent($obj->getContent());
        // … ecc.

        // 3) Applico le modifiche
        $em->flush();
        $em->getConnection()->commit();

        return true;
    } catch (\Exception $e) {
        $em->getConnection()->rollBack();
        echo "ERROR: " . $e->getMessage();
        return false;
    }
}


         
}
?>