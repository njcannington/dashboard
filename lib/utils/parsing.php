<?php
namespace Lib\Utils;

class Parsing
{
    public static function removeExtension($file)
    {
        $pieces = explode(".", $file);
        $extension_len = strlen(end($pieces));

        return substr($file, 0, -$extension_len-1);
    }
}
