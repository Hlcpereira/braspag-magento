<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2016 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Pagador\Transaction\Resource\Wallet\Send;

use Braspag\Braspag\Factories\ResponseFactory;
use Braspag\Braspag\Pagador\Transaction\Api\Wallet\Send\ResponseInterface;
use Braspag\Braspag\Pagador\Transaction\Resource\ResponseAbstract;

class Response extends ResponseAbstract implements ResponseInterface
{
    public function getPayment()
    {
        if (! isset($this->response['Payment'])) {
            return false;
        }
        return $this->response['Payment'];
    }

    public function getPaymentStatus()
    {
        if (! isset($this->response['Payment']['Status'])) {
            return false;
        }
        return $this->response['Payment']['Status'];
    }

    public function getPaymentQrCodeBase64Image()
    {
        if (! isset($this->response['Payment']['QrCodeBase64Image'])) {
            return false;
        }
        return $this->response['Payment']['QrCodeBase64Image'];
    }

    public function getPaymentQrCodeString()
    {
        if (! isset($this->response['Payment']['QrCodeString'])) {
            return false;
        }
        return $this->response['Payment']['QrCodeString'];
    }

    public function getPaymentQrCodeExpiration()
    {
        if (! isset($this->response['Payment']['QrCodeExpiration'])) {
            return false;
        }
        return $this->response['Payment']['QrCodeExpiration'];
    }

    public function getPaymentPaymentId()
    {
        if (! isset($this->response['Payment']['PaymentId'])) {
            return false;
        }
        return $this->response['Payment']['PaymentId'];
    }

    public function getPaymentReasonMessage()
    {
        if (! isset($this->response['Payment']['ReasonMessage'])) {
            return false;
        }
        return $this->response['Payment']['ReasonMessage'];
    }

    public function getPaymentReasonCode()
    {
        if (! isset($this->response['Payment']['ReasonCode'])) {
            return false;
        }
        return $this->response['Payment']['ReasonCode'];
    }

    public function getPaymentProviderReturnMessage()
    {
        if (! isset($this->response['Payment']['ProviderReturnMessage'])) {
            return false;
        }
        return $this->response['Payment']['ProviderReturnMessage'];
    }

    public function getPaymentReceivedDate()
    {
        if (! isset($this->response['Payment']['ReceivedDate'])) {
            return false;
        }
        return $this->response['Payment']['ReceivedDate'];
    }

    public function getPaymentProvider()
    {
        if (! isset($this->response['Payment']['Provider'])) {
            return false;
        }
        return $this->response['Payment']['Provider'];
    }

    public function getPaymentExpirationDate()
    {
        if (! isset($this->response['Payment']['ExpirationDate'])) {
            return false;
        }
        return $this->response['Payment']['ExpirationDate'];
    }

    /**
     * @return bool|\Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Avs\Response|\Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Velocity\Reasons\Response|\Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Velocity\Response|\Braspag\Braspag\Pagador\Transaction\Resource\PaymentSplit\Response
     */
    public function getPaymentSplitPayments()
    {
        if (! isset($this->response['Payment']['SplitTransaction'])) {
            return false;
        }

        if (! is_array($this->response['Payment']['SplitTransaction'])) {
            return false;
        }

        return ResponseFactory::make($this->response['Payment']['SplitTransaction'], 'pixPaymentSplit');
    }
}