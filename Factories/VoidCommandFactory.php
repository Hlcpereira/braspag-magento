<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2016 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Factories;

use Braspag\Braspag\Pagador\Transaction\Command\Sales\VoidCommand;
use Braspag\Braspag\Pagador\Transaction\Resource\RequestAbstract;

class VoidCommandFactory
{
    /**
     * @param RequestAbstract $request
     * @return VoidCommand
     */
    public static function make(RequestAbstract $request)
    {
        return new VoidCommand($request);
    }
}