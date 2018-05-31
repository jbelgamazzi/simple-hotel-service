<?php

namespace SimpleService\Entity;

/**
 * Represents a single price from a search result
 * related to a single partner.
 * @codeCoverageIgnore
 */
class Price
{
    /**
     * Description text for the rate/price.
     *
     * @var string
     */
    public $description;

    /**
     * Price in dollar.
     *
     * @var float
     */
    public $amount;

    /**
     * Arrival date, represented by a DateTime obj
     * which needs to be converted from a string on
     * write of the property.
     *
     * @var \DateTime
     */
    public $arrivalDate;

    /**
     * Departure date, represented by a DateTime obj
     * which needs to be converted from a string on
     * write of the property
     *
     * @var \DateTime
     */
    public $departureDate;

    /**
     * @param string $description
     * @param float $amount
     * @param \DateTime $arrivalDate
     * @param \DateTime $departureDate
     */
    public function __construct(string $description, float $amount, \DateTime $arrivalDate, \DateTime $departureDate)
    {
        $this->description = $description;
        $this->amount = $amount;
        $this->arrivalDate = $arrivalDate;
        $this->departureDate = $departureDate;
    }
}
