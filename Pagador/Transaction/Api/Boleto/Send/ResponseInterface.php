<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2016 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Pagador\Transaction\Api\Boleto\Send;

interface ResponseInterface
{
    public function getPaymentUrl();

    public function getPaymentBoletoNumber();

    public function getPaymentBarCodeNumber();

    public function getPaymentPaymentId();

    public function getPaymentReceivedDate();

    public function getPaymentReasonCode();

    public function getPaymentReasonMessage();

    public function getPaymentStatus();

    public function getPaymentLinks();

    public function getDigitableLine();

    public function getExpirationDate();
}