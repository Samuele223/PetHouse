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
            $phone = UHTTPMethods::post('phone') ?? null; 


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
            if ($phone) {
                $user->setTel($phone);
            }
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
                  $view->showInvalidCredentials();
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
    if (!$pic) {
        // If no profile picture, set a default or handle accordingly
        $picid = 1; // or set to a default image ID if you have one
    } else {
        // If there is a profile picture, get its ID
        $picid = $pic->getId();
    }
    
    // Controlla se c'è un messaggio di successo
    $successMessage = USession::getSessionElement('success_message');
    if ($successMessage) {
        $view->profile($user, $picid, $successMessage);
        // Rimuovi il messaggio dopo averlo mostrato
        USession::unsetSessionElement('success_message');
    } else {
        $view->profile($user, $picid);
    }
}
public static function addHouse()
{
if (USession::getSessionStatus() == PHP_SESSION_NONE) {
    USession::getInstance();
}
$id = USession::getSessionElement('user');
$view = new VUser();
if ($id) {
    $view->showHomeForm();
} else {
    // Handle case where user is not logged in
    header('Location: /PetHouse/User/login');
    exit;
}
}
public static function createHouse()
{
if (USession::getSessionStatus() == PHP_SESSION_NONE) {
    USession::getInstance();
}
$id = USession::getSessionElement('user');
$view = new VUser();
if ($id) {
    $user = FPersistentManager::retriveObj(Muser::getEntity(), $id);
    $title = UHTTPMethods::post('title') ?? null;
    $city = UHTTPMethods::post('city') ?? null;
    $description = UHTTPMethods::post('description') ?? null;
    $address = UHTTPMethods::post('address') ?? null;
    $province = UHTTPMethods::post('province') ?? null;
    $country = UHTTPMethods::post('country') ?? null;
    $position = new MPosition($address, $description,$city, $province, $country, $user,$title);
    
    $check = FPersistentManager::saveObj($position);
    if (isset($_FILES['img']) && is_array($_FILES['img']['error'])) {
        $uploaded = false;
        for ($i = 0; $i < count($_FILES['img']['name']); $i++) {
            if ($_FILES['img']['error'][$i] === UPLOAD_ERR_OK) {
                $uploaded = true;
                $tmpName = $_FILES['img']['tmp_name'][$i];
                $mime = $_FILES['img']['type'][$i];
                $data = file_get_contents($tmpName);

                $pic = new Mphoto($data, $mime);
                $pic->setLocation($position);
                FPersistentManager::saveObj($pic);
            }
        }
        if (!$uploaded) {
            echo 'non si è caricato nulla';
        }
    } else {
        echo 'non si è caricato nulla';
    }
    if ($check) {
        $view->home($user->getUsername());
    } else {
        $view->showHomeForm('Failed to create house. Please try again.');
    }
}
else {
    // Handle case where user is not logged in
    header('Location: /PetHouse/User/login');
    exit;
}

}
public static function myPost() {
    // Ensure session is started
    if (USession::getSessionStatus() == PHP_SESSION_NONE) {
        USession::getInstance();
    }

    // Check if user is logged in
    if (!USession::isSetSessionElement('user')) {
        header('Location: /PetHouse/User/login');
        exit;
    }

    // Get current user ID from session
    $userId = USession::getSessionElement('user');

    // Query diretta al database - metodo più affidabile
    $em = FEntityManager::getInstance()::getEntityManager();
    $posts = $em->getRepository(Mpost::getEntity())
        ->findBy(['seller' => $userId, 'booked' => false]); // Solo post attivi (non prenotati)

    // Passa i post alla view
    $view = new VUser();
    $view->showUserPosts($posts);
}
public static function myHouses() {
    // Ensure session is started
    if (USession::getSessionStatus() == PHP_SESSION_NONE) {
        USession::getInstance();
    }

    // Check if user is logged in
    if (!USession::isSetSessionElement('user')) {
        header('Location: /PetHouse/User/login');
        exit;
    }
    // Get current user ID from session
    $userId = USession::getSessionElement('user');

    // Query diretta al database - metodo più affidabile
    $em = FEntityManager::getInstance()::getEntityManager();
    // Prende TUTTI gli oggetti dell'entità Position
    $houses = $em->getRepository(Mposition::getEntity())->findBy(['owner' => $userId]);


    $view = new Vuser();
    $view->showUserHouses($houses);
}


public static function viewMyHousesDetails(int $id) {
    // Ensure session is started
    if (USession::getSessionStatus() == PHP_SESSION_NONE) {
        USession::getInstance();
    }

    // Check if user is logged in
    if (!USession::isSetSessionElement('user')) {
        header('Location: /PetHouse/User/login');
        exit;
    }

    // Get current user ID from session
    $userId = USession::getSessionElement('user');

    // Recupera la casa
    $house = FPersistentManager::retriveObj(Mposition::getEntity(),$id);
        $view = new Vuser();
        $view->showUserHousesDetails($house);
}
}