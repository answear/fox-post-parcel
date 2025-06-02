<?php

declare(strict_types=1);

namespace Answear\FoxPostParcel\Request;

class GetParcelShopsRequest implements Request
{
    private const string URL = 'https://cdn.foxpost.hu/foxplus.json';
    private const string HTTP_METHOD = 'GET';

    public function getRequestUrl(): string
    {
        return self::URL;
    }

    public function getMethod(): string
    {
        return self::HTTP_METHOD;
    }
}
