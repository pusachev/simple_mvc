<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace Acme\Controller;

use MageKeeper\Core\Controller\ApplicationController;

class TestController extends ApplicationController
{
    /**
     *
     */
    public function indexAction()
    {
        $this->response->send();

        echo 'test';
    }
}