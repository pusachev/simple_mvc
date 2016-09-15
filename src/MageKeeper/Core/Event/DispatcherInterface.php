<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Event;

use MageKeeper\Core\Http\ResponseInterface;
use MageKeeper\Core\Http\RequestInterface;
use MageKeeper\Core\Router\RouteInterface;

interface DispatcherInterface
{
    /**
     * @param RouteInterface    $route
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @return void
     */
    public function dispatch(RouteInterface $route, RequestInterface $request, ResponseInterface $response);
}