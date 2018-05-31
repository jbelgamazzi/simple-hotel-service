<?php

namespace SimpleService\Collection;

use SimpleService\Entity\Partner;

class PartnerCollection
{
    use Collection;

    public function __construct()
    {
        $this->collectionType = Partner::class;
    }
}
