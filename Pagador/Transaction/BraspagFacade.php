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

use Braspag\Braspag\Factories\Auth3Ds20TokenCommandFactory;
use Braspag\Braspag\Factories\OAuth2TokenCommandFactory;
use Braspag\Braspag\Factories\PaymentSplitTransactionPostCommandFactory;
use Braspag\Braspag\Factories\PaymentSplitCreateSubordinateCommandFactory;
use Braspag\Braspag\Factories\PaymentSplitGetSubordinateCommandFactory;
use Braspag\Braspag\Factories\Auth3Ds20TokenRequestFactory;
use Braspag\Braspag\Factories\OAuth2TokenRequestFactory;
use Braspag\Braspag\Factories\BoletoRequestFactory;
use Braspag\Braspag\Factories\PaymentRequestFactory;
use Braspag\Braspag\Factories\CreditCardRequestFactory;
use Braspag\Braspag\Factories\PaymentSplitRequestFactory;
use Braspag\Braspag\Factories\PaymentSplitCreateSubordinateRequestFactory;
use Braspag\Braspag\Factories\PaymentSplitGetSubordinateRequestFactory;
use Braspag\Braspag\Factories\CaptureCommandFactory;
use Braspag\Braspag\Factories\DebitCardRequestFactory;
use Braspag\Braspag\Factories\GetCommandFactory;
use Braspag\Braspag\Factories\VoidCommandFactory;
use Braspag\Braspag\Factories\PixRequestFactory;
use Braspag\Braspag\Factories\VoucherRequestFactory;
use Braspag\Braspag\Pagador\Transaction\Api\Boleto\Send\RequestInterface as BoletoRequest;
use Braspag\Braspag\Pagador\Transaction\Api\CreditCard\Send\RequestInterface as CreditCardRequest;
use Braspag\Braspag\Pagador\Transaction\Api\Actions\RequestInterface as ActionsPaymentRequest;
use Braspag\Braspag\Pagador\Transaction\Api\Auth3Ds20\Token\RequestInterface as Auth3Ds20TokenRequest;
use Braspag\Braspag\Pagador\Transaction\Api\PaymentSplit\RequestInterface as PaymentSplitTransactionPostRequest;
use Braspag\Braspag\Pagador\Transaction\Api\PaymentSplit\CreateSubordinate\RequestInterface as PaymentSplitCreateSubordinateRequest;
use Braspag\Braspag\Pagador\Transaction\Api\PaymentSplit\GetSubordinate\RequestInterface as PaymentSplitGetSubordinateRequest;
use Braspag\Braspag\Pagador\Transaction\Api\OAuth2\Token\RequestInterface as OAuth2TokenRequest;
use Braspag\Braspag\Pagador\Transaction\Api\DebitCard\Send\RequestInterface as DebitRequest;
use Braspag\Braspag\Pagador\Transaction\Api\Pix\Send\RequestInterface as PixRequest;
use Braspag\Braspag\Pagador\Transaction\Api\Voucher\Send\RequestInterface as VoucherRequest;
use Braspag\Braspag\Factories\SalesCommandFactory;
use Braspag\Braspag\Pagador\Transaction\Command\Sales\CaptureCommand;
use Braspag\Braspag\Pagador\Transaction\Command\Sales\GetCommand;
use Braspag\Braspag\Pagador\Transaction\Command\Sales\VoidCommand;
use Braspag\Braspag\Pagador\Transaction\Command\SalesCommand;

class BraspagFacade implements FacadeInterface
{
    /**
     * @param ActionsAuthenticateRequest $request
     * @return AuthenticateCommand
     */
    public function getToken(Auth3Ds20TokenRequest $request)
    {
        $request = Auth3Ds20TokenCommandFactory::make(Auth3Ds20TokenRequestFactory::make($request))->getResult();

        return $request;
    }

    /**
     * @param ActionsAuthenticateRequest $request
     * @return AuthenticateCommand
     */
    public function getOAuth2Token(OAuth2TokenRequest $request)
    {
        $request = OAuth2TokenCommandFactory::make(OAuth2TokenRequestFactory::make($request))->getResult();

        return $request;
    }

    /**
     * @param BoletoRequest $request
     * @return SalesCommand
     */
    public function sendBoleto(BoletoRequest $request)
    {
        $request = SalesCommandFactory::make(BoletoRequestFactory::make($request))->getResult();
        return $request;
    }

    /**
     * @param CreditCardRequest $request
     * @return SalesCommand
     */
    public function sendCreditCard(CreditCardRequest $request)
    {
        $request = SalesCommandFactory::make(CreditCardRequestFactory::make($request))->getResult();
        return $request;
    }

    /**
     * @param PaymentSplitTransactionPostRequest $request
     * @return PaymentSplitTransactionPostRequest|SalesCommand
     */
    public function sendSplitPaymentTransactionPost(PaymentSplitTransactionPostRequest $request)
    {
        $request = PaymentSplitTransactionPostCommandFactory::make(PaymentSplitRequestFactory::make($request))->getResult();
        return $request;
    }

    /**
     * @param ActionsPaymentRequest $request
     * @return CaptureCommand
     */
    public function captureCreditCard(ActionsPaymentRequest $request)
    {
        $request = CaptureCommandFactory::make(PaymentRequestFactory::make($request))->getResult();
        return $request;
    }

    /**
     * @param DebitRequest $request
     * @return SalesCommand
     */
    public function sendDebit(DebitRequest $request)
    {
        $request = SalesCommandFactory::make(DebitCardRequestFactory::make($request))->getResult();
        return $request;
    }

    /**
     * @param ActionsPaymentRequest $request
     * @param $type
     * @return GetCommand
     */
    public function checkPaymentStatus(ActionsPaymentRequest $request, $type)
    {
        $request = GetCommandFactory::make(PaymentRequestFactory::make($request, $type))->getResult();
        return $request;
    }

    /**
     * @param ActionsPaymentRequest $request
     * @return VoidCommand
     */
    public function voidPayment(ActionsPaymentRequest $request)
    {
        $request = VoidCommandFactory::make(PaymentRequestFactory::make($request))->getResult();
        return $request;
    }

    /**
     * @param PaymentSplitCreateSubordinateRequest $request
     * @return PaymentSplitCreateSubordinateRequest
     */
    public function sendSplitPaymentCreateSubordinate(PaymentSplitCreateSubordinateRequest $request)
    {
        $request = PaymentSplitCreateSubordinateCommandFactory::make(PaymentSplitCreateSubordinateRequestFactory::make($request))->getResult();
        return $request;
    }

    /**
     * @param PaymentSplitGetSubordinateRequest $request
     * @return PaymentSplitGetSubordinateRequest
     */
    public function sendSplitPaymentGetSubordinate(PaymentSplitGetSubordinateRequest $request)
    {
        $request = PaymentSplitGetSubordinateCommandFactory::make(PaymentSplitGetSubordinateRequestFactory::make($request))->getResult();
        return $request;
    }

    /**
     * @param PixRequest $request
     * @return SalesCommand
     */
    public function sendPix(PixRequest $request)
    {
        $request = SalesCommandFactory::make(PixRequestFactory::make($request))->getResult();
        return $request;
    }

    /**
     * @param VoucherRequest $request
     * @return SalesCommand
     */
    public function sendVoucher(VoucherRequest $request)
    {
        $request = SalesCommandFactory::make(VoucherRequestFactory::make($request))->getResult();
        return $request;
    }
}