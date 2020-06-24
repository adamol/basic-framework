<?php

namespace Framework;

interface FactoryInterface
{

    public function __invoke(Container $container);
}
