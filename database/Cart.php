<?php
namespace Shopee;
/**
* Cart Class
*/
class Cart
{
	public $db = null;
	public $message;
	function __construct(DBController $db)
	{
		if (!isset($db->con)) return null;
		$this->db=$db;
	}
	//insert Cart usering user id and item ie
	public function insertIntoCart($cartArray=null, $delItem=null, $table = 'cart',)
	{
		if ($this->db->con !=null ) {
			if ($cartArray != null) {
				// print_r($cartArray);
				// echo "<br>";
				
				// print_r($delItem);
				// echo "<br>";

				// print_r($table);
				// echo "<br>";

				$columns = implode(',', array_keys($cartArray));
				$values = implode(",", array_values($cartArray));
				$expVal = explode(",", $values);
				if ($expVal[0] ==0 || $expVal[1]==0) {
					header("Location:login.php");
				}else{
					if ( $result = $this->db->con->query(sprintf("INSERT INTO %s (%s) VALUES(%s)", $table, $columns, $values))) {
						// die();
						if ($delItem !=null) {
							if ($delItem === "delCart") {
							$table = 'cart';
							if ($this->db->con->query(sprintf("DELETE FROM %s WHERE user_id = %d AND item_id = %d", $table, $cartArray['user_id'], $cartArray['item_id']))) {
								$_SESSION["msg"]="Cart To Wishlist ";
							}
						}

						if ($delItem === "delWishlist") {
							$table = 'wishlist';
							if ($this->db->con->query(sprintf("DELETE FROM %s WHERE user_id = %d AND item_id = %d", $table, $cartArray['user_id'], $cartArray['item_id']))) {
								$_SESSION["msg"] = "Wishlist To Cart";
							}
						}

						}
						header("Location:". $_SERVER['PHP_SELF']);
						return $result;
					}

				}
				
			}//end $cartArray
		}
	}
	//Get data useing user id
	public function GetCartData($user_id = null, $table ='cart') {
			if ($user_id != null) {
			$sql = sprintf("SELECT * FROM %s WHERE user_id=%d",$table, $user_id);
			//exit();
			$result = $this->db->con->query($sql);
	$resultArray =[];
	while ($item = $result->fetch_array(MYSQLI_ASSOC)) {
		$resultArray[] =$item;
	}
	return $resultArray;
		}

}

	//calculate sub total
	public function getSum($arr)
	{
		if (isset($arr)) {
			$sum = 0;
			foreach ($arr as $item) {
				$sum+= floatval($item[0]);
			}
			return sprintf('%.2f', $sum);
		}
	}

	//Delete item from Cart using user id and item id
	public function deleteCartItem($user_id, $item_id, $table= 'cart')
	{
		if ($user_id !=null && $item_id !=null) {
			$sql =sprintf("DELETE FROM %s WHERE user_id = %d AND item_id = %d", $table, $user_id, $item_id);
			// exit();
			$query = $this->db->con->query($sql);
			if ($query) {
				echo $item_id . "has been delted form Cart!";
			}
		}
	}

	//get item_id of shopping cart list

	public function GetCartId($cartArr= null, $currentUser=null,  $itemid = "item_id", $userId = "user_id")//
	{
		if ($cartArr != null && $currentUser != null) {
			$cart_id = array_map(function($value) use($itemid, $userId, $currentUser){
				if ($value[$userId]==$currentUser) {
					return  $value[$itemid];
				}
			}, $cartArr);
			return $cart_id;
		}
	}

	//save for later
	// public function saveForLater($user_id = null, $item_id= null, $saveTable="wishlist", $fromTable = 'cart')
	// {
	// 	if ($user_id !=null && $item_id != null) {
	// 		$query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE user_id = {$user_id} AND item_id= {$item_id};";
	// 		$query .= "DELETE FROM {$fromTable} WHERE user_id = {$user_id} AND item_id= {$item_id};";
	// 		$result= $this->con->multi_query($query);
	// 	}
	// }
}


