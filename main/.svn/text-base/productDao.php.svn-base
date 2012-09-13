<?php
if ( !defined('ABSPATH') )
{
	define('ABSPATH', dirname(__FILE__) . '/');
}
	

require '../config.php';
require (ABSPATH . 'functions.php');
$page = $_POST['page'];
$rowNum = $_POST['rows'];
if ($page == 0) {
    $page = 1;
}
if ($rowNum == 0)
{
    $rowNum = 50;
}

$products = dbexec("SELECT p.`product_name` , p.`purchase_price` , 
                   p.`purchase_size` , p.`purchase_color` , 
                   p.`store_number` FROM  `product` AS p");
$rows = array();
$result = array();
while($arr=mysql_fetch_array($products,MYSQL_ASSOC))
{
	array_push($rows,array("cell"=>array($arr['product_name'],
	                                     $arr['purchase_size'],
	                                     $arr['purchase_color'],
	                                     $arr['purchase_price'],
	                                     $arr['store_number'],
	)));
}
$sum = count($rows);
$result["total"] = $sum / $rowNum;
$result["page"] = "$page";
$result["records"] = $sum;
$result["rows"] = $rows;
echo json_encode($result);
?>