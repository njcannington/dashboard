<?php
namespace Lib\Utils;

class Curl
{
    private static $instance = null;

    //empty private construct to prevent new object istance;
    private function __construct()
    {
    }

    public static function getInstance($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $results = curl_exec($ch);
        curl_close($ch);

        return $results;
    }
}
