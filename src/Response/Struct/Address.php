<?php

namespace Answear\FoxPostParcel\Response\Struct;

use Webmozart\Assert\Assert;

readonly class Address
{
    public function __construct(
        public string $zipCode,
        public string $city,
        public string $street,
        public string $fullAddress,
        public ?string $addressDescription,
    ) {
    }

    public static function fromArray(array $parcelShopData): self
    {
        Assert::stringNotEmpty($parcelShopData['zip']);
        Assert::stringNotEmpty($parcelShopData['city']);
        Assert::stringNotEmpty($parcelShopData['street']);
        Assert::stringNotEmpty($parcelShopData['address']);
        Assert::string($parcelShopData['findme']);

        return new self(
            $parcelShopData['zip'],
            $parcelShopData['city'],
            $parcelShopData['street'],
            $parcelShopData['address'],
            empty($parcelShopData['findme']) ? null : $parcelShopData['findme']
        );
    }
}
