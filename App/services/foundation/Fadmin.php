<?php


class FAdmin
{
     public static function getModByEmail($email): object|null{
        $result = FEntityManager::getInstance()->retrieveObjNotOnId(Madmin::getEntity(), 'email', $email);

        return $result;
    }

    



}



