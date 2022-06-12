<?php

declare(strict_types=1);

namespace Answear\FoxPostParcel\Response;

use Answear\FoxPostParcel\Response\Struct\ParcelShop;
use Answear\FoxPostParcel\Response\Struct\ParcelShopCollection;

class GetParcelShopsResponse
{
    public ParcelShopCollection $parcelShopCollection;

    public function __construct(ParcelShopCollection $parcelShopCollection)
    {
        $this->parcelShopCollection = $parcelShopCollection;
    }

    public static function fromArray(array $arrayResponse): self
    {
        return new self(new ParcelShopCollection(\array_map(fn($pointData) => ParcelShop::fromArray($pointData), $arrayResponse)));
    }

    public function getParcelShopCollection(): ParcelShopCollection
    {
        return $this->parcelShopCollection;
    }
}
