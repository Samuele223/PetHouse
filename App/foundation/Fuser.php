<?php

class FUser{
    public static function getUserByUsername($username){
        $result = FEntityManager::getInstance()->retriveObjNotOnId(Muser::getEntity(), 'username', $username);

        return $result;
    }

    public static function loadVipUsers(){
        $result = FEntityManager::getInstance()->listOfObj(Muser::getEntity(), 'verified', '1');

        return $result;
    }
}