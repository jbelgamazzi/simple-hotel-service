<?php

namespace SimpleService\Entity;

use SimpleService\Collection\HotelCollection;

/**
 * Represents a single city in the result.
 * @codeCoverageIgnore
 */
class City
{
    /**
     * Name of the city.
     *
     * @var string
     */
    public $name;

    /**
     * Id of the city.
     *
     * @var int
     */
    public $id;

    /**
     * Unsorted list of hotels with their corresponding partners and prices.
     *
     * @var Hotel[]
     */
    public $hotels;

    /**
     * @param int $id
     * @param string $name
     * @param HotelCollection $hotelCollection
     */
    public function __construct(int $id = null, string $name, HotelCollection $hotelCollection)
    {
        $this->id = $id;
        $this->name = $name;
        $this->hotels = $hotelCollection->getValue();
    }

    /**
     * @param int $id
     * @param string $name
     * @param array $hotels
     * @return \self
     */
    public static function build(int $id, string $name, array $hotels) : self
    {
        $hotelCollection = new HotelCollection();

        foreach ($hotels as $hotelId => $hotelInformation) {
            $hotelCollection->add(Hotel::build(
                $hotelInformation['name'],
                $hotelInformation['adr'],
                $hotelInformation['partners']
            ));
        }

        return new self($id, $name, $hotelCollection);
    }
}
