<?php

namespace Hello\Services\GreetingsService;

use Hello\Services\GreetingsService;
use Framework\FactoryInterface;
use Framework\Container;

class Factory implements FactoryInterface
{

    public function __invoke(Container $container)
    {
        return new GreetingsService();
    }
}
