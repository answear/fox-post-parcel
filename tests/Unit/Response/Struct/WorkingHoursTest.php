<?php

namespace Answear\FoxPostParcel\Tests\Unit\Response\Struct;

use Answear\FoxPostParcel\Response\Enum\DayType;
use Answear\FoxPostParcel\Response\Struct\WorkingHours;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class WorkingHoursTest extends TestCase
{
    #[Test]
    #[DataProvider('provideWorkingHoursString')]
    public function workingHoursParsedCorrectly(string $workingHoursString, WorkingHours $expectedWorkingHours): void
    {
        $workingHours = WorkingHours::fromArray(DayType::Monday->value, $workingHoursString);

        $this->assertEquals($expectedWorkingHours, $workingHours);
    }

    public static function provideWorkingHoursString(): iterable
    {
        yield 'working day' => [
            '7:00-19:00',
            WorkingHours::open(DayType::Monday, '7:00', '19:00'),
        ];

        yield 'working day with non breaking hyphen' => [
            '7:00–19:00',
            WorkingHours::open(DayType::Monday, '7:00', '19:00'),
        ];

        yield 'closed' => [
            'zárva',
            WorkingHours::closed(DayType::Monday),
        ];
    }
}
