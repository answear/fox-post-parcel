<?php

declare(strict_types=1);

namespace Answear\FoxPostParcel\Command;

use Answear\FoxPostParcel\Exception\MalformedResponse;
use Psr\Http\Message\ResponseInterface;
use Webmozart\Assert\Assert;

abstract class AbstractCommand
{
    protected function getBody(ResponseInterface $response): array
    {
        try {
            $body = $response->getBody()->getContents();

            if (empty($body)) {
                throw new MalformedResponse('Empty response.');
            }
            $decoded = \json_decode($body, true, 512, JSON_THROW_ON_ERROR);
            Assert::isArray($decoded);
        } catch (\Throwable $e) {
            throw new MalformedResponse($e->getMessage(), $e);
        }

        return $decoded;
    }
}
