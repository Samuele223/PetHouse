<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../config/autoloader.php';

class Cuser {

    /**
     * Show registration form on GET, process registration on POST.
     */
    public static function registration() {
        $view = new Vuser();

        // If GET, show registration form
        if (UServer::getRequestMethod() === 'GET') {
            $view->showRegisterForm();
            return;
        }

        // If POST, process registration data
        if (UServer::getRequestMethod() === 'POST') {
            $name     = UHTTPMethods::post('name') ?? null; //??null means: “If UHTTPMethods::post('name') returns a value, assign it to $name. If the key does not exist, or is null, then $name will be null.
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
            $existingUserByUsername = FpersistentManager::verifyUserUsername($username);
            $existingUserByEmail = FpersistentManager::verifyUserEmail($email);

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
            $user = new Muser($name, $surname, $username, $email);
            if ($phone) {
                $user->setTel($phone);
            }
            $user->setPassword($password); 
            if ($_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
                $tmpName = $_FILES['profile_pic']['tmp_name'];
                $nomeFile = $_FILES['profile_pic']['name'];
                $mimeType = $_FILES['profile_pic']['type'];
                $dati = file_get_contents($tmpName);

                $foto = new Mphoto( $dati,$mimeType );

                
                FpersistentManager::saveObj($foto); 
                $user->setProfilePicture($foto); 

                
            } else {
                // No profile picture uploaded, do nothing
            }

            $check = FpersistentManager::saveObj($user);
            

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
        $view = new Vuser();

        // If user is already logged in, redirect to home
        if (USession::isSetSessionElement('user')) {
            header('Location: /PetHouse'); 
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

            $user = FpersistentManager::getUserByUsername($username);

            if (!$user || !password_verify($password, $user->getPassword())) {
                  $view->showInvalidCredentials();
                return;
            }


            if (USession::getSessionStatus() == PHP_SESSION_NONE) {
                USession::getInstance();
            }
            USession::setSessionElement('user', $user->getId());
            

            header('Location: /PetHouse');
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
        FpersistentManager::expireOldOffers(); // Call to expire old offers
        FpersistentManager::expireOldPosts(); // Call to expire old posts
        if (USession::getSessionStatus() == PHP_SESSION_NONE) {
        USession::getInstance();
    } 
        $id = USession::getSessionElement('user');
        $view = new Vuser();
        if ($id){
            $user = FpersistentManager::retriveObj(Muser::getEntity(), $id);
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
        if (!USession::isSetSessionElement('user')) {
        header('Location: /PetHouse/User/login');
        exit;
    }
    $id = USession::getSessionElement('user');
    $view = new Vuser();
    $user = FpersistentManager::retriveObj(Muser::getEntity(), $id);
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
$view = new Vuser();
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
    $view = new Vuser();
    if ($id) {
        $user = FpersistentManager::retriveObj(Muser::getEntity(), $id);
        $title = UHTTPMethods::post('title') ?? null;
        $city = UHTTPMethods::post('city') ?? null;
        $description = UHTTPMethods::post('description') ?? null;
        $address = UHTTPMethods::post('address') ?? null;
        $province = UHTTPMethods::post('province') ?? null;
        $country = UHTTPMethods::post('country') ?? null;
        // Backend validation for required fields
        if (empty($title) || empty($description) || empty($address)) {
            $view->showHomeForm('House name, description and address are required.');
            return;
        }
        $position = new Mposition($address, $description, $city, $province, $country, $user, $title);
        $check = FpersistentManager::saveObj($position);
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
                    FpersistentManager::saveObj($pic);
                }
            }
            if (!$uploaded) {
                
            }
        } else {
           
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
        $user = FpersistentManager::retriveObj(Muser::getEntity(), $userId);

        
        $em = FentityManager::getInstance()::getEntityManager();
        $posts = $em->getRepository(Mpost::getEntity())
            ->findBy(['seller' => $user, 'booked' => 'open']);

        error_log("Found " . count($posts) . " posts for user " . $user->getUsername());

        // Display posts
        $view = new Vuser();
        $view->showUserPosts($posts);

    } catch (Exception $e) {
        error_log("Error fetching posts: " . $e->getMessage());
        $view = new Vuser();
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

    $em = FentityManager::getInstance()::getEntityManager();

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

    // Retrieve the house
    $house = FpersistentManager::retriveObj(Mposition::getEntity(),$id);
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



    // Retrieve the house
    $house = FpersistentManager::retriveObj(Mposition::getEntity(),$id);
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
    $house = FpersistentManager::retriveObj(Mposition::getEntity(), $id);
    if (!$house) {
    require_once __DIR__ . '/../view/Verror.php';
    $viewErr = new Verror();
    $viewErr->show404();
    exit;
}


    if (isset($_POST['title'])) {
        $house->setTitle($_POST['title']);
    }
    
    if (isset($_POST['description'])) {
        $house->setDescription($_POST['description']);
    }
    

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


    $hasNewPhotos = false;
    if (isset($_FILES['img']) && is_array($_FILES['img']['error'])) {
        foreach ($_FILES['img']['error'] as $err) {
            if ($err === UPLOAD_ERR_OK) {
                $hasNewPhotos = true;
                break;
            }
        }
    }

    // If there are new photos uploaded, handle them
    if ($hasNewPhotos) {
        // Delete old photos associated with the house
        $oldPhotos = $house->getPhotos();
        if ($oldPhotos) {
            foreach ($oldPhotos as $photo) {
                FpersistentManager::deleteObj($photo);
            }
        }

        // Add the newly uploaded photos
        for ($i = 0; $i < count($_FILES['img']['name']); $i++) {
            if ($_FILES['img']['error'][$i] === UPLOAD_ERR_OK) {
                $tmpName = $_FILES['img']['tmp_name'][$i];
                $mime = $_FILES['img']['type'][$i];
                $data = file_get_contents($tmpName);

                $pic = new Mphoto($data, $mime);
                $pic->setLocation($house);
                FpersistentManager::saveObj($pic);
                $house->addPhoto($pic); // Update the relationship on the object side
            }
        }
    }
    // If there are no new photos, do not touch the old ones

    // Save changes to the house
    FpersistentManager::saveObj($house);

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
        $house = FpersistentManager::retriveObj(Mposition::getEntity(), $id);
        
        if (!$house) {
            
            header('Location: /PetHouse/User/myHouses');
            exit;
        }
        
        if ($house->getOwner()->getId() != $userId) {
            
            header('Location: /PetHouse/User/myHouses');
            exit;
        }
        
        // First, check for and delete any posts associated with this house
        $em = FentityManager::getInstance()::getEntityManager();
        $posts = $em->getRepository(Mpost::getEntity())->findBy(['house' => $house->getId()]);
        
        foreach ($posts as $post) {
            // Delete post-related entities first if any
            FpersistentManager::deleteObj($post);
        }
        
        // Delete related photos
        $photos = $house->getPhotos();
        if ($photos) {
            foreach ($photos as $photo) {
                FpersistentManager::deleteObj($photo);
            }
        }
        
        // Now delete the house
        $result = FpersistentManager::deleteObj($house);
        
        if ($result) {
            
        } else {
            
        }
    } catch (Exception $e) {
        // Log the error with more details
        error_log('Error deleting house: ' . $e->getMessage() . ' - ' . $e->getTraceAsString());
        
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
        $user = FpersistentManager::retriveObj(Muser::getEntity(), $userId);
        
        // Check if user is already verified
        if ($user->getVerified()) {
            // Redirect back to profile 
            header('Location: /PetHouse/user/profile');
            exit;
        }
        
        // Show verification form
        $view = new Vuser();
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
        $user = FpersistentManager::retriveObj(Muser::getEntity(), $userId);
        
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
            FpersistentManager::saveObj($document);
            
            // Associate document with verification
            $verification->addDocument($document);
            
            // Save the verification
            FpersistentManager::saveObj($verification);
            
            // Set user's verification status (the entity relation will be maintained)
            $user->setVerification($verification);
            FpersistentManager::saveObj($user);
            
            // Redirect 
            header('Location: /PetHouse/user/profile');
            exit;
        } else {
            header('Location: /PetHouse/user/askVerification');
            exit;
        }
    }
    public static function delete_post($id_post)
    {
        USession::getInstance();
        if (!USession::isSetSessionElement('user')) {
        header('Location: /PetHouse/User/login');
        exit;
        }
        FpersistentManager::deleteObj(FpersistentManager::retriveObj(Mpost::getEntity(), $id_post));
        header('Location: /PetHouse/User/myPost');
        exit;
    }
    public static function edit_post($id_post)
    {
        USession::getInstance();
        if (!USession::isSetSessionElement('user')) {
        header('Location: /PetHouse/User/login');
        exit;
}
        $view = new Vuser();
        $post = FpersistentManager::retriveObj(Mpost::getEntity(), $id_post);
        if (!$post) {
            require_once __DIR__ . '/../view/Verror.php';
             $viewErr = new Verror();
             $viewErr->show404();
             return;
}
        USession::getInstance();
        $id = USession::getSessionElement('user');
        $user = FpersistentManager::retriveObj(Muser::getEntity(), $id);
        $houses = $user->getHouses();
        $view->showeditform($post, $houses);
        
    }
    public static function savedit()
    {
        USession::getInstance();
        if (!USession::isSetSessionElement('user')) {
        header('Location: /PetHouse/User/login');
        exit;
}
            
            $idPosition   = UHTTPMethods::post('idPosition') ?? null;
            $moreInfo     = UHTTPMethods::post('moreInfo') ?? '';
            $price        = UHTTPMethods::post('price');
            $price = floatval(str_replace(',', '.', $price));
            $dateInStr    = UHTTPMethods::post('date_in') ?? ''; 
            $dateOutStr   = UHTTPMethods::post('date_out') ?? ''; 
            $acceptedPets = UHTTPMethods::post('accepted_pets') ?? []; 
            $petCounts    = UHTTPMethods::post('accepted_pet_counts') ?? [];
            $id_post = UHTTPMethods::post('post_id') ?? null;
            $post = FpersistentManager::retriveObj(Mpost::getEntity(), $id_post);
            $post->setMoreInfo($moreInfo);
            $post->setPrice($price);
            $post->setDateIn(new DateTime($dateInStr));
            $post->setDateOut(new DateTime($dateOutStr));
            $post->addAcceptedPets(array_combine($acceptedPets, $petCounts));
            $post->setHouse(FpersistentManager::retriveObj(Mposition::getEntity(), $idPosition));
            $check = FpersistentManager::saveObj($post);
            header('Location: /PetHouse/User/myPost');
            
            
    }
    public static function review()
    {
        USession::getInstance();
    if (!USession::isSetSessionElement('user')) {
    header('Location: /PetHouse/User/login');
    exit;
}
    // Ensure session is started
    Usession::getInstance();
    $id = Usession::getSessionElement('user');
    $user = FpersistentManager::retriveObj(Muser::getEntity(), $id);
    $reviews = $user->getReviewToMe();
        // Calculate average rating
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
    FpersistentManager::saveObj($user); 
    $view = new Vuser();
    $view->showReviews($reviewsArray, $average);
    
    }
    public static function yourpost($id)
    {
        Usession::getInstance();
        if (!USession::isSetSessionElement('user')) {
        header('Location: /PetHouse/User/login');
        exit;
        }
        Usession::getInstance();
        $post = FpersistentManager::retriveObj(Mpost::getEntity(), $id);
        if (!$post) {
            require_once __DIR__ . '/../view/Verror.php';
            $viewErr = new Verror();
            $viewErr->show404();
            return;
        }
        $view = new Vuser();
        $view->showPost($post);
    }
    public static function activeoffers()   
    {   Usession::getInstance();
        if (!USession::isSetSessionElement('user')) {
        header('Location: /PetHouse/User/login');
        exit;
        }
        Usession::getInstance();
        $id = Usession::getSessionElement('user');
        $user = FpersistentManager::retriveObj(Muser::getEntity(), $id);
        $offers = $user->getListOfOffers()->toArray();
        $offers = array_filter($offers, function($offer) {
            return $offer->getState() == stateoffer::ACCEPTED;
        });
        $view = new Vuser();
        $view->showActiveOffers($offers);
    }
    public static function activeposts()
    {
        USession::getInstance();
        if (!USession::isSetSessionElement('user')) {
         header('Location: /PetHouse/User/login');
        exit;
}
        Usession::getInstance();
        $id = Usession::getSessionElement('user');
        $user = FpersistentManager::retriveObj(Muser::getEntity(), $id);
        $post = $user->getMyPost();
        $post = array_filter($post->toArray(), callback: function($p) {
            return $p->getBooked() == 'booked';
        });
        $view = new Vuser();
        $view->showActivePosts($post); 
    }
    public static function editprofile()
    {
        Usession::getInstance();
        if (!USession::isSetSessionElement('user')) {
        header('Location: /PetHouse/User/login');
        exit;
}
        Usession::getInstance();
        $id = Usession::getSessionElement('user');
        $user = FpersistentManager::retriveObj(Muser::getEntity(), $id);
        $view = new Vuser();
        $view->showEditProfile($user);
    }
    public static function updateProfile()
    {
        USession::getInstance();
        if (!USession::isSetSessionElement('user')) {
         header('Location: /PetHouse/User/login');
         exit;
}
        Usession::getInstance();
        $id = Usession::getSessionElement('user');
        $user = FpersistentManager::retriveObj(Muser::getEntity(), $id);
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

            
            FpersistentManager::saveObj($foto); 
            $user->setProfilePicture($foto);
             // Associate the photo with the user
        }
        FpersistentManager::saveObj($user);
        header('Location: /PetHouse/user/profile');
    
}
}
