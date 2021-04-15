<?php 
/**
 * User Login Class
 */
class Login
{
	public $db=null;
	function __construct(DBController $db)
	{
		if (!isset($db->con)) return null;
		$this->db= $db;
	}

	//User information check
	public function CanLogin($LoginArray=null, $table = 'user')
	 {
	 	if ($this->db->con !=null ) {
	 		if ($LoginArray != null ) {
	 			$columns =array_keys($LoginArray);
	 			// print_r($columns);
	 			$values =array_values($LoginArray);
	 			// print_r($values);
	 			$salt = "$2y$07$".'minimumTwintyTwoDigits';
             	$userpass = crypt($values[1], $salt);
	 			 $query= $this->db->con->query(sprintf("SELECT * FROM %s WHERE %s='%s' AND %s='%s'", $table, $columns[0], $values[0],$columns[1], $userpass));

	 			if ($query->num_rows===1) {
	 				$userData = [];
	 				while($user = $query->fetch_array(MYSQLI_ASSOC)) {
	 				$userData[] = $user;
	 				//header("Location:" . $_SERVER["PHP_SELF"]);
	 			}
	 		
	 			$getUserName = $userData[0]['user_name'];
	 			$getEmail= $userData[0]['user_email'];
	 			$getPass = $userData[0]['user_pass'];
	 			if ( $getUserName ===$values[0] && $getPass===$userpass) {
	 				$Auth  = "$getUserName "."pass".rand(10000,99999) ." $getEmail";

	 				setcookie("Auth", $Auth, time()+7200 );
	 				header("Location:profile.php");
	 			}
	 			}else{echo "Subahanullah";}

	 		// 	$name = 'user';
				// $value = 'Abu Taher';
				// setcookie($name, $value, time()+20);
	 			//print_r($userData);
	 			//echo $userData['first_name'];
	 			// $currentUser = [];

	 			// array_map(function($data){
	 			// 	echo $data['first_name'];
	 			// }, $userData);
	 		}//$LoginArray
	 	}
	 }

	 //All data show current user
	 public function CurrentUserGrand($user_name=null, $user_email=null, $table = 'user')
	 {
	 	if ($user_name !=null && $user_email !=null) {
	 		// echo ;
	 		$query= $this->db->con->query(sprintf("SELECT * FROM %s WHERE user_name='%s' AND user_email='%s'", $table, $user_name, $user_email));
	 		$UserGranted=[];
	 		while($user = $query->fetch_array(MYSQLI_ASSOC)) {
	 				$UserGranted[] = $user;
	 				//header("Location:" . $_SERVER["PHP_SELF"]);
	 			}
	 		return $UserGranted;
	 	}
	 }

}