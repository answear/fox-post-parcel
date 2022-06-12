<?php

declare(strict_types=1);

namespace Answear\FoxPostParcel\Command;

use Answear\FoxPostParcel\Client\Client;
use Answear\FoxPostParcel\Request\GetPointsRequest;
use Answear\FoxPostParcel\Response\GetPointsResponse;
use GuzzleHttp\Psr7\Request as HttpRequest;
use GuzzleHttp\Psr7\Uri;

class GetPoints extends AbstractCommand
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getPoints(): GetPointsResponse
    {
        $request = new GetPointsRequest();

        $httpRequest = new HttpRequest(
            $request->getMethod(),
            new Uri($request->getRequestUrl()),
            [
                'Content-type' => 'application/json',
            ]
        );

        $response = $this->client->request($httpRequest);

        $body = $this->getBody($response);

        return GetPointsResponse::fromArray($body);
    }
}
