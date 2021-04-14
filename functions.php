<?php
//require Database file
require_once 'database/DBController.php';


//require Product file
require_once 'database/Product.php';

 //database Object
$db = new DBController;

//Product Object
$Product = new Product($db);

