<?php

class CFrontController {
    private $entityManager;
    private $persistentManager;

    // Accept dependencies via constructor
    public function __construct($entityManager = null, $persistentManager = null) {
        $this->entityManager = $entityManager;
        $this->persistentManager = $persistentManager;
    }

    public function run($requestUri) {
        $requestUri = trim($requestUri, '/');
        $uriParts = explode('/', $requestUri);
        array_shift($uriParts);
        $controllerName = !empty($uriParts[0]) ? ucfirst($uriParts[0]) : 'User'; // Default controller: 'User'
        $methodName = !empty($uriParts[1]) ? $uriParts[1] : 'index';
        $classController = 'C' . $controllerName;
        $fileController = __DIR__ . "/{$classController}.php"; // Adjust path as needed

        // Debug info (uncomment for troubleshooting)
        // echo "Request URI: $requestUri<br>";
        // echo "Controller: $classController<br>";
        // echo "Method: $methodName<br>";
        // echo "File path: $fileController<br>";

        if (file_exists($fileController)) {
            require_once($fileController);
            if (class_exists($classController)) {
                // Instantiate the controller, inject dependencies if required
                // Check constructor arguments
                $reflection = new ReflectionClass($classController);
                $constructor = $reflection->getConstructor();
                $constructorParams = $constructor ? $constructor->getNumberOfParameters() : 0;

                // Pass dependencies if the constructor expects them
                if ($constructorParams == 2) {
                    $controller = new $classController($this->entityManager, $this->persistentManager);
                } elseif ($constructorParams == 1) {
                    $controller = new $classController($this->entityManager);
                } else {
                    $controller = new $classController();
                }

                if (method_exists($controller, $methodName)) {
                    $params = array_slice($uriParts, 2);
                    // Call the controller's method on the instance (not statically!)
                    /**debug
                    echo "<br>DEBUG:<br>";
                    var_dump($controller);
                    var_dump($methodName);
                    var_dump(method_exists($controller, $methodName));
                    var_dump(is_callable([$controller, $methodName]));
                    echo "<br>";
                    **/ //debug
                    call_user_func_array([$controller, $methodName], $params);
                } else {
                    echo "Method $methodName not found in class $classController.<br>";
                }
            } else {
                echo "Class $classController not defined in $fileController.<br>";
            }
        } else {
            echo "File $fileController does not exist.<br>";
        }
    }
}
