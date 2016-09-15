<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

use MageKeeper\Core\Event\Dispatcher;

use MageKeeper\Core\Controller\FrontController;

use MageKeeper\Core\Http\Request;
use MageKeeper\Core\Http\Response;

use MageKeeper\Core\Router\Route;
use MageKeeper\Core\Router\Router;

/**
 * @var Composer\Autoload\ClassLoader
 */
$loader = require __DIR__.'/../app/autoload.php';

$request = new Request("http://example.com/test/", []);

$response = new Response();

$route1 = new Route("http://example.com/test/", "Acme\\Controller\\TestController");

$route2 = new Route("http://example.com/error/", "Acme\\Controller\\ErrorController");

$router = new Router(array($route1, $route2));

$dispatcher = new Dispatcher();

$frontController = new FrontController($router, $dispatcher);

$frontController->run($request, $response);