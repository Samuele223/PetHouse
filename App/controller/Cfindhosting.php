<?php
class CFindhosting{
//________________________________cerca ospitalità______________________________________________________________________
    public static function startResearch()
    {
 
    }
    public static function searchHost()  //post request 
    {
        try {
            // Initialize variables with null/default values
            $city = null;
            $province = null;
            $datain = null;
            $dataout = null;
            $acceptedPets = [];
            
            // Get inputs only if they exist and aren't empty
            if (isset($_POST['city']) && !empty($_POST['city'])) {
                $city = UHTTPMethods::post('city');
            }
            
            if (isset($_POST['province']) && !empty($_POST['province'])) {
                $province = UHTTPMethods::post('province');
            }
            
            // Handle dates - only create DateTime objects if values are provided
            if (isset($_POST['datain']) && !empty($_POST['datain'])) {
                try {
                    $datain = new DateTime(UHTTPMethods::post('datain'));
                } catch (Exception $e) {
                    // If date parsing fails, leave as null
                    $datain = null;
                }
            }
            
            if (isset($_POST['dataout']) && !empty($_POST['dataout'])) {
                try {
                    $dataout = new DateTime(UHTTPMethods::post('dataout'));
                } catch (Exception $e) {
                    // If date parsing fails, leave as null
                    $dataout = null;
                }
            }
            
            // Handle pets - only process if the arrays exist and aren't empty
            if (isset($_POST['pets']) && is_array($_POST['pets']) && !empty($_POST['pets']) &&
                isset($_POST['pet_counts']) && is_array($_POST['pet_counts']) && !empty($_POST['pet_counts'])) {
                
                $pets = UHTTPMethods::post('pets');
                $counts = UHTTPMethods::post('pet_counts');
                
                // Filter out empty values
                $filteredPets = [];
                $filteredCounts = [];
                
                foreach ($pets as $index => $pet) {
                    if (!empty($pet) && isset($counts[$index]) && is_numeric($counts[$index]) && $counts[$index] > 0) {
                        $filteredPets[] = $pet;
                        $filteredCounts[] = $counts[$index];
                    }
                }
                
                // Only combine if we have valid entries
                if (!empty($filteredPets) && !empty($filteredCounts)) {
                    $acceptedPets = array_combine($filteredPets, $filteredCounts);
                }
            }
            
            // Add this validation before calling the filter method
            if ($datain && $dataout) {
                // No need to create new DateTime objects - $datain and $dataout are already DateTime objects
                // Ensure end date is not before start date
                if ($dataout < $datain) {
                    $view = new Vfindhosting();
                    $view->showError('End date cannot be before start date. Please select valid dates.');
                    return [];
                }
            }
            
            // Call the search function with our parameters
            $startDate = $datain ? $datain->format('Y-m-d') : null;
            $endDate = $dataout ? $dataout->format('Y-m-d') : null;
            $result = FPersistentManager::filterPost(
                $acceptedPets,
                $province, 
                $city,
                $startDate,
                $endDate
            );
            
            // Display results
            $view = new Vfindhosting();
            if (empty($result)) {
                $view->noPostFound();
            } else {
                $view->showPostList($result);
            }
            
            return $result;
        } catch (Exception $e) {
            // Log the error
            error_log("Search error: " . $e->getMessage());
            
            // Show a user-friendly error
            $view = new Vfindhosting();
            $view->showError("Sorry, we encountered an error while searching. Please try again.");
            return [];
        }
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
    public static function viewprofile($id_user)
    {
        if(CUser::isLogged())
        {
            
            $user = FPersistentManager::retriveObj(Muser::getEntity(),$id_user);
            $view = new Vfindhosting();
            $view->showforeignprofile($user);
        }
        else{
            header('Location: PetHouse/user/login');
        }
    }



}

?>