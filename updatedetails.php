<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$query="UPDATE users SET name='".$_GET['name']."' WHERE pin='".$_GET['mpin']."'";
	mysql_query($query);
	$query="UPDATE users SET email='".$_GET['email']."' WHERE pin='".$_GET['mpin']."'";
	if(mysql_query($query))
		echo '?';
	else
		echo '!';
	mysql_close();
?>
