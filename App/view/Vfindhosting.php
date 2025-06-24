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
    $this->smarty->display('.tpl'); //da fare   aaaaa
}
public function showPost($post)
{
    $this->smarty->assign('photos', $post->getHouse()->getPhotos());
    $this->smarty->assign('post',$post);
    //$this->smarty->assign('description', $post->getDescription());
    //$this->smarty->assign('price', $post->getPrice());
    //$this->smarty->assign('datein', $post->getDateIn()->format('Y-m-d'));
    //$this->smarty->assign('dateout', $post->getDateOut()->format('Y-m-d'));
    //$this->smarty->assign('seller', $post->getSeller()->getUsername());
    //$this->smarty->assign('acceptedPets', $post->getAcceptedPets());
    //$this->smarty->assign('moreinfo', $post->getMoreInfo());
    //$this->smarty->assign('title', $post->getTitle());
    $this->smarty->display('Post_detail.tpl');
}
}
?>