<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../config/autoloader.php';

class CUser {

    /**
     * Show registration form on GET, process registration on POST.
     */
    public static function registration() {
        $view = new VUser();

        // If GET, show registration form
        if (UServer::getRequestMethod() === 'GET') {
            $view->showRegisterForm();
            return;
        }

        // If POST, process registration data
        if (UServer::getRequestMethod() === 'POST') {
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

            

            // Check email and username uniqueness
            /*if (FPersistentManager::verifyUserEmail($email)) {
                $view->showRegisterForm('Email already registered.');
                return;
            }
            if (FPersistentManager::verifyUserUsername($username)) {
                $view->showRegisterForm('Username already taken.');
                return;
            }*/

            // Create and hash password
            
            $user = new MUser($name, $surname, $username, $email);
            $user->setPassword($password); // <-- passa la password in chiaro
            if ($_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
                $tmpName = $_FILES['profile_pic']['tmp_name'];
                $nomeFile = $_FILES['profile_pic']['name'];
                $mimeType = $_FILES['profile_pic']['type'];
                $dati = file_get_contents($tmpName);

                $foto = new Mphoto( $dati,$mimeType );

                // Assumi che $entityManager sia il manager di Doctrine
                FPersistentManager::saveObj($foto); // Salva la foto nel database
                $user->setProfilePicture($foto); // Associa la foto all'utente

                // Ora puoi associare $foto all'utente o salvarla come preferisci
            } else {
                echo 'skibidi';
            }

            $check = FPersistentManager::saveObj($user);
            

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
            $username = UHTTPMethods::post('username') ?? null;
            $password = UHTTPMethods::post('password') ?? null;

            if (!$username || !$password) {
                $view->showLoginForm('Please enter your username and password.');
                return;
            }

            $user = FPersistentManager::getUserByUsername($username);

            if (!$user || !password_verify($password, $user->getPassword())) {
                  echo "<div style='color: red; font-weight: bold;'>Invalid credentials.</div>";
                return;
            }


            if (USession::getSessionStatus() == PHP_SESSION_NONE) {
                USession::getInstance();
            }
            USession::setSessionElement('user', $user->getId());
            

            header('Location: /PetHouse'); //modified to redirect to post creation
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
        header('Location: /PetHouse/');
    }
    public static function home()
    {   
        if (USession::getSessionStatus() == PHP_SESSION_NONE) {
        USession::getInstance();
    } 
        $id = USession::getSessionElement('user');
        $view = new VUser();
        if ($id){
            $user = FPersistentManager::retriveObj(Muser::getEntity(), $id);
            $username = $user->getUsername();
            $view->home($username);
        }
        else{
            $view->home(false);
        }

}
public static function profile()
{
if (USession::getSessionStatus() == PHP_SESSION_NONE) {
    USession::getInstance();
} 
$id = USession::getSessionElement('user');
$view = new VUser();
$user = FPersistentManager::retriveObj(Muser::getEntity(), $id);
$pic = $user->getProfilePicture();
$picid = $pic->getId();

$view->profile($user, $picid);
}
}