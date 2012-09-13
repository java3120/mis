<?php 
	/** Absolute path to the WordPress directory. */
	if ( !defined('ABSPATH') )
	{
		define('ABSPATH', dirname(__FILE__) . '/');
	}
	
	require 'config.php';
	require (ABSPATH . 'main/functions.php');
	require (ABSPATH . 'main/redirect.php');
	require (ABSPATH . 'main/constants.php');
	require (ABSPATH . 'main/class_user.php');
	//var_dump($_SERVER['HTTP_ACCEPT_LANGUAGE']);
	session_start();
	
	$action = $_REQUEST['action'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
	if ($action == '')
	{
		$action = 'first';
	}
	
	$error = '';
	
    switch ($action)
	{
		case "first" :
			html_header();
			
		    ?>
		    <form id="loginform" name="loginform" action="login.php?action=login" method="post">
              <label>
                                    用户名 <br/>
             <input type="text" name="username" class="input" size="20" value="<?php echo $username;?>"/>
             </label>
             <br/>
             <label>
                                   密码 <br/>
             <input type="password" name="password" class="input" value=""/>
             </label>
             <br/>
             <input type="submit" value="登录" class="submit"/>
            </form>
		<?php 
		break;
		
        case "logout" :
        	if (isset($_SESSION['user'])) {
        		$_SESSION = array();
        		session_destroy();
        	}
        	
        	$reloginUrl = 'login.php';
        	header('location:'.$reloginUrl);
        break;
        
		case "login" :
			if ($username == '') 
			{
				$error = '<p class="message">'.'请输入用户名'.'</p>';
			}
			elseif ($password == '')
			{
				$error = '<p class="message">'.'请输入密码'.'</p>';
			}
			else 
			{
				// 字母数字下划线, 字母开头, 长度3-20.
				$regex = '/[a-zA-Z0-9]{1}[a-zA-Z0-9_]{2,19}/';
				$maches = array();
				preg_match($regex, $username, $maches);
				
				if ($username != $maches[0]) {
					$error = '<p class="message">'.'用户名以字母数字开头，支持下划线，长度3-20<br/>'.'</p>';
				}
				else 
				{
					$sql = "SELECT * FROM users WHERE user_name='".$username."' AND user_password='".md5($password)."'";
					$result = dbexec($sql);
					$row = mysql_fetch_array($result);
					mysql_free_result($result);
					if ( $row ) {
						$user = new User();
						$user->set('userId', $row['user_id']);
						$user->set('userName', $row['user_name']);
						$user->set('userPassword', $row['user_password']);
						$user->set('userNickName', $row['user_nickname']);
						//var_dump($user);
						$_SESSION['user'] = $user;
						$url = 'main/sale.php';
						redirect($url);
						exit();
					}
					else 
					{
						$error = '<p class="message">'.'用户名或密码不正确'.'</p>';
						//$error = '<p class="message">'.md5("admin").'</p>';
					}
				}
			}
			
			if ($error != '') {
				html_header();
				echo $error;
			}
			?>
			<form id="loginform" name="loginform" action="login.php?action=login" method="post">
              <label>
                                    用户名 <br/>
             <input type="text" name="username" class="input" size="20" value="<?php echo $username;?>"/>
             </label>
             <br/>
             <label>
                                   密码 <br/>
             <input type="password" name="password" class="input" value=""/>
             </label>
             <br/>
             <input type="submit" value="登录" class="submit"/>
            </form>	
	<?php 
		break;
	}
	?>
	
	<?php 
	function html_header()
	{
	?>

		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>&mdash;MIS&nbsp;&gt;&nbsp;登录</title>
		<link rel="shortcut icon" href="images/favicon.png"/>
		<link href="css/login.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/common.js"></script>
		</head>
		
		<body>
		<div class="form_div">
	<?php 
	}
	?>

	<?php 
	function html_footer()
	{
	?>
		</div>
		</body>
		</html>
		<script type="text/javascript">
		function randomImg()
		{
		    var img = randomNum(17);
			document.body.style.backgroundImage = 'url("images/bg/bg'+ img +'.jpg")';
		}
		
		function pointer_focus(){
			setTimeout( 
				function(){ 
					try{
		    			userInput = document.getElementById('username');
						if (userInput.value != '')
						{
							d = document.getElementById('password');
							d.value = '';
						}
						else
						{
							d = document.getElementById('username');
							d.value = '';
						}
						d.focus();
						d.select();
					} catch(e){}
				}, 200);
			}
		
		pointer_focus();
		</script>
		
	<?php 
		}
html_footer();
	?>