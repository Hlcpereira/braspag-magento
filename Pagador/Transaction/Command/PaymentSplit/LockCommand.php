<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2016 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Pagador\Transaction\Command\PaymentSplit;

use Braspag\Braspag\Factories\PaymentSplitClientHttpFactory;
use Braspag\Braspag\Factories\ResponseFactory;
use Braspag\Braspag\Factories\PaymentSplitLockFactory;
use Braspag\Braspag\Pagador\Transaction\Command\CommandAbstract;

/**
 * Class LockCommand
 * @package Braspag\Braspag\Pagador\Transaction\Command\PaymentSplit
 */
class LockCommand extends CommandAbstract
{
    /**
     * @return $this
     */
    protected function execute()
    {
        $splitLock = PaymentSplitLockFactory::make($this->request);
        $client = PaymentSplitClientHttpFactory::make();

        $params = $this->request->getParams();
        $isTestEnvironment =  (bool) $this->request->getData()->isTestEnvironment();
        $orderTransactionId =  $this->request->getData()->getOrderTransactionId();

        $response = $client->request($splitLock, 'PUT', '', $isTestEnvironment);

        $this->result = ResponseFactory::make($this->getResponseToArray($response), 'paymentSplitLock');

        return $this;
    }
}