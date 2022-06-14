<?php

declare(strict_types=1);

namespace Answear\FoxPostParcel\Command;

use Answear\FoxPostParcel\Client\Client;
use Answear\FoxPostParcel\Request\GetParcelShopsRequest;
use Answear\FoxPostParcel\Response\GetParcelShopsResponse;
use GuzzleHttp\Psr7\Request as HttpRequest;
use GuzzleHttp\Psr7\Uri;

class GetParcelShops extends AbstractCommand
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getParcelShops(): GetParcelShopsResponse
    {
        $request = new GetParcelShopsRequest();

        $httpRequest = new HttpRequest(
            $request->getMethod(),
            new Uri($request->getRequestUrl()),
            [
                'Content-type' => 'application/json',
            ]
        );

        $response = $this->client->request($httpRequest);

        $body = $this->getBody($response);

        return GetParcelShopsResponse::fromArray($body);
    }
}
