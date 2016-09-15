<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Http;

use MageKeeper\Core\Http\RequestInterface;

class Request implements RequestInterface
{
    /**
     * @var string
     */
    protected $uri;

    /**
     * @var string[]
     */
    protected $params = [];

    /**
     * Request constructor.
     * @param string    $uri
     * @param array     $params
     */
    public function __construct($uri, array $params)
    {
        $this->uri = $uri;
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param string $key
     * @param string $value
     * @return Request
     */
    public function setParam($key, $value)
    {
        $this->params[$key] = $value;
        return $this;
    }

    /**
     * @param string $key
     * @throws \InvalidArgumentException
     * @return string
     */
    public function getParam($key)
    {
        if (!isset($this->params[$key])) {
            throw new \InvalidArgumentException("The request parameter with key '$key' is invalid.");
        }
        return $this->params[$key];
    }

    /**
     * @return string[]
     */
    public function getParams()
    {
        return $this->params;
    }
}