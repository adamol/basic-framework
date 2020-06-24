<?php

namespace Hello\Controllers;

use Hello\Services\GreetingsService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class HelloController
{

    /**
     * @var GreetingsService
     */
    private $greetingsService;


    public function __construct(GreetingsService $greetingsService)
    {
        $this->greetingsService = $greetingsService;
    }


    public function index(Request $request)
    {
        $name = $request->attributes->get('name');

        $greeting = $this->greetingsService->generateGreeting($name);

        return new JsonResponse(['message' => $greeting]);
    }
}
