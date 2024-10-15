<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2016 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Avs;

use Braspag\Braspag\Pagador\Transaction\Api\AntiFraud\Items\RequestInterface as AntiFraudItemsRequest;
use Braspag\Braspag\Pagador\Transaction\Resource\RequestAbstract;
use Braspag\Braspag\Pagador\Transaction\Api\CreditCard\Avs\RequestInterface as Data;

class Request extends RequestAbstract
{
    /**
     * @param Data $data
     */
    public function __construct(Data $data)
    {
        $this->data = $data;
        $this->prepareParams();
    }

    /**
     * @return $this
     */
    protected function prepareParams()
    {
        $this->params = [
            'Cpf' => $this->data->getCpf(),
            'ZipCode' => $this->data->getZipCode(),
            'Street' => $this->data->getStreet(),
            'Number' => $this->data->getNumber(),
            'Complement' => $this->data->getComplement(),
            'District' => $this->data->getDistrict()
        ];

        return $this;
    }
}
