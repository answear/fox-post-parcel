<?php

declare(strict_types=1);

namespace Answear\FoxPostParcel\Request;

class GetParcelShopsRequest implements Request
{
    private const URL = 'https://cdn.foxpost.hu/apmsc2c.json';
    private const HTTP_METHOD = 'GET';

    public function getRequestUrl(): string
    {
        return self::URL;
    }

    public function getMethod(): string
    {
        return self::HTTP_METHOD;
    }
}
