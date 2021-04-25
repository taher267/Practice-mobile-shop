<?php
require 'vendor/autoload.php';
//require Database file
require_once 'database/DBController.php';


//require Product class file
require_once 'database/Product.php';

//require Cart class file
require_once 'database/Cart.php';

//require Login class file
require_once 'database/Login.php';
//require Table class file
require_once 'database/Table.php';



 //database Object
$db = new DBController;

//Product Object
$Product = new Product($db);

//Cart object
$Cart = new Cart($db);

//Login object
$Login = new Login($db);

//Table object
$Table = new Table($db);

// echo "<pre>";
// print_r($Product->GetProduct());

// echo "</pre>";


