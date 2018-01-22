<?php
namespace App\Models\Weather\Open_Weather;

use App\Models\Weather\Open_Weather\Ow;

class Weather extends Ow
{
    public static function byCity($city, $country_code = '')
    {
        $param = self::buildParam("q", array($city,$country_code));
        $url = self::buildUrl("weather", $param);

        return new static($url);
    }
    
    public static function byZip($zip, $country_code = null)
    {
        $param = self::buildParam("zip", array($zip,$country_code));
        $url = self::buildUrl("weather", $param);

        return new static($url);
    }

    public static function byCoord($lat, $lon)
    {
        $param = "lat={$lat}&lon={$lon}";
        $url = self::buildUrl("weather", $param);

        return new static($url);
    }

    public function getName()
    {
        return $this->data->name;
    }

    public function getCoord()
    {
        $coord = $this->data->city->coord;

        return $coord->lat.",".$coord->lon;
    }
}
