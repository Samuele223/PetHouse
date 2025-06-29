<?php
// src/Persistence/Freport.php
class Freport
{


     public static function listReportedPost(): array|null{
        $result = FentityManager::getInstance()->listOfObj(Mpost::getEntity(), 'Num_Report', $field=null );
        return $result;
     }


    public static function deleteReports($id, $field = null): bool{
        if($field === null){
            $report = FentityManager::getInstance()->retrieveObj(Mreport::getEntity(), $id);
            $del = FentityManager::getInstance()->deleteObj($report);
            return $del;
        }else{
            $reportlist = FentityManager::getInstance()->listOfObj(Mreport::getEntity(), $field, $id);
            foreach($reportlist as $r){
                FentityManager::getInstance()->deleteObj($r);
            }
            return true;
        }
    }

   

}

