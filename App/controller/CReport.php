<?php

class CReport {
    /**
     * This method is called when a user reports a Post
     * @param int $idPost Refers to the id of a post 
     */
    public static function reportPost($idPost) {
        if (CUser::isLogged()) {
            $idUser = USession::getInstance()->getSessionElement('user');
            $reporter = FPersistentManager::retriveObj(Muser::getEntity(), $idUser);

            $reportedPost = FPersistentManager::retriveObj(Mpost::getEntity(), $idPost);
            
            if ($reportedPost !== null) {
                try {
                    // Create a new report with the description from the form
                    $description = UHTTPMethods::post('description');
                    $report = new Mreport($description, $reporter, $reportedPost);
                    
                    // Save the report
                    FPersistentManager::saveObj($report);
                    
                    // Increment the post's report counter
                    $currentReports = $reportedPost->getNumReport() ?? 0;
                    $reportedPost->setNumReport($currentReports + 1);
                    FPersistentManager::saveObj($reportedPost);
                    
                    // Set success message and redirect
                    USession::getInstance();
                    USession::setSessionElement('success_message', 'Thank you for your report. We will review it shortly.');
                    
                    // Redirect back to the post view
                    header('Location: /PetHouse/Post/view/' . $idPost);
                    exit;
                } catch (Exception $e) {
                    // Log error
                    error_log("Error reporting post: " . $e->getMessage());
                    
                    // Set error message and redirect
                    USession::getInstance();
                    USession::setSessionElement('error_message', 'An error occurred while submitting your report. Please try again.');
                    header('Location: /PetHouse/Post/view/' . $idPost);
                    exit;
                }
            } else {
                // Post not found
                header('Location: /PetHouse/User/home');
                exit;
            }
        } else {
            // User is not logged in, redirect to register page
            header('Location: /PetHouse/User/login');
            exit;
        }
    }
    
    /**
     * Initial entry point for report functionality - checks login status
     * @param int $idPost Refers to the id of a post 
     */
    public static function makeReport($idPost) {
        // Direct session check without automatic redirect
        if (USession::getSessionStatus() == PHP_SESSION_NONE) {
            USession::getInstance();
        }
        
        // Simple check if user session exists
        if (isset($_SESSION['user'])) {
            // User is logged in, show report form
            $post = FPersistentManager::retriveObj(Mpost::getEntity(), $idPost);
            
            if (!$post) {
                // Post not found, redirect to home
                header('Location: /PetHouse/');
                exit;
            }
            
            // Show report form
            $view = new VReport();
            $view->showReportForm($post);
        } else {
            // User not logged in, redirect to login
            header('Location: /PetHouse/User/login');
            exit;
        }
    }
    
    // You can keep a simplified version as a fallback
    public static function showReportForm($idPost) {
        // Get the post
        $post = FPersistentManager::retriveObj(Mpost::getEntity(), $idPost);
        
        if (!$post) {
            header('Location: /PetHouse/');
            exit;
        }
        
        // Show the report form
        $view = new VReport();
        $view->showReportForm($post);
    }
}