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
        $parcelShop = new ParcelShop();
        $parcelShop->placeId = 630087;
        $parcelShop->operatorId = 'hu1510';
        $parcelShop->name = 'Nyíregyháza MOL Vasgyár utca';
        $parcelShop->coordinates = new Coordinates(47.954398, 21.704269);

        $address = new Address();
        $address->zipCode = '4400';
        $address->city = 'Nyíregyháza';
        $address->street = 'Vasgyár utca 18.';
        $address->fullAddress = '4400 Nyíregyháza, Vasgyár utca 18.';
        $address->addressDescription = 'HU1510 számú kültéri automatánk a benzinkút épülete mellett, a Vasgyár utca felől található.';

        $parcelShop->address = $address;
        $parcelShop->isOutdoor = true;
        $parcelShop->apmType = ApmType::unknown();
        $parcelShop->workingHours = [
            new WorkingHours(DayType::monday(), '00:00', '24:00'),
            new WorkingHours(DayType::tuesday(), '00:00', '24:00'),
            new WorkingHours(DayType::wednesday(), '00:00', '24:00'),
            new WorkingHours(DayType::thursday(), '00:00', '24:00'),
            new WorkingHours(DayType::friday(), '00:00', '24:00'),
            new WorkingHours(DayType::saturday(), '00:00', '24:00'),
            new WorkingHours(DayType::sunday(), '00:00', '24:00'),
        ];

        return $parcelShop;
    }

    private function getSecondParcelShop(): ParcelShop
    {
        $parcelShop = new ParcelShop();
        $parcelShop->placeId = 629492;
        $parcelShop->operatorId = 'hu1508';
        $parcelShop->name = 'Győr Tesco Szigethy Attila út';
        $parcelShop->coordinates = new Coordinates(47.677188, 17.653352);

        $address = new Address();
        $address->zipCode = '9023';
        $address->city = 'Győr';
        $address->street = 'Szigethy Attila út 112.';
        $address->fullAddress = '9023 Győr, Szigethy Attila út 112.';
        $address->addressDescription = 'HU1508 számú kültéri automatánk az áruház bejáratától balra, a Szigethy út felől található.';

        $parcelShop->address = $address;
        $parcelShop->isOutdoor = true;
        $parcelShop->apmType = ApmType::rollkon();
        $parcelShop->workingHours = [
            new WorkingHours(DayType::monday(), '00:00', '24:00'),
            new WorkingHours(DayType::tuesday(), '00:00', '24:00'),
            new WorkingHours(DayType::wednesday(), '00:00', '24:00'),
            new WorkingHours(DayType::thursday(), '00:00', '24:00'),
            new WorkingHours(DayType::friday(), '00:00', '24:00'),
            new WorkingHours(DayType::saturday(), '00:00', '24:00'),
            new WorkingHours(DayType::sunday(), '00:00', '24:00'),
        ];

        return $parcelShop;
    }
}
