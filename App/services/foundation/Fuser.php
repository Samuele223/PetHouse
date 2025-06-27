<?php

require_once __DIR__ . '/../../model/Muser.php';  

class FUser{
    public static function getUserByUsername($username): object|null{

        $result = FEntityManager::getInstance()->retrieveObjNotOnId(Muser::getEntity(), 'username', $username);



        return $result;
    }



    // immagino che sono verified perchè hanno la value impostata a 1

    public static function loadVerifiedUsers(): array|null{


        $result = FEntityManager::getInstance()->listOfObj(Muser::getEntity(), 'verified', '1');

        return $result;
    }

      public static function verify($field, $value){
        return FEntityManager::getInstance()->verifyAttributes(MUser::getEntity(), $field, $value);
    }
    /**
     * getHousesFromUser
     * English: Retrieve all Position (house) entities owned by the given user.
     *
     * @param int $userId  ID of the user whose houses we want to load
     * @return MPosition[]|null  Array of MPosition objects, or null if none found
     */
    public static function getHousesFromUser(int $userId): ?array {
        // Adjust the field name 'owner_id' if your DB uses a different FK column lmao chat gippitti
        $positions = FEntityManager::getInstance()
            ->listOfObj(MPosition::getEntity(), 'owner', $userId);

        return $positions;
    }

}