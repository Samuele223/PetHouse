<?php
require_once __DIR__ . '/vendor/autoload.php';

if (class_exists('\Smarty\Smarty')) {
    echo "Smarty caricato correttamente, uau!";
} else {
    echo "Smarty NON trovato!";
}
