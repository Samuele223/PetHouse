<?php
// VOfferHosting.php

require_once __DIR__ . '/../../config/startsmarty.php';

class VOfferHosting {

    private $smarty;

    public function __construct() {
        // Initialize Smarty
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * showPostForm
     * Display the form for creating a hosting offer, with the list of available positions.
     *
     * @param array $positions  Array of MPosition objects
     */
    public function showPostForm($positions, $error = null) {
        $this->smarty->assign('positions', $positions);
        
        if ($error) {
            $this->smarty->assign('error', $error);
        }
        
        // render the form template (to be created later)
        $this->smarty->display('offer_hosting.tpl');
    }

    /**
     * showPostFormError
     * Re-display the form with an error message and the same positions list.
     *
     * @param string $error      Error message to display
     * @param array  $positions  Array of MPosition objects
     */
    public function showPostFormError($error, $positions, $selectedPosition = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->assign('positions', $positions);
        
        if ($selectedPosition) {
            $this->smarty->assign('selectedPosition', $selectedPosition);
        }
        
        // render the same form template, now showing the error
        $this->smarty->display('offer_hosting.tpl');
    }

    /**
     * showPostSummary
     * Display a summary page after successfully creating an offer.
     *
     * @param Mpost $post  The newly created hosting post
     */
    public function showPostSummary($post) {
        // assign the post object to the template
        $this->smarty->assign('post', $post);
        // render the summary template (to be created later)
        $this->smarty->display('offer_hosting_summary.tpl');
    }

}
