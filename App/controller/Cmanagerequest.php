<?

class Cmanagerequest
{
    public static function profile(int $id)
    {
        if(CUser::isLogged())
        {
            $profile = new Vmanagerequest();
            $userProfile = FPersistentManager::retriveObj(Muser::getEntity(), $id);
            $profile->showProfile($userProfile);
        }
        else{} 
            //show login form to be implemented on a view
    }
    public static function yourPosts(int $user_id)
    {
        if(CUser::isLogged())
        {
            $listOfPost = FPersistentManager::listOfObj(Mpost::getEntity(),'selller',$user_id);
            $view = new Vmanagerequest();
            $view->showListOfPost($listOfPost);
            
        }
        
    }
    public static function selectPost(int $post_id) 
    {
        $view = new Vmanagerequest();
        $postSelected = FPersistentManager::retriveObj(Mpost::getEntity(),$post_id);
        $listOfOffer = $postSelected->getOffers();
        $view->showOffers($listOfOffer); //mostra una lista di offerte relative al post

    }
    public static function selectOffer(int $offer_id)
    {
        $view = new Vmanagerequest();
        $offer = FPersistentManager::retriveObj(Moffer::getEntity(),$offer_id);
        $view->showOffer($offer);

    }
    public static function acceptOffer()
    {
        
    }
}