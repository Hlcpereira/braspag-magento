<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2016 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Pagador\Transaction;

use Braspag\Braspag\Pagador\Transaction\Api\Auth3Ds20\Token\RequestInterface as ActionsAuthRequest;
use Braspag\Braspag\Pagador\Transaction\Api\Boleto\Send\RequestInterface as BoletoRequest;
use Braspag\Braspag\Pagador\Transaction\Api\CreditCard\Send\RequestInterface as CreditCardRequest;
use Braspag\Braspag\Pagador\Transaction\Api\PaymentSplit\RequestInterface as PaymentSplitTransactionPostRequest;
use Braspag\Braspag\Pagador\Transaction\Api\PaymentSplit\CreateSubordinate\RequestInterface as PaymentSplitCreateSubordinateRequest;
use Braspag\Braspag\Pagador\Transaction\Api\PaymentSplit\GetSubordinate\RequestInterface as PaymentSplitGetSubordinateRequest;
use Braspag\Braspag\Pagador\Transaction\Api\Actions\RequestInterface as ActionsPaymentRequest;
use Braspag\Braspag\Pagador\Transaction\Api\DebitCard\Send\RequestInterface as DebitRequest;
use Braspag\Braspag\Pagador\Transaction\Api\Pix\Send\RequestInterface as PixRequest;
use Braspag\Braspag\Pagador\Transaction\Command\Sales\CaptureCommand;
use Braspag\Braspag\Pagador\Transaction\Command\Sales\GetCommand;
use Braspag\Braspag\Pagador\Transaction\Command\Sales\VoidCommand;
use Braspag\Braspag\Pagador\Transaction\Command\SalesCommand;

interface FacadeInterface
{
    /**
     * @param ActionsAuthRequest $request
     * @return mixed
     */
    public function getToken(ActionsAuthRequest $request);

    /**
     * @param BoletoRequest $request
     * @return SalesCommand
     */
    public function sendBoleto(BoletoRequest $request);

    /**
     * @param CreditCardRequest $request
     * @return SalesCommand
     */
    public function sendCreditCard(CreditCardRequest $request);

    /**
     * @param DebitCardRequest $request
     * @return SalesCommand
     */
    public function sendSplitPaymentTransactionPost(PaymentSplitTransactionPostRequest $request);

    /**
     * @param ActionsPaymentRequest $request
     * @return CaptureCommand
     */
    public function captureCreditCard(ActionsPaymentRequest $request);

    /**
     * @param DebitRequest $request
     * @return SalesCommand
     */
    public function sendDebit(DebitRequest $request);

    /**
     * @param ActionsPaymentRequest $request
     * @param $type
     * @return GetCommand
     */
    public function checkPaymentStatus(ActionsPaymentRequest $request, $type);

    /**
     * @param ActionsPaymentRequest $request
     * @return VoidCommand
     */
    public function voidPayment(ActionsPaymentRequest $request);

    /**
     * @param PaymentSplitCreateSubordinateRequest $request
     * @return mixed
     */
    public function sendSplitPaymentCreateSubordinate(PaymentSplitCreateSubordinateRequest $request);

    /**
     * @param PaymentSplitGetSubordinateRequest $request
     * @return mixed
     */
    public function sendSplitPaymentGetSubordinate(PaymentSplitGetSubordinateRequest $request);

    /**
     * @param PixRequest $request
     * @return SalesCommand
     */
    public function sendPix(PixRequest $request);
}