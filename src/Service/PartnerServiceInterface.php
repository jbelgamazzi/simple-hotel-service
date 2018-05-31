<?php

namespace SimpleService\Service;

/**
 * Represents the connection to a specific partner. In this test case we will
 * pretend to have only one partner to make it not too complex.
 *
 */
interface PartnerServiceInterface
{
    /**
     * This method should read from a datasource (JSON in our case)
     * and return an unsorted list of hotels found in the datasource.
     *
     * @param int $cityId
     *
     * @return \SimpleService\Entity\Hotel[]
     */
    public function getResultForCityId(int $cityId): array;
}
