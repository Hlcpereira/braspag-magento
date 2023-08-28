<?php

/*
 * Copyright (C) 2021 Signativa/FGP Desenvolvimento de Software
 *
 * SPDX-License-Identifier: Apache-2.0
 */

namespace Braspag\Braspag\Pagador\Transaction\Api\Wallet\Send;

use Braspag\Braspag\Pagador\Transaction\Api\AuthRequestInterface;

interface RequestInterface extends AuthRequestInterface
{
    const PAYMENT_TYPE = 'Wallet';

    public function getMerchantOrderId();

    public function getCustomerName();

    public function getCustomerIdentity();

    public function getCustomerIdentityType();

    public function getCustomerEmail();

    public function getCustomerBirthDate();

    public function getCustomerAddressStreet();

    public function getCustomerAddressNumber();

    public function getCustomerAddressComplement();

    public function getCustomerAddressDistrict();

    public function getCustomerAddressZipCode();

    public function getCustomerAddressCity();

    public function getCustomerAddressState();

    public function getCustomerAddressCountry();

    public function getPaymentAmount();

    public function getPaymentProvider();

    public function getPaymentBank();

    public function getPaymentAddress();

    public function getPaymentWalletNumber();

    public function getPaymentAssignor();

    public function getPaymentDemonstrative();

    public function getPaymentExpirationDate();

    public function getPaymentIdentification();

    public function getPaymentInstructions();
}