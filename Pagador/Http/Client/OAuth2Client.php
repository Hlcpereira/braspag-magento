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

use Braspag\Braspag\Factories\HttpFactory as HttpClient;
use Braspag\Braspag\Pagador\Http\Services\ServiceInterface;
use Braspag\Braspag\Factories\HandlerFactory;

class OAuth2Client implements ClientInterface
{
    protected $client;

    protected $handler;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->client = HttpClient::make();
        $this->handler = HandlerFactory::make();
    }

    /**
     * @param ServiceInterface $service
     * @param string $method
     * @param string $uriComplement
     * @param bool $isTestEnvironment
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function request(
        ServiceInterface $service,
        $method = 'POST',
        $uriComplement = '',
        $isTestEnvironment = false
    ) {
        $params = $service->getRequest()->getParams();

        $apiURI = self::API_URI_OAUTH2;

        if ($isTestEnvironment === true) {
            $apiURI = self::API_URI_OAUTH2_TEST;
        }

        $uri = $apiURI . $service->getEndPoint() . $uriComplement;

        $headers = isset($params['headers']) ? $params['headers'] : [];
        $body = isset($params['body']) ? $params['body'] : [];
        $formParms = isset($params['form_params']) ? $params['form_params'] : [];

        return $this->client->request(
            $method,
            $uri,
            [
                'headers' => $headers,
                'form_params' => $formParms,
                'body' => \json_encode($body),
                'handler' => $this->handler
            ]
        );
    }

    public function getClient()
    {
        return $this->client;
    }
}