<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2016 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Pagador\Transaction\Resource\PaymentSplit\Lock;

use Braspag\Braspag\Pagador\Transaction\Api\PaymentSplit\Lock\ResponseInterface;
use Braspag\Braspag\Pagador\Transaction\Resource\ResponseAbstract;

class Response extends ResponseAbstract implements ResponseInterface
{
    public function succeeded()
    {
        return $this->response['status'];
    }
}