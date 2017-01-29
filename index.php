<?php

session_start();

require_once 'settings.php';
require_once 'includes.php';

$controller = 'Index';
$action = 'index';
$parameters = null;

if (isset($_GET['route'])) {
    $route = explode('/', $_GET['route']);
    if (isset($route[0])) {
        $controller = ucfirst($route[0]);
    }
    if (isset($route[1])) {
        $action = $route[1];
    }
    if (isset($route[2])) {
        $parameters[0] = $route[2];
    }
    if (isset($route[3])) {
        $parameters[1] = $route[3];
    }
}

if (file_exists(SITE_DIR . DS . 'Controller' . DS . "{$controller}Controller.php")) {
    $controllerName = "\\Controller\\{$controller}Controller";
} else {
    $controllerName = "\\Controller\\IndexController";
}

try {
    $controllerObj = new $controllerName;

    if (is_callable(array($controllerObj, $action))) {
        $controllerObj->$action($parameters);
    } else {
        $controllerObj->index($parameters);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

