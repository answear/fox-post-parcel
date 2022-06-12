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

    public function __construct(array $parcelShops)
    {
        Assert::allIsInstanceOf($parcelShops, ParcelShop::class);

        $this->parcelShops = $parcelShops;
    }

    /**
     * @return ParcelShop[]|\Traversable
     */
    public function getIterator(): \Traversable
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
