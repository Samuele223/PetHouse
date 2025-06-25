<?php
class CFindhosting{
//________________________________cerca ospitalità______________________________________________________________________
    public static function startResearch()
    {
 
    }
    public static function searchHost()  //post  request 
    {

        //fetching arguments from postrequest
        $City = UHTTPMethods::post('city');
        $province = UHTTPMethods::post('province');
        $datain = new DateTime(UHTTPMethods::post('datain'));
        $dataout = new DateTime(UHTTPMethods::post('dataout'));
        $Pets = UHTTPMethods::post('pets');
        $num = UHTTPMethods::post('pet_counts');
        $acceptedPets = array_combine($Pets, $num);

        $result = FPersistentManager::filterPost($acceptedPets,$province, $City, $datain->format('Y-m-d'), $dataout->format('Y-m-d'));
        //$result = FPersistentManager::serachPost($City, $province, $datain, $dataout, $acceptedPets);
        $view = new Vfindhosting();
 
            $view->showPostList($result);
        
        // oppure usare filter post

        return $result; 
    }
    public static function selectPost(int $id)
    {
        $post = FPersistentManager::retriveObj(Mpost::getEntity(),$id); //cosi prendo dalla query string della url l' id del post
        $view = new Vfindhosting();
        $view->showPost($post);

    }

    public static function bookPost(int $id) //ritorna un form per la proposta relariva ad un post
    {

        $post = FPersistentManager::retriveObj(Mpost::getEntity(),$id);
        new Vfindhosting();
        $view = new Vfindhosting();
        $view->showFormOffer($post);  
    }
    public static function createOffer($id_post) //è una post  body json bisogna fare dei controlli alle date e qualcosina in javascript per tradurre i nomi dei pet
    {   
        if(CUser::isLogged())
        {
        Usession::getInstance();
        $id_user = USession::getSessionElement('user');
        //fetching arguments from post request
        $datein = new DateTime(UHTTPMethods::post('datein'));
        $dateout = new DateTime(UHTTPMethods::post('dateout'));
        
        
        $requiredPetss = UHTTPMethods::post('required_pets');
        $countPets = UHTTPMethods::post('required_pets_count');

        $requiredPets = array_combine($requiredPetss, $countPets);

        $client = FPersistentManager::retriveObj(Muser::getEntity(), $id_user);
        $post = FPersistentManager::retriveObj(Mpost::getEntity(), $id_post);
        $offer = new Moffer($datein,$dateout,$post,$requiredPets, $client);
        FPersistentManager::saveObj($offer);
        $view = new Vfindhosting();
        $view->showok();
        }
        else{
            header('Location: PetHouse/user/login');
        }
        //show riepilogo
    }
   


}

?>