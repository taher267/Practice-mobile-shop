<?php
include "Login.php";
/**
* Cart Class
*/
class Cart extends Login
{
	public $db = null;
	function __construct(DBController $db)
	{
		if (!isset($db->con)) return null;
		$this->db=$db;
	}
	//insert Cart usering user id and item ie
	public function insertIntoCart($cartArray=null, $table = 'cart')
	{
		if ($this->db->con !=null ) {
			if ($cartArray != null ) {
				$columns = implode(',', array_keys($cartArray));
				//print_r($columns);echo "<br>";
				$values = implode(",", array_values($cartArray));
				//print_r($values);echo "<br>";echo "<br>";
				$expVal = explode(",", $values);
				//print_r($values);echo "<br>";exit();
				if ($expVal[0] ==='NO' || $expVal[1]==0) {
					header("Location:login.php");
				}else{
					$sql= sprintf("INSERT INTO %s (%s) VALUES(%s)", $table, $columns, $values);
					$query = $this->db->con->query($sql);
					if ($query) {
						header("Location:cart.php");
					}
				}
			}
		}
	}
	//Get data useing user id
	public function GetCartData($user_id = null, $table ='cart') {
			// $user_id = $this->checkCookie();
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