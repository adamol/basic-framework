<?php

use Framework\Container;
use Hello\Controllers\HelloController;
use Hello\Services\GreetingsService;

$container = new Container;

$container->set(HelloController::class, new HelloController\Factory());
$container->set(GreetingsService::class, new GreetingsService\Factory());

return $container;
