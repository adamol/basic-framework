<?php

namespace Framework;

class Container
{

    /**
     * @var array
     */
    private $services = [];

    public function get(string $key)
    {
        $serviceFactory = $this->services[$key] ?? null;
        if ($serviceFactory === null) {
            throw new \InvalidArgumentException(sprintf(
                'Service not found "%s"',
                $key
            ));
        }

        return $serviceFactory($this);
    }

    public function set(string $key, callable $factory)
    {
        $this->services[$key] = $factory;
    }
}

