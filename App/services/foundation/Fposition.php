<?php
class Fposition{

/**
 * filterPositionByCity
 * @param string $city
 * @param string $province
 * @return array|null
 */
public static function filterPositionByCity(string $city,string $province): array|null
{
    $resultList = FEntityManager::getInstance()::getObjByTwoAttribute('Mposition', 'city', 'province', $city, $province);
    return $resultList;
}

/**
 * getFirstImageForPosition
 * @param int $positionId
 * @return int|null
 */
public static function getFirstImageForPosition(int $positionId): ?int {
    // Cerca direttamente nel database la prima foto associata alla posizione
    $conn = FEntityManager::getInstance()::getEntityManager()->getConnection();
    $sql = "SELECT id FROM photo WHERE id_Position = :positionId LIMIT 1";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':positionId', $positionId);
    $result = $stmt->executeQuery();
    
    $row = $result->fetchAssociative();
    return $row ? (int)$row['id'] : null;
}

}