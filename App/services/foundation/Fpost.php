<?php
class Fpost
{
    public static function listPostfilteredByAcceptedAnimal($acceptedAnimal)
    {
        $relsult = FEntityManager::getInstance()::listOfObj('Mpost','Accepted_Pet',$acceptedAnimal);
        return $relsult;
    }
    /**
 * Restituisce una lista di post (Mpost) che sono attivi nel periodo specificato.
 *
 * Un post è considerato "attivo" se:
 * - La sua data di inizio (`date_in`) è minore o uguale alla data di inizio fornita
 * - La sua data di fine (`date_out`) è maggiore o uguale alla data di fine fornita
 *
 * @param DateTime $datein  La data di inizio del filtro (inizio intervallo).
 * @param DateTime $dateout La data di fine del filtro (fine intervallo).
 *
 * @return Mpost[]  Una lista di entità `Mpost` che soddisfano i criteri temporali.
 */
    public static function listOfPostFilterDate(DateTime $datein, DateTime $dateout)
    {
        $q = FEntityManager::getInstance()::getEntityManager()->createQueryBuilder();
        return $q
            ->select('p')
            ->from(Mpost::getEntity(),'p')
            ->where('p.datein <= :in')
            ->andWhere('p.dateout >= :out')
            ->setParameter('in', $datein)
            ->setParameter('out', $dateout)
            ->getQuery()
            ->getResult();
    }
}