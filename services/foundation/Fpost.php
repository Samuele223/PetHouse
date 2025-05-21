<?php
class Fpost
{
    public static function listPostfilteredByAcceptedAnimal($acceptedAnimal)
    {
        $relsult = FEntityManager::getInstance()::listOfObj('Mpost','Accepted_Pet',$acceptedAnimal);
        return $relsult;
    }
}