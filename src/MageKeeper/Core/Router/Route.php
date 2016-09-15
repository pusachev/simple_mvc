<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Router;

use MageKeeper\Core\Http\RequestInterface;
use MageKeeper\Core\Router\RouteInterface;

class Route implements RouteInterface
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $controllerClass;

    /**
     * Route constructor.
     * @param string $path
     * @param string $controllerClass
     */
    public function __construct($path, $controllerClass)
    {
        $this->path = $path;
        $this->controllerClass = $controllerClass;
    }

    /**
     * {@inheritdoc}
     */
    public function match(RequestInterface $request)
    {
        return ($this->path === $request->getUri());
    }

    /**
     * {@inheritdoc}
     */
    public function createController()
    {
        if (!class_exists($this->controllerClass)) {
            throw new \LogicException("The class {$this->controllerClass} not found!");
        }

        return new $this->controllerClass;
    }
}
