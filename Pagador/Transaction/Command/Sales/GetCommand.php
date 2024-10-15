<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2016 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Pagador\Transaction\Command\Sales;

use Braspag\Braspag\Factories\ClientHttpFactory;
use Braspag\Braspag\Factories\ResponseFactory;
use Braspag\Braspag\Factories\SalesFactory;
use Braspag\Braspag\Pagador\Transaction\Command\CommandAbstract;
use Braspag\Braspag\Pagador\Transaction\Api\CreditCard\Send\RequestInterface as CreditCardData;
use Braspag\Braspag\Pagador\Transaction\Api\Boleto\Send\RequestInterface as BoletoCardData;
use Braspag\Braspag\Pagador\Transaction\Api\DebitCard\Send\RequestInterface as DebitCardData;

class GetCommand extends CommandAbstract
{
    protected function execute()
    {
        $sales = SalesFactory::make($this->request);
        $client = ClientHttpFactory::make();

        $params = $this->request->getParams();
        $uriComplement = $params['uriComplement']['payment_id'];

        $isTestEnvironment =  (bool) $this->request->getData()->isTestEnvironment();

        $response = $client->request($sales, 'GET', $uriComplement, $isTestEnvironment);

        $type = '';
        if ($this->request->getType()) {
            $type = $this->request->getType();
        }

        $this->result = ResponseFactory::make($this->getResponseToArray($response), $type);
    }

    protected function getType(array $data)
    {
        $type = '';

        if ($data['Payment']['Type'] === CreditCardData::PAYMENT_TYPE) {
            $type = ResponseFactory::CLASS_TYPE_CREDIT_CARD;
        }

        if ($data['Payment']['Type'] === BoletoCardData::PAYMENT_TYPE) {
            $type = ResponseFactory::CLASS_TYPE_BOLETO;
        }

        if ($data['Payment']['Type'] === DebitCardData::PAYMENT_TYPE) {
            $type = ResponseFactory::CLASS_TYPE_DEBIT_CARD;
        }

        return $type;
    }
}