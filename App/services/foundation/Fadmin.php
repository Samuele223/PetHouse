<?php


class Fadmin
{
     public static function getModByEmail($email): object|null{
        $result = FentityManager::getInstance()->retrieveObjNotOnId(Madmin::getEntity(), 'email', $email);

        return $result;
    }

    



}



