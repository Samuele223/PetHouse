<?php
class Hosting{
//________________________________cerca ospitalità______________________________________________________________________
    public static function startResaerch()
    {
        $view = new Vhosting();
    }
    public static function  findHost(string $city,string $province, DateTime $datin, DateTime $dateout, Array $animals)
    {
        //$listOfHost = FPersistentManager::getObjbytwoattributes(Mpost::getEntity(),'date_in','date_out',$); 
    }
    public function trovaPrenotazioniNelRange(\DateTime $inizioInput, \DateTime $fineInput)
{
   
}

}

?>