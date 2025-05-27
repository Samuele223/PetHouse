<?php
class Fpost
{

    public static function intersectPostArrays(array $array1, array $array2, array $array3): array
{
    // Estrai gli ID da ogni array
    $ids1 = array_map(fn($post) => $post->getId(), $array1);
    $ids2 = array_map(fn($post) => $post->getId(), $array2);
    $ids3 = array_map(fn($post) => $post->getId(), $array3);

    // Trova l'intersezione degli ID
    $commonIds = array_intersect($ids1, $ids2, $ids3);

    // Fai unione di tutti i post (oppure solo uno degli array, se sai che contengono gli stessi oggetti)
    $allPosts = array_merge($array1, $array2, $array3);

    // Filtra solo i post con ID comuni
    $result = [];
    foreach ($allPosts as $post) {
        if (in_array($post->getId(), $commonIds)) {
            $result[$post->getId()] = $post; // usa l'ID come chiave per evitare duplicati
        }
    }

    return array_values($result); // resetta gli indici
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
/*public static function findPostsByAcceptedPet(string $pet): array // da testare 
{
    $conn = FEntityManager::getInstance()::getEntityManager()->getConnection();

    $sql = 'SELECT * FROM post WHERE JSON_CONTAINS(accepted_pets, :pet_json)';



    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':pet_json', json_encode([$pet]));
    $resultSet = $stmt->executeQuery();

    // Se vuoi che Doctrine ti restituisca oggetti Post, devi mapparli
    $posts = [];

    foreach ($resultSet->fetchAllAssociative() as $row) {
        $posts[] = FEntityManager::getEntityManager()->getRepository(MPost::class)->find($row['id']);
    }

    return $posts;
}*/
public static function findPostsByAcceptedPet(string $pet): array  //sembra funzionare
{
    $conn = FEntityManager::getInstance()::getEntityManager()->getConnection();

    // Costruisce il percorso della chiave nell'oggetto JSON
    $sql = 'SELECT * FROM post WHERE JSON_CONTAINS_PATH(accepted_pets, \'one\', :json_path)';

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':json_path', '$."' . $pet . '"');  // Esempio: $.DOG
    $resultSet = $stmt->executeQuery();

    $rows = $resultSet->fetchAllAssociative();

    $posts = [];
    foreach ($rows as $row) {
        $posts[] = FEntityManager::getEntityManager()->getRepository(MPost::class)->find($row['id']);
    }

    return $posts;

    
}
public static function findPostsByAcceptedPets(array $requiredPets): array  //funziona solo se requiredpets è un array associativo con chiavi i nomi di pet in all caps
{
    $conn = FEntityManager::getInstance()::getEntityManager()->getConnection();

    $conditions = [];
    $params = [];

    foreach ($requiredPets as $pet => $minCount) {
        $paramKey = ':min_' . $pet;
        $jsonPath = '$."' . $pet . '"';
        $conditions[] = "JSON_EXTRACT(accepted_pets, '$jsonPath') >= $paramKey";
        $params[$paramKey] = $minCount;
    }

    $sql = 'SELECT * FROM post WHERE ' . implode(' AND ', $conditions);

    $stmt = $conn->prepare($sql);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }

    $resultSet = $stmt->executeQuery();
    $rows = $resultSet->fetchAllAssociative();

    $posts = [];
    foreach ($rows as $row) {
        $posts[] = FEntityManager::getEntityManager()->getRepository(MPost::class)->find($row['id']);
    }

    return $posts;
}
/*public static function findPostsByFilters(
    array $acceptedPets,
    ?string $city = null,
    ?string $startDate = null,
    ?string $endDate = null
): array {
    $conn = FEntityManager::getInstance()::getEntityManager()->getConnection();

    $conditions = [];
    $params = [];

    // Filtro per acceptedPets JSON
    foreach ($acceptedPets as $pet => $minCount) {
        $paramKey = ':min_' . $pet;
        $jsonPath = '$."' . $pet . '"';
        $conditions[] = "JSON_EXTRACT(accepted_pets, '$jsonPath') >= $paramKey";
        $params[$paramKey] = $minCount;
    }

    // Filtro per città (se fornita)
    if ($city !== null) {
        $conditions[] = 'city = :city';
        $params[':city'] = $city;
    }

    // Filtro per range date (se entrambi forniti)
    if ($startDate !== null && $endDate !== null) {
        $conditions[] = 'start_date <= :endDate AND end_date >= :startDate';
        $params[':startDate'] = $startDate;
        $params[':endDate'] = $endDate;
    }

    // Costruisci la query
    $sql = 'SELECT * FROM post';
    if (!empty($conditions)) {
        $sql .= ' WHERE ' . implode(' AND ', $conditions);
    }

    $stmt = $conn->prepare($sql);

    // Bind dei parametri
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }

    $resultSet = $stmt->executeQuery();
    $rows = $resultSet->fetchAllAssociative();

    // Mappa i risultati agli oggetti Post
    $posts = [];
    foreach ($rows as $row) {
        $posts[] = FEntityManager::getEntityManager()->getRepository(MPost::class)->find($row['id']);
    }

    return $posts;
}*/


}