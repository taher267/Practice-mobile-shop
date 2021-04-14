<?php
class Product
{
    public $db = null;
    public function __construct(DBController $db) {
        if (!isset($db->con))return false;
        $this->db = $db;
    }

    public function GetData($table = 'product') {
        $result = $this->db->con->query("SELECT * FROM {$table}");
        $resultArray =[];
        while ($item = $result->fetch_array(MYSQLI_ASSOC)) {
        	$resultArray[] =$item;
        }
        return $resultArray;
    }
}
