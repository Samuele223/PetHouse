<?php

require_once __DIR__ . '/../../model/Muser.php';  

class Fuser{
    public static function getUserByUsername($username): object|null{

        $result = FentityManager::getInstance()->retrieveObjNotOnId(Muser::getEntity(), 'username', $username);



        return $result;
    }




    public static function loadVerifiedUsers(): array|null{


        $result = FentityManager::getInstance()->listOfObj(Muser::getEntity(), 'verified', '1');

        return $result;
    }

      public static function verify($field, $value){
        return FentityManager::getInstance()->verifyAttributes(Muser::getEntity(), $field, $value);
    }
    /**
     * getHousesFromUser
     * English: Retrieve all Position (house) entities owned by the given user.
     *
     * @param int $userId  ID of the user whose houses we want to load
     * @return Mposition[]|null  Array of Mposition objects, or null if none found
     */
    public static function getHousesFromUser(int $userId): ?array {
        // Adjust the field name 'owner_id' if your DB uses a different FK column 
        $positions = FentityManager::getInstance()
            ->listOfObj(Mposition::getEntity(), 'owner', $userId);

        return $positions;
    }

}