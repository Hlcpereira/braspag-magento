<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2016 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Pagador\Transaction\Api\Voucher\Send;

use Braspag\Braspag\Pagador\Transaction\Api\AuthRequestInterface;

interface RequestInterface extends AuthRequestInterface
{
    const PAYMENT_TYPE = 'Voucher';

    public function getMerchantOrderId();

    public function getCustomerName();

    public function getCustomerIdentity();

    public function getCustomerIdentityType();

    public function getCustomerEmail();

    public function getCustomerBirthDate();

    public function getCustomerAddressStreet();

    public function getCustomerAddressNumber();

    public function getCustomerAddressComplement();

    public function getCustomerAddressZipCode();

    public function getCustomerAddressDistrict();

    public function getCustomerAddressCity();

    public function getCustomerAddressState();

    public function getCustomerAddressCountry();

    public function getCustomerAddressPhone();

    public function getCustomerDeliveryAddressStreet();

    public function getCustomerDeliveryAddressNumber();

    public function getCustomerDeliveryAddressComplement();

    public function getCustomerDeliveryAddressZipCode();

    public function getCustomerDeliveryAddressDistrict();

    public function getCustomerDeliveryAddressCity();

    public function getCustomerDeliveryAddressState();

    public function getCustomerDeliveryAddressCountry();

    public function getCustomerDeliveryAddressPhone();

    public function getPaymentAmount();

    public function getPaymentProvider();

    public function getPaymentReturnUrl();

    public function getPaymentVoucherCardNumber();

    public function getPaymentVoucherHolder();

    public function getPaymentAuthenticate();

    public function getPaymentVoucherExpirationDate();

    public function getPaymentVoucherSecurityCode();

    public function getPaymentVoucherBrand();

    public function getPaymentVoucherSoptpaymenttoken();

    public function getPaymentVoucherSaveCard();

    public function getPaymentExternalAuthenticationFailureType();

    public function getPaymentExternalAuthenticationCavv();

    public function getPaymentExternalAuthenticationXid();

    public function getPaymentExternalAuthenticationEci();

    public function getPaymentCardExternalAuthenticationVersion();

    public function getPaymentExternalAuthenticationReferenceId();

    public function getPaymentCurrency();

    public function getPaymentCountry();

    public function getRemoteIpAddress();
}