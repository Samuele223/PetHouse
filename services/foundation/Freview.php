<?php
// src/Persistence/Freview.php


class Freview
{
    /**
     * Qua prende e returna una lita di review A un utente, che c'ha senso no (prima prendo la singola e mo tutte)
     * come parametri prendo lo userId, mi chiamo una review, dal campo della entità review che ha, vedo la parte relativa a
     * review to me e ci schiaffo lo userid
     */
      public function returnReviewsTOUser($userId){
        $result = FEntityManager::getInstance()->listOfObj(Mreview::getEntity(), 'ReviewToMe', $userId );

        return $result;
    }

}

        

    

   
