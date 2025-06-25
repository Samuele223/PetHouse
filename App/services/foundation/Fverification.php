<?php

class Fverification
{
    /**
     * Crea una nuova richiesta di verifica per un utente
     * 
     * @param int $userId ID dell'utente
     * @param string|null $description Descrizione facoltativa
     * @param array $documentFiles Array di file caricati per i documenti
     * @return Mverification|false La verifica creata o false in caso di errore
     */
    public static function createVerificationRequest(int $userId, ?string $description = null, array $documentFiles = []): Mverification|false
    {
        try {
            // Recupera l'utente
            $user = FPersistentManager::retriveObj(Muser::getEntity(), $userId);
            if (!$user) {
                return false;
            }

            // Verifica se l'utente ha già una richiesta di verifica
            $em = FEntityManager::getInstance()::getEntityManager();
            $existingVerification = $em->getRepository(Mverification::class)
                ->findOneBy(['user' => $user]);

            if ($existingVerification) {
                return false; // L'utente ha già una richiesta
            }

            // Crea la nuova verifica
            $verification = new Mverification($user, $description);
            
            // Processa i documenti caricati
            foreach ($documentFiles as $file) {
                if ($file['error'] === UPLOAD_ERR_OK) {
                    $fileData = file_get_contents($file['tmp_name']);
                    $mimeType = $file['type'];
                    
                    // Crea nuovo oggetto foto
                    $document = new Mphoto($fileData, $mimeType);
                    $document->setName($file['name'] ?? 'verification_doc_' . uniqid());
                    
                    // Collega il documento alla verifica
                    $verification->addDocument($document);
                    
                    // Salva il documento
                    FPersistentManager::saveObj($document);
                }
            }
            
            // Salva la verifica
            $result = FPersistentManager::saveObj($verification);
            
            return $result ? $verification : false;
        } catch (\Exception $e) {
            // Gestione errori
            error_log('Errore durante la creazione della verifica: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Verifica se un utente ha già una richiesta di verifica
     * 
     * @param int $userId ID dell'utente
     * @return bool
     */
    public static function hasVerificationRequest(int $userId): bool
    {
        $user = FPersistentManager::retriveObj(Muser::getEntity(), $userId);
        if (!$user) {
            return false;
        }

        $em = FEntityManager::getInstance()::getEntityManager();
        $existingVerification = $em->getRepository(Mverification::class)
            ->findOneBy(['user' => $user]);

        return $existingVerification !== null;
    }

    /**
     * Approva una richiesta di verifica
     * 
     * @param int $verificationId ID della verifica
     * @return bool
     */
    public static function approveVerification(int $verificationId): bool
    {
        $verification = FPersistentManager::retriveObj(Mverification::getEntity(), $verificationId);
        if (!$verification) {
            return false;
        }

        // Imposta la verifica come approvata
        $verification->setApproved(true);
        
        // Imposta l'utente come verificato
        $user = $verification->getUser();
        $user->setVerified(true);
        
        // Salva le modifiche
        FPersistentManager::saveObj($verification);
        FPersistentManager::saveObj($user);
        
        return true;
    }

    /**
     * Rifiuta una richiesta di verifica
     * 
     * @param int $verificationId ID della verifica
     * @return bool
     */
    public static function rejectVerification(int $verificationId): bool
    {
        $verification = FPersistentManager::retriveObj(Mverification::getEntity(), $verificationId);
        if (!$verification) {
            return false;
        }

        // Elimina la verifica
        return FPersistentManager::deleteObj($verification);
    }

    /**
     * Ottiene tutte le richieste di verifica in attesa
     * 
     * @return array|null
     */
    public static function getPendingVerifications(): ?array
    {
        $em = FEntityManager::getInstance()::getEntityManager();
        $verifications = $em->getRepository(Mverification::class)
            ->findBy(['approved' => false]);
        
        return $verifications ?: null;
    }

    /**
     * Ottiene la richiesta di verifica di un utente specifico
     * 
     * @param int $userId ID dell'utente
     * @return Mverification|null
     */
    public static function getUserVerification(int $userId): ?Mverification
    {
        $user = FPersistentManager::retriveObj(Muser::getEntity(), $userId);
        if (!$user) {
            return null;
        }

        $em = FEntityManager::getInstance()::getEntityManager();
        return $em->getRepository(Mverification::class)
            ->findOneBy(['user' => $user]);
    }
}