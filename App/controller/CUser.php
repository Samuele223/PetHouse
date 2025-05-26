<?php
require_once __DIR__ . '/../../bootstrap.php';
session_start();

class CUser {

    private $em; //entitymanager

    public function __construct($em) {
        $this->em = $em;
    }

    public function register($username, $name, $surname, $email, $password) {
        $userRepo = $this->em->getRepository(Muser::class);
        $existing = $userRepo->findOneBy(['email' => $email]);
        if ($existing) {
            echo "Email già registrata.";
            return;
        }

        $user = new Muser($username, $name, $surname, $email);
        $user->setEmail($email);
        $user->setPassword($password);
        
        $this->em->persist($user);
        $this->em->flush();
        
        echo "Registrazione completata.";
    }

    public function login($username, $password) {
        $userRepo = $this->em->getRepository(Muser::class);
        $user = $userRepo->findOneBy(['username' => $username]);

        if (!$user || !password_verify($password, $user->getPassword())) {
            echo "Credenziali non valide.";
            return;
        }

        $_SESSION['user_id'] = $user->getId();
        echo "Login effettuato.";
    }

    public function logout() {
        session_destroy();
        echo "Logout effettuato.";
    }

    /**
     * check if the user is logged (using session), preso sempre da Agora, mancava sta funzione 
     * @return boolean
     */
    public static function isLogged()
    {
        $logged = false;

        if(UCookie::isSet('PHPSESSID')){
            if(session_status() == PHP_SESSION_NONE){
                USession::getInstance();
            }
        }

        if(!$logged){
            header('Location: /Agora/User/login');
            exit;
        }
        return true;
    }

}
