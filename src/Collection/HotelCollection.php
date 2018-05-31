<?php

namespace SimpleService\Collection;

use SimpleService\Entity\Hotel;

class HotelCollection
{
    use Collection;

    public function __construct()
    {
        $this->collectionType = Hotel::class;
    }
}
