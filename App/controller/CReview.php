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
public static function makereview($id_reviewed)
{
    $user = FPersistentManager::retriveObj(Muser::getEntity(), $id_reviewed);
    $view = new VReview();
    $view->showformreview($user);
}
public static function savereview($id_reviewed)
{
    USession::getInstance();
    $id_user = USession::getSessionElement('user');
    $reviewer = FPersistentManager::retriveObj(Muser::getEntity(), $id_user);
    $reviewed = FPersistentManager::retriveObj(Muser::getEntity(), $id_reviewed);
    $view = new VReview();
    $rating = UHTTPMethods::post('rating');
    $ratingEnum = rating::from((string)$rating);

    $comment = UHTTPMethods::post('comment');
    $review = new Mreview($comment, $ratingEnum, $reviewer, $reviewed);
    FPersistentManager::saveObj($review);


    header('Location: /PetHouse/');
}
}