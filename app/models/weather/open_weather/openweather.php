<?php
namespace App\Models\Weather\Open_Weather;

use Lib\Config\Config;
use Lib\Utils\Curl;

class OpenWeather
{
    protected $data;
    const API_ROOT = "http://api.openweathermap.org/data/2.5/";

    public function __construct($coords)
    {
        $param = "lat={$coords[0]}&lon={$coords[1]}";
        $url = self::buildUrl("weather", $param);
        $json_results = Curl::getInstance($url);
        $this->data = json_decode($json_results);
    }

    public function getDesc()
    {
        return $this->data->weather[0]->description;
    }

    public function getTemp()
    {
        return round($this->data->main->temp);
    }

    public function getIcon()
    {
        return round($this->data->weather[0]->icon);
    }

    protected static function buildUrl($endpoint, $param)
    {
        $appid = self::buildAppId();
        $url = self::API_ROOT.$endpoint."?&units=imperial&".$param."&".$appid;

        return $url;
    }

    protected static function buildParam($key, $values = array())
    {
        return $key."=".implode(",", $values);
    }

    protected static function buildAppId()
    {
        $config = Config::getInstance();

        return "appid=".$config["ow"]["appid"];
    }
}
