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
            $existingUserByUsername = FPersistentManager::verifyUserUsername($username);
            $existingUserByEmail = FPersistentManager::verifyUserEmail($email);

            if ($existingUserByUsername !== null && $existingUserByEmail !== null) {
                $view->showRegisterForm('Both username and email are already in use.');
                return;
            } elseif ($existingUserByUsername !== null) {
                $view->showRegisterForm('Username already exists. Please choose another.');
                return;
            } elseif ($existingUserByEmail !== null) {
                $view->showRegisterForm('Email already exists. Please use another.');
                return;
            }

            // Phone validation
            if ($phone && !is_numeric($phone)) {
                $view->showRegisterForm('Phone number must contain only digits.');
                return;
            }

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
                // No profile picture uploaded, do nothing
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
        FPersistentManager::expireOldOffers(); // Call to expire old offers
        FPersistentManager::expireOldPosts(); // Call to expire old posts
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
    if (!$user) {
        require_once __DIR__ . '/../view/Verror.php';
        $viewErr = new Verror();
        $viewErr->show404();
        return;
    }
    $pic = $user->getProfilePicture();
    if (!$pic) {
        // If no profile picture, set a default or handle accordingly
        $picid = 0; // or set to a default image ID if you have one
    } else {
        // If there is a profile picture, get its ID
        $picid = $pic->getId();
    }
        $view->profile($user, $picid);


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


    try {
        // Get the user entity
        $user = FPersistentManager::retriveObj(Muser::getEntity(), $userId);

        // Recupera i post direttamente dal repository
        $em = FEntityManager::getInstance()::getEntityManager();
        $posts = $em->getRepository(Mpost::getEntity())
            ->findBy(['seller' => $user, 'booked' => 'open']);

        error_log("Found " . count($posts) . " posts for user " . $user->getUsername());

        // Display posts
        $view = new VUser();
        $view->showUserPosts($posts);

    } catch (Exception $e) {
        error_log("Error fetching posts: " . $e->getMessage());
        $view = new VUser();
        $view->showUserPosts([]);
    }
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
        if (!$house) {
        require_once __DIR__ . '/../view/Verror.php';
        $viewErr = new Verror();
        $viewErr->show404();
        return;
    }
        $view = new Vuser();
        $view->showUserHousesDetails($house);
}

public static function editHouse(int $id) {
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
    if (!$house) {
    require_once __DIR__ . '/../view/Verror.php';
    $viewErr = new Verror();
    $viewErr->show404();
    return;
}

    $view = new Vuser();
    $view->showUserHousesEdit($house);
        
}
public static function updateHouse(int $id): void {
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

    // Retrieve the house
    $house = FPersistentManager::retriveObj(Mposition::getEntity(), $id);
    if (!$house) {
    require_once __DIR__ . '/../view/Verror.php';
    $viewErr = new Verror();
    $viewErr->show404();
    exit;
}

    // Aggiorna solo i campi presenti nel POST, mantenendo i valori originali per quelli mancanti
    if (isset($_POST['title'])) {
        $house->setTitle($_POST['title']);
    }
    
    if (isset($_POST['description'])) {
        $house->setDescription($_POST['description']);
    }
    
    // Solo se provincia e città sono presenti e non vuote, aggiornale
    if (isset($_POST['province']) && !empty($_POST['province'])) {
        $house->setProvince($_POST['province']);
    }
    
    if (isset($_POST['city']) && !empty($_POST['city'])) {
        $house->setCity($_POST['city']);
    }
    
    if (isset($_POST['country'])) {
        $house->setCountry($_POST['country']);
    }
    
    if (isset($_POST['address'])) {
        $house->setAddress($_POST['address']);
    }

    // --- GESTIONE FOTO ---
    // 1. Controlla se sono state caricate nuove foto
    $hasNewPhotos = false;
    if (isset($_FILES['img']) && is_array($_FILES['img']['error'])) {
        foreach ($_FILES['img']['error'] as $err) {
            if ($err === UPLOAD_ERR_OK) {
                $hasNewPhotos = true;
                break;
            }
        }
    }

    // 2. Se ci sono nuove foto, cancella le vecchie e aggiungi le nuove
    if ($hasNewPhotos) {
        // Cancella le vecchie foto associate alla casa
        $oldPhotos = $house->getPhotos();
        if ($oldPhotos) {
            foreach ($oldPhotos as $photo) {
                FPersistentManager::deleteObj($photo);
            }
        }

        // Aggiungi le nuove foto caricate
        for ($i = 0; $i < count($_FILES['img']['name']); $i++) {
            if ($_FILES['img']['error'][$i] === UPLOAD_ERR_OK) {
                $tmpName = $_FILES['img']['tmp_name'][$i];
                $mime = $_FILES['img']['type'][$i];
                $data = file_get_contents($tmpName);

                $pic = new Mphoto($data, $mime);
                $pic->setLocation($house);
                FPersistentManager::saveObj($pic);
                $house->addPhoto($pic); // aggiorna la relazione anche lato oggetto
            }
        }
    }
    // Se non ci sono nuove foto, non toccare le vecchie

    // Salva le modifiche alla casa
    FPersistentManager::saveObj($house);

    header('Location: /PetHouse/user/myHouses');
    exit;
}
public static function deleteHouse(int $id) {
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

    try {
        // Retrieve the house
        $house = FPersistentManager::retriveObj(Mposition::getEntity(), $id);
        
        if (!$house) {
            USession::setSessionElement('success_message', 'House not found.');
            header('Location: /PetHouse/User/myHouses');
            exit;
        }
        
        if ($house->getOwner()->getId() != $userId) {
            USession::setSessionElement('success_message', 'You do not have permission to delete this house.');
            header('Location: /PetHouse/User/myHouses');
            exit;
        }
        
        // First, check for and delete any posts associated with this house
        $em = FEntityManager::getInstance()::getEntityManager();
        $posts = $em->getRepository(Mpost::getEntity())->findBy(['house' => $house->getId()]);
        
        foreach ($posts as $post) {
            // Delete post-related entities first if any
            FPersistentManager::deleteObj($post);
        }
        
        // Delete related photos
        $photos = $house->getPhotos();
        if ($photos) {
            foreach ($photos as $photo) {
                FPersistentManager::deleteObj($photo);
            }
        }
        
        // Now delete the house
        $result = FPersistentManager::deleteObj($house);
        
        if ($result) {
            USession::setSessionElement('success_message', 'House deleted successfully.');
        } else {
            USession::setSessionElement('success_message', 'Failed to delete house. Please try again.');
        }
    } catch (Exception $e) {
        // Log the error with more details
        error_log('Error deleting house: ' . $e->getMessage() . ' - ' . $e->getTraceAsString());
        USession::setSessionElement('success_message', 'An error occurred: ' . $e->getMessage());
    }

    header('Location: /PetHouse/User/myHouses');
    exit;

}
    /**
     * Redirects user to verification form
     */
    public static function askVerification() {
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
        
        // Get user object
        $user = FPersistentManager::retriveObj(Muser::getEntity(), $userId);
        
        // Check if user is already verified
        if ($user->getVerified()) {
            // Redirect back to profile with message
            USession::getInstance()->setSessionElement('success_message', 'Your account is already verified!');
            header('Location: /PetHouse/user/profile');
            exit;
        }
        
        // Show verification form
        $view = new VUser();
        $view->showVerificationForm($user);
    }
    /**
     * Process verification submission
     */
    public static function submitVerification() {
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
        
        // Get user object
        $user = FPersistentManager::retriveObj(Muser::getEntity(), $userId);
        
        // Check if terms were accepted
        if (!isset($_POST['terms_accepted'])) {
            // Redirect back with error message
            USession::getInstance()->setSessionElement('error_message', 'You must accept the terms to proceed.');
            header('Location: /PetHouse/user/askVerification');
            exit;
        }
        
        // Process uploaded document
        if (isset($_FILES['id_document']) && $_FILES['id_document']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['id_document']['tmp_name'];
            $mimeType = $_FILES['id_document']['type'];
            $data = file_get_contents($tmpName);
            
            // Get any additional notes
            $description = $_POST['verification_notes'] ?? null;
            
            // Create new verification request using the foundation class
            $verification = new Mverification($user, $description);
            
            // Save document as photo
            $document = new Mphoto($data, $mimeType);
            $document->setName($_FILES['id_document']['name'] ?? 'verification_doc_' . uniqid());
            
            // First save the document
            FPersistentManager::saveObj($document);
            
            // Associate document with verification
            $verification->addDocument($document);
            
            // Save the verification
            FPersistentManager::saveObj($verification);
            
            // Set user's verification status (the entity relation will be maintained)
            $user->setVerification($verification);
            FPersistentManager::saveObj($user);
            
            // Redirect with success message
            USession::getInstance()->setSessionElement('success_message', 'Your verification request has been submitted successfully! We will review your documents soon.');
            header('Location: /PetHouse/user/profile');
            exit;
        } else {
            // Redirect with error message
            USession::getInstance()->setSessionElement('error_message', 'Please upload a valid document.');
            header('Location: /PetHouse/user/askVerification');
            exit;
        }
    }
    public static function delete_post($id_post)
    {
        FPersistentManager::deleteObj(FPersistentManager::retriveObj(Mpost::getEntity(), $id_post));
        header('Location: /PetHouse/User/myPost');
        exit;
    }
    public static function edit_post($id_post)
    {
        $view = new VUser();
        $post = FPersistentManager::retriveObj(Mpost::getEntity(), $id_post);
        if (!$post) {
            require_once __DIR__ . '/../view/Verror.php';
             $viewErr = new Verror();
             $viewErr->show404();
             return;
}
        USession::getInstance();
        $id = USession::getSessionElement('user');
        $user = FPersistentManager::retriveObj(Muser::getEntity(), $id);
        $houses = $user->getHouses();
        $view->showeditform($post, $houses);
        
    }
    public static function savedit()
    {
            // Gather fields from the form - CORRETTO con i nomi effettivi del form
            $idPosition   = UHTTPMethods::post('idPosition') ?? null;
            $moreInfo     = UHTTPMethods::post('moreInfo') ?? '';
            $price        = UHTTPMethods::post('price');
            $price = floatval(str_replace(',', '.', $price));
            $dateInStr    = UHTTPMethods::post('date_in') ?? ''; 
            $dateOutStr   = UHTTPMethods::post('date_out') ?? ''; 
            $acceptedPets = UHTTPMethods::post('accepted_pets') ?? []; 
            $petCounts    = UHTTPMethods::post('accepted_pet_counts') ?? [];
            $id_post = UHTTPMethods::post('post_id') ?? null;
            $post = FPersistentManager::retriveObj(Mpost::getEntity(), $id_post);
            $post->setMoreInfo($moreInfo);
            $post->setPrice($price);
            $post->setDateIn(new DateTime($dateInStr));
            $post->setDateOut(new DateTime($dateOutStr));
            $post->addAcceptedPets(array_combine($acceptedPets, $petCounts));
            $post->setHouse(FPersistentManager::retriveObj(Mposition::getEntity(), $idPosition));
            $check = FPersistentManager::saveObj($post);
            header('Location: /PetHouse/User/myPost');
            
            
    }
    public static function review()
    {
    // Ensure session is started
    Usession::getInstance();
    $id = Usession::getSessionElement('user');
    $user = FPersistentManager::retriveObj(Muser::getEntity(), $id);
    $reviews = $user->getReviewToMe();
        // Calcolo media rating
    $reviewsArray = $reviews->toArray();
    $total = 0;
    $count = 0;
    foreach ($reviewsArray as $review) {
        $rating = $review->getRating();
        if ($rating instanceof rating) {
            $total += $rating->value; // enum int value
            $count++;
        }
    }
    $average = $count > 0 ? $total / $count : 0;
    $user->setRating($average);
    FPersistentManager::saveObj($user); 
    $view = new VUser();
    $view->showReviews($reviewsArray, $average);
    
    }
    public static function yourpost($id)
    {
        Usession::getInstance();
        $post = FPersistentManager::retriveObj(Mpost::getEntity(), $id);
        if (!$post) {
            require_once __DIR__ . '/../view/Verror.php';
            $viewErr = new Verror();
            $viewErr->show404();
            return;
}
        $view = new VUser();
        $view->showPost($post);
    }
    public static function activeoffers()
    {
        Usession::getInstance();
        $id = Usession::getSessionElement('user');
        $user = FPersistentManager::retriveObj(Muser::getEntity(), $id);
        $offers = $user->getListOfOffers()->toArray();
        $offers = array_filter($offers, function($offer) {
            return $offer->getState() == stateoffer::ACCEPTED;
        });
        $view = new VUser();
        $view->showActiveOffers($offers);
    }
    public static function activeposts()
    {
        Usession::getInstance();
        $id = Usession::getSessionElement('user');
        $user = FPersistentManager::retriveObj(Muser::getEntity(), $id);
        $post = $user->getMyPost();
        $post = array_filter($post->toArray(), callback: function($p) {
            return $p->getBooked() == 'booked';
        });
        $view = new VUser();
        $view->showActivePosts($post); 
    }
    public static function editprofile()
    {
        Usession::getInstance();
        $id = Usession::getSessionElement('user');
        $user = FPersistentManager::retriveObj(Muser::getEntity(), $id);
        $view = new VUser();
        $view->showEditProfile($user);
    }
    public static function updateProfile()
    {
        Usession::getInstance();
        $id = Usession::getSessionElement('user');
        $user = FPersistentManager::retriveObj(Muser::getEntity(), $id);
        $name = UHTTPMethods::post('name') ?? null;
        $surname = UHTTPMethods::post('surname') ?? null;
        $username = UHTTPMethods::post('username') ?? null;
        $email = UHTTPMethods::post('email') ?? null;
        $phone = UHTTPMethods::post('phone') ?? null; 
        if ($name) {
            $user->setName($name);
        }
        if ($surname) {
            $user->setSurname($surname);
        }
        if ($username) {
            $user->setUsername($username);
        }
        if ($email) {
            $user->setEmail($email);
        }
        if ($phone) {
            $user->setTel($phone);
        }
        
        if ($_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['profile_pic']['tmp_name'];
            $nomeFile = $_FILES['profile_pic']['name'];
            $mimeType = $_FILES['profile_pic']['type'];
            $dati = file_get_contents($tmpName);

            $foto = new Mphoto( $dati,$mimeType );

            
            FPersistentManager::saveObj($foto); // Salva la foto nel database
            $user->setProfilePicture($foto);
             // Associa la foto all'utente  
        }         
        FPersistentManager::saveObj($user);        
        header('Location: /PetHouse/user/profile');
    
}
}
