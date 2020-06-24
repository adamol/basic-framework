<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Hello\Controllers\HelloController;

$routes = new RouteCollection();

$routes->add('hello', new Route('/hello/{name}', [
    '_controller' => HelloController::class,
    '_action' => 'index',
]));

return $routes;
