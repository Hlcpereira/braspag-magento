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

use Braspag\Braspag\Pagador\Transaction\Command\PaymentSplit\LockCommand;
use Braspag\Braspag\Pagador\Transaction\Resource\RequestAbstract;

class PaymentSplitLockCommandFactory
{
    /**
     * @param RequestAbstract $request
     * @return LockCommand
     */
    public static function make(RequestAbstract $request)
    {
        return new LockCommand($request);
    }
}