<?php

namespace SimpleService\Entity;

use SimpleService\Collection\PartnerCollection;

/**
 * Represents a single hotel in the result.
 * @codeCoverageIgnore
 */
class Hotel
{
    /**
     * Name of the hotel.
     *
     * @var string
     */
    public $name;

    /**
     * Street adr. of the hotel.
     *
     * @var string
     */
    public $address;

    /**
     * Unsorted list of partners with their corresponding prices.
     *
     * @var Partner[]
     */
    public $partners = [];

    /**
     * @param string $name
     * @param string $address
     * @param PartnerCollection $partnerCollection
     */
    public function __construct(string $name, string $address, PartnerCollection $partnerCollection)
    {
        $this->name = $name;
        $this->address = $address;
        $this->partners = $partnerCollection->getValue();
    }

    /**
     * @param string $name
     * @param string $address
     * @param array $partners
     * @return \self
     */
    public static function build(string $name, string $address, array $partners)
    {
        $partnerCollection = new PartnerCollection();

        foreach ($partners as $partner) {
            $partnerCollection->add(Partner::build(
                $partner['name'],
                $partner['url'],
                $partner['prices']
            ));
        }

        return new self($name, $address, $partnerCollection);
    }
}
