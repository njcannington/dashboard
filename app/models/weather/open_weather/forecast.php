<?php
namespace App\Models\Weather\Open_Weather;

use Ow;

class Forecast extends Ow
{
    public static function byCity($city, $country_code = '')
    {
        $param = self::buildParam("q", array($city,$country_code));
        $url = self::buildUrl("forecast", $param);

        return new static($url);
    }
    
    public static function byZip($zip, $country_code = null)
    {
        $param = self::buildParam("zip", array($zip,$country_code));
        $url = self::buildUrl("forecast", $param);

        return new static($url);
    }

    public function getName()
    {
        return $this->data->name;
    }

    public function getList()
    {
        return $this->data->list;
    }

    protected function getTomorrowTemps()
    {
        $tomorrow_temps = [];
        foreach ($this->data->list as $d) {
            if (self::isTomorrow($d->dt_txt)) {
                $tomorrow_temps[] =  $d->main->temp;
            }
        }

        return $tomorrow_temps;
    }

    

    public function tomorrowHigh()
    {
        return max($this->getTomorrowTemps());
    }

    public function tomorrowLow()
    {
        return min($this->getTomorrowTemps());
    }
}
