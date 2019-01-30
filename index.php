<?php

//base root path of application
define('BP', __DIR__ . '/');

//enablig to se php errors
error_reporting(E_ALL);
ini_set('display_errors',1);

//path were included classes would be find
$includePaths = implode(PATH_SEPARATOR, [
    BP . 'app/model',
    BP . 'app/controller'
]);

set_include_path($includePaths);

//register autoloader, to auto include classes when needed
spl_autoload_register(function($class)
{

    $classPath = strtr($class, '\\', DIRECTORY_SEPARATOR) . '.php';

    if(file_exists(BP . 'app/model/' . $classPath) || file_exists(BP . 'app/controller/' . $classPath)) {
        return include $classPath;
    }

});

App::start();

