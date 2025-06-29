<?php
class Cfindhosting{
//________________________________cerca ospitalità______________________________________________________________________
    public static function startResearch()
    {
 
    }
    public static function searchHost()  //post request 
    {
        try {
            // Initialize variables with null/default values, pet's included
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
                    $datain = null;
                }
            }

            if (isset($_POST['dataout']) && !empty($_POST['dataout'])) {
                try {
                    $dataout = new DateTime(UHTTPMethods::post('dataout'));
                } catch (Exception $e) {
                    $dataout = null;
                }
            }

            // Handle pets - only process if the arrays exist and aren't empty
            if (isset($_POST['pets']) && is_array($_POST['pets']) && !empty($_POST['pets']) &&
                isset($_POST['pet_counts']) && is_array($_POST['pet_counts']) && !empty($_POST['pet_counts'])) { // Check if both arrays exist and are not empty

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

            // Add this validation before calling the filter method, so that end date cannot be before start date
            if ($datain && $dataout) {
                if ($dataout < $datain) {
                    $view = new Vfindhosting();
                    $view->showError('End date cannot be before start date. Please select valid dates.');
                    return [];
                }
            }

            // Call the search function with our parameters
            $startDate = $datain ? $datain->format('Y-m-d') : null;
            $endDate = $dataout ? $dataout->format('Y-m-d') : null;
            $result = FpersistentManager::filterPost( //call to the persistent manager
                $acceptedPets,
                $province, 
                $city,
                $startDate,
                $endDate
            );

            // Always assign posts as an array, even if empty
            if (!is_array($result)) {
                $result = [];
            }

            // Display results (always show the list, even if empty)
            $view = new Vfindhosting();
            $view->showPostList($result);

            return $result;
        } catch (Exception $e) {
            error_log("Search error: " . $e->getMessage());
            $view = new Vfindhosting();
            // Show the list as empty instead of error page
            $view->showPostList([]); //passes the parameter into the view function
            return [];
        }
    }
    public static function selectPost(int $id)
    {
        $post = FpersistentManager::retriveObj(Mpost::getEntity(),$id); //so that I get the id of the post from the query string of the url
         if (!$post) {
             require_once __DIR__ . '/../view/Verror.php';
            $view = new Verror(); //shows error 404 post not found
            $view->show404();
             return;
    }
        // Check if user came from search results and preserve search parameters
        $backUrl = '/PetHouse/';
        if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'searchHost') !== false) {
            $backUrl = $_SERVER['HTTP_REFERER'];
        }
        
        $view = new Vfindhosting();
        $view->showPost($post, $backUrl); //shows the post details and a back button to return to the search results
    }

    public static function bookPost(int $id) //shows a form to create an offer related to a post
 {  
    if (!Cuser::isLogged()) { //only works if user is logged in, if not it's redirected to the login page
        header('Location: /PetHouse/user/login');
        exit;
    }
    $post = FpersistentManager::retriveObj(Mpost::getEntity(),$id);
    if (!$post) {
        require_once __DIR__ . '/../view/Verror.php';
        $view = new Verror(); //if user delets the post while another user is trying to book it, shows post not found error
        $view->show404();
        return;
    }
    $view = new Vfindhosting();
    $view->showformOffer($post);  //finally shows the form to create an offer related to the post
}
    public static function createOffer($id_post) //function to actually create an offer related to a post, after the form is shown
    {   
        if(Cuser::isLogged()) //additional check to ensure user is logged in
        {
            try {
                Usession::getInstance();
                $id_user = USession::getSessionElement('user');
                
                //fetching arguments from post request
                $datein = new DateTime(UHTTPMethods::post('datein'));
                $dateout = new DateTime(UHTTPMethods::post('dateout'));
                
                // Validate dates
                if ($dateout <= $datein) {
                    USession::setSessionElement('error_message', 'End date must be after start date.');
                    header('Location: /PetHouse/findhosting/bookPost/' . $id_post);
                    exit;
                }
                
                $requiredPetss = UHTTPMethods::post('required_pets');
                $countPets = UHTTPMethods::post('required_pets_count');

                $requiredPets = array_combine($requiredPetss, $countPets);

                $client = FpersistentManager::retriveObj(Muser::getEntity(), $id_user); //fetch the user who is creating the offer
                $post = FpersistentManager::retriveObj(Mpost::getEntity(), $id_post); //fetch the post related to the offer
                
                // Validate dates against post availability, so tht the offer dates are within the post's available period
                if ($datein < $post->getDateIn() || $dateout > $post->getDateOut()) {
                    USession::setSessionElement('error_message', 'Selected dates are outside the available period for this post.');
                    header('Location: /PetHouse/findhosting/bookPost/' . $id_post);
                    exit;
                }
                
                // Validate pets against post accepted pets
                $postAcceptedPets = $post->getAcceptedPets();
                foreach ($requiredPets as $petType => $count) {
                    if (!isset($postAcceptedPets[$petType]) || $postAcceptedPets[$petType] < $count) {
                        USession::setSessionElement('error_message', 'Invalid pet selection. Please check available pets and quantities.');
                        header('Location: /PetHouse/findhosting/bookPost/' . $id_post);
                        exit;
                    }
                }
                
                $offer = new Moffer($datein,$dateout,$post,$requiredPets, $client);
                FpersistentManager::saveObj($offer);
                
                // Set success message and redirects to review/deals
               
                header('Location: /PetHouse/review/deals/' );
                exit;
                
            } catch (Exception $e) { //gives error if something goes wrong, like database connection or validation errors
                error_log("Offer creation error: " . $e->getMessage());
                USession::setSessionElement('error_message', 'An error occurred while submitting your offer. Please try again.');
                header('Location: /PetHouse/findhosting/bookPost/' . $id_post);
                exit;
            }
        }
        else{
            header('Location: /PetHouse/user/login');
            exit;
        }
    }
    public static function viewprofile($id_user) //shows the profile of a user, given the id_user, whothout having the costraint of being logged in
    {
        $user = FpersistentManager::retriveObj(Muser::getEntity(),$id_user);
        if (!$user) {
            require_once __DIR__ . '/../view/Verror.php';
            $view = new Verror();
            $view->show404();
            return;
        }
        // Ensure session is started before checking
        if (USession::getSessionStatus() == PHP_SESSION_NONE) {
            USession::getInstance();
        }
        $loggedUser = USession::isSetSessionElement('user') && USession::getSessionElement('user') !== null;
        $view = new Vfindhosting();
        $view->showforeignprofile($user, $loggedUser);
    }





}

?>