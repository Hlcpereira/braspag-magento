<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2016 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Pagador\Transaction\Api\DebitCard\Send;

use Braspag\Braspag\Pagador\Transaction\Api\AuthRequestInterface;

interface RequestInterface extends AuthRequestInterface
{
    const PAYMENT_TYPE = 'DebitCard';

    public function getMerchantOrderId();

    public function getCustomerName();

    public function getPaymentAmount();

    public function getPaymentProvider();

    public function getPaymentReturnUrl();

    public function getPaymentDebitCardCardNumber();

    public function getPaymentDebitCardHolder();

    public function getPaymentAuthenticate();

    public function getPaymentDebitCardExpirationDate();

    public function getPaymentDebitCardSecurityCode();

    public function getPaymentDebitCardBrand();

    public function getPaymentCreditSoptpaymenttoken();

    public function getPaymentCreditCardBrand();

    public function getPaymentCreditCardSaveCard();

    public function getPaymentExternalAuthenticationFailureType();

    public function getPaymentExternalAuthenticationCavv();

    public function getPaymentExternalAuthenticationXid();

    public function getPaymentExternalAuthenticationEci();

    public function getPaymentCardExternalAuthenticationVersion();

    public function getPaymentExternalAuthenticationReferenceId();
}