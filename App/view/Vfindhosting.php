<?php

require_once __DIR__ . '/../../config/startsmarty.php';
class Vfindhosting{

private $smarty;
    public function __construct(){
        
        $this->smarty = StartSmarty::configuration();
    }
public function showPosts()
{

}
public function showForm()
{
    $this->smarty->display('searchForm.tpl');
}
}
?>