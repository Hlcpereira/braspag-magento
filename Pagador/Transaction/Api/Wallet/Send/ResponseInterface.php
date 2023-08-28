<?php

/*
 * Copyright (C) 2021 Signativa/FGP Desenvolvimento de Software
 *
 * SPDX-License-Identifier: Apache-2.0
 */
namespace Braspag\Braspag\Pagador\Transaction\Api\Wallet\Send;

interface ResponseInterface
{
    public function getPayment();

    public function getPaymentStatus();

    public function getPaymentQrCodeBase64Image();

    public function getPaymentQrCodeString();

    public function getPaymentQrCodeExpiration();

    public function getPaymentPaymentId();

    public function getPaymentReasonMessage();

    public function getPaymentReasonCode();

    public function getPaymentProviderReturnMessage();

    public function getPaymentReceivedDate();

    public function getPaymentProvider();

    public function getPaymentExpirationDate();
}