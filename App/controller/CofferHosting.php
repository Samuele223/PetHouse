<?php
class CofferHosting{

//________________________________offer hosting______________________________________________________________________

//mo faccio i commenti in inglese quindi preparatevi per delle belle perle

// Start the hosting process
    public static function startHostingProcess() {
        if (CUser::isLogged()) {
            $idUser = USession::getInstance()->getSessionElement('user'); //checking if user is logged, the same as agora (ma va che bello scriverlo in inglese scopiazziamo tutto sehhh)

            $view = new VselectHouse();
            
        }
    }

    // Step 2: Called when the user selects a location to host from (triggered from the view)
    public static function preparePostCreation(int $idPosition) {
        if (CUser::isLogged()) {
            $idUser = USession::getInstance()->getSessionElement('user'); //always checks if the user is logged or not

            $position = FPersistentManager::retriveObj(MPosition::getEntity(), $idPosition);

            if ($position && $position->getOwner()->getId() === $idUser) { //double chek, the first one is to check if the poision (location) is not null and the second one is to check if it is associated with the user
                $view = new VCreatePost();
                $view->showPostForm($position); // shows the actual form to create post, and the user will then input the data, still to be implemented perchè siamo lenti e le view non siamo capaci
            } else {
                echo "Unauthorized or invalid selected location, please try again.";
            }
        }
    }

    // Actually create the post after form submission and the data collection
    public static function createPost(string $title, string $desc, string $moreInfo, float $price, DateTime $dataIn, DateTime $dataOut, array $acceptedPets, int $idPosition) {
        if (CUser::isLogged()) {
            $idUser = USession::getInstance()->getSessionElement('user');

            $position = FPersistentManager::retriveObj(MPosition::getEntity(), $idPosition);

            if ($position && $position->getOwner()->getId() === $idUser) {
                $post = new Mpost();
                $post->setTitle($title);
                $post->setDesc($desc);
                $post->setMoreInfo($moreInfo);
                $post->setPrice($price);
                $post->setDateIn($dataIn);
                $post->setDateOut($dataOut);
                $post->addAcceptedPets($acceptedPets);
                $post->setHouse($position);
                $post->setSeller($position->getOwner());
                $post->setBooked(false);

                FPersistentManager::saveObj($post);

                $view = new VCreatePost();
                $view->showPostSummary($post); //still to be implemented in the view
            } else {
                echo "Invalid selected location or logged in error."; //boh non so che scrive = I don't know what to write
            }
        }
    }

}
?>
























}

