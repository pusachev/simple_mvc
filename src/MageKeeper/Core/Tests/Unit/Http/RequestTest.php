<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Tests\Unit\Http;

use MageKeeper\Core\Http\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $uri
     * @param string $expected
     *
     * @dataProvider uriDataProvider
     */
    public function testUri($uri, $expected)
    {
        $request = new Request($uri, []);

        $this->assertEquals($expected, $request->getUri());
    }

    /**
     * @param array         $params
     * @param array         $expectedArray
     * @param int|string    $expectedKey
     * @param int|string    $expectedParam
     *
     * @dataProvider paramsDataProvider
     */
    public function testParams(array $params, array $expectedArray, $expectedKey, $expectedParam)
    {
        $request = new Request('test', $params);

        $this->assertCount(count($expectedArray), $request->getParams());
        $this->assertEquals($expectedArray, $request->getParams());

        $this->assertContains($expectedParam, $request->getParams());
        $this->assertEquals($expectedParam, $request->getParam($expectedKey));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidParam()
    {
        $request = new Request('/test', [1,3]);

        $request->getParam(4);

    }

    /**
     * @return array
     */
    public function paramsDataProvider()
    {
        return [
            'numericArray' => [
                [1, 2, 3],
                [1, 2, 3],
                0,
                1
            ],
            'arrayWithKeys' => [
                ['a' => 1, 'b' => 2],
                ['a' => 1, 'b' => 2],
                'b',
                2
            ],
            'arrayWithObject' => $this->getArrayOfObjects()
        ];
    }

    /**
     * @return array
     */
    public function uriDataProvider()
    {
        return [
            ['test', 'test'],
            ['/test', '/test'],
            ['test?test=test', 'test?test=test']
        ];
    }

    /**
     * @return array
     */
    protected function getArrayOfObjects()
    {
        $first  =  new \stdClass();
        $second =  new \stdClass();

        return [
            [$first, $second],
            [$first, $second],
            1,
            $second
        ];
    }
}
