<?php

namespace Answear\FoxPostParcel\Response\Struct;

use Answear\FoxPostParcel\Response\Enum\DayType;
use Webmozart\Assert\Assert;

class WorkingHours
{
    public DayType $dayType;
    public string $from;
    public string $to;

    public function __construct(DayType $dayType, string $from, string $to)
    {
        $this->dayType = $dayType;
        $this->from = $from;
        $this->to = $to;
    }

    public static function fromArray(string $day, string $workingHoursString): ?self
    {
        Assert::stringNotEmpty($day);
        Assert::stringNotEmpty($workingHoursString);

        $dayType = DayType::byValue($day);

        try {
            [$from, $to] = \preg_split('/(-|–)/', $workingHoursString);
        } catch (\Throwable $throwable) {
            return null;
        }

        return new self($dayType, $from, $to);
    }
}
