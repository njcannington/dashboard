<?php
namespace Lib\Bootstrap;

use Lib\Bootstrap\Controller;

class Bootstrap
{
    private $data;
    const CONTROLLER_DIR = "app/controllers";
    const EXCLUDE_FILES = [".", ".."];


    public function __construct()
    {
        $controllers = $this->getControllers();
        foreach ($controllers as $controller) {
            $this->data[strtolower($controller)] = Controller::getData($controller);
        }
    }


    private function getControllers()
    {
        //retrieves controller files removing excluded files
        $files = array_filter(self::getControllerFiles(), ["self", "isIncluded"]);
        //removes extension from files
        $file_names = array_map(["Lib\Utils\Parsing", "removeExtension"], $files);
        //makes file_name uppercase to return class names
        return array_map("ucfirst", $file_names);
    }

    private static function getControllerFiles()
    {
        return scandir(self::CONTROLLER_DIR);
    }

    private static function isIncluded($file)
    {
        return !in_array($file, self::EXCLUDE_FILES);
    }

    public function getData()
    {
        return $this->data;
    }
}
