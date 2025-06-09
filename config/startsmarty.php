<?php
class StartSmarty {
    public static function configuration() {
         $smarty = new \Smarty\Smarty(); // <-- namespace completo!

        // Configura le directory dove mettere i template e le cache/compile
        $smarty->setTemplateDir(__DIR__ . '/../App/templates//templates_tpl');
        $smarty->setCompileDir(__DIR__ . '/../App/templates/templates_c');
        $smarty->setCacheDir(__DIR__ . '/../cache/');
        $smarty->setConfigDir(__DIR__ . '/../configs/');

        // Opzionale: altre impostazioni, ad esempio
        // $smarty->caching = Smarty::CACHING_LIFETIME_CURRENT;
        // $smarty->assign('appName', 'PetHouse'); // variabili globali

        return $smarty;
    }
}