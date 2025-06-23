<?php
// CofferHosting.php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/CUser.php';
require_once __DIR__ . '/../view/VOfferHosting.php';

class CofferHosting {

    /**
     * showOfferForm
     * Display the form to create a new hosting offer (GET)
     */
    public static function showOfferForm() {
        if (CUser::isLogged()) {
            $userId    = USession::getInstance()->getSessionElement('user');
            // load all positions (houses) for this user so they can choose where to host
            $positions = FPersistentManager::getHousesFromUser($userId);

            $view = new VOfferHosting();
            $view->showPostForm($positions);
        }
        else {
            // If the user is not logged in, redirect to login page or show an error
            header('Location: /Pethouse/user/login');
            exit;
        }
    }

    /**
     * createOffer
     * Collect form data, validate it, and create the hosting offer (POST)
     */
    public static function createOffer() {
        if (CUser::isLogged()) {
            // Gather fields from the form
            $idPosition   = UHTTPMethods::post('idPosition')   ?? null;
            $title        = UHTTPMethods::post('title')        ?? '';
            $description  = UHTTPMethods::post('description')  ?? '';
            $moreInfo     = UHTTPMethods::post('moreInfo')     ?? '';
            $price        = floatval(UHTTPMethods::post('price') ?? 0);
            $dateInStr    = UHTTPMethods::post('dateIn')       ?? '';
            $dateOutStr   = UHTTPMethods::post('dateOut')      ?? '';
            $acceptedPets = UHTTPMethods::post('acceptedPets') ?? [];

            // Basic validation
            if (!$idPosition || !$title || !$description || !$dateInStr || !$dateOutStr) {
                CofferHosting::showErrorAndForm('Missing required fields.', $idPosition);
                return;
            }

            // Convert date strings to DateTime objects
            try {
                $dateIn  = new DateTime($dateInStr);
                $dateOut = new DateTime($dateOutStr);
            } catch (Exception $e) {
                CofferHosting::showErrorAndForm('Invalid date format.', $idPosition);
                return;
            }

            // Verify ownership of the selected position
            $userId   = USession::getInstance()->getSessionElement('user');
            $position = FPersistentManager::retriveObj(MPosition::getEntity(), (int)$idPosition);
            if (!$position || $position->getOwner()->getId() !== $userId) {
                CofferHosting::showErrorAndForm('Invalid position or insufficient permissions.', $idPosition);
                return;
            }

            // Create and save the hosting post
            $post = new Mpost(
                $description,
                $acceptedPets,
                $price,
                $title,
                $moreInfo,
                $position->getOwner(),
                $position,
                $dateIn,
                $dateOut
            );
            $post->setBooked(false);
            FPersistentManager::saveObj($post);

            // Show summary of the created post instead of redirecting
            $view = new VOfferHosting();
            $view->showPostSummary($post);
        }
    }

    private static function showErrorAndForm(string $error, ?int $positionId) {
        $userId    = USession::getInstance()->getSessionElement('user');
        $positions = FPersistentManager::getHousesFromUser($userId);
        $view = new VOfferHosting();
        $view->showPostFormError($error, $positions);
    }
}
