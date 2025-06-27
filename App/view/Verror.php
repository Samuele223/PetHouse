<?php
require_once __DIR__ . '/../../config/startsmarty.php';

class Verror {
    public $smarty;

    public function __construct() {
        $this->smarty = StartSmarty::configuration();
    }
    public function show404() {
        http_response_code(404);
        $this->smarty->display('404.tpl');
    }
}