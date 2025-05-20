<?php
class Fposition{

/**
 * filterPositionByCity
 * @param string $city
 * @param string $province
 * @return array|null
 */
public static function filterPositionByCity(string $city,string $province)
{
    $resultList = FEntityManager::getInstance()::getObjByTwoAttribute('Mposition', 'city', 'province', $city, $province);
    return $resultList;
}

} 