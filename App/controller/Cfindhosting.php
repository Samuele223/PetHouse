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


        $result = FPersistentManager::serachPost($City, $province, $datain, $dataout, $acceptedPets);
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

    private static function bookPost(int $id) //ritorna un form per la proposta relariva ad un post
    {
        $post = FPersistentManager::retriveObj(Mpost::getEntity(),$id);
        if ($post->getBooked == 0 )
        {
            return new Vfindhosting();//richiamo la view per il form di crazione di una proposta
        }
        else
        {
            return 'post already booked';
        }    
    }
    public static function createOffer() //è una post  body json bisogna fare dei controlli alle date e qualcosina in javascript per tradurre i nomi dei pet
    {   
        if(CUser::isLogged())
        {
        //fetching arguments from post request
        $datein = new DateTime(UHTTPMethods::post('datein'));
        $dateout = new DateTime(UHTTPMethods::post('dateout'));
        $id_post = UHTTPMethods::post('id_post');
        $id_user = UHTTPMethods::post('id_user');
        $requiredPets = UHTTPMethods::post('required_pets');

        $user = FPersistentManager::retriveObj(Muser::getEntity(), $id_user);
        $post = FPersistentManager::retriveObj(Mpost::getEntity(), $id_post);
        $offer = new Moffer($datein,$dateout,$post,$requiredPets, $user);
        FPersistentManager::saveObj($offer);
        }
        //show riepilogo
    }
   


}

?>