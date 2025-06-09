<?php
require_once __DIR__ . '/vendor/autoload.php';

if (class_exists('\Smarty')) {
    echo "Smarty caricato correttamente!";
} else {
    echo "Smarty NON trovato!";
}
