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
    public static function retriveObj($Mclass, $id)
    {
        $result = FEntityManager::getInstance()::retriveObj($Mclass,$id);
        return $result;
    }
}