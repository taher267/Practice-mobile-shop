<?php
// require_once '../database/DBController.php';
// require("../database/Product.php");
// $db = new DBController;
// $Product = new Product($db);



require('../functions.php');
if (isset($_POST['itemid'])) {
	$result = $Product->GetProduct($_POST['itemid']);
	echo json_encode($result);
}