<?php

/**
 * Copyright (C) 2021 Signativa/FGP Desenvolvimento de Software
 *
 *  @author Esmerio Neto <esmerio.neto@signativa.com.br>
 *
 * SPDX-License-Identifier: Apache-2.0
 *
 */

namespace Braspag\Braspag\Pagador\Transaction\Resource\Voucher\Send;

use Braspag\Braspag\Pagador\Transaction\Resource\RequestAbstract;
use Braspag\Braspag\Pagador\Transaction\Api\Voucher\Send\RequestInterface as Data;
use Braspag\Braspag\Factories\AntiFraudRequestFactory;
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
    protected function prepareParams()
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
                    'IdentityType' => $this->data->getCustomerIdentityType(),
                    'Email' => $this->data->getCustomerEmail(),
                    'BirthDate' => $this->data->getCustomerBirthDate(),
                    'IpAddress' => $this->data->getRemoteIpAddress(),
                    'Address' => [
                        'Street' => $this->data->getCustomerAddressStreet(),
                        'Number' => $this->data->getCustomerAddressNumber(),
                        'Complement' => $this->data->getCustomerAddressComplement(),
                        'ZipCode' => $this->data->getCustomerAddressZipCode(),
                        'City' => $this->data->getCustomerAddressCity(),
                        'State' => $this->data->getCustomerAddressState(),
                        'Country' => $this->data->getCustomerAddressCountry(),
                        'District' => $this->data->getCustomerAddressDistrict()
                    ],
                    'DeliveryAddress' => [
                        'Street' => $this->data->getCustomerDeliveryAddressStreet(),
                        'Number' => $this->data->getCustomerDeliveryAddressNumber(),
                        'Complement' => $this->data->getCustomerDeliveryAddressComplement(),
                        'ZipCode' => $this->data->getCustomerDeliveryAddressZipCode(),
                        'City' => $this->data->getCustomerDeliveryAddressCity(),
                        'State' => $this->data->getCustomerDeliveryAddressState(),
                        'Country' => $this->data->getCustomerDeliveryAddressCountry(),
                        'District' => $this->data->getCustomerDeliveryAddressDistrict(),
                    ]
                ],
                'Payment' => [
                    'Provider' => $this->data->getPaymentProvider(),
                    'Type' => 'DebitCard',
                    'Amount' => $this->data->getPaymentAmount(),
                    'Installments' => 1,
                    'Authenticate' => false,
                    'ReturnUrl' => 'http://www.braspag.com.br',
                    'DebitCard' => [
                        'CardNumber' => $this->data->getPaymentVoucherCardNumber(),
                        'Holder' => $this->data->getPaymentVoucherHolder(),
                        'ExpirationDate' => $this->data->getPaymentVoucherExpirationDate(),
                        'SecurityCode' => $this->data->getPaymentVoucherSecurityCode(),
                        'Brand' => empty($this->data->getPaymentVoucherBrand()) ? 'Ticket' : $this->data->getPaymentVoucherBrand(),
                    ]
                ],
            ]
        ];

        if (($antiFraudRequest = $this->data->getAntiFraudRequest()) && !$this->data->getPaymentAuthenticate()) {
            $antiFraud = AntiFraudRequestFactory::make($antiFraudRequest);
            $this->params['body']['Payment']['FraudAnalysis'] = $antiFraud->getParams();
        }

        $paymentSplitRequest = $this->data->getPaymentSplitRequest();

        if ($paymentSplitRequest) {
            $splitData = PaymentSplitRequestFactory::make($paymentSplitRequest)->getParams();
            $this->params['body']['Payment']['SplitPayments'] = $splitData['body']['SplitPayments'];
            $this->params['body']['Payment']['SplitTransaction'] = $splitData['body']['SplitTransaction'];
        }

        if ($this->data->getPaymentAuthenticate()) {
            $this->params['body']['Payment']['externalAuthentication'] = $this->getExternalAuthenticationParams();
        }

        return $this;
    }

    protected function getVoucherParams()
    {
        if ($this->data->getPaymentVoucherSoptpaymenttoken()) {
            return [
                'paymentToken' => $this->data->getPaymentVoucherSoptpaymenttoken(),
                'brand' => empty($this->data->getPaymentVoucherBrand()) ? 'Ticket' : $this->data->getPaymentVoucherBrand(),
                'saveCard' => $this->data->getPaymentVoucherSaveCard(),
            ];
        }
    }

    protected function getExternalAuthenticationParams()
    {
        return [
            "Cavv" => $this->data->getPaymentExternalAuthenticationCavv(),
            "Xid" => $this->data->getPaymentExternalAuthenticationXid(),
            "Eci" => $this->data->getPaymentExternalAuthenticationEci(),
            "Version" => $this->data->getPaymentCardExternalAuthenticationVersion(),
            "ReferenceID" => $this->data->getPaymentExternalAuthenticationReferenceId()
        ];
    }
}