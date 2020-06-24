<?php

namespace Hello\Services;

class GreetingsService
{

    public function generateGreeting(string $name)
    {
        return sprintf('Hello, %s', $name);
    }
}
