<?php
// src/Persistence/Freport.php
class Freport
{


     public static function listReportedPost(): array|null{
        $result = FEntityManager::getInstance()->listOfObj(Mpost::getEntity(), 'Num_Report', $field=null );
        return $result;
     }


    public static function deleteReports($id, $field = null): bool{
        if($field === null){
            $report = FEntityManager::getInstance()->retrieveObj(Mreport::getEntity(), $id);
            $del = FEntityManager::getInstance()->deleteObj($report);
            return $del;
        }else{
            $reportlist = FEntityManager::getInstance()->listOfObj(Mreport::getEntity(), $field, $id);
            foreach($reportlist as $r){
                FEntityManager::getInstance()->deleteObj($r);
            }
            return true;
        }
    }

   

}

