<?php

namespace Answear\FoxPostParcel\Response\Enum;

use MabeEnum\Enum;

class ApmType extends Enum
{
    public const UNKNOWN = 'Unknown';
    public const ROLLKON = 'Rollkon';
    public const CLEVERON = 'Cleveron';
    public const KEBA = 'Keba';

    public static function unknown(): self
    {
        return static::get(self::UNKNOWN);
    }

    public static function rollkon(): self
    {
        return static::get(self::ROLLKON);
    }

    public static function cleveron(): self
    {
        return static::get(self::CLEVERON);
    }

    public static function keba(): self
    {
        return static::get(self::KEBA);
    }
}
