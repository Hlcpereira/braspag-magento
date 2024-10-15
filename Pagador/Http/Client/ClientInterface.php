<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2016 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Pagador\Http\Client;

use Braspag\Braspag\Pagador\Http\Services\ServiceInterface;

/**
 * Interface ClientInterface
 * @package Braspag\Braspag\Pagador\Http\Client
 */
interface ClientInterface
{
    const API_URI               = 'https://api.braspag.com.br/v2';
    const API_CONSULT_URI       = 'https://apiquery.braspag.com.br/v2';
    const API_URI_TEST          = 'https://apisandbox.braspag.com.br/v2';
    const API_CONSULT_URI_TEST  = 'https://apiquerysandbox.braspag.com.br/v2';
    const API_URI_AUTH_3DS_20          = 'https://mpi.braspag.com.br/v2';
    const API_URI_AUTH_3DS_20_TEST     = 'https://mpisandbox.braspag.com.br/v2';

    const API_URI_OAUTH2          = 'https://auth.braspag.com.br/';
    const API_URI_OAUTH2_TEST     = 'https://authsandbox.braspag.com.br/';

    const API_URI_PAYMENT_SPLIT          = 'https://split.braspag.com.br/';
    const API_URI_PAYMENT_SPLIT_TEST     = 'https://splitsandbox.braspag.com.br/';

    const API_URI_PAYMENT_SPLIT_ONBOARDING          = 'https://splitonboarding.braspag.com.br/';
    const API_URI_PAYMENT_SPLIT_ONBOARDING_TEST     = 'https://splitonboardingsandbox.braspag.com.br/';

    public function request(ServiceInterface $service, $method = 'POST', $uriComplement = '');
}