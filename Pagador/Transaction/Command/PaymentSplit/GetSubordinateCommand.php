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

use Braspag\Braspag\Factories\PaymentSplitOnboardingClientHttpFactory;
use Braspag\Braspag\Factories\ResponseFactory;
use Braspag\Braspag\Factories\PaymentSplitGetSubordinateFactory;
use Braspag\Braspag\Pagador\Transaction\Command\CommandAbstract;

/**
 * Class GetSubordinateCommand
 * @package Braspag\Braspag\Pagador\Transaction\Command\PaymentSplit
 */
class GetSubordinateCommand extends CommandAbstract
{
    /**
     * @return $this
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function execute()
    {
        $getSubordinate = PaymentSplitGetSubordinateFactory::make($this->request);
        $client = PaymentSplitOnboardingClientHttpFactory::make();

        $isTestEnvironment =  (bool) $this->request->getData()->isTestEnvironment();

        $response = $client->request($getSubordinate, 'GET', '', $isTestEnvironment);

        $this->result = ResponseFactory::make($this->getResponseToArray($response), 'paymentSplitGetSubordinate');

        return $this;
    }
}