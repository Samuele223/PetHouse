<?php
class Hosting{
//________________________________cerca ospitalità______________________________________________________________________
    public static function startResaerch()
    {
        $view = new Vfindhosting();
    }
    public static function searchHost()  //post  request could be implemented as a get 
    {
        //fetching arguments from postrequest
        $City = UHTTPMethods::post('city');
        $province = UHTTPMethods::post('province');
        $datain = new DateTime(UHTTPMethods::post('datain'));
        $dataout = new DateTime(UHTTPMethods::post('dataout'));
        $acceptedPets = UHTTPMethods::post('acceptedpet');


        $result = FPersistentManager::serachPost($City, $province, $datain, $dataout, $acceptedPets);
        //show result al posto di return $result
        // oppure usare filter post

        return $result; 
    }
    public static function selectPost(int $id)
    {
        $post = FPersistentManager::retriveObj(Mpost::getEntity(),$id); //cosi prendo dalla query string della url l' id del post
        $responseData = [
            'description' => $post->getDesc(),
            'acceptedPets' => [$post->getAcceptedPets()],
            'title' => $post->getTitle(),
            'price' => $post->getPrice(),
            'moreInfo' => $post->getMoreInfo(),
            'dataIn' => $post->getDateIn(),
            'dataOut' => $post->getDateOut(),
            'seller' => $post->getSeller()->getEmail(),
            'addres' => $post->getHouse()->getAddress(),
        ];
        return json_encode($responseData); //non so se ritorna un json da vedere
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
    public static function createOffer() //è una post   body json bisogna fare dei controlli alle date e qualcosina in javascript per tradurre i nomi dei pet
    {   
        if(CUser::isLogged())
        {
        //fetching arguments from post request
        $datein = new DateTime(UHTTPMethods::post('datain'));
        $dateout = new DateTime(UHTTPMethods::post('dateout'));
        $id_post = UHTTPMethods::post('id_post');
        $id_user = UHTTPMethods::post('id_user');
        $requiredPets = UHTTPMethods::post('requred_pets');

        $user = FPersistentManager::retriveObj(Muser::getEntity(), $id_user);
        $post = FPersistentManager::retriveObj(Mpost::getEntity(), $id_post);
        $offer = new Moffer($datein,$dateout,$post,$requiredPets, $user);
        FPersistentManager::saveObj($offer);
        }
        //show riepilogo
    }
   


}

?>