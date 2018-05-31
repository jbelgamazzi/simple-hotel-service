<?php

namespace SimpleService\Entity;

use SimpleService\Collection\PriceCollection;
use SimpleService\VO\Url;

/**
 * Represents a single partner from a search result.
 * @codeCoverageIgnore
 */
class Partner
{
    /**
     * Name of the partner
     *
     * @var string
     */
    public $name;

    /**
     * Url of the partner's homepage (root link)
     *
     * @var string
     */
    public $homepage;

    /**
     * Unsorted list of prices received from the
     * actual search query.
     *
     * @var Price[]
     */
    public $prices = [];

    /**
     * @param string $name
     * @param Url $homepage
     * @param PriceCollection $priceCollection
     */
    public function __construct(string $name, Url $homepage, PriceCollection $priceCollection)
    {
        $this->name = $name;
        $this->homepage = $homepage->getValue();
        $this->prices = $priceCollection->getValue();
    }

    /**
     * @param string $name
     * @param string $homepage
     * @param array $prices
     * @return \self
     */
    public static function build(string $name, string $homepage, array $prices)
    {
        $priceCollection = new PriceCollection();

        foreach ($prices as $price) {
            $priceCollection->add(new Price(
                $price['description'],
                $price['amount'],
                new \DateTime($price['from']),
                new \DateTime($price['to'])
            ));
        }

        return new self($name, new Url($homepage), $priceCollection);
    }
}
