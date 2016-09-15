<?php
/**
 * @author Pavel Usachev <webcodekeeper@hotmail.com>
 * @copyright Copyright (c) 2016, Pavel Usachev
 */

namespace MageKeeper\Core\Http;

interface RequestInterface
{
    /**
     * @return string
     */
    public function getUri();
}
