<?php
function my_autoloader($className) {

    $firstLetter = $className[0];
    switch ($firstLetter) {
        case 'M':
            include_once(__DIR__ . '/../App/model/'. $className . '.php' );
            break;

        case 'F':
            include_once(__DIR__ . "/../App/services/foundation/" . $className . '.php' );
            break;

        case 'V':
            include_once(__DIR__ . '/../App/view/'. $className . '.php' );
            break;

        case 'C':
            include_once(__DIR__ . '/../App/controller/'. $className . '.php' );
            break;

        case 'U':
            include_once (__DIR__ . '/../App/services/utility/'. $className. '.php');
            break;

}
}

spl_autoload_register('my_autoloader');