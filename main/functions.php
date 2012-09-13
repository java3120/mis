<?php
function dbexec($sql)
{
	//连接到本地mysql数据库
	$myconn=mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	mysql_select_db(DB_NAME,$myconn);
	mysql_query("set names utf8");
	$result=mysql_query($sql,$myconn) or die(mysql_error());
	//关闭对数据库的连接
	mysql_close($myconn);
	return $result;
	//@mysql_free_result($result);
}
?>