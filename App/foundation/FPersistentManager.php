<?php

class FPersistentManager{

    /**
     * Singleton Class
     */

    private static $instance;


    private function __construct(){}

    public static function getInstance(): FPersistentManager{
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function retriveObj($Mclass, $id) // penso sia da validare l' imput delle funzioni che prendono in imput il nome di una classe
    {
        $result = FEntityManager::getInstance()::retriveObj($Mclass,$id);
        return $result;
    }

    public static function uploadObj($obj){

        $result = FEntityManager::getInstance()->saveObject($obj);

        return $result;
    }
    
    public static function deleteObj($obj)
    {
        $result = FEntityManager::getInstance()::deleteObj($obj);
        return $result;
    }


    public static function updateObj($obj) {
    $result = FEntityManager::getInstance()->updateObj($obj);
    return $result;
}


    
    public static function getUserByUsername($username)
    {
        $result = FUser::getUserByUsername($username);
        return $result;
    }
    public static function gerVerifiedUsers()
    {
        $result = FUser::loadVerifiedUsers();
        return $result;
    }




     // ----- REPOSITORY ADMIN -----

    /** @var FPersistentMAdmin|null $adminRepo */
    private static ?FPersistentMAdmin $adminRepo = null;

    /**
     * Inizializza (una sola volta) il repository Admin
     * ottenendo l’EntityManager dal singleton FEntityManager.
     *
     * @return FPersistentMAdmin
     */
    private static function adminRepo(): FPersistentMAdmin
    {
        // Se non esiste ancora l’istanza, la crea
        if (self::$adminRepo === null) {
            $em = FEntityManager::getInstance()->getEntityManager();
            self::$adminRepo = new FPersistentMAdmin($em);
        }
        // Restituisce l’istanza singleton
        return self::$adminRepo;
    }

    /**
     * Recupera un admin tramite il suo ID.
     *
     * @param int $id  Identificativo univoco dell’admin
     * @return Madmin|null  L’oggetto Madmin o null se non trovato
     */
    public static function retrieveAdminById(int $id): ?Madmin
    {
        return self::adminRepo()->retrieveById($id);
    }

    /**
     * Recupera un admin tramite l’indirizzo email.
     *
     * @param string $email  Email dell’admin
     * @return Madmin|null  L’oggetto Madmin o null se non trovato
     */
    public static function retrieveAdminByEmail(string $email): ?Madmin
    {
        return self::adminRepo()->retrieveByEmail($email);
    }

    /**
     * Crea un nuovo admin con email e password.
     *
     * @param string $email     Email del nuovo admin
     * @param string $password  Password in chiaro (da hashare internamente)
     * @return bool  True se l’operazione ha successo, false altrimenti
     */
    public static function createAdmin(string $email, string $password): bool
    {
        return self::adminRepo()->create($email, $password);
    }

    /**
     * Aggiorna un admin esistente.
     *
     * @param Madmin $admin  L’istanza di Madmin modificata
     * @return bool  True se l’update va a buon fine
     */
    public static function updateAdmin(Madmin $admin): bool
    {
        return self::adminRepo()->update($admin);
    }

    /**
     * Elimina un admin.
     *
     * @param Madmin $admin  L’istanza di Madmin da rimuovere
     * @return bool  True se la cancellazione è avvenuta con successo
     */
    public static function deleteAdmin(Madmin $admin): bool
    {
        return self::adminRepo()->delete($admin);
    }


    // ----- REPOSITORY REVIEW -----

    /** @var FPersistentMReview|null $reviewRepo */
    private static ?FPersistentMReview $reviewRepo = null;

    /**
     * Factory per il repository Review,
     * inizializza l’istanza solo la prima volta.
     *
     * @return FPersistentMReview
     */
    private static function reviewRepo(): FPersistentMReview
    {
        if (self::$reviewRepo === null) {
            $em = FEntityManager::getInstance()->getEntityManager();
            self::$reviewRepo = new FPersistentMReview($em);
        }
        return self::$reviewRepo;
    }

    /**
     * Recupera una review tramite ID.
     *
     * @param int $id  Identificativo della review
     * @return Mreview|null  L’oggetto Mreview o null se non esiste
     */
    public static function retrieveReviewById(int $id): ?Mreview
    {
        return self::reviewRepo()->retrieveById($id);
    }

    /**
     * Elenca tutte le review associate a una specifica offerta.
     *
     * @param int $offerId  ID dell’offerta
     * @return Mreview[]   Array di oggetti Mreview (vuoto se nessuna)
     */
    public static function listReviewsByOffer(int $offerId): array
    {
        return self::reviewRepo()->listByOffer($offerId);
    }

    /**
     * Crea una nuova review.
     *
     * @param string $description  Testo della recensione
     * @param rating $rating       Voto numerico (tipo scalar o enum)
     * @param Muser $reviewer      Utente che scrive la recensione
     * @param Muser $reviewed      Utente recensito
     * @param Moffer $offer        Offerta collegata
     * @return bool  True se la creazione ha successo
     */
    public static function createReview(string $description, rating $rating, Muser $reviewer, Muser $reviewed, Moffer $offer): bool
    {
        return self::reviewRepo()->create($description, $rating, $reviewer, $reviewed, $offer);
    }

    /**
     * Aggiorna una review esistente.
     *
     * @param Mreview $review  Istanza di Mreview modificata
     * @return bool
     */
    public static function updateReview(Mreview $review): bool
    {
        return self::reviewRepo()->update($review);
    }

    /**
     * Elimina una review.
     *
     * @param Mreview $review  Istanza di Mreview da cancellare
     * @return bool
     */
    public static function deleteReview(Mreview $review): bool
    {
        return self::reviewRepo()->delete($review);
    }


    // ----- REPOSITORY REPORT -----

    /** @var FPersistentMReport|null $reportRepo */
    private static ?FPersistentMReport $reportRepo = null;

    /**
     * Factory per il repository Report,
     * inizializza l’istanza solo la prima volta.
     *
     * @return FPersistentMReport
     */
    private static function reportRepo(): FPersistentMReport
    {
        if (self::$reportRepo === null) {
            $em = FEntityManager::getInstance()->getEntityManager();
            self::$reportRepo = new FPersistentMReport($em);
        }
        return self::$reportRepo;
    }

    /**
     * Recupera un report tramite ID.
     *
     * @param int $id  Identificativo del report
     * @return Mreport|null  L’oggetto Mreport o null se non esiste
     */
    public static function retrieveReportById(int $id): ?Mreport
    {
        return self::reportRepo()->retrieveById($id);
    }

    /**
     * Elenca tutti i report associati a un post.
     *
     * @param int $postId  ID del post segnalato
     * @return Mreport[]  Array di oggetti Mreport (vuoto se nessuno)
     */
    public static function listReportsByPost(int $postId): array
    {
        return self::reportRepo()->listByPost($postId);
    }

    /**
     * Crea un nuovo report.
     *
     * @param string $description  Descrizione del problema
     * @param Muser $reporter      Utente che segnala
     * @param Mpost $post          Post segnalato
     * @return bool  True se la segnalazione viene salvata
     */
    public static function createReport(string $description, Muser $reporter, Mpost $post): bool
    {
        return self::reportRepo()->create($description, $reporter, $post);
    }

    /**
     * Aggiorna un report esistente.
     *
     * @param Mreport $report  Istanza di Mreport modificata
     * @return bool
     */
    public static function updateReport(Mreport $report): bool
    {
        return self::reportRepo()->update($report);
    }

    /**
     * Elimina un report.
     *
     * @param Mreport $report  Istanza di Mreport da cancellare
     * @return bool
     */
    public static function deleteReport(Mreport $report): bool
    {
        return self::reportRepo()->delete($report);
    }

}
