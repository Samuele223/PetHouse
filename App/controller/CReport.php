<?php

class CReport{


    /**
    * this method is called when a user report a Post, si rubacchia di nuovo ad Agora, yeeee, anche se non ho ben capito come funziona il login
    * @param int $idPost Refers to the id of a post 
    */
    public static function reportPost($idPost){
        if(CUser::isLogged()){
            $idUser = USession::getInstance()->getSessionElement('user');
            $reporter = FPersistentManager::getInstance()->retriveObj(Muser::getEntity(), $idUser); //aggiunto in quanto nel nostro costruttore ci sta anche chi ha reportato il post (che non so se bisogna lascia o meno)

            $reportedPost = FPersistentManager::getInstance()->retriveObj(Mpost::getEntity(), $idPost);
            //cosa carina, qua si fa il controllo sull'id del post, che in verità a rigor di logica se sta nel db è sempre non nullo, però buh per sicurezza/robustezza è consigliato, metti che post viene cancellato ma non si aggiorna o cazzi
            if($reportedPost !== null){
                //create a new Report Obj and persist it, sta cosa un paio di dubbi mi crea
                //UHTTPMethods::post('description') questa recuper comunque la descrizione del report inviato tramite un form html, che penso facciamo dopo,
                //e type invece recupera il tipo di report (es. "spam", "offensivo", "altro") da una selezione o tipo input utente, non so se lo vogliamo implementare pure o lasciamo solo la descrizione, se è bisogna aggiungere il campo
                //type dentro al nostro report, scherzone alla fine l'ho direttamente tolto
                $report = new Mreport(UHTTPMethods::post('description'), $reporter, $reportedPost);
                $report->setPost($reportedPost); //messa dentro a Mreport sta funzione, scritto anche la cose
                FPersistentManager::getInstance()->saveObj($report);
                header('Location: /PetHouse/Post/visit/' . $idPost); //poi volendo la possiamo modificare, è la url, ho lasciato così, l’importante è che il percorso corrisponda a una route effettiva della applicazione (gestita dal router, che non so che sia, o dal controller giusto)
            }else{
                header('Location: /PetHouse/User/home');
            }
        }  
    }
}