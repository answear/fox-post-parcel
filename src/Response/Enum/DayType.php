<?php

declare(strict_types=1);

namespace Answear\FoxPostParcel\Response\Enum;

use MabeEnum\Enum;

class DayType extends Enum
{
    public const MONDAY = 'hetfo';
    public const TUESDAY = 'kedd';
    public const WEDNESDAY = 'szerda';
    public const THURSDAY = 'csutortok';
    public const FRIDAY = 'pentek';
    public const SATURDAY = 'szombat';
    public const SUNDAY = 'vasarnap';

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
}
