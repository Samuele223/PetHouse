<?php
// filepath: c:\xampp\htdocs\PetHouse\App\view\VReport.php

require_once __DIR__ . '/../../config/startsmarty.php';

class VReport {
    private $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Display report form for a specific post
     * @param Mpost $post The post to be reported
     */
    public function showReportForm($post) {
        $this->smarty->assign('post', $post);
        $this->smarty->display('formReport.tpl');
    }
}