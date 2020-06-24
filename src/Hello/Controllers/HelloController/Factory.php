<?php

namespace Hello\Controllers\HelloController;

use Hello\Controllers\HelloController;
use Hello\Services\GreetingsService;
use Framework\FactoryInterface;
use Framework\Container;

class Factory implements FactoryInterface
{

    public function __invoke(Container $container)
    {
        return new HelloController(
            $container->get(GreetingsService::class)
        );
    }
}
