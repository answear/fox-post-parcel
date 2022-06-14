<?php

namespace Answear\FoxPostParcel\Response\Struct;

class ParcelShop
{
    public static function fromArray(array $pointData): self
    {
        return new self();
    }
}
