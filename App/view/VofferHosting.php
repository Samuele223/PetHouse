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
    public function showPostForm(array $positions) {
        // assign the list of positions and clear any previous error
        $this->smarty->assign('positions', $positions);
        $this->smarty->assign('error', null);
        // render the form template (to be created later)
        $this->smarty->display('offer_hosting_form.tpl');
    }

    /**
     * showPostFormError
     * Re-display the form with an error message and the same positions list.
     *
     * @param string $error      Error message to display
     * @param array  $positions  Array of MPosition objects
     */
    public function showPostFormError(string $error, array $positions) {
        // assign both positions and error message
        $this->smarty->assign('positions', $positions);
        $this->smarty->assign('error', $error);
        // render the same form template, now showing the error
        $this->smarty->display('offer_hosting_form.tpl');
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
