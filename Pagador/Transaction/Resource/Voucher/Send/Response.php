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

use Braspag\Braspag\Pagador\Transaction\Api\Voucher\Send\ResponseInterface;
use Braspag\Braspag\Pagador\Transaction\Resource\ResponseAbstract;
use Braspag\Braspag\Factories\ResponseFactory;

class Response extends ResponseAbstract implements ResponseInterface
{
    /**
     * @return mixed
     */
    public function getPayment()
    {
        return $this->response['Payment'];
    }

    /**
     * @return bool
     */
    public function getPaymentProofOfSale()
    {
        if (! isset($this->response['Payment']['ProofOfSale'])) {
            return false;
        }
        return $this->response['Payment']['ProofOfSale'];
    }

    public function getPaymentAuthenticationUrl()
    {
        if (! isset($this->response['Payment']['AuthenticationUrl'])) {
            return false;
        }
        return $this->response['Payment']['AuthenticationUrl'];
    }

    public function getPaymentAcquirerTransactionId()
    {
        if (! isset($this->response['Payment']['AcquirerTransactionId'])) {
            return false;
        }
        return $this->response['Payment']['AcquirerTransactionId'];
    }

    public function getPaymentPaymentId()
    {
        if (! isset($this->response['Payment']['PaymentId'])) {
            return false;
        }
        return $this->response['Payment']['PaymentId'];
    }

    public function getPaymentReceivedDate()
    {
        if (! isset($this->response['Payment']['ReceivedDate'])) {
            return false;
        }
        return $this->response['Payment']['ReceivedDate'];
    }

    public function getPaymentReasonCode()
    {
        if (! isset($this->response['Payment']['ReasonCode'])) {
            return false;
        }
        return $this->response['Payment']['ReasonCode'];
    }

    public function getPaymentReasonMessage()
    {
        if (! isset($this->response['Payment']['ReasonMessage'])) {
            return false;
        }
        return $this->response['Payment']['ReasonMessage'];
    }

    public function getPaymentStatus()
    {
        if (! isset($this->response['Payment']['Status'])) {
            return false;
        }
        return $this->response['Payment']['Status'];
    }

    public function getPaymentAuthenticate()
    {
        if (! isset($this->response['Payment']['Authenticate'])) {
            return false;
        }
        return (bool) $this->response['Payment']['Authenticate'];
    }

    public function getPaymentProviderReturnCode()
    {
        if (! isset($this->response['Payment']['ProviderReturnCode'])) {
            return false;
        }
        return $this->response['Payment']['ProviderReturnCode'];
    }

    public function getPaymentProviderReturnMessage()
    {
        if (! isset($this->response['Payment']['ProviderReturnMessage'])) {
            return false;
        }
        return $this->response['Payment']['ProviderReturnMessage'];
    }

    public function getPaymentLinks()
    {
        if (! isset($this->response['Payment']['Links'])) {
            return false;
        }
        return $this->response['Payment']['Links'];
    }

    public function getPaymentCardProvider()
    {
        if (! isset($this->response['Payment']['Provider'])) {
            return false;
        }

        return $this->response['Payment']['Provider'];
    }


    public function getPaymentSplitPayments()
    {
        if (! isset($this->response['Payment']['SplitTransaction'])) {
            return false;
        }

        if (! is_array($this->response['Payment']['SplitTransaction'])) {
            return false;
        }

        return ResponseFactory::make($this->response['Payment']['SplitTransaction'], 'voucherPaymentSplit');
    }
}