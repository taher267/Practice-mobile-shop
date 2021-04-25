<?php
namespace Shopee;
/**
* User Login Class
*/
class Login
{
	public $db=null;
	public $error;
	function __construct(DBController $db)
	{
		if (!isset($db->con)) return null;
		$this->db= $db;
	}
	// Registration 

	public function insertUser($NewRegArr=null, $table="user")
	{
		if ($NewRegArr !=null) {
			$columns = implode(",", array_keys($NewRegArr));
			
			$values = implode("','", array_values($NewRegArr));
			$Query = $this->db->con->query(sprintf("SELECT *FROM %s WHERE user_name='%s' OR user_email='%s' ", $table, $NewRegArr['user_name'], $NewRegArr['user_email']));
			$row = $Query->num_rows;
			if ($row ==0) {
				$result = $this->db->con->query(sprintf("INSERT INTO %s(%s) VALUES('%s')", $table, $columns, $values));
				if ($result) {
					echo "Alhamdu Lillah, Successful!";
					header("Location:login.php");
				}
			}else{
				echo "Already Exists!";
			}
			
		}
	}

	//signup and login validation
		public function userValidation($fields=null)
		{
			// print_r($fields);
			$count = 0;
			foreach ($fields as $key => $field) {
				if ($field) {
					$count++;
					print_r($key);
				}
			}
			// if ($count==0) {
			// 	return true;
			// }
		}

	//User information check
	public function CanLogin($LoginArray=null, $table ='user')
	{
		if ($this->db->con !=null ) {
			if ($LoginArray != null ) {
				$columns =array_keys($LoginArray);
				// print_r($columns);
				$values =array_values($LoginArray);
				// print_r($values);
					//encrypt pass
				$salt = "$2y$07$".'minimumTwintyTwoDigits';
				$userpass = crypt($values[1], $salt);
	// $userpass = $values[1];

	$sql = sprintf("SELECT * FROM %s WHERE %s='%s' AND %s='%s'", $table, $columns[0], $values[0],$columns[1], $userpass);
	// exit();
				$query= $this->db->con->query($sql);
				if ($query->num_rows===1) {
					$userData = [];
					while($user = $query->fetch_array(MYSQLI_ASSOC)) {
					$userData[] = $user;
					//header("Location:" . $_SERVER["PHP_SELF"]);
				}
				// print_r($userData
				$getUserName = $userData[0]['user_name'];
				$getPass = $userData[0]['user_pass'];
				$getEmail = $userData[0]['user_email'];
			// print_r($userData); exit();
				if ( $getUserName ===$values[0] && $getPass===$userpass) {
					$Auth  = "$getUserName "."pass".rand(10000,99999) ." $getEmail";
					setcookie("Auth", $Auth, time()+7200 );
					header("Location:profile.php");
				}else{echo "Login First";}
				// }, $userData);
			}//$LoginArray
		}
	}
	}
	//check kookie
	public function checkCookie($Auth= null, $table="user")
	{
		
		$pieces = explode(" ", $Auth);
		$pieces[0]; // piece1
		$pieces[2]; // piece3

			// echo ;
			$query= $this->db->con->query(sprintf("SELECT * FROM %s WHERE user_name='%s' AND user_email='%s'", $table, $pieces[0], $pieces[2]));
			$UserGranted=[];
			while($user = $query->fetch_array(MYSQLI_ASSOC)){
				$UserGranted[] = $user;
			}
			return $UserGranted;
		
	}
	//User Logout
	public function Logout()
	{
		$timeOut = setcookie("Auth", '',  time()-7300 );
		if ($timeOut) {
			header("Location:login.php");
		}
	}
}