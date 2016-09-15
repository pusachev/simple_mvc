<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Http;

interface ResponseInterface
{
    /**
     * @return void
     */
    public function send();
}