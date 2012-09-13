<?php
    if ( !defined('ABSPATH') )
	{
		define('ABSPATH', dirname(__FILE__) . '/');
	}
	
	require_once (ABSPATH . 'class_user.php');
	
	session_start();
	$user = $_SESSION['user'];
	if (!$user) 
	{
		$loginUrl = '../login.php';
		header('location: '.$loginUrl);
	}
	
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
<!--
* { margin:0; padding:0;}
a {
	text-decoration:none;
	color: #FFF;
}
ul {
	list-style:none;
	margin:0px;
}
li {
	float:left;
	color:#000;
}
.top_div {
	position:absolute;
	background:url(../images/header_bg.jpg) repeat-x;
	width:100%;
	height:45px;
}
.top_title_div {
	position:absolute;
	width:320px;
	height:40px;
	margin-top:4px;
	left:50%;
	margin-left:-160px;
}
.top_title_div li {
	line-height:40px;
	width:80px;
	text-align:center;
}
.top_title_div span {
	color:#FFF;
	font-family:"黑体";
	font-size: 20px;
	height:40px;
	line-height:40px;
	cursor:pointer;
}
.sale_div {
	position:absolute;
	width:900px;
	height:800px;
	left:50%;
	margin-left:-450px;
	top:45px;
}
.title_focus {
	background:url(../images/main_title_focus.png);
}
.form_div {
	position:absolute;
	background-color:#edf5ff;
	width:900px;
	height:79px;
}

.product_name_title{
	width:55%;
}
.product_size_title{
	width:15%;
}
.product_color_title{
	width:15%;
}
.product_num_title{
	width:15%;
}
.form_inner_div {
	position:absolute;
	width:696px;
	height:33px;
	left: 50%;
	margin-left:-368px;
	top: 21px;
	border:0px;
}

.product_name_input {
	border: 1px solid #e5e5e5;
	background:#FAFFFF;
	line-height:33px;
	height:33px;
	width:295px;
	padding-left:5px;
	font-size:18px;
	color:gray;
}
.product_other_input {
	border: 1px solid #e5e5e5;
	background:#FAFFFF;
	line-height:33px;
	height:33px;
	width:95px;
	padding-left:5px;
	margin-left:5px;
	font-size:18px;
	color:gray;
}
#submit {
	position:absolute;
	background: url(../images/login_submit.png) no-repeat;
	width:100px;
	height:35px;
	margin-left:5px;
	line-height:33px;
	text-align:center;
	font-size:20px;
	font-weight:bold;
	border:0px;
	color:#fff;
	cursor:pointer;
}
.admin_bar {
	position: absolute;
	width:400px;
	height:25px;
	top:15px;
	right:5px;
}
.nick_name {
	overflow:hidden;
	width:325px;
	text-align:right;
	padding-bottom:3px;
	margin-right:5px;
	color: #FFC;
}
.data_div {
	position:absolute;
	top:80px;
	width:100%;
	height:500px;
}
-->
</style>
<link rel="stylesheet" type="text/css" media="screen" href="../css/themes/redmond/jquery-ui-1.7.3.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="../css/themes/ui.jqgrid.css" />
<script src="../js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../js/grid.locale-cn.js" type="text/javascript"></script>
<script src="../js/jquery.jqGrid.min.js" type="text/javascript"></script>


<script type="text/javascript">
function onfocus_input(obj, text)
{
	if (obj.value == text)
	{
		obj.style.color = "#000";
	    obj.value = '';	
	}
}

function onblur_input(obj, text)
{
	if (obj.value == '')
	{
		obj.style.color = "gray";
	    obj.value = text;	
	}
}

$(function(){
	$("#gridTable").jqGrid({
	    url:'productDao.php',
			datatype:"json",
			height:500,
			colNames:["名称","尺码","颜色","价格","剩余"],
			colModel:[{name:"name",index:"name",width:433},
					  {name:"size",index:"size",width:110},
					  {name:"color",index:"color",width:110},
					  {name:"price",index:"price",width:110},
					  {name:"num",index:"num",width:110}],
			
			viewrecords:true,
			rowNum:50,
			pager:"#gridPager",
			pginput:false,
			loadonce:true,
			ondblClickRow:function(id){
				var rowObj = jQuery("#gridTable").jqGrid("getRowData",id);
				jQuery("#name_input").attr("value",rowObj.name);
				jQuery("#size_input").attr("value",rowObj.size);
				jQuery("#color_input").attr("value",rowObj.color);
				jQuery("#price_input").attr("value",rowObj.price);
				jQuery("#num_input").attr("value",rowObj.num);
				//alert(rowObj.name+","+rowObj.color);
			}
	});   
	
	/*var data = [
				{name:"name1", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name2", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name3", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name4", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name5", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name6", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name7", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name8", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name9", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name10", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name11", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name12", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name13", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name14", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name15", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name16", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name17", productSize:"30", color:"黑色", price:"200", num:"10"},
				{name:"name18", productSize:"30", color:"黑色", price:"200", num:"10"}
				];
	
	for (var i = 0; i < data.length; i++)
	{
		jQuery("#gridTable").jqGrid("addRowData", i+1, data[i]);
	}*/
});

</script>
<style type="text/css">
<!--

-->
</style>
</head>
<body>
<div class="top_div">
  <div class="top_title_div">
    <ul>
    <!--
      <li id="purchaseTitle"><span>进货</span></li>
      <li id="saleTitle"><span>出货</span></li>
      <li id="storeTitle"><span>库存</span></li>
      <li id="reportTitle"><span>报表</span></li>
      -->
      
      <li id="purchaseTitle"><span onClick="onFocus('purchaseTitle')">进货</span></li>
      <li id="saleTitle" class="title_focus"><span onClick="onFocus('saleTitle')">出货</span></li>
      <li id="storeTitle"><span onClick="onFocus('storeTitle')">库存</span></li>
      <li id="reportTitle"><span onClick="onFocus('reportTitle')">报表</span></li>      
    </ul>
  </div>
  
  <div class="admin_bar">
    <ul>
      <li class="nick_name"><?php echo $user->userNickName?></li>
      <li><a href="../login.php?action=logout">退出</a></li>
    </ul>
  </div>
</div>
<div class="sale_div">
  <div class="form_div">
  <!--
    <div class="form_title_div">
      <ul>
        <li class="product_name_title">名称</li>
        <li class="product_size_title">尺码</li>
        <li class="product_color_title">颜色</li>
        <li class="product_num_title">剩余</li>
      </ul>
    </div>
    -->
  <div class="form_inner_div">
    <input id="name_input" class="product_name_input" type="text" value="商品名称" onblur="onblur_input(this, '商品名称')" onfocus="onfocus_input(this, '商品名称')"/>
    <input id="size_input" class="product_other_input" type="text" value="尺码" onblur="onblur_input(this, '尺码')" onfocus="onfocus_input(this, '尺码')"/>
    <input id="color_input" class="product_other_input" type="text" value="颜色" onblur="onblur_input(this, '颜色')" onfocus="onfocus_input(this, '颜色')"/>
    <input id="num_input" class="product_other_input" type="text" value="剩余" onblur="onblur_input(this, '剩余')" onfocus="onfocus_input(this, '剩余')"/>
    <input id="submit" type="submit" value="确定"/>
  </div>
  </div>
  <div class="data_div">
  <table id="gridTable"></table>
  <div id="gridPager"></div>
  </div>
  
  <!--<div id="gridPager"></div>
  <table id="gridTable"></table>-->
  
</div>
</body>

</html>
