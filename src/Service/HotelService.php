<?php

namespace SimpleService\Service;

/**
 * This class is an (unfinished) example implementation of an unordered hotel service.
 */
class HotelService implements HotelServiceInterface
{
    /**
     * @var PartnerServiceInterface
     */
    private $partnerService;

    /**
     * Maps from city name to the id for the partner service.
     *
     * @var array
     */
    private $cityName2cityId = [
        "Moscow" => 12345
    ];

    /**
     * @param PartnerServiceInterface $partnerService
     */
    public function __construct(PartnerServiceInterface $partnerService)
    {
       $this->partnerService = $partnerService;
    }

    /**
     * @inheritdoc
     */
    public function getHotelsForCity(string $cityName): array
    {
        if (!isset($this->cityName2cityId[$cityName]))
        {
            throw new \InvalidArgumentException(sprintf('Given city name "%s" is not mapped.', $cityName));
        }

        $cityId = $this->cityName2cityId[$cityName];
        return $this->partnerService->getResultForCityId($cityId);

    }
}
