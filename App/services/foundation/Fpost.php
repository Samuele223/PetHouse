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
            ->from(Mpost::getEntity(),'p') //se il post è iniziato prima e finsice dopo o nella stessa data
            ->where('p.datein <= :in')
            ->andWhere('p.dateout >= :out')
            ->setParameter('in', $datein)
            ->setParameter('out', $dateout)
            ->getQuery()
            ->getResult();
    }
    public static function listPostByCity(string $city,string $province)
    {

    $q = FEntityManager::getInstance()::getEntityManager()->createQueryBuilder();

    return $q
        ->select('p')
        ->from(Mpost::getEntity(), 'p')
        ->join('p.house', 'pos') // join con la relazione posizione dovrebbe anda bene
        ->where('pos.city = :city')
        ->andWhere('pos.province = :province')
        ->setParameter('city', $city)
        ->setParameter('province', $province)
        ->getQuery()
        ->getResult();

  
    }
    public static function listPostByPet(acceptedPet $accepted) //un macello da realizzare forse dobbiamo cambiare il db
    {
  
    } 
}