<?php

declare(strict_types=1);

namespace Answear\FoxPostParcel\Response\Struct;

use Webmozart\Assert\Assert;


class ParcelShopCollection implements \Countable, \IteratorAggregate
{
    /**
     * @var ParcelShop[]
     */
    private array $parcelShops;

    public function __construct(array $offices)
    {
        Assert::allIsInstanceOf($offices, ParcelShop::class);

        $this->parcelShops = $offices;
    }

    /**
     * @return ParcelShop[]
     */
    public function getIterator(): iterable
    {
        foreach ($this->parcelShops as $key => $office) {
            yield $key => $office;
        }
    }

    public function get($key): ?ParcelShop
    {
        return $this->parcelShops[$key] ?? null;
    }

    public function count(): int
    {
        return \count($this->parcelShops);
    }
}
