<?php
require_once __DIR__ . '/../../config/startsmarty.php';
class Vmanagerequest
{
    private $smarty;
    public  function __construct()
    {
        // You can customize Smarty configuration here (e.g., singleton StartSmarty)
        $this->smarty = StartSmarty::configuration();
    }
    public function showProfile(Muser $user)
    {

    }
    public function showListOfPost(array $listOfPosts)
    {

    }
    public function showOffers($offers)
    {
        // This method should display a list of offers related to a post
        // You can assign the offers to the Smarty template and display it
        $this->smarty->assign('offers', $offers);
        $this->smarty->display('list_of_offer.tpl');
    }
    public function showOffer($offer)
    {
        
    }
    public function showAcceptDenyOffer($yesorno)
    {
        // This method should display a message indicating whether the offer was accepted or denied
        if ($yesorno) {
            $this->smarty->assign('message', 'Offer accepted successfully.');
        } else {
            $this->smarty->assign('message', 'Offer denied successfully.');
        }
        $this->smarty->display('offer_response.tpl');
    }
}