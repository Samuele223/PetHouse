<?php
require_once __DIR__ . '/../../config/startsmarty.php';

class VAdmin {
    public $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    // Mostra il form di login admin
    public function showLoginForm($error = null) {
        if ($error) {
            $this->smarty->assign('error', $error);
        }
        $this->smarty->display('login_admin.tpl');
    }

    // Mostra la pagina di errore credenziali admin
    public function showInvalidCredentials($error = 'Credenziali non valide') {
        $this->smarty->assign('error', $error);
        $this->smarty->display('invalid_credentials_admin.tpl');
    }

    // Mostra la home dell'admin
    public function home($email = null) {
        $this->smarty->assign('isAdmin', true);
        if ($email) {
            $this->smarty->assign('username', $email);
        }
        $this->smarty->display('index.tpl');
    }


public function profile($admin)
{
    $this->smarty->assign('email', $admin->getEmail());
    // Aggiungi altri campi se servono
    $this->smarty->display('admin_profile.tpl');
}

public function showVerificationRequests($verifiche)
{
    $this->smarty->assign('verifiche', $verifiche);
    $this->smarty->display('list_of_users.tpl');
}


public function showUserProfileWithVerification($user, $verification)
{
    $this->smarty->assign('user', $user);
    $this->smarty->assign('verification', $verification);
    $this->smarty->display('user_profile_verification.tpl');
}
public function showReportedPosts($posts)
{
    $this->smarty->assign('posts', $posts);
    $this->smarty->display('list_of_reported_posts.tpl');
}

public function showReportedPostDetail($post)
{
    $this->smarty->assign('post', $post);
    $this->smarty->display('reported_post_detail.tpl');
}

public function showUserProfile($user,$postId = null)
{
    $this->smarty->assign('user', $user);
    $this->smarty->assign('name', $user->getName());
    $this->smarty->assign('surname', $user->getSurname());
    $this->smarty->assign('email', $user->getEmail());
    $pic = $user->getProfilePicture();
    $this->smarty->assign('pic', $pic ? $pic->getId() : 0);
    $this->smarty->assign('phone', $user->getTel());
        if ($postId) {
        $this->smarty->assign('postId', $postId);
    }

    $this->smarty->display('foreign_profile_admin.tpl');

}}