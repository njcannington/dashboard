<?php
namespace App\Models\Weather;

use Lib\Db\Models;

class Weather extends Models
{
    private $table = "weather";
    private $columns = ["temperature", "location_id", "updated_at", "id"];
    
    public function create($temperature, $location_id)
    {
        $date = date("Y-m-d H:i:s");
        $columns = implode(",", ["temperature", "location_id", "updated_at"]);
        $values = implode('", "', [$temperature, $location_id,  $date]);
        $sql = 'INSERT INTO '.$this->table.'('.$columns.') VALUES ("'.$values.'")';
        echo $sql;
        $this->db->exec($sql);
    }

    public function getTemp($location_id)
    {
        $sql = 'SELECT temperature FROM '.$this->table.' WHERE location_id like "%'.str_replace(" ", "%", $location_id).'%" ORDER BY updated_at DESC LIMIT 1';
        foreach ($this->db->query($sql) as $row) {
                $temp = $row["temperature"];
        }
        
        return isset($temperature) ? $rank : 'n/a';
    }
}
