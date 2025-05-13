<?php

class FPersistentManager{

    /**
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

    public static function retriveObj($Mclass, $id) // penso sia da validare l' imput delle funzioni che prendono in imput il nome di una classe
    {
        $result = FEntityManager::getInstance()::retriveObj($Mclass,$id);
        return $result;
    }

    public static function uploadObj($obj){

        $result = FEntityManager::getInstance()->saveObject($obj);

        return $result;
    }
    
    public static function deleteObj($obj)
    {
        $result = FEntityManager::getInstance()::deleteObj($obj);
        return $result;
    }


}