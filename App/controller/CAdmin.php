<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../config/autoloader.php';

class CAdmin
{
    public static function login() {
        $view = new VAdmin();

        // If admin is already logged in, redirect to home
        if (USession::isSetSessionElement('admin')) {
            header('Location: /PetHouse'); //modified to redirect to post creation, should be HOME but I'm testing
            exit;
        }

        // Show login form on GET
        if (UServer::getRequestMethod() === 'GET') {
            $view->showLoginForm();
            return;
        }

        // Process login on POST
        if (UServer::getRequestMethod() === 'POST') {
            $email = UHTTPMethods::post('email') ?? null;
            $password = UHTTPMethods::post('password') ?? null;

            if (!$email || !$password) {
                $view->showLoginForm('Please enter your email and password.');
                return;
            }

            $admin = FPersistentManager::getModByEmail($email);

            if (!$admin || !password_verify($password, $admin->getPassword())) {
                  $view->showInvalidCredentials();
                return;
            }


            if (USession::getSessionStatus() == PHP_SESSION_NONE) {
                USession::getInstance();
            }
            USession::setSessionElement('admin', $admin->getId());

            header('Location: /PetHouse/Admin/profile');
            exit;
        }
    }



    public static function logout()
    {
        USession::getInstance();
        USession::unsetSessionElement('admin');
        header('Location: /PetHouse/Admin/login');
        exit;
    }

public static function profile()
{
    if (USession::getSessionStatus() == PHP_SESSION_NONE) {
        USession::getInstance();
    }
    $id = USession::getSessionElement('admin');
    if (!$id) {
        header('Location: /PetHouse/Admin/login');
        exit;
    }
    $admin = FPersistentManager::retriveObj(Madmin::getEntity(), $id);
    $view = new VAdmin();
    // Passa qui i dati che vuoi mostrare nel profilo admin
    $view->profile($admin);
}
public static function listVerificationRequests()
{
    // Recupera tutte le richieste di verifica non approvate
    $verifiche = FPersistentManager::getVerificationsPending(); // Questo metodo deve restituire array di Mverification

    $view = new VAdmin();
    $view->showVerificationRequests($verifiche);
}

public static function userProfile($userId)
{
    $user = FPersistentManager::retriveObj(Muser::getEntity(), $userId);
    $verification = Fverification::getUserVerification($userId);

    $view = new VAdmin();
    $view->showUserProfileWithVerification($user, $verification);
}

// Metodo per accettare la richiesta
public static function acceptVerification($verificationId)
{
    Fverification::approveVerification($verificationId);
    header('Location: /PetHouse/Admin/listVerificationRequests');
    exit;
}

// Metodo per rifiutare la richiesta
public static function rejectVerification($verificationId)
{
    Fverification::rejectVerification($verificationId);
    header('Location: /PetHouse/Admin/listVerificationRequests');
    exit;
}




}