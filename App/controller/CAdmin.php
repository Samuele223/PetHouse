<?php

require_once __DIR__ . '/../../bootstrap.php';
require_once __DIR__ . '/../../config/autoloader.php';

class Cadmin
{
    public static function login() {
        $view = new Vadmin();

        // If admin is already logged in, redirect to home
        if (USession::isSetSessionElement('admin')) {
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
            $email = UHTTPMethods::post('email') ?? null;
            $password = UHTTPMethods::post('password') ?? null;

            if (!$email || !$password) {
                $view->showLoginForm('Please enter your email and password.');
                return;
            }

            $admin = FpersistentManager::getModByEmail($email);

            if (!$admin || !password_verify($password, $admin->getPassword())) {
                  $view->showInvalidCredentials();
                return;
            }


            if (USession::getSessionStatus() == PHP_SESSION_NONE) {
                USession::getInstance();
            }
            USession::setSessionElement('admin', $admin->getId());
            if (USession::isSetSessionElement('user')) {
            USession::unsetSessionElement('user');
}

            header('Location: /PetHouse/Admin/profile');
            exit;
        }
    }



    public static function logout() {
        USession::getInstance();
        USession::unsetSession();
        USession::destroySession();
        header('Location: /PetHouse/');
    }

public static function profile()
{
    
    USession::getInstance();
    if (!USession::isSetSessionElement('admin')) {
    header('Location: /PetHouse/Admin/login');
    exit;
}
    if (USession::getSessionStatus() == PHP_SESSION_NONE) {
        USession::getInstance();
    }
    $id = USession::getSessionElement('admin');
    if (!$id) {
        header('Location: /PetHouse/Admin/login');
        exit;
    }
    $admin = FpersistentManager::retriveObj(Madmin::getEntity(), $id);
    $view = new Vadmin();

    $view->profile($admin);
}
public static function listVerificationRequests()
{
    USession::getInstance();
    if (!USession::isSetSessionElement('admin')) {
    header('Location: /PetHouse/Admin/login');
    exit;
}
    $verifiche = FpersistentManager::getVerificationsPending(); 

    $view = new Vadmin();
    $view->showVerificationRequests($verifiche);
}

public static function userProfile($userId)
{
    USession::getInstance();
    if (!USession::isSetSessionElement('admin')) {
    header('Location: /PetHouse/Admin/login');
    exit;
}
    $user = FpersistentManager::retriveObj(Muser::getEntity(), $userId);
    if (!$user) {
        require_once __DIR__ . '/../view/Verror.php';
        $view = new Verror();
        $view->show404();
        return;
    }
    $verification = Fverification::getUserVerification($userId);
    $view = new Vadmin();
    $view->showUserProfileWithVerification($user, $verification);
}

public static function showuserProfile($userId)
{
    USession::getInstance();
    if (!USession::isSetSessionElement('admin')) {
    header('Location: /PetHouse/Admin/login');
    exit;
}
    $user = FpersistentManager::retriveObj(Muser::getEntity(), $userId);
    if (!$user) {
        require_once __DIR__ . '/../view/Verror.php';
        $view = new Verror();
        $view->show404();
        return;
    }
    $postId = isset($_GET['postId']) ? $_GET['postId'] : null;
    $view = new Vadmin();
    $view->showUserProfile($user, $postId);
}


public static function acceptVerification($verificationId)
{
    USession::getInstance();
    if (!USession::isSetSessionElement('admin')) {
    header('Location: /PetHouse/Admin/login');
    exit;
}
    Fverification::approveVerification($verificationId);
    header('Location: /PetHouse/Admin/listVerificationRequests');
    exit;
}


public static function rejectVerification($verificationId)
{
    USession::getInstance();
    if (!USession::isSetSessionElement('admin')) {
    header('Location: /PetHouse/Admin/login');
    exit;
}
    Fverification::rejectVerification($verificationId);
    header('Location: /PetHouse/Admin/listVerificationRequests');
    exit;
}
public static function listReportedPosts()
{
    USession::getInstance();
    if (!USession::isSetSessionElement('admin')) {
    header('Location: /PetHouse/Admin/login');
    exit;
}
    
    $posts = FpersistentManager::getReportedPosts();
    $view = new Vadmin();
    $view->showReportedPosts($posts);
}

public static function reportedPostDetail($postId)
{
    USession::getInstance();
    if (!USession::isSetSessionElement('admin')) {
    header('Location: /PetHouse/Admin/login');
    exit;
}
    $post = FpersistentManager::retriveObj(Mpost::getEntity(), $postId);
    if (!$post) {
        require_once __DIR__ . '/../view/Verror.php';
        $view = new Verror();
        $view->show404();
        return;
    }
    $view = new Vadmin();
    $view->showReportedPostDetail($post);
}

public static function approveReportedPost($postId)
{
    USession::getInstance();
    if (!USession::isSetSessionElement('admin')) {
    header('Location: /PetHouse/Admin/login');
    exit;
}
    FpersistentManager::resetPostReports($postId); 
    header('Location: /PetHouse/Admin/listReportedPosts');
    exit;
}

public static function deleteReportedPost($postId)
{
    USession::getInstance();
    if (!USession::isSetSessionElement('admin')) {
    header('Location: /PetHouse/Admin/login');
    exit;
}
    FpersistentManager::deletePost($postId); 
    header('Location: /PetHouse/Admin/listReportedPosts');
    exit;
}




}