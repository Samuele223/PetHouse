<?php
require_once __DIR__ . '/../../config/startsmarty.php';

// VUser.php
class VUser {
    private $smarty;
    public function __construct(){
        // You can customize Smarty configuration here (e.g., singleton StartSmarty)
        $this->smarty = StartSmarty::configuration();
    }

    // Show the registration form
    public function showRegisterForm($error = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->display('register.tpl');
    }

    // Show the login form
    public function showLoginForm($error = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->display('register.tpl');
    }

    // Show a page after successful registration
    public function registrationSuccess() {
        $this->smarty->display('registration_success.tpl');
    }
    public function home($username){
    if($username){
    $this->smarty->assign('username', $username);
    $this->smarty->display('index.tpl');
    }
    else
    {
        $this->smarty->display('index.tpl');
    }
}
public function profile($user, $picid, $successMessage = null)
    {
        $this->smarty->assign('name', $user->getName());
        $this->smarty->assign('surname', $user->getsurname());
        $this->smarty->assign('email', $user->getemail());
        $this->smarty->assign('pic', $picid);
        
        if ($successMessage) {
            $this->smarty->assign('success_message', $successMessage);
        }
        
        $this->smarty->display('user-profile.tpl');
    }
  
public function showInvalidCredentials($error = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->display('invalid_credentials.tpl');   
}
public function showHomeForm($error = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->display('houseform.tpl');
    }

public function showUserPosts($posts) {
        $this->smarty->assign('posts', $posts);
        $this->smarty->display('user_posts.tpl');}

public function showUserHouses($houses) {
    $this->smarty->assign('houses', $houses);
    $this->smarty->display('user-properties.tpl');}

public function showUserHousesDetails($house) {
    $this->smarty->assign('photos', $house->getPhotos());
    $this->smarty->assign('house', $house);
    $this->smarty->display('house_detail.tpl');
}
public function showUserHousesEdit($house) {
    $this->smarty->assign('photos', $house->getPhotos());
    $this->smarty->assign('house', $house);
    $this->smarty->display('house_edit.tpl');

<<<<<<< HEAD



    }}
=======
/**
 * Shows the verification form
 */
public function showVerificationForm($user) {
    $this->smarty->assign('user', $user);
    $this->smarty->display('formVerification.tpl');
}
    }
>>>>>>> f0172aefeb0ec320fdde0c23c24569f817350e86
