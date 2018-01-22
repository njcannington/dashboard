<?php
namespace Lib\Bootstrap;

use App\Controllers;

class Controller
{
    private $data;

    public static function getData($controller)
    {
        $class = "App\Controllers\\".$controller;
        $object = new $class();
        $action = strtolower($controller)."Action";
        return $object->$action();
    }
}
