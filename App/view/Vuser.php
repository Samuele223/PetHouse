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
        $this->smarty->display('login.tpl');
    }

    // Show a page after successful registration
    public function registrationSuccess() {
        $this->smarty->display('registration_success.tpl');
    }
}

