<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Request;

$routes = include __DIR__ . '/../config/routes.config.php';
$container = include __DIR__ . '/../config/container.config.php';

$context = new Routing\RequestContext();
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$app = new Framework\Application($matcher, $container);

$request = Request::createFromGlobals();
$response = $app->handle($request);

$response->send();
