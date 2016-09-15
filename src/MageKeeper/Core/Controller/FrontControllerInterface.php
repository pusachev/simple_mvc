<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Controller;

use MageKeeper\Core\Event\DispatcherInterface;

use MageKeeper\Core\Http\RequestInterface;
use MageKeeper\Core\Http\ResponseInterface;

use MageKeeper\Core\Router\RouterInterface;

interface FrontControllerInterface
{
    /**
     * FrontControllerInterface constructor.
     * @param RouterInterface       $router
     * @param DispatcherInterface   $dispatcher
     */
    public function __construct(RouterInterface $router, DispatcherInterface $dispatcher);

    /**
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @return void
     */
    public function run(RequestInterface $request, ResponseInterface $response);
}
