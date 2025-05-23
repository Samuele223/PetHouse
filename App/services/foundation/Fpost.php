<?php
class Fpost
{
    public static function listPostfilteredByAcceptedAnimal($acceptedAnimal)
    {
        $relsult = FEntityManager::getInstance()::listOfObj('Mpost','Accepted_Pet',$acceptedAnimal);
        return $relsult;
    }
    public static function listOfPostFilterDate(DateTime $datein, DateTime $dateout)
    {
        $q = FEntityManager::getInstance()::getEntityManager()->createQueryBuilder();
        return $q
            ->from(Mpost::getEntity(),'p')
            ->where('p.date_in <= :in')
            ->andWhere('p.date_out >= :out')
            ->setParameter('in', $datein)
            ->setParameter('out', $dateout)
            ->getQuery()
            ->getResult();
    }
}