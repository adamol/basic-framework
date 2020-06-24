<?php

namespace Framework;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;

class Application
{

    /**
     * @var UrlMatcher
     */
    private $matcher;

    /**
     * @var Container
     */
    private $container;

    public function __construct(UrlMatcher $matcher, Container $container)
    {
        $this->matcher = $matcher;
        $this->container = $container;
    }

    public function handle(Request $request)
    {
        $this->matcher->getContext()->fromRequest($request);

        try {
            $match = $this->matcher->match($request->getPathInfo());
            $request->attributes->add($match);

            $controller = $this->getControllerInstance($request);
            $action = $this->getControllerAction($request);

            return call_user_func([$controller, $action], $request);
        } catch (ResourceNotFoundException $exception) {
            return new JsonResponse(['message' => 'Not Found'], 404);
        } catch (\Exception $exception) {
            return new JsonResponse(['message' => sprintf('An error occurred: %s', $exception->getMessage())], 500);
        }
    }

    private function getControllerInstance(Request $request)
    {
        $controllerName = $request->attributes->get('_controller');

        return $this->container->get($controllerName);
    }

    private function getControllerAction(Request $request)
    {
        return $request->attributes->get('_action');
    }
}
