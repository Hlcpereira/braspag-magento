<?php

/**
 * @author      Webjump Core Team <dev@webjump.com>
 * @copyright   2016 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 *
 */

namespace Braspag\Braspag\Factories;

use Braspag\Braspag\Pagador\Transaction\Command\OAuth2\TokenCommand;
use Braspag\Braspag\Pagador\Transaction\Resource\RequestAbstract;

class OAuth2TokenCommandFactory
{
    /**
     * @param RequestAbstract $request
     * @return GetTokenCommand
     */
    public static function make(RequestAbstract $request)
    {
        return new TokenCommand($request);
    }
}