<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2019 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Pagador\Http\Services\PaymentSplit;

use Braspag\Braspag\Pagador\Http\Services\ServiceAbstract;
use Braspag\Braspag\Pagador\Http\Services\ServiceInterface;

class Lock extends ServiceAbstract implements ServiceInterface
{
    protected $endPoint = "api/transactions/%s/settlements";

    public function getEndPoint()
    {
        $params = $this->getRequest()->getParams();

        if (isset($params['orderPaymentTransactionId'])) {
            return sprintf($this->endPoint, $params['orderPaymentTransactionId']);
        }

        return $this->endPoint;
    }
}