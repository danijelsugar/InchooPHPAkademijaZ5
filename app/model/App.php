<?php

/**
 * Class App decides which controller and action should be used
 */
final class App
{

    public static function start()
    {
        $pathInfo = Request::pathInfo();
        $pathInfo = trim($pathInfo,'/');
        $pathParts = explode('/',$pathInfo);
        print_r($pathParts);

        //resolve controller
        if (!isset($pathParts[0])) {
            $controller = 'Index';
        } else {
            $controller = ucfirst(strtolower($pathParts[0]));
        }

        $controller .= 'Controller';

        //resolve action
        if (!isset($pathParts[1])) {
            $action = 'index';
        } else {
            $action = strtolower($pathParts[1]);
        }

        //dispatch
        if (class_exists($controller) && method_exists($controller, $action)) {
            $controllerInstance = new $controller();
            $controllerInstance->$action();
        } else {
            header("HTTP/1.0 404 Not Found");
        }
    }

}