<?php

namespace Answear\FoxPostParcel\Tests\Unit\Response\Struct;

use Answear\FoxPostParcel\Response\Enum\DayType;
use Answear\FoxPostParcel\Response\Struct\WorkingHours;
use PHPUnit\Framework\TestCase;

class WorkingHoursTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideWorkingHoursString
     */
    public function workingHoursParsedCorrectly(string $workingHoursString, WorkingHours $expectedWorkingHours): void
    {
        $workingHours = WorkingHours::fromArray(DayType::monday()->getValue(), $workingHoursString);

        $this->assertEquals($expectedWorkingHours, $workingHours);
    }

    public function provideWorkingHoursString(): iterable
    {
        yield 'working day' => [
            '7:00-19:00',
            new WorkingHours(DayType::monday(), true, '7:00', '19:00'),
        ];

        yield 'working day with non breaking hyphen' => [
            '7:00–19:00',
            new WorkingHours(DayType::monday(), true, '7:00', '19:00'),
        ];

        yield 'closed' => [
            'zárva',
            new WorkingHours(DayType::monday(), false, null, null),
        ];
    }
}
