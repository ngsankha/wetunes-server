<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$query="UPDATE users SET thought='".$_GET['thought']."' WHERE pin='".$_GET['mpin']."'";
	mysql_query($query);
	mysql_close();
	echo '?';
?>
