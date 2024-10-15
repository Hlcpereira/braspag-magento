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
use Braspag\Braspag\Factories\PaymentSplitTransactionPostFactory;
use Braspag\Braspag\Pagador\Transaction\Command\CommandAbstract;

/**
 * Class TokenCommand
 * @package Braspag\Braspag\Pagador\Transaction\Command\Auth3Ds20
 */
class TransactionPostCommand extends CommandAbstract
{
    /**
     * @return $this
     */
    protected function execute()
    {
        $splitTransactionPost = PaymentSplitTransactionPostFactory::make($this->request);
        $client = PaymentSplitClientHttpFactory::make();

        $params = $this->request->getParams();
        $isTestEnvironment =  (bool) $this->request->getData()->isTestEnvironment();
        $orderTransactionId =  $this->request->getData()->getOrderTransactionId();

        $response = $client->request($splitTransactionPost, 'PUT', '', $isTestEnvironment);

        $this->result = ResponseFactory::make($this->getResponseToArray($response), 'paymentSplit');

        return $this;
    }
}