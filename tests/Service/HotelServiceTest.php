<?php
namespace SimpleService\Service;

use SimpleService\Entity\Hotel;

/**
 * @package SimpleService\Service
 * @coversDefaultClass \SimpleService\Service\HotelService
 */
class HotelServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::getHotelsForCity
     */
    public function test_getHotelsForCity_with_city_moscow()
    {
        $cityResult = [
            Hotel::build('name', 'address', array())
        ];

        $partnerServiceProphecy = $this->prophesize(PartnerServiceInterface::class);
        $partnerServiceProphecy
            ->getResultForCityId(12345)
            ->shouldBeCalled()
            ->willReturn($cityResult);

        $partnerService = $partnerServiceProphecy->reveal();

        $hotelService = new HotelService($partnerService);
        $hotelResult = $hotelService->getHotelsForCity('Moscow');
        $this->assertInternalType('array', $hotelResult);
        $this->assertCount(1, $hotelResult);
    }

    /**
     * @covers ::getHotelsForCity
     * @expectedException \InvalidArgumentException
     */
    public function test_getHotelsForCity_throws_InvalidArgumentException_on_unmapped_city_name()
    {
        $partnerService = $this->prophesize(PartnerServiceInterface::class)->reveal();

        $hotelService = new HotelService($partnerService);
        $hotelService->getHotelsForCity('Maringa');
    }
}
