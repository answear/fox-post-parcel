<?php

namespace Answear\FoxPostParcel\Tests\Integration\Command;

use Answear\FoxPostParcel\Client\Client;
use Answear\FoxPostParcel\Command\GetParcelShops;
use Answear\FoxPostParcel\Tests\Traits\MockGuzzleTrait;
use Answear\FoxPostParcel\Tests\Traits\ResponseTrait;
use Answear\FoxPostParcel\Tests\Util\FileUtil;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class GetPointsTest extends TestCase
{
    use MockGuzzleTrait;
    use ResponseTrait;

    /**
     * @test
     */
    public function successfullyGetPoints(): void
    {
        $command = $this->getCommand();

//        $this->mockGuzzleResponse(
//            new Response(200, [], FileUtil::getFileContents(__DIR__ . '/data/parcelShops.json'))
//        );

        $result = $command->getPoints();

//        $this->assertEquals($this->getExpectedParcelShops(), $result);
    }

    private function getCommand(): GetParcelShops
    {
//        return new GetParcelShops(new Client($this->setupGuzzleClient()));
        return new GetParcelShops(new Client());
    }

}