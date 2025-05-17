<?php
// src/Persistence/Freport.php

use Doctrine\ORM\EntityManagerInterface;

class Freport
{

    /**
     * Mi pijo il report singolo dall'id del report stesso, PENSO può esse utile
     */
    public static function retrieveById(int $id){
       
        $result = FEntityManager::getInstance()->retriveObj(Mreport::getEntity(), $id);
        return $result;
    }

    /**
     * qua na bella funzione, ti lista tutti i post che hanno ALMENO un report, pensavo per gli admin che vanno alla sezione
     * dei post segnalati, non me ne tiene a fare la if, che è nel caso esiste un solo post con dei reports
     */

     public static function listReportedPost(){
        $result = FEntityManager::getInstance()->listOfObj(Mpost::getEntity(), 'Num_Report', $field=null );
        return $result;
     }




    // scopiazzata popo da agora pesante, elimina tutti i report va che bello, da rivedere/testare
    public static function deleteReports($id, $field = null){
        if($field === null){
            $report = FEntityManager::getInstance()->retriveObj(Mreport::getEntity(), $id);
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

