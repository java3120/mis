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
<title>&mdash;MIS</title>
<link href="../css/main.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="../images/favicon.png"/>
<script type="text/javascript" src="../js/common.js"></script>
<script language="javascript" type="text/javascript">

var mainTitleValue = '';

function onFocus(obj, img)
{		
	if (mainTitleValue == '')
	{
		mainTitleValue = obj;
	}
	else
	{
		if (mainTitleValue == obj)
	    {
		    refreshContent(obj);
	    }
	    else
	    {
			$(mainTitleValue).style.background = '';
		    mainTitleValue = obj;
	    }
	}
	
	$(obj).style.background='url('+img+')';
	refreshContent(obj);
}

function refreshContent(title)
{ 
	if (title == 'purchaseImg')
		$('content_div').innerText = '进货'
	else if (title =='saleImg')
		$('content_div').innerText = '出货'
	else if (title =='storeImg')
		$('content_div').innerText = '库存'
	else if (title =='reportImg')
		$('content_div').innerText = '报表'
}

</script>
</head>

<body>
<div class="top_bar"">
  <div class="main_bar">
    
    <ul>
      <li id="purchaseImg"><a href="#" onClick="onFocus('purchaseImg', '../images/main_title_focus.png')">进货</a></li>
      <li id="saleImg"><a href="#" onClick="onFocus('saleImg', '../images/main_title_focus.png')">出货</a></li>
      <li id="storeImg"><a href="#" onClick="onFocus('storeImg', '../images/main_title_focus.png')">库存</a></li>
      <li id="reportImg"><a href="#" onClick="onFocus('reportImg', '../images/main_title_focus.png')">报表</a></li>
    </ul>
  </div>
  
  <div class="header_bar">
  <div class="admin_bar">
    <ul>
      <li class="nick_name"><?php echo $user->userNickName?></li>
      <li><a href="../login.php?action=logout">退出</a></li>
    </ul>
  </div>
  </div>
</div>

<div class="main_div">
  <div id="content_div" class="content_div"></div>
</div>
</body>
</html>
