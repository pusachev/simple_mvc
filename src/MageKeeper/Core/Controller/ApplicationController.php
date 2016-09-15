<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Controller;


use MageKeeper\Core\Http\Request;
use MageKeeper\Core\Http\RequestInterface;
use MageKeeper\Core\Http\Response;
use MageKeeper\Core\Http\ResponseInterface;

abstract class ApplicationController
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     */
    public function execute(RequestInterface $request, ResponseInterface $response)
    {
        $this->request  = $request;
        $this->response = $response;

        call_user_func_array([$this, 'indexAction'], [$request]);
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
