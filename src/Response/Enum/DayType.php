<?php

declare(strict_types=1);

namespace Answear\FoxPostParcel\Response\Enum;

enum DayType: string
{
    case Monday = 'hetfo';
    case Tuesday = 'kedd';
    case Wednesday = 'szerda';
    case Thursday = 'csutortok';
    case Friday = 'pentek';
    case Saturday = 'szombat';
    case Sunday = 'vasarnap';
}
