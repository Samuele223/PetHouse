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
    $this->smarty->display('.tpl');
}

}
?>