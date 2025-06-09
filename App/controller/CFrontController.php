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
        $methodName = !empty($uriParts[1]) ? $uriParts[1] : 'login'; // Default method: 'login'

        // Build controller class and file name
        $controllerClass = 'C' . $controllerName;
        $controllerFile = __DIR__ . "/{$controllerClass}.php";

        echo "<pre>";
        echo "RequestUri: $requestUri\n";
        print_r($uriParts);
        echo "Controller class: $controllerClass\n";
        echo "Controller file: $controllerFile\n";
        echo "Method: $methodName\n";
        echo "</pre>";

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
                http_response_code(404);
                echo "404 - Page not found.";
                echo "Method: $methodName\n not found error"; //per debug
                exit;
            }
        } else {
            // Controller file not found: redirect or show a 404 error
            http_response_code(404);
            echo "404 - Page not found.";
            echo "Controller file: $controllerFile\n not found, error";
            exit;
        }
    }
}
