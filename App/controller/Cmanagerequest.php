<?php

class CManagerequest
{

    public static function viewoffers(int $post_id) 
    {
        if(CUser::isLogged()){
        $view = new Vmanagerequest();
        $postSelected = FPersistentManager::retriveObj(Mpost::getEntity(),$post_id);
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
            if($yesorno == 1)
            {
                $offer->acceptOffer();
                $offer->getPost()->setBooked('booked');
            }
            else
            {
                $offer->denyOffer();
            }
            FPersistentManager::saveObj($offer);
            $view = new Vmanagerequest();
            $view->showAcceptDenyOffer($yesorno); //mostra una schermata che dice bravo hai accettato o rifiutato
        }
    }
}