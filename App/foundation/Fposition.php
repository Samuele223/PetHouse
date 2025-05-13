<?php
class Fposition{
public static function filterPositionByCity($city,$province)
{
    $resultList = FEntityManager::getInstance()::getObjByTwoAttribute('Mposition', 'city', 'province', $city, $province);
    return $resultList;
}

} 