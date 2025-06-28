<?php
// src/Persistence/Freview.php


class Freview
{

      public function returnReviewsTOUser($userId): array|null{
        $result = FEntityManager::getInstance()->listOfObj(Mreview::getEntity(), 'ReviewToMe', $userId );

        return $result;
    }

}

        

    

   
