<?php

namespace SimpleService\Collection;

use SimpleService\Entity\Price;

class PriceCollection
{
    use Collection;

    public function __construct()
    {
        $this->collectionType = Price::class;
    }
}
