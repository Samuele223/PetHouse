<?php
require_once __DIR__ . '/../../config/startsmarty.php';
class Vreview
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }
    public function showDeals($client_offers, $client_posts)
    {
        $this->smarty->assign('offers', $client_offers);
        $this->smarty->assign('posts', $client_posts);
        //$this->smarty->assign('client_posts', $client_posts);
        $this->smarty->display('history_of_offer.tpl');
    }
    public function showformreview($user)
    {
        $this->smarty->assign('user_id', $user->getId());
        $this->smarty->assign('user', $user);
        $this->smarty->display('form_rev.tpl');
    }


}