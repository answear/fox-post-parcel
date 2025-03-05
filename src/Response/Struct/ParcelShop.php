<?php

namespace Answear\FoxPostParcel\Response\Struct;

use Answear\FoxPostParcel\Response\Enum\ApmType;
use Webmozart\Assert\Assert;

readonly class ParcelShop
{
    /**
     * @param WorkingHours[] $workingHours
     */
    public function __construct(
        public int $placeId,
        public string $operatorId,
        public string $name,
        public Coordinates $coordinates,
        public Address $address,
        public bool $isOutdoor,
        public ApmType $apmType,
        public array $workingHours,
    ) {
    }

    public static function fromArray(array $parcelShopData): self
    {
        Assert::integer($parcelShopData['place_id']);
        Assert::stringNotEmpty($parcelShopData['operator_id']);
        Assert::stringNotEmpty($parcelShopData['name']);
        Assert::float($parcelShopData['geolat']);
        Assert::float($parcelShopData['geolng']);
        Assert::boolean($parcelShopData['isOutdoor']);
        Assert::string($parcelShopData['apmType']);

        $workingHours = [];
        foreach ($parcelShopData['open'] as $day => $workingHoursString) {
            $workingHours[] = WorkingHours::fromArray($day, $workingHoursString);
        }

        return new self(
            $parcelShopData['place_id'],
            $parcelShopData['operator_id'],
            $parcelShopData['name'],
            new Coordinates($parcelShopData['geolat'], $parcelShopData['geolng']),
            Address::fromArray($parcelShopData),
            $parcelShopData['isOutdoor'],
            self::getApmType($parcelShopData['apmType']),
            $workingHours
        );
    }

    private static function getApmType(string $apmTypeValue): ApmType
    {
        try {
            return ApmType::from($apmTypeValue);
        } catch (\ValueError) {
            return ApmType::Unknown;
        }
    }
}
