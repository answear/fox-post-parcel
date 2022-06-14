<?php

namespace Answear\FoxPostParcel\Response\Struct;

use Answear\FoxPostParcel\Response\Enum\DayType;
use Webmozart\Assert\Assert;

class WorkingHours
{
    public DayType $dayType;
    public bool $isOpen;
    public ?string $from;
    public ?string $to;

    private function __construct(DayType $dayType, bool $isOpen, ?string $from, ?string $to)
    {
        $this->dayType = $dayType;
        $this->from = $from;
        $this->to = $to;
        $this->isOpen = $isOpen;
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
        Assert::stringNotEmpty($workingHoursString);

        $dayType = DayType::byValue($day);

        try {
            [$from, $to] = \preg_split('/(-|–)/', $workingHoursString);

            return self::open($dayType, $from, $to);
        } catch (\Throwable $throwable) {
            return self::closed($dayType);
        }
    }
}
