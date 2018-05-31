<?php

namespace SimpleService\Repository;

use SimpleService\Entity\City;
use SimpleService\Exception\RepositoryException;
use SimpleService\Output;

class CityRepository
{
    const JSON_FILE_PATH = __DIR__ . '/../../data/12345.json';

    /**
     * @param int $cityId
     * @return City
     * @throws RepositoryException
     */
    public function findById(int $cityId) : City
    {
        $information = $this->loadJsonFileAsArray();

        if ($information['id'] == $cityId) {
            return City::build(
                $information['id'],
                $information['city'],
                $information['hotels']
            );
        }

        throw new RepositoryException(sprintf('City not found by id %d'), $cityId);
    }

    /**
     * @param string $cityName
     * @return City
     * @throws RepositoryException
     */
    public function findByName(string $cityName) : City
    {
        $information = $this->loadJsonFileAsArray();
        if ($information['city'] == $cityName) {
            return City::build(
                $information['id'],
                $information['city'],
                $information['hotels']
            );
        }
        throw new RepositoryException(sprintf('City not found by name %s'), $cityName);
    }

    /**
     * This method is to simulate query response
     * @codeCoverageIgnore
     * @return array
     */
    protected function loadJsonFileAsArray() : array
    {
        $output = new Output\Output();
        $output->set(new Output\FileStringOutput(self::JSON_FILE_PATH));
        $jsonString = $output->load();
        return json_decode($jsonString, true);
    }
}
