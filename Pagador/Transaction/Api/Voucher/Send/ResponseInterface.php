<?php

/**
 * Copyright (C) 2021 Signativa/FGP Desenvolvimento de Software
 *
 *  @author Esmerio Neto <esmerio.neto@signativa.com.br>
 *
 * SPDX-License-Identifier: Apache-2.0
 *
 */

namespace Braspag\Braspag\Pagador\Transaction\Api\Voucher\Send;

interface ResponseInterface
{
    public function getPaymentAuthenticationUrl();

    public function getPaymentAcquirerTransactionId();

    public function getPaymentProofOfSale();

    public function getPaymentPaymentId();

    public function getPaymentReceivedDate();

    public function getPaymentReasonCode();

    public function getPaymentReasonMessage();

    public function getPaymentStatus();

    public function getPaymentAuthenticate();

    public function getPaymentProviderReturnCode();

    public function getPaymentProviderReturnMessage();

    public function getPaymentLinks();

    public function getPaymentCardProvider();
}