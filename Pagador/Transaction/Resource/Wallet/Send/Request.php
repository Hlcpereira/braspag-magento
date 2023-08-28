<?php

/**
 * Copyright (C) 2021 Signativa/FGP Desenvolvimento de Software
 *
 *  @author Esmerio Neto <esmerio.neto@signativa.com.br>
 *
 * SPDX-License-Identifier: Apache-2.0
 */

namespace Braspag\Braspag\Pagador\Transaction\Resource\Wallet\Send;

use Braspag\Braspag\Pagador\Transaction\Resource\RequestAbstract;
use Braspag\Braspag\Pagador\Transaction\Api\Wallet\Send\RequestInterface as Data;
use Braspag\Braspag\Factories\PaymentSplitRequestFactory;

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
    public function prepareParams()
    {
        $this->params = [
            'headers' => [
                'Content-Type' => self::CONTENT_TYPE_APPLICATION_JSON,
                'MerchantId' => $this->data->getMerchantId(),
                'MerchantKey' => $this->data->getMerchantKey()
            ],
            'body' => [
                'MerchantOrderId' => $this->data->getMerchantOrderId(),
                'Customer' => [
                    'Name' => $this->data->getCustomerName(),
                    'Identity' => $this->data->getCustomerIdentity(),
                    'IdentityType' => $this->data->getCustomerIdentityType()
                ],
                'Payment' => [
                    'Type' => Data::PAYMENT_TYPE,
                    'Provider' => $this->data->getPaymentProvider(),
                    'Amount' => $this->data->getPaymentAmount(),
                    'QrCodeExpiration' => $this->data->getPaymentExpirationDate() ? (int)$this->data->getPaymentExpirationDate() * 60 : '86400'
                ]
            ]
        ];

        if ($this->data->getPaymentProvider() === 'Braspag') {
            // $this->params['body']['Payment']['Bank'] = $this->data->getPaymentBank();
        }

        $paymentSplitRequest = $this->data->getPaymentSplitRequest();

        if ($paymentSplitRequest) {
            $splitData = PaymentSplitRequestFactory::make($paymentSplitRequest)->getParams();

            $this->params['body']['Payment']['SplitPayments'] = $splitData['body']['SplitPayments'];
            $this->params['body']['Payment']['SplitTransaction'] = $splitData['body']['SplitTransaction'];
        }

        return $this;
    }
}