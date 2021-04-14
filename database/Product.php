<?php
class Product
{
    public $db = null;
    public function __construct(DBController $db) {
        if (!isset($db->con))return null;
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
    //getProduct useing item id
    public function GetProduct($item_id=null, $table='product')
    {
    	if ($item_id !=null) {
    		$query = $this->db->con->query(sprintf("SELECT * FROM %s WHERE item_id= %s", $table, $item_id));
    		$productArray = [];
    		while ($item = $query->fetch_array(MYSQLI_ASSOC)) {
    			$productArray[] = $item; 
    		}
    		return $productArray;
    	}
    }
}
