<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Tests\Unit\Http;

use MageKeeper\Core\Http\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $version
     * @param string $expectedResult
     *
     * @dataProvider versionDataProvider
     */
    public function testVersion($version, $expectedResult)
    {
        $response = new Response($version);

        $this->assertSame($expectedResult, $response->getVersion());
    }

    /**
     * @param mixed $header
     *
     * @dataProvider headerDataProvider
     */
    public function testAddHeader($header)
    {
        $response = new Response();

        $response->addHeader($header);

        $this->assertContains($header, $response->getHeaders());
    }

    /**
     * @param array $headers
     *
     * @dataProvider headersArrayDataProvider
     */
    public function testAddHeaders(array $headers)
    {
        $response = new Response();

        $response->addHeaders($headers);

        $this->assertSame($headers, $response->getHeaders());

        foreach ($headers as $header) {
            $this->assertContains($header, $response->getHeaders());
        }
    }

    /**
     * Test send headers
     */
    public function testSend()
    {
        $response = new Response();

        $response->addHeaders(['test header']);

        $response->send();
    }

    /**
     * @return array
     */
    public function headersArrayDataProvider()
    {
        return [
            [
                ['header1', 'header2', 'header3'],
                [1, 2, 3]
            ]
        ];
    }

    /**
     * @return array
     */
    public function headerDataProvider()
    {
        return [
            ['test Header']
        ];
    }

    /**
     * @return array
     */
    public function versionDataProvider()
    {
        return [
            ['1.0', '1.0'],
            [2, '2']
        ];
    }
}
