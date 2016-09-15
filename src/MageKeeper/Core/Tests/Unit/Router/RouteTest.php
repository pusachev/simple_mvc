<?php

/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Tests\Unit\Router;

use MageKeeper\Core\Router\Route;

class RouteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string    $path
     * @param bool      $expected
     *
     * @dataProvider pathDataProvider
     */
    public function testMatch($path, $expected)
    {
        $router = new Route($path, 'testController');

        $requestMock = $this->getMockBuilder('MageKeeper\Core\Http\Request')
                            ->disableOriginalConstructor()
                            ->setMethods(['getUri'])
                            ->getMock();

        $requestMock->expects($this->once())
                    ->method('getUri')
                    ->willReturn('/test');

        $this->assertEquals($expected, $router->match($requestMock));

    }

    /**
     * Test create class from string
     */
    public function testCreateController()
    {
        $router = new Route('stdclass', 'stdClass');

        $controllerClass = $router->createController();

        $this->assertEquals('stdClass', get_class($controllerClass));
    }

    /**
     * Test create non exist class
     *
     * @expectedException \LogicException
     */
    public function testCreateClassFailure()
    {
        $router = new Route('test', 'test');

        $router->createController();
    }

    /**
     * @return array
     */
    public function pathDataProvider()
    {
        return [
            ['/test', true],
            ['/test2', false]
        ];
    }
}
