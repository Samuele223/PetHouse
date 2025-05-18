<?php

class FUser{
    public static function getUserByUsername($username){
        $result = FEntityManager::getInstance()->retrieveObjNotOnId(Muser::getEntity(), 'username', $username);

        return $result;
    }


    // immagino che sono verified perchè hanno la value impostata a 1

    public static function loadVerifiedUsers(){
        $result = FEntityManager::getInstance()->listOfObj(Muser::getEntity(), 'verified', '1');

        return $result;
    }
}