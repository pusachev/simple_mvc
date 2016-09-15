<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Router;

use MageKeeper\Core\Http\ResponseInterface;
use MageKeeper\Core\Http\RequestInterface;
use MageKeeper\Core\Router\RouteInterface;
use MageKeeper\Core\Router\RouterInterface;

class Router implements RouterInterface
{
    /**
     * @var RouteInterface[]
     */
    protected $routes;

    /**
     * Router constructor.
     * @param RouteInterface[] $routes
     */
    public function __construct(array $routes)
    {
        $this->addRoutes($routes);
    }

    /**
     * @param RouteInterface $route
     * @return Router
     */
    public function addRoute(RouteInterface $route)
    {
        $this->routes[] = $route;
        return $this;
    }

    /**
     * @param RouteInterface[] $routes
     * @return Router
     */
    public function addRoutes(array $routes)
    {
        foreach ($routes as $route) {
            $this->addRoute($route);
        }

        return $this;
    }

    /**
     * @return RouteInterface[]
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     *{@inheritdoc}
     */
    public function route(RequestInterface $request, ResponseInterface $response)
    {
        foreach ($this->routes as $route) {
            if ($route->match($request)) {
                return $route;
            }
        }
        $response->addHeader("404 Page Not Found")->send();
        throw new \OutOfRangeException("No route matched the given URI.");
    }
}