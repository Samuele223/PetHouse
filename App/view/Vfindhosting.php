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
public function showPost($post)
{
    $this->smarty->assign('photos', $post->getHouse()->getPhotos());
    $this->smarty->assign('post',$post);
    $this->smarty->display('Post_detail.tpl');
}
public function showFormOffer($post)
{
    $this->smarty->assign('post', $post);
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
}
?>