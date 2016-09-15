<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Http;

use MageKeeper\Core\Http\ResponseInterface;

class Response implements ResponseInterface
{
    /**
     * @var string[]
     */
    protected $headers = [];

    /**
     * @var string
     */
    protected $version;

    /**
     * Response constructor.
     * @param string $version
     */
    public function __construct($version = '1.0')
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $header
     * @return Response
     */
    public function addHeader($header)
    {
        $this->headers[] = $header;

        return $this;
    }

    /**
     * @param string[] $headers
     * @return Response
     */
    public function addHeaders(array $headers)
    {
        foreach ($headers as $header) {
            $this->addHeader($header);
        }

        return $this;
    }

    /**
     * @return string[]
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * {@inheritdoc}
     */
    public function send()
    {
        if (!headers_sent()) {
            foreach($this->headers as $header) {
                header("$this->version $header", true);
            }
        }
    }
}