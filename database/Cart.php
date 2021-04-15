<?php
/**
 * Cart Class
 */
class Cart
{
	public $db = null;
	function __construct(DBController $db)
	 {
	 	if (!isset($db->con)) return null;
	 	$this->db=$db;
	 }

	 public function insertIntoCart($cartArray=null, $table = 'cart')
	 {
	 	if ($this->db->con !=null ) {
	 		if ($cartArray != null ) {
	 			$columns = implode(',', array_keys($cartArray));
	 			// print_r($columns);
	 			$values = implode(",", array_values($cartArray));
	 			// print_r($values);
	 			$query = $this->db->con->query(sprintf("INSERT INTO %s (%s) VALUES(%s)", $table, $columns, $values));
	 			if ($query) {
	 				header("Location:" . $_SERVER["PHP_SELF"]);
	 			}
	 		}
	 	}
	 }
	 //Get data useing user id
	 public function GetCartData($user_id = null, $table ='cart') {
	 	if ($user_id != null) {
	 		$sql = sprintf("SELECT * FROM %s WHERE user_id=%d",$table, $user_id);
	 		$result = $this->db->con->query($sql);
	        $resultArray =[];
	        while ($item = $result->fetch_array(MYSQLI_ASSOC)) {
	        	$resultArray[] =$item;
	        }
	        return $resultArray;
	 	}
        
    }

}