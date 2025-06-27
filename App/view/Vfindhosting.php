<?php

require_once __DIR__ . '/../../config/startsmarty.php';
class Vfindhosting{

private $smarty;
    public function __construct(){
        
        $this->smarty = StartSmarty::configuration();
    }
public function showPostList($result)
{
    $this->smarty->assign('posts', $result);
    $this->smarty->display('Listofposts.tpl');
}
public function showForm()
{
    $this->smarty->display('searchForm.tpl');
}
public function noPostFound()
{
    $this->smarty->assign('message', 'No posts found for your search criteria.');
    $this->smarty->display('no_posts_found.tpl'); // Use an actual template name
}
public function showPost($post, $backUrl = '/PetHouse/')
{
    $this->smarty->assign('photos', $post->getHouse()->getPhotos());
    $this->smarty->assign('post',$post);
    $this->smarty->assign('owner', $post->getSeller());
    $this->smarty->assign('city', $post->getHouse()->getCity());
    $this->smarty->assign('address', $post->getHouse()->getAddress());
    $this->smarty->assign('province', $post->getHouse()->getProvince());
    $this->smarty->assign('backUrl', $backUrl);

    $this->smarty->display('Post_detail.tpl');
}
    public function showFormOffer($post)
    {
        $this->smarty->assign('post', $post);
        // Pass post start and end dates for JS validation
        $this->smarty->assign('post_start', $post->getDateIn()->format('Y-m-d'));
        $this->smarty->assign('post_end', $post->getDateOut()->format('Y-m-d'));
        // Pass accepted pets for JS validation
        $this->smarty->assign('accepted_pets', $post->getAcceptedPets());
        $this->smarty->display('formOffer.tpl');
    }
public function showok()
{
    $this->smarty->display('offer_created.tpl');
}
// Add an error method
public function showError($message)
{
    $this->smarty->assign('message', $message);
    $this->smarty->display('error.tpl'); 
}
public function showforeignprofile($user)
{
    $this->smarty->assign('user', $user);
    if ($user->getProfilePicture() === null) {
        $this->smarty->assign('pic', 0); // Use a default picture if none exists
    } else {
        $this->smarty->assign('pic', $user->getProfilePicture()->getId());
    }
    $this->smarty->assign('name', $user->getName());
    $this->smarty->assign('surname', $user->getSurname());
    $this->smarty->assign('email', $user->getEmail());
    $this->smarty->assign('phone', $user->getTel());
    // Se vuoi mostrare anche altre info, aggiungile qui
    $this->smarty->display('foreign-profile.tpl');
}
}
?>