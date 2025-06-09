<?php

class FUser{
    public static function getUserByUsername($username): object|null{

        $result = FEntityManager::getInstance()->retrieveObjNotOnId(Muser::getEntity(), 'username', $username);



        return $result;
    }



    // immagino che sono verified perchè hanno la value impostata a 1

    public static function loadVerifiedUsers(): array|null{


        $result = FEntityManager::getInstance()->listOfObj(Muser::getEntity(), 'verified', '1');

        return $result;
    }

      public static function verify($field, $id){
        $result = FEntityManager::getInstance()->verifyAttributes('User', MUser::getEntity(), $field, $id);

        return $result;
    }

}