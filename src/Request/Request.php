<?php

declare(strict_types=1);

namespace Answear\FoxPostParcel\Request;

interface Request
{
    public function getRequestUrl(): string;

    public function getMethod(): string;
}
