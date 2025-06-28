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
public function profile($user, $picid )
    {
        $this->smarty->assign('name', $user->getName());
        $this->smarty->assign('surname', $user->getsurname());
        $this->smarty->assign('email', $user->getemail());
        $this->smarty->assign('pic', $picid);
        $this->smarty->assign('phone', $user->getTel());
        $this->smarty->assign('user', $user);
        $this->smarty->assign('avg',$user->getRating()); // Make user object available to template
        $this->smarty->display('user-profile.tpl');
    }
  
public function showInvalidCredentials($error = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->display('invalid_credentials.tpl');   
}
public function showHomeForm($error = null) {
    if ($error) {
        echo '<div class="alert alert-danger" style="margin:20px;">' . htmlspecialchars($error) . '</div>';
    }
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




    }
/**
 * Shows the verification form
 */
public function showVerificationForm($user) {
    $this->smarty->assign('user', $user);
    $this->smarty->display('formVerification.tpl');
}
public function showEditForm($post,$houses) {
    $this->smarty->assign('post', $post);
    $this->smarty->assign('positions', $houses);
    $this->smarty->display('edit_post.tpl');    
}
public function showReviews($reviews,$avg) {
    $this->smarty->assign('avg', $avg);
    $this->smarty->assign('reviews', $reviews);
    $this->smarty->display('user_reviews.tpl');
}
public function showPost($post) {
    $this->smarty->assign('post', $post);
    $this->smarty->assign('city', $post->getHouse()->getCity());
    $this->smarty->assign('address', $post->getHouse()->getAddress());
    $this->smarty->assign('province', $post->getHouse()->getProvince());
    $this->smarty->assign('photos', $post->getHouse()->getPhotos());
    $this->smarty->display('user_post_detail.tpl');
    
}
public function showActiveOffers($offers) {
    $this->smarty->assign('offers', $offers);
    $this->smarty->display('user_active_offers.tpl');
}
public function showActivePosts($posts) {
    $this->smarty->assign('posts', $posts);
    $this->smarty->display('user_active_posts.tpl');
}
public function showEditProfile($user) {
    $this->smarty->assign('user', $user);
    $this->smarty->display('edit_profile.tpl');
}
}