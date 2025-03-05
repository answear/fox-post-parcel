<?php

namespace Answear\FoxPostParcel\Tests\Traits;

use Answear\FoxPostParcel\Response\Enum\ApmType;
use Answear\FoxPostParcel\Response\Enum\DayType;
use Answear\FoxPostParcel\Response\Struct\Address;
use Answear\FoxPostParcel\Response\Struct\Coordinates;
use Answear\FoxPostParcel\Response\Struct\ParcelShop;
use Answear\FoxPostParcel\Response\Struct\ParcelShopCollection;
use Answear\FoxPostParcel\Response\Struct\WorkingHours;

trait ResponseTrait
{
    public function getExpectedParcelShops(): ParcelShopCollection
    {
        return new ParcelShopCollection([$this->getFirstParcelShop(), $this->getSecondParcelShop()]);
    }

    private function getFirstParcelShop(): ParcelShop
    {
        return new ParcelShop(
            630087,
            'hu1510',
            'Nyíregyháza MOL Vasgyár utca',
            new Coordinates(47.954398, 21.704269),
            new Address(
                '4400',
                'Nyíregyháza',
                'Vasgyár utca 18.',
                '4400 Nyíregyháza, Vasgyár utca 18.',
                'HU1510 számú kültéri automatánk a benzinkút épülete mellett, a Vasgyár utca felől található.'
            ),
            true,
            ApmType::Unknown,
            [
                WorkingHours::open(DayType::Monday, '00:00', '24:00'),
                WorkingHours::open(DayType::Tuesday, '00:00', '24:00'),
                WorkingHours::open(DayType::Wednesday, '00:00', '24:00'),
                WorkingHours::open(DayType::Thursday, '00:00', '24:00'),
                WorkingHours::open(DayType::Friday, '00:00', '24:00'),
                WorkingHours::open(DayType::Saturday, '00:00', '24:00'),
                WorkingHours::open(DayType::Sunday, '00:00', '24:00'),
            ]
        );
    }

    private function getSecondParcelShop(): ParcelShop
    {
        return new ParcelShop(
            629492,
            'hu1508',
            'Győr Tesco Szigethy Attila út',
            new Coordinates(47.677188, 17.653352),
            new Address(
                '9023',
                'Győr',
                'Szigethy Attila út 112.',
                '9023 Győr, Szigethy Attila út 112.',
                'HU1508 számú kültéri automatánk az áruház bejáratától balra, a Szigethy út felől található.'
            ),
            true,
            ApmType::Rollkon,
            [
                WorkingHours::open(DayType::Monday, '00:00', '24:00'),
                WorkingHours::open(DayType::Tuesday, '00:00', '24:00'),
                WorkingHours::open(DayType::Wednesday, '00:00', '24:00'),
                WorkingHours::open(DayType::Thursday, '00:00', '24:00'),
                WorkingHours::closed(DayType::Friday),
                WorkingHours::open(DayType::Saturday, '00:00', '24:00'),
                WorkingHours::closed(DayType::Sunday,),
            ]
        );
    }
}
