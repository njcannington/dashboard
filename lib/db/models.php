<?php
namespace Lib\Db;

class Models
{
    public $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }
}
