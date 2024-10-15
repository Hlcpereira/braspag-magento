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

use Braspag\Braspag\Pagador\Http\Services\PaymentSplit\CreateSubordinate as CreateSubordinate;
use Braspag\Braspag\Pagador\Transaction\Resource\RequestAbstract;

class PaymentSplitCreateSubordinateFactory
{
    /**
     * @param RequestAbstract $request
     * @return Sales
     */
    public static function make(RequestAbstract $request)
    {
        return new CreateSubordinate($request);
    }
}