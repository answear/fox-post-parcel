<?php

declare(strict_types=1);

namespace Answear\FoxPostParcel\Request;

class GetPointsRequest implements Request
{
    private const URL = 'https://cdn.foxpost.hu/apms.json';
    private const HTTP_METHOD = 'GET';

    public function getRequestUrl(): string
    {
        return static::URL;
    }

    public function getMethod(): string
    {
        return static::HTTP_METHOD;
    }
}
