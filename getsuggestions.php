<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$query = "SELECT pin,suggestions FROM users where pin='".$_GET['mpin']."'";
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	if($db_field['suggestions']=='')
		echo '?';
	else
		echo $db_field['suggestions'];
	mysql_close();
?>
