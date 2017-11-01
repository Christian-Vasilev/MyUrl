<?php

include 'vendor/autoload.php';

define('CONTROLLERS_FOLDER', './MyUrl/Controllers/');
define('CONTROLLERS_NS', 'MyUrl\\Controllers\\');

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/items/{id:\d+}/{user:\d+}', 'ItemsController@index');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        throw new \Core\Exceptions\Http\RouteNotFoundException();
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        throw new \Core\Exceptions\Http\MethodNotAllowedException();
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = explode('@', $routeInfo[1]);
        $vars = $routeInfo[+2];
        $controllerName = CONTROLLERS_NS.$handler[0];
        $controller = new $controllerName();
        echo call_user_func_array([$controller, $handler[1]], $vars);
        break;
}