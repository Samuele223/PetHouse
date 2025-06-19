<?php

require_once __DIR__ . '/../../bootstrap.php';

class CUser {

    /**
     * Show registration form on GET, process registration on POST.
     */
    public static function registration() {
        $view = new VUser();

        // If GET, show registration form
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $view->showRegisterForm();
            return;
        }

        // If POST, process registration data
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name     = UHTTPMethods::post('name') ?? null; //??null vuol dire vuol dire: “Se UHTTPMethods::post('name') restituisce un valore, assegnalo a $name. Se invece la chiave non esiste, o è null, allora $name sarà null.” Questo evita warning se il campo non è stato inviato, ed è sintassi molto usata nelle versioni moderne di PHP (>=7).
            $surname  = UHTTPMethods::post('surname') ?? null;
            $username = UHTTPMethods::post('username') ?? null;
            $email    = UHTTPMethods::post('email') ?? null;
            $password = UHTTPMethods::post('password') ?? null;


            // Basic validation
            if (!$name || !$surname || !$username || !$email || !$password) {
                $view->showRegisterForm('Please fill out all fields.');
                return;
            }

            $pm = FPersistentManager::getInstance();

            // Check email and username uniqueness
            if ($pm->verifyUserEmail($email)) {
                $view->showRegisterForm('Email already registered.');
                return;
            }
            if ($pm->verifyUserUsername($username)) {
                $view->showRegisterForm('Username already taken.');
                return;
            }

            // Create and hash password
            
            $user = new MUser($name, $surname, $username, $email);
            $user->setPassword($password); // <-- passa la password in chiaro


            $check = $pm->saveObj($user);

            if ($check) {
                $view->registrationSuccess();
            } else {
                $view->showRegisterForm('Registration failed. Please try again.');
            }
        }
    }

    /**
     * Show login form on GET, process login on POST.
     */
    public static function login() {
        $view = new VUser();

        // If user is already logged in, redirect to home
        if (USession::isSetSessionElement('user')) {
            header('Location: /PetHouse/offerHosting/showOfferForm'); //modified to redirect to post creation, should be HOME but I'm testing
            exit;
        }

        // Show login form on GET
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $view->showLoginForm();
            return;
        }

        // Process login on POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = UHTTPMethods::post('username') ?? null;
            $password = UHTTPMethods::post('password') ?? null;

            if (!$username || !$password) {
                $view->showLoginForm('Please enter your username and password.');
                return;
            }

            $pm = FPersistentManager::getInstance();
            $user = $pm->getUserByUsername($username);

            if (!$user || !password_verify($password, $user->getPassword())) {
                  echo "<div style='color: red; font-weight: bold;'>Invalid credentials.</div>";
                return;
            }


            if (USession::getSessionStatus() == PHP_SESSION_NONE) {
                USession::getInstance();
            }
            USession::setSessionElement('user', $user->getId());

            header('Location: /PetHouse/offerHosting/showOfferForm'); //modified to redirect to post creation
            exit;
        }
    }

    /**
     * Check if the user is logged in, else redirect.
     */

     public static function isLogged() {
    // Ensure session is started
    if (USession::getSessionStatus() == PHP_SESSION_NONE) {
        USession::getInstance();
    }

    // Check for our “user” marker in session
    if (USession::isSetSessionElement('user')) {
        return true;  // authenticated
    }

    // not authenticated → send to login
    header('Location: /PetHouse/User/login');
    exit;
}

   


    /**
     * Log out the user and destroy the session.
     */
    public static function logout() {
        USession::getInstance();
        USession::unsetSession();
        USession::destroySession();
        header('Location: /PetHouse/Home/mainscreen');
    }
}
