<?php

class Cmanagerequest
{

    public static function viewoffers(int $post_id) 
    {
        if(Cuser::isLogged()){
        $view = new Vmanagerequest();
        $postSelected = FpersistentManager::retriveObj(Mpost::getEntity(),$post_id);
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
        if(Cuser::isLogged()){
        
            $view = new Vmanagerequest();
            $offer = FpersistentManager::retriveObj(Moffer::getEntity(),$offer_id);
            $view->showOffer($offer);
        }

    }*/
    public static function accept_Deny_Offer(int $offer_id, int $yesorno) //get request

    {
        if(Cuser::isLogged()){
            $offer = FpersistentManager::retriveObj(Moffer::getEntity(), $offer_id);
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
                FpersistentManager::saveObj($offer);     
                FpersistentManager::saveObj($post); //salva il post aggiornato
                header('location: /PetHouse/user/profile'); //reindirizza alla pagina del profilo dell'utente
            }
            else
            {
                $offer->denyOffer();
                FpersistentManager::saveObj($offer);
                header('location: /PetHouse/managerequest/viewoffers/' . $offer->getPost()->getId());
            } 
        }
    }
}