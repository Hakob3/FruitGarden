<?php

namespace System;

use ErrorException;
use App\Controllers\GardenController;

class App
{
    /**
     * @return void
     * @throws ErrorException
     */
    public static function run(): void
    {
        $path = $_SERVER['REQUEST_URI'];
        if ($path === '/') {
            (new GardenController())->run();
        } else {
            $pathParts = explode('/', $path);
            $controller = $pathParts[1];
            $action = $pathParts[2];

            $controllerClass = 'App\\Controllers\\' . ucfirst($controller) . 'Controller';
            if (!class_exists($controllerClass)) {
                throw new ErrorException('Controller does not exist!');
            }

            $controllerObj = new $controllerClass();

            if (!method_exists($controllerObj, $action)) {
                throw new ErrorException('action does not exist');
            }

            $controllerObj->$action();
        }
    }
}
