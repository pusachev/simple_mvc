<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Router;

use MageKeeper\Core\Controller\FrontControllerInterface;
use MageKeeper\Core\Http\RequestInterface;

interface RouteInterface
{
    /**
     * @param RequestInterface $request
     * @return bool
     */
    public function match(RequestInterface $request);

    /**
     * @return FrontControllerInterface
     */
    public function createController();
}
