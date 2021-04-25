<?php
require 'vendor/autoload.php';
//require Database file

use Shopee\DBController;

 //database Object
$db = new DBController;

//Product Object
$Product = new Shopee\Product($db);

//Cart object
$Cart = new Shopee\Cart($db);

//Login object
$Login = new Shopee\Login($db);

//Table object
$Table = new Shopee\Table($db);


