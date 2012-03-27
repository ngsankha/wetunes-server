<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$query='SELECT name,email,pin,thought FROM users WHERE pin="'.$_GET['mpin'].'"';
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	echo $db_field['pin']."\n";
	echo $db_field['thought']."\n";
	echo $db_field['name']."\n";
	echo $db_field['email'];
	mysql_close();
?>
