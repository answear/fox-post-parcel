<?php

declare(strict_types=1);

namespace Answear\FoxPostParcel\Response\Struct;

use Webmozart\Assert\Assert;

readonly class ParcelShopCollection implements \Countable, \IteratorAggregate
{
    /**
     * @param ParcelShop[] $parcelShops
     */
    public function __construct(
        public array $parcelShops,
    ) {
        Assert::allIsInstanceOf($parcelShops, ParcelShop::class);
    }

    /**
     * @return \Traversable<ParcelShop>
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
