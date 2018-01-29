<?php
namespace tests;

use App\Models\Weather\Open_Weather\OpenWeather;

class OpenWeatherTests extends \PHPUnit_Framework_TestCase
{
    private $ow;

    public function setUp()
    {
        $coords = [0,0];
        $this->ow = new OpenWeather($coords);
    }

    public function testGetCoords()
    {
        $this->assertNotNull($this->ow->getTemp(), "Did not return temp.");
    }

    public function testGetDesc()
    {
        $this->assertNotNull($this->ow->getDesc(), "Did not return description.");
    }

    public function testGetIcon()
    {
        $this->assertNotNull($this->ow->getIcon(), "Did not return icon.");
    }
}
