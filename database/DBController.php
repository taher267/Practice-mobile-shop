<?php

class DBController {
  //Database Connection Properties
  protected $host = 'localhost';  
  protected $username = 'shopeeuser';  
  protected $password = 'shopeepass';  
  protected $database = 'shopee'; 

  //Connection Property
  public $con = null;

  //call Constructor
  public function __construct(){

    $this->con =new mysqli($this->host, $this->username, $this->password, $this->database);
    if ($this->con->connect_error) {
      echo "Fail". $this->con->connect_error;
    }
    //echo "Connection Successfull!";
  }

  public function __destruct()
  {
      $this->closeConnection();
  }
 //for mysqli closing connection
  protected function closeConnection()
  {
      if ($this->con != null) {
        $this->con->close();
        $this->con = null;
      }
  }
  
}

$db = new DBController;
