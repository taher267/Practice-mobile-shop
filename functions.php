<?php
//require Database file
require_once 'database/DBController.php';


//require Product class file
require_once 'database/Product.php';

//require Cart class file
require_once 'database/Cart.php';
 //database Object
$db = new DBController;

//Product Object
$Product = new Product($db);

//Cart object

$Cart = new Cart($db);

