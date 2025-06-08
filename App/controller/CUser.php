<?php
require_once __DIR__ . '/../../bootstrap.php';
session_start();

// Always include the associated view
require_once __DIR__ . '/../view/VUser.php';

class CUser {

    private $em; // EntityManager instance
    private $view; // VUser view instance

    public function __construct($em) {
        $this->em = $em;
        $this->view = new VUser();
    }

    // User registration (handles POST data)
    public function register() {
        // Get input from POST, using null coalescing operator to prevent undefined index
        $name = $_POST['name'] ?? null;
        $surname  = $_POST['surname'] ?? null;
        $username  = $_POST['username'] ?? null;
        $email    = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $password = $_POST['password'] ?? null;
        echo "DEBUG - Password ricevuta dal form: '$password'<br>";
        if ($password !== null) {
        echo "DEBUG - lunghezza password: " . strlen($password) . "<br>";
        }
        

        // Basic validation: ensure all required fields are present
        if (!$name || !$surname || !$username || !$email || !$password) {
            $this->view->showRegisterForm('Please fill out all fields.');
            return;
        }

        // Check if email is already registered
        $userRepo = $this->em->getRepository(Muser::class);
        $existing = $userRepo->findOneBy(['email' => $email]);
        if ($existing) {
            $this->view->showRegisterForm('Email already registered.');
            return;
        }

        // Create new user entity and persist
        $user = new Muser($name, $surname, $username, $email);
        $user->setEmail($email);
        $user->setPassword($password); // <-- passa la password in chiaro
        echo "DEBUG: hash salvato: " . $user->getPassword() . "<br>";
        echo strlen($user->getPassword() ); // deve essere 60 per bcrypt

        $this->em->persist($user);
        $this->em->flush();

        // Show registration success page
        $this->view->registrationSuccess();
    }

    // User login (handles POST data)
    public function login() {
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;


        // Basic validation
        if (!$username || !$password) {
            $this->view->showLoginForm('Please enter your username and password.');
            return;
        }

        $userRepo = $this->em->getRepository(Muser::class);
        $user = $userRepo->findOneBy(['username' => $username]);


        /** debug
        **/
        if ($user) {
    echo "<pre>";
    echo "Username POST: " . $username . "\n";
    echo "Password POST: " . $password . "\n";
    echo "Username DB: " . $user->getUsername() . "\n";
    echo "Password DB: " . $user->getPassword() . "\n";
    var_dump(password_verify($password, $user->getPassword()));
    echo "DEBUG: hash salvato: " . $user->getPassword() . "<br>";
    echo strlen($user->getPassword() ); // deve essere 60 per bcrypt
    echo "</pre>";
    echo phpversion();
}

        // Check credentials
        if (!$user || !password_verify($password, $user->getPassword())) {
            $this->view->showLoginForm('Invalid credentials.');
            return;
        }

        // Login successful, set session variable
        $_SESSION['user_id'] = $user->getId();

        // Redirect to home/dashboard
        header('Location: /PetHouse/Home');
        exit;
    }

    // User logout
    public function logout() {
        session_destroy();
        // Show login form after logout, or a logout message
        $this->view->showLoginForm('Logout successful.');
    }

    /**
     * Check if the user is logged in (using session)
     * @return boolean
     */
    public static function isLogged() {
        $logged = false;

        if (UCookie::isSet('PHPSESSID')) {
            if (session_status() == PHP_SESSION_NONE) {
                USession::getInstance();
            }
        }
        // If not logged in, redirect to login
        if (!$logged) {
            header('Location: /PetHouse/User/login');
            exit;
        }
        return true;
    }
}
