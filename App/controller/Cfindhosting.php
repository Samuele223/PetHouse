<?php
class Hosting{
//________________________________cerca ospitalità______________________________________________________________________
    public static function startResaerch()
    {
        $view = new Vhosting();
    }
    public static function serachHOst(string $City, string $province, DateTime $datain, DateTime $dataout, array $acceptedPets)
    {
        $result = FPersistentManager::serachPost($City, $province, $datain, $dataout, $acceptedPets);
        //show result al posto di return $result

        return $result; 
    }


   


}

?>