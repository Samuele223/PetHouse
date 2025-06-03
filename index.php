<?
require_once "config/config.php";
require_once 'config/autoloader.php';
//require_once "/install/Installation.php";
//Installation::install();

$fc = new CFrontController();
$fc->run($_SERVER['REQUEST_URI']);

?>