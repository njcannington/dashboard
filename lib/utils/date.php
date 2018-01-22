<?php
namespace Lib\Utils;

class Date
{
    public static function isTomorrow($datetime)
    {
        $date =  date('m.d.Y', strtotime($date));
        $tomorrow = date('m.d.Y', strtotime('tomorrow'));
        
        return ($date == $tomorrow);
    }

    public static function isDaysAway($number, $datetime)
    {
        $date = date("m.d.Y", strtotime($date));
        $future = date("m.d.Y", strtotime("+".$number." day"));

        return ($date == $future);
    }

    public static function getDaysAway($number)
    {
        return date("l", strtotime("+".$number." day"));
    }
}
