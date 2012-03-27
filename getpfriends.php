<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$query='SELECT pin,pfriends FROM users WHERE pin="'.$_GET['pin'].'"';
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	if($db_field['pfriends']=='')
		echo '?';
	else
		echo $db_field['pfriends'];
	mysql_close();
?>
