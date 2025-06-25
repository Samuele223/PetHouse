<?php
class CReview
{
public static function Deals()
{

    USession::getInstance();
    $id_user = USession::getSessionElement('user');
    $client = FPersistentManager::retriveObj(Muser::getEntity(), $id_user);
    $client_offers =$client->getListOfOffers();
    $client_posts = $client->getMyPost();
    $view = new VReview();
    $view->showDeals($client_offers, $client_posts);

}
}