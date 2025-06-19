#!/usr/bin/env php
<?php
// clear_templates.php

// carica l’autoload di Composer e la configurazione di Smarty
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/startsmarty.php';

// inizializza Smarty
$smarty = StartSmarty::configuration();

// svuota la cartella dei template compilati
$smarty->clearCompiledTemplate();

// feedback a video
echo "Compiled templates cleared.\n";
