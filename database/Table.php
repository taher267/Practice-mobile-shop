<?php
/**
* Table class
*/
class Table
{
  public $db  = null;
  function __construct(DBController $db)
  {
    if (!isset($db->con)) return null;
    $this->db = $db;
  }

public function UserData($Auth=null, $table="user")
{
  
  $pieces = explode(" ", $Auth);
      $user_name=$pieces[0]; // piece1
      $user_email=$pieces[2];// piece3
      // echo ;
      $query= $this->db->con->query(sprintf("SELECT * FROM %s WHERE user_name='%s' AND user_email='%s'", $table, $user_name, $user_email));
      $UserGranted=[];
      while($user = $query->fetch_array(MYSQLI_ASSOC)){
        $UserGranted[] = $user;
      }
      return $UserGranted;
    
}


}//Class Table