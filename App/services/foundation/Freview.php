<?php
// src/Persistence/Freview.php


class Freview
{

      public function returnReviewsTOUser($userId): array|null{
        $result = FentityManager::getInstance()->listOfObj(Mreview::getEntity(), 'ReviewToMe', $userId );

        return $result;
    }

}

        

    

   
