<?php
namespace App\Controllers;

use App\Models\Weather\Open_Weather;

class Weather
{
    public function weatherAction()
    {
        $weather = new Weather("Atlanta");
        $temp = $weather->getTemp();

        return compact("temp");
    }
}
