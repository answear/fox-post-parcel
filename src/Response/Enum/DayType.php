<?php

declare(strict_types=1);

namespace Answear\OverseasBundle\Enum;

use MabeEnum\Enum;
use MabeEnum\EnumSerializableTrait;

class DayType extends Enum implements \Serializable
{
    use EnumSerializableTrait;

    public const WORKING_DAY = 1;
    public const MONDAY = 7;
    public const TUESDAY = 8;
    public const WEDNESDAY = 9;
    public const THURSDAY = 10;
    public const FRIDAY = 11;
    public const SATURDAY = 2;
    public const SUNDAY = 3;

    public static function friday(): self
    {
        return static::get(static::FRIDAY);
    }

    public static function thursday(): self
    {
        return static::get(static::THURSDAY);
    }

    public static function wednesday(): self
    {
        return static::get(static::WEDNESDAY);
    }

    public static function tuesday(): self
    {
        return static::get(static::TUESDAY);
    }

    public static function monday(): self
    {
        return static::get(static::MONDAY);
    }

    public static function sunday(): self
    {
        return static::get(static::SUNDAY);
    }

    public static function saturday(): self
    {
        return static::get(static::SATURDAY);
    }

    public static function workingDay(): self
    {
        return static::get(static::WORKING_DAY);
    }
}
