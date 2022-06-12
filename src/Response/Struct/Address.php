<?php

namespace Answear\FoxPostParcel\Response\Struct;

use Webmozart\Assert\Assert;

class Address
{
    public string $zipCode;
    public string $city;
    public string $street;
    public string $fullAddress;
    public ?string $addressDescription;

    public static function fromArray(array $parcelShopData): self
    {
        Assert::stringNotEmpty($parcelShopData['zip']);
        Assert::stringNotEmpty($parcelShopData['city']);
        Assert::stringNotEmpty($parcelShopData['street']);
        Assert::stringNotEmpty($parcelShopData['address']);
        Assert::string($parcelShopData['findme']);

        $address = new self();

        $address->zipCode = $parcelShopData['zip'];
        $address->city = $parcelShopData['city'];
        $address->street = $parcelShopData['street'];
        $address->fullAddress = $parcelShopData['address'];
        $address->addressDescription = empty($parcelShopData['findme']) ? null : $parcelShopData['findme'];

        return $address;
    }
}
