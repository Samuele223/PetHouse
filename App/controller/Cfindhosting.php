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
        // oppure usare filter post

        return $result; 
    }
    public static function selectPost(int $id)
    {
        $post = FPersistentManager::retriveObj(Mpost::getEntity(),$id);
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

    private static function bookPost(int $id)
    {
        $post = FPersistentManager::retriveObj(Mpost::getEntity(),$id);
        if ($post->getBooked == 0 )
        {
            //richiamo la view per il form di crazione di una proposta
        }
        else
        {
            return 'post already booked';
        }    
    }
    public static function createOffer(DateTime $datein, DateTime $dateout,array $requiredPets, Mpost $post, int $postId)
    {
        $post = FPersistentManager::retriveObj(Mpost::getEntity(), $postId);
        $offer = new Moffer($datein,$dateout,$post,$requiredPets);
        FPersistentManager::saveObj($offer);
        //show riepilogo
    }
   


}

?>