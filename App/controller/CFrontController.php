<?php

class CFrontController {

    /**
     * Main dispatcher: parses the request URI and calls the appropriate controller and method.
     * @param string $requestUri
     * @return void
     */
    public function run($requestUri) {
        // Remove leading/trailing slashes
        $requestUri = trim($requestUri, '/');

        // Split the URI into parts
        $uriParts = explode('/', $requestUri);

        // Remove the first empty element (if any)
        array_shift($uriParts);

        // Determine controller and method names
        $controllerName = !empty($uriParts[0]) ? ucfirst($uriParts[0]) : 'User'; // Default controller: 'User'
        $methodName = !empty($uriParts[1]) ? $uriParts[1] : 'home'; // Default method: 'login'
        
        // Strip query parameters from method name if present
        if (strpos($methodName, '?') !== false) {
            $methodName = substr($methodName, 0, strpos($methodName, '?'));
        }

        // Build controller class and file name
        $controllerClass = 'C' . $controllerName;
        $controllerFile = __DIR__ . "/{$controllerClass}.php";



        // Check if controller file exists
        if (file_exists($controllerFile)) {
            require_once $controllerFile;

            // Check if the method exists as a static method in the controller class
            if (method_exists($controllerClass, $methodName)) {
                // Get any optional parameters from the URI
                $params = array_slice($uriParts, 2);
                // Call the controller's static method with parameters (if any)
                call_user_func_array([$controllerClass, $methodName], $params);
            } else {
                // Method not found: redirect or show a 404 error
                require_once __DIR__ . '/../view/Verror.php';
        $view = new Verror();
        $view->show404();
            }
        } else {
            // Controller file not found: redirect or show a 404 error
            require_once __DIR__ . '/../view/Verror.php';
    $view = new Verror();
    $view->show404();
        }
    }
}
