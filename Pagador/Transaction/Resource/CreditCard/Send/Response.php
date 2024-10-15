<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2016 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Send;

use Braspag\Braspag\Factories\ResponseFactory;
use Braspag\Braspag\Pagador\Transaction\Api\CreditCard\Send\ResponseInterface;
use Braspag\Braspag\Pagador\Transaction\Resource\ResponseAbstract;

/**
 * Class Response
 * @package Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Send
 */
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

    /**
     * @return bool
     */
    public function getPaymentAcquirerTransactionId()
    {
        if (! isset($this->response['Payment']['AcquirerTransactionId'])) {
            return false;
        }
        return $this->response['Payment']['AcquirerTransactionId'];
    }

    /**
     * @return bool
     */
    public function getPaymentAuthorizationCode()
    {
        if (! isset($this->response['Payment']['AuthorizationCode'])) {
            return false;
        }
        return $this->response['Payment']['AuthorizationCode'];
    }

    /**
     * @return bool
     */
    public function getPaymentPaymentId()
    {
        if (! isset($this->response['Payment']['PaymentId'])) {
            return false;
        }
        return $this->response['Payment']['PaymentId'];
    }

    /**
     * @return bool
     */
    public function getPaymentReceivedDate()
    {
        if (! isset($this->response['Payment']['ReceivedDate'])) {
            return false;
        }
        return $this->response['Payment']['ReceivedDate'];
    }

    /**
     * @return bool
     */
    public function getPaymentCapturedDate()
    {
        if (! isset($this->response['Payment']['CapturedDate'])) {
            return false;
        }
        return $this->response['Payment']['CapturedDate'];
    }

    /**
     * @return bool
     */
    public function getPaymentStatus()
    {
        if (! isset($this->response['Payment']['Status'])) {
            return false;
        }
        return $this->response['Payment']['Status'];
    }

    /**
     * @return bool
     */
    public function getPaymentProviderReturnCode()
    {
        if (! isset($this->response['Payment']['ProviderReturnCode'])) {
            return false;
        }
        return $this->response['Payment']['ProviderReturnCode'];
    }

    /**
     * @return bool
     */
    public function getPaymentProviderReturnMessage()
    {
        if (! isset($this->response['Payment']['ProviderReturnMessage'])) {
            return false;
        }
        return $this->response['Payment']['ProviderReturnMessage'];
    }

    /**
     * @return bool
     */
    public function getPaymentAuthenticate()
    {
        if (! isset($this->response['Payment']['Authenticate'])) {
            return false;
        }
        return $this->response['Payment']['Authenticate'];
    }

    /**
     * @return bool
     */
    public function getPaymentReasonCode()
    {
        if (! isset($this->response['Payment']['ReasonCode'])) {
            return false;
        }
        return $this->response['Payment']['ReasonCode'];
    }

    /**
     * @return bool
     */
    public function getPaymentReasonMessage()
    {
        if (! isset($this->response['Payment']['ReasonMessage'])) {
            return false;
        }
        return $this->response['Payment']['ReasonMessage'];
    }

    /**
     * @return bool
     */
    public function getAuthenticationUrl()
    {
        if (! isset($this->response['Payment']['AuthenticationUrl'])) {
            return false;
        }
        return $this->response['Payment']['AuthenticationUrl'];
    }

    /**
     * @return bool
     */
    public function getPaymentLinks()
    {
        if (! isset($this->response['Payment']['Links'])) {
            return false;
        }
        return $this->response['Payment']['Links'];
    }

    /**
     * @return bool
     */
    public function getPaymentCardToken()
    {
        if (! isset($this->response['Payment']['CreditCard']['CardToken'])) {
            return false;
        }
        return $this->response['Payment']['CreditCard']['CardToken'];
    }


    /**
     * @return bool
     */
    public function getPaymentCardExpirationDate()
    {
        if (! isset($this->response['Payment']['CreditCard']['ExpirationDate'])) {
            return false;
        }
        return $this->response['Payment']['CreditCard']['ExpirationDate'];
    }
 

    /**
     * @return bool
     */
    public function getPaymentCardNumberEncrypted()
    {
        if (! isset($this->response['Payment']['CreditCard']['CardNumber'])) {
            return false;
        }
        return $this->response['Payment']['CreditCard']['CardNumber'];
    }

    /**
     * @return bool
     */
    public function getPaymentCardBrand()
    {
        if (! isset($this->response['Payment']['CreditCard']['Brand'])) {
            return false;
        }
        return $this->response['Payment']['CreditCard']['Brand'];
    }

    /**
     * @return bool
     */
    public function getPaymentCardProvider()
    {
        if (! isset($this->response['Payment']['Provider'])) {
            return false;
        }

        return $this->response['Payment']['Provider'];
    }

    /**
     * @return bool|\Braspag\Braspag\Pagador\Transaction\Resource\AntiFraud\Response|\Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Avs\Response|\Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Velocity\Reasons\Response|\Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Velocity\Response
     */
    public function getPaymentFraudAnalysis()
    {
        if (! isset($this->response['Payment']['FraudAnalysis'])) {
            return false;
        }

        if (! is_array($this->response['Payment']['FraudAnalysis'])) {
            return false;
        }

        return ResponseFactory::make($this->response['Payment']['FraudAnalysis'], 'antiFraud');
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

        return ResponseFactory::make($this->response['Payment']['SplitTransaction'], 'paymentSplit');
    }

    /**
     * @return bool|\Braspag\Braspag\Pagador\Transaction\Resource\AntiFraud\Response|\Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Avs\Response|\Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Velocity\Reasons\Response|\Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Velocity\Response
     */
    public function getVelocityAnalysis()
    {
        if (! isset($this->response['Payment']['VelocityAnalysis'])) {
            return false;
        }

        if (! is_array($this->response['Payment']['VelocityAnalysis'])) {
            return false;
        }

        return ResponseFactory::make($this->response['Payment']['VelocityAnalysis'], 'velocity');
    }

    /**
     * @return bool|\Braspag\Braspag\Pagador\Transaction\Resource\AntiFraud\Response|\Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Avs\Response|\Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Velocity\Reasons\Response|\Braspag\Braspag\Pagador\Transaction\Resource\CreditCard\Velocity\Response
     */
    public function getAvs()
    {
        if (! isset($this->response['Payment']['CreditCard']['Avs'])) {
            return false;
        }

        if (! is_array($this->response['Payment']['CreditCard']['Avs'])) {
            return false;
        }

        return ResponseFactory::make($this->response['Payment']['CreditCard']['Avs'], 'avs');
    }
}