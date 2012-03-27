<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$query='SELECT pin,friends FROM users WHERE pin="'.$_GET['pin'].'"';
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	echo $db_field['friends'];
	mysql_close();
?>
