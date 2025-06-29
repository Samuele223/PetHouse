<?php
class Creview
{
public static function Deals()

{
    USession::getInstance();
    if (!USession::isSetSessionElement('user')) {
    header('Location: /PetHouse/User/login');
    exit;
}

    USession::getInstance();
    $id_user = USession::getSessionElement('user');
    $client = FpersistentManager::retriveObj(Muser::getEntity(), $id_user);
    $client_offers =$client->getListOfOffers();
    $client_posts = $client->getMyPost();
    $view = new Vreview();
    $view->showDeals($client_offers, $client_posts);

}
public static function makereview($id_reviewed_or_id_post,$offer_or_post): void
{
    USession::getInstance();
    if (!USession::isSetSessionElement('user')) {
    header('Location: /PetHouse/User/login');
    exit;
}
    if($offer_or_post === 'offer') {
        $id_reviewed = $id_reviewed_or_id_post;
    } else {
        $post = FpersistentManager::retriveObj(Mpost::getEntity(), $id_reviewed_or_id_post);
        if (!$post) {
            require_once __DIR__ . '/../view/Verror.php';
            $view = new Verror();
            $view->show404();
            return;
        }
        $offers = $post->getOffers();
        Foreach($offers as $offer) {
            if($offer->getState() === stateoffer::FINISHED) {
                $id_reviewed = $offer->getClient()->getId();
                break;
            }   
        }        
        
    }
    $user = FpersistentManager::retriveObj(Muser::getEntity(), $id_reviewed);
    if (!$user) {
        require_once __DIR__ . '/../view/Verror.php';
        $view = new Verror();
        $view->show404();
        return;
    }
    $view = new Vreview();
    $view->showformreview($user);
}
public static function savereview($id_reviewed)
{
    USession::getInstance();
    if (!USession::isSetSessionElement('user')) {
    header('Location: /PetHouse/User/login');
    exit;
}
    USession::getInstance();
    $id_user = USession::getSessionElement('user');
    $reviewer = FpersistentManager::retriveObj(Muser::getEntity(), $id_user);
    $reviewed = FpersistentManager::retriveObj(Muser::getEntity(), $id_reviewed);
    if (!$reviewed) {
    require_once __DIR__ . '/../view/Verror.php';
    $viewErr = new Verror();
    $viewErr->show404();
    return;
}
    $view = new Vreview();
    $rating = UHTTPMethods::post('rating');
    $ratingEnum = rating::from((string)$rating);

    $comment = UHTTPMethods::post('comment');
    $review = new Mreview($comment, $ratingEnum, $reviewer, $reviewed);
    FpersistentManager::saveObj($review);


    header('Location: /PetHouse/');
}
}