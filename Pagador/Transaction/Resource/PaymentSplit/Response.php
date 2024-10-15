<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2016 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Pagador\Transaction\Resource\PaymentSplit;

use Braspag\Braspag\Pagador\Transaction\Api\PaymentSplit\ResponseInterface;
use Braspag\Braspag\Pagador\Transaction\Resource\ResponseAbstract;

class Response extends ResponseAbstract implements ResponseInterface
{
    public function getSplits()
    {
        if (!isset($this->response['SplitTransaction'])) {
            return $this->response;
        }
        return $this->response['SplitTransaction'];
    }

    public function getPaymentId()
    {
        if (!isset($this->response['PaymentId'])) {
            return false;
        }
        return $this->response['PaymentId'];
    }
}