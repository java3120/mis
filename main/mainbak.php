<?php
/** Absolute path to the WordPress directory. */
	if ( !defined('ABSPATH') )
	{
		define('ABSPATH', dirname(__FILE__) . '/');
	}
	
	require_once (ABSPATH . 'class_user.php');
	
	session_start();
	$user = $_SESSION['user'];
	if ($user) 
	{
		//var_dump($user);
		main_header();
		echo 
		'<div class="user_bar">
           <ul>
             <li>'.$user->userNickName.'&nbsp;</li>
             <li><a href="../login.php?action=logout">[退出]</a></li>
           </ul>
         </div>';
	}
	else 
	{
		$loginUrl = '../login.php';
		header('location: '.$loginUrl);
	}
?>

<?php 
    function main_header(){
?>
        <!DOCTYPE a PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>&mdash;MIS</title>
		<link href="../css/main.css" rel="stylesheet" type="text/css"/>
		<link rel="shortcut icon" href="../images/favicon.png"/>
		<script type="text/javascript" src="js/common.js"></script>
		</head>
		<body>
		<div id="top_menu">
        <div class="top_menu_link">
        <ul>
        <li><a href="" title="进货">进货</a></li>
        <li><a href="" title="出货">出货</a></li>
        <li><a href="" title="库存">库存</a></li>
        <li><a href="" title="报表">报表</a></li>
        </ul>
        </div>
        </div>
<?php 
    }
    
    function main_footer() {
?>
        </body>
        </html>
<?php 
    }
    main_footer();
?>
 

