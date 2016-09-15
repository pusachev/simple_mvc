<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Router;

use MageKeeper\Core\Http\RequestInterface;
use MageKeeper\Core\Http\ResponseInterface;

interface RouterInterface
{
    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @throws \OutOfRangeException
     * @return RouteInterface
     */
    public function route(RequestInterface $request, ResponseInterface $response);
}
