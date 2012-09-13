<?php
require '../config.php';
    $myconn=mysql_connect("localhost", "root", "123");
	mysql_select_db("mis",$myconn);
	mysql_query("set names utf8");
	for ($index = 1; $index < 100; $index++)
	{
		$sql = "insert into product(product_name,purchase_price,purchase_date,purchase_size,purchase_color,store_number) " 
	       ."values ('name".$index
	       ."',".rand(10,1000)
	       .",'".date('Y-m-d H:i:s')
	       ."',".rand(32,45)
	       .",'".getRandColor(rand(0,6))
	       ."',".rand(1,20)
	       .")";
	       echo $sql."\n";
	    mysql_query($sql,$myconn);
	
	}
	mysql_close($myconn);
	function getRandColor($p) {
		switch ($p)
		{
			case 0:
				return "红色";
			case 1:
				return "黄色";
			case 2:
				return "绿色";
			case 3:
				return "黑色";
			case 4:
				return "蓝色";
			case 5:
				return "紫色";
			case 6:
				return "白色";
		}
	}

?>