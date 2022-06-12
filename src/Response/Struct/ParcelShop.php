<?php

namespace Answear\FoxPostParcel\Response\Struct;

use Answear\FoxPostParcel\Response\Enum\ApmType;
use Webmozart\Assert\Assert;

class ParcelShop
{
    public int $placeId;
    public string $operatorId;
    public string $name;
    public Coordinates $coordinates;
    public Address $address;
    public bool $isOutdoor;
    public ApmType $apmType;
    /**
     * @var WorkingHours[]
     */
    public array $workingHours = [];

    public static function fromArray(array $parcelShopData): self
    {
        Assert::integer($parcelShopData['place_id']);
        Assert::stringNotEmpty($parcelShopData['operator_id']);
        Assert::stringNotEmpty($parcelShopData['name']);
        Assert::float($parcelShopData['geolat']);
        Assert::float($parcelShopData['geolng']);
        Assert::boolean($parcelShopData['isOutdoor']);
        Assert::string($parcelShopData['apmType']);
        Assert::allNotEmpty($parcelShopData['open']);

        $parcelShop = new self();
        $address = Address::fromArray($parcelShopData);

        $parcelShop->address = $address;
        $parcelShop->placeId = $parcelShopData['place_id'];
        $parcelShop->operatorId = $parcelShopData['operator_id'];
        $parcelShop->name = $parcelShopData['name'];
        $parcelShop->coordinates = new Coordinates($parcelShopData['geolat'], $parcelShopData['geolng']);
        $parcelShop->isOutdoor = $parcelShopData['isOutdoor'];
        $parcelShop->apmType = self::getApmType($parcelShopData['apmType']);

        foreach ($parcelShopData['open'] as $day => $workingHoursString) {
            $workingHours = WorkingHours::fromArray($day, $workingHoursString);
            if (null !== $workingHours) {
                $parcelShop->workingHours[] = $workingHours;
            }
        }

        return $parcelShop;
    }

    private static function getApmType(string $apmTypeValue): ApmType
    {
        try {
            return ApmType::byValue($apmTypeValue);
        } catch (\InvalidArgumentException $exception) {
            return ApmType::unknown();
        }
    }
}
