<?php

namespace SimpleService\Service;

use SimpleService\Repository\CityRepository;

class PartnerService implements PartnerServiceInterface
{
    public function getResultForCityId(int $cityId): array
    {
        $repository = new CityRepository();
        return $repository->findById($cityId)->hotels;
    }
}
