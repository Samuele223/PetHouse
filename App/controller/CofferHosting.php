<?php
// CofferHosting.php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/Cuser.php';
require_once __DIR__ . '/../view/VofferHosting.php';

class CofferHosting {

    /**
     * showOfferForm
     * Display the form to create a new hosting offer (GET)
     */
    public static function showOfferForm() {
        if (Cuser::isLogged()) {
            $userId = USession::getInstance()->getSessionElement('user');
            // load all positions (houses) for this user so they can choose where to host
            $positions = FpersistentManager::getHousesFromUser($userId);
            
            // Check if the user has any houses
            if (!$positions || count($positions) === 0) {
                // Redirect to add house with message
                $view = new VofferHosting();
                $view -> showOfferBeforeHouseError();
                return;
            }
            
            $view = new VofferHosting();
            $view->showPostForm($positions);
        }
        else {
            // If the user is not logged in, redirect to login page
            header('Location: /PetHouse/User/login');
            exit;
        }
    }

    /**
     * createOffer
     * Collect form data, validate it, and create the hosting offer (POST)
     */
    public static function createOffer() {
        if (Cuser::isLogged()) {
            
            $termsAccepted = UHTTPMethods::post('terms_accepted') ?? null;
            if (!$termsAccepted) {
                CofferHosting::showErrorAndForm('Devi accettare i termini e le condizioni.', null);
                return;
            }
            
           
            $idPosition   = UHTTPMethods::post('idPosition') ?? null;
            $moreInfo     = UHTTPMethods::post('moreInfo') ?? '';
            $price        = UHTTPMethods::post('price');
            if (empty($price) || !is_numeric($price)) {
                CofferHosting::showErrorAndForm('Please enter a valid price.', $idPosition);
                return;
            }
            $price = floatval(str_replace(',', '.', $price));
            $dateInStr    = UHTTPMethods::post('date_in') ?? ''; // Corretto da dateIn a date_in
            $dateOutStr   = UHTTPMethods::post('date_out') ?? ''; // Corretto da dateOut a date_out
            $acceptedPets = UHTTPMethods::post('accepted_pets') ?? []; // Corretto da acceptedPets a accepted_pets
            $petCounts    = UHTTPMethods::post('accepted_pet_counts') ?? [];
            
            // Basic validation - RIMOSSI title e description che non esistono più nel form
            if (!$idPosition || !$moreInfo || !$dateInStr || !$dateOutStr || !$price) {
                CofferHosting::showErrorAndForm('Mancano campi obbligatori.', $idPosition);
                return;
            }

            // Convert date strings to DateTime objects
            try {
                $dateIn  = new DateTime($dateInStr);
                $dateOut = new DateTime($dateOutStr);
            } catch (Exception $e) {
                CofferHosting::showErrorAndForm('Formato data non valido.', $idPosition);
                return;
            }

            // Verify ownership of the selected position
            $userId   = USession::getInstance()->getSessionElement('user');
            $position = FpersistentManager::retriveObj(Mposition::getEntity(), (int)$idPosition);
            if (!$position || $position->getOwner()->getId() !== $userId) {
                CofferHosting::showErrorAndForm('Posizione non valida o permessi insufficienti.', $idPosition);
                return;
            }

            // Formatta gli animali accettati nel formato corretto
            $formattedPets = [];
            for ($i = 0; $i < count($acceptedPets); $i++) {
                if (!empty($acceptedPets[$i])) {
                    $formattedPets[$acceptedPets[$i]] = intval($petCounts[$i]);
                }
            }
            
            // Create and save the hosting post - ADATTATO ai campi disponibili
            $post = new Mpost(
                $moreInfo, // come descrizione
                $formattedPets,
                $price,
                $position->getTitle(), // usa il titolo della proprietà invece del title
                $moreInfo, // usa moreInfo anche per campo moreinfo
                $position->getOwner(),
                $position,
                $dateIn,
                $dateOut
            );
            $post->setBooked('open');
            FpersistentManager::saveObj($post);

            // Redirect to success page
            header('Location: /PetHouse/user/profile');
            exit;
        } else {
            header('Location: /PetHouse/User/login');
            exit;
        }
    }

    private static function showErrorAndForm(string $error, ?int $positionId) {
        $userId    = USession::getInstance()->getSessionElement('user');
        $positions = FpersistentManager::getHousesFromUser($userId);
        $view = new VofferHosting();
        $view->showPostFormError($error, $positions);
    }
}
