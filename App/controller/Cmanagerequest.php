<?php

class CManagerequest
{

    public static function viewoffers(int $post_id) 
    {
        if(CUser::isLogged()){
        $view = new Vmanagerequest();
        $postSelected = FPersistentManager::retriveObj(Mpost::getEntity(),$post_id);
        if (!$postSelected) {
            require_once __DIR__ . '/../view/Verror.php';
            $viewErr = new Verror();
            $viewErr->show404();
            return;
        }
        $listOfOffer = $postSelected->getOffers();

        // Filtro solo le offerte con stato 'pending'
        $pendingOffers = [];
        foreach ($listOfOffer as $offer) {
            if ($offer->getState()->value === 'pending')
                {
                $pendingOffers[] = $offer;
                }
        }

        $view->showOffers($pendingOffers); // mostra solo offerte pending
        }
        
    }
    /*public static function selectOffer(int $offer_id)
    {
        if(CUser::isLogged()){
        
            $view = new Vmanagerequest();
            $offer = FPersistentManager::retriveObj(Moffer::getEntity(),$offer_id);
            $view->showOffer($offer);
        }

    }*/
    public static function accept_Deny_Offer(int $offer_id, int $yesorno) //get request

    {
        if(CUser::isLogged()){
            $offer = FPersistentManager::retriveObj(Moffer::getEntity(), $offer_id);
                if (!$offer) {
        require_once __DIR__ . '/../view/Verror.php';
        $viewErr = new Verror();
        $viewErr->show404();
        return;
    }
            if($yesorno == 1)
            {
                $post = $offer->getPost();
                $offer->acceptOffer();
                $post->setBooked('booked');
                FPersistentManager::saveObj($offer);     
                FPersistentManager::saveObj($post); //salva il post aggiornato
                header('location: /PetHouse/user/profile'); //reindirizza alla pagina del profilo dell'utente
            }
            else
            {
                $offer->denyOffer();
                FPersistentManager::saveObj($offer);
                header('location: /PetHouse/managerequest/viewoffers/' . $offer->getPost()->getId());
            } 
        }
    }
}