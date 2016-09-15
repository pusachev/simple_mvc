<?php

/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Controller;

use MageKeeper\Core\Controller\FrontControllerInterface;
use MageKeeper\Core\Event\DispatcherInterface;
use MageKeeper\Core\Http\RequestInterface;
use MageKeeper\Core\Http\ResponseInterface;
use MageKeeper\Core\Router\RouterInterface;

class FrontController implements FrontControllerInterface
{
    const DEFAULT_CONTROLLER = "IndexController";
    const DEFAULT_ACTION     = "index";

    /**
     * @var string
     */
    protected $controller    = self::DEFAULT_CONTROLLER;

    /**
     * @var string
     */
    protected $action        = self::DEFAULT_ACTION;

    /**
     * @var array
     */
    protected $params        = [];

    /**
     * @var string
     */
    protected $basePath      = "mybasepath/";

    /**
     * {@inheritdoc}
     */
    public function __construct(RouterInterface $router, DispatcherInterface $dispatcher)
    {
        $this->router = $router;
        $this->dispatcher = $dispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function run(RequestInterface $request, ResponseInterface $response)
    {
        $route = $this->router->route($request, $response);
        $this->dispatcher->dispatch($route, $request, $response);
  }
}
