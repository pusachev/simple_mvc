<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Event;

use MageKeeper\Core\Event\DispatcherInterface;

use MageKeeper\Core\Http\ResponseInterface;
use MageKeeper\Core\Http\RequestInterface;
use MageKeeper\Core\Router\RouteInterface;

class Dispatcher implements DispatcherInterface
{
    /**
     *{@inheritdoc}
     */
    public function dispatch(RouteInterface $route, RequestInterface $request, ResponseInterface $response)
    {
        $controller = $route->createController();
        $controller->execute($request, $response);
    }
}