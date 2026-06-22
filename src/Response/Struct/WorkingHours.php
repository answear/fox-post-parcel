<?php

namespace Answear\FoxPostParcel\Response\Struct;

use Answear\FoxPostParcel\Response\Enum\DayType;
use Webmozart\Assert\Assert;

readonly class WorkingHours
{
    private function __construct(
        public DayType $dayType,
        public bool $isOpen,
        public ?string $from,
        public ?string $to,
    ) {
    }

    public static function open(DayType $dayType, string $from, string $to): self
    {
        return new self($dayType, true, $from, $to);
    }

    public static function closed(DayType $dayType): self
    {
        return new self($dayType, false, null, null);
    }

    public static function fromArray(string $day, string $workingHoursString): self
    {
        Assert::stringNotEmpty($day);
        $dayType = DayType::from($day);

        if (empty($workingHoursString)) {
            return self::closed($dayType);
        }

        try {
            if (false === ($parts = \preg_split('/(-|–)/', $workingHoursString))) {
                return self::closed($dayType);
            }

            if (2 === count($parts)) {
                [$from, $to] = $parts;

                return self::open($dayType, $from, $to);
            }

            return self::closed($dayType);
        } catch (\Throwable) {
            return self::closed($dayType);
        }
    }
}
