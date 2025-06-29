<?php



use App\Foundation\Exception\EntityNotFoundException;



class FpersistentManager{

    /**                                                    
     * Singleton Class
     */
    
    private static $instance;


    private function __construct(){}

    public static function getInstance(): FpersistentManager{
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    


    public static function retriveObj($Mclass, $id): object|null 
    {
        $result = FentityManager::getInstance()::retrieveObj($Mclass,$id);
        return $result;
    }
     

    public static function saveObj($obj): bool{

        $result = FentityManager::getInstance()->saveObject($obj);

        return $result;
    }
    
    public static function deleteObj($obj): bool
    {
        $result = FentityManager::getInstance()::deleteObj($obj);
        return $result;
    }
    
    public static function getUserByUsername($username): object|null
    {
        $result = Fuser::getUserByUsername($username);
        return $result;
    }

    public static function getModByEmail($email): object|null
    {
        $result = Fadmin::getModByEmail($email);
        return $result;
    }

    public static function getVerificationsPending(): array|null
    {
        $result = Fverification::getPendingVerifications();
        return $result;
    }

    public static function getReportedPosts()
{
    $result = Fpost::getReportedPosts();
    return $result;
}

public static function resetPostReports($postId)
{
    $em = FentityManager::getInstance()::getEntityManager();
    $post = $em->getRepository(Mpost::getEntity())->find($postId);
    if ($post) {
        // Elimina tutti i report associati a questo post
        $reports = $em->getRepository(Mreport::getEntity())->findBy(['postreported' => $postId]);
        foreach ($reports as $report) {
            $em->remove($report);
        }
        $post->setNumReport(0);
        $em->flush();
    }
}

public static function deletePost($postId)
{
    $em = FentityManager::getInstance()::getEntityManager();
    $post = $em->getRepository(Mpost::getEntity())->find($postId);
    if ($post) {
        // Elimina tutti i report associati a questo post
        $reports = $em->getRepository(Mreport::getEntity())->findBy(['postreported' => $postId]);
        foreach ($reports as $report) {
            $em->remove($report);
        }
        $em->remove($post);
        $em->flush();
    }
}
 



 
     // ----- REPOSITORY ADMIN -----






    // ----- REPOSITORY UTENTE  -----

     /**
     * getHousesFromUser
     * English: Delegate to Fuser to fetch all houses owned by the given user.
     *
     * @param int $userId  ID of the user whose houses we want
     * @return Mposition[]|null  Array of Mposition or null if none
     */
    public static function getHousesFromUser(int $userId): ?array {
        return Fuser::getHousesFromUser($userId);
    }



  
    //----------------------------------DELETE , ----------------------------------------------------

    public static function deleteImage($idImage){
        $image = self::retriveObj(Mphoto::getEntity(), $idImage);
        $result = FentityManager::getInstance()->deleteObj($image);
        return $result;
    }

    public static function deleteRelatedReports($id, $field = null): bool{
        $result = Freport::deleteReports($id, $field);
        return $result;
    }

    public static function DeleteObjFromId($Mclass, $id): void
    {  
        $obj = FentityManager::getInstance()->retrieveObj($Mclass,$id);
        if(!$obj){
            throw new EntityNotFoundException("Oggetto di tipo $Mclass con id $id non trovato."); 
        }
        FentityManager::getInstance()->deleteObj($obj);
    }
    /**
     * return only one object 
     * @param mixed $class
     * @param mixed $columnName
     * @param mixed $attribute
     * @return object|null
     */
    public static function findObjNOtId($class, $columnName, $attribute): object|null
    {
        $obj = FentityManager::getInstance()::retrieveObjNotOnId(class: $class, columnName: $columnName, attribute: $attribute);
        return $obj;
    }
    /**
     * return an array of objects or null
     * @param mixed $class
     * @param mixed $columnName
     * @param mixed $attribute
     * @return array|null
     */
    public static function listOfObj($class, $columnName, $attribute): array|null
    {
        $a = FentityManager::getInstance()::listOfObj($class, $columnName, $attribute);
        return $a;
    }

    /**
 * Recupera una lista di oggetti di una determinata entità in cui
 * due attributi corrispondono ai valori specificati.
 *
 * Questa funzione utilizza l'EntityManager per interrogare il repository
 * dell'entità specificata e restituisce tutti i record in cui entrambi i campi
 * indicati corrispondono ai rispettivi valori forniti.
 * In caso di errore, stampa un messaggio e restituisce null.
 *
 * @param string $class Il nome completo della classe entità (es. App\Entity\User::class).
 * @param string $col1 Il nome del primo attributo da filtrare.
 * @param string $col2 Il nome del secondo attributo da filtrare.
 * @param mixed $val1 Il valore da confrontare per il primo attributo.
 * @param mixed $val2 Il valore da confrontare per il secondo attributo.
 *
 * @return array|null Restituisce un array di oggetti dell'entità se la query ha successo,
 *                     oppure null in caso di eccezione.
 *
 * @throws \Exception Se si verifica un'eccezione durante l'esecuzione della query.
 */
    public static function getObjbytwoattributes($class, $col1, $col2, $val1, $val2)
    {
        $a = FentityManager::getInstance()::getObjByTwoAttribute($class, $col1, $col2, $val1, $val2);
        return $a;
    }
    public static function listOfPostFilterDate(DateTime $datain, DateTime $dataout)
    {
        return Fpost::listOfPostFilterDate($datain,$dataout); 
    }
    
    public static function serachPost(string $City, string $province, DateTime $datain, DateTime $dataout, array $acceptedPets)
    {
        
        $partial1 = Fpost::listOfPostFilterDate($datain,$dataout);
        $partial2 = Fpost::findPostsByAcceptedPets($acceptedPets);
        $partial3 = Fpost::listPostByCity($City,$province);
        $result = Fpost::intersectPostArrays($partial1,$partial2,$partial3);//metodo inefficiente
        return $result;


    }
    
    //-------------------------------------VERIFY---------------------------------------
    
    /**
     * verify if exist a user with this email (also mod)
     */
    public static function verifyUserEmail($email){
        $result = Fuser::verify('email', $email);

        return $result;
    }

    /**
     * verify if exist a user with this username (also mod)
    */ 
    public static function verifyUserUsername($username){
        $result = Fuser::verify('username', $username);

        return $result;
    }

        
     /**
 * Filter posts based on search criteria, ensuring proper date range matching
 */
public static function filterPost($acceptedPets = [], $province = null, $city = null, $startDate = null, $endDate = null)
{
    $em = FentityManager::getInstance()::getEntityManager();
    $qb = $em->createQueryBuilder();
    
    $qb->select('p')
       ->from(Mpost::getEntity(), 'p')
       ->where('p.booked = :booked')
       ->setParameter('booked', 'open');
    
    // Location filters - add JOIN when needed
    if (($province !== null && !empty($province)) || ($city !== null && !empty($city))) {
        $qb->join('p.house', 'h');
        
        if ($province !== null && !empty($province)) {
            $qb->andWhere('h.province = :province')
               ->setParameter('province', $province);
        }
        
        if ($city !== null && !empty($city)) {
            $qb->andWhere('h.city = :city')
               ->setParameter('city', $city);
        }
    }
    
    // Date range filter - corrected logic
    if ($startDate !== null && $endDate !== null) {
        // Search dates must fall within the post's available dates
        // Post start date <= search start date AND Post end date >= search end date
        $qb->andWhere('p.datein <= :startDate AND p.dateout >= :endDate')
           ->setParameter('startDate', $startDate)
           ->setParameter('endDate', $endDate);
    } else if ($startDate !== null) {
        // If only start date is provided, post must be available from that date onwards
        // We assume the search is for just that one day, so post must contain that date
        $qb->andWhere('p.datein <= :startDate AND p.dateout >= :startDate')
           ->setParameter('startDate', $startDate);
    } else if ($endDate !== null) {
        // If only end date is provided, post must be available until that date
        // We assume the search is for just that one day, so post must contain that date
        $qb->andWhere('p.datein <= :endDate AND p.dateout >= :endDate')
           ->setParameter('endDate', $endDate);
    }
    
    // Get all posts that match location and date criteria
    $posts = $qb->getQuery()->getResult();
    
    // Filter by pets in PHP if needed
    if (!empty($acceptedPets)) {
        $filteredPosts = [];
        foreach ($posts as $post) {
            $postAcceptedPets = $post->getAcceptedPets();
            $matchesPetRequirements = true;
            
            // Check if post can accommodate all required pets with sufficient counts
            foreach ($acceptedPets as $requiredPet => $requiredCount) {
                if (!isset($postAcceptedPets[$requiredPet]) || 
                    $postAcceptedPets[$requiredPet] < $requiredCount) {
                    $matchesPetRequirements = false;
                    break;
                }
            }
            
            if ($matchesPetRequirements) {
                $filteredPosts[] = $post;
            }
        }
        return $filteredPosts;
    }
    
    return $posts;
}

public static function expireOldPosts()
{
    $em = FentityManager::getInstance()::getEntityManager();
    $today = new DateTime('today');

    // Recupera tutti i post ancora "open" o "booked"
    $qb = $em->createQueryBuilder();
    $posts = $qb->select('p')
        ->from(Mpost::getEntity(), 'p')
        ->where('p.booked IN (:statuses)')
        ->setParameter('statuses', ['open', 'booked'])
        ->getQuery()
        ->getResult();

    foreach ($posts as $post) {
        if ($post->getDateOut() < $today) {
            $currentState = strtolower(is_object($post->getBooked()) ? $post->getBooked()->name : $post->getBooked());
            if ($currentState === 'open' || $currentState === 'booked') {
                $post->setBooked('finished');
                $em->persist($post);
            }
        }
    }
    $em->flush();
}

public static function expireOldOffers()
{
    $em = FentityManager::getInstance()::getEntityManager();
    $today = new DateTime('today');

    // Recupera tutte le offerte in stato pending o accepted
    $offers = $em->getRepository(Moffer::getEntity())->findBy([
        'state' => ['pending', 'accepted']
    ]);

    foreach ($offers as $offer) {
        if ($offer->getDateofferout() < $today) {
            $currentState = strtolower(is_object($offer->getState()) ? $offer->getState()->name : $offer->getState());
            if ($currentState === 'pending') {
                $offer->setState('expired');
            } elseif ($currentState === 'accepted') {
                $offer->setState('finished');
            }
            $em->persist($offer);
        }
    }
    $em->flush();
} 
         
      
    
}
