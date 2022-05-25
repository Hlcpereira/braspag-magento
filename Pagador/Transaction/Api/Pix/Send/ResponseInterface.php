<?php

/*
 * Copyright (C) 2021 Signativa/FGP Desenvolvimento de Software
 *
 * SPDX-License-Identifier: Apache-2.0
 */
namespace Webjump\Braspag\Pagador\Transaction\Api\Pix\Send;

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