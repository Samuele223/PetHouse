<?php
// src/Persistence/Fadmin.php

class FAdmin
{
    /**
     * pija admin dalla mail (non c'ha senso mettere un nome), sta funzione secondo me molto inutile, basta l'id e in verità anche la mail è univoca
     */
     public static function getModByEmail($email): object|null{
        $result = FEntityManager::getInstance()->retrieveObjNotOnId(Madmin::getEntity(), 'email', $email);

        return $result;
    }

    



}



