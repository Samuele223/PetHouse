<?php
class CReview
{
public static function Deals()
{if (!USession::isSetSessionElement('user')) {
    header('Location: /PetHouse/User/login');
    exit;
}

    USession::getInstance();
    $id_user = USession::getSessionElement('user');
    $client = FPersistentManager::retriveObj(Muser::getEntity(), $id_user);
    $client_offers =$client->getListOfOffers();
    $client_posts = $client->getMyPost();
    $view = new VReview();
    $view->showDeals($client_offers, $client_posts);

}
public static function makereview($id_reviewed_or_id_post,$offer_or_post): void
{
    if (!USession::isSetSessionElement('user')) {
    header('Location: /PetHouse/User/login');
    exit;
}
    if($offer_or_post === 'offer') {
        $id_reviewed = $id_reviewed_or_id_post;
    } else {
        $post = FPersistentManager::retriveObj(Mpost::getEntity(), $id_reviewed_or_id_post);
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
    $user = FPersistentManager::retriveObj(Muser::getEntity(), $id_reviewed);
    if (!$user) {
        require_once __DIR__ . '/../view/Verror.php';
        $view = new Verror();
        $view->show404();
        return;
    }
    $view = new VReview();
    $view->showformreview($user);
}
public static function savereview($id_reviewed)
{
    if (!USession::isSetSessionElement('user')) {
    header('Location: /PetHouse/User/login');
    exit;
}
    USession::getInstance();
    $id_user = USession::getSessionElement('user');
    $reviewer = FPersistentManager::retriveObj(Muser::getEntity(), $id_user);
    $reviewed = FPersistentManager::retriveObj(Muser::getEntity(), $id_reviewed);
    if (!$reviewed) {
    require_once __DIR__ . '/../view/Verror.php';
    $viewErr = new Verror();
    $viewErr->show404();
    return;
}
    $view = new VReview();
    $rating = UHTTPMethods::post('rating');
    $ratingEnum = rating::from((string)$rating);

    $comment = UHTTPMethods::post('comment');
    $review = new Mreview($comment, $ratingEnum, $reviewer, $reviewed);
    FPersistentManager::saveObj($review);


    header('Location: /PetHouse/');
}
}