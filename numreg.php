<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die("Restricted Access!");
	if($_GET['pwd']!="bodhiless") die("Restricted Access!");
	$result = mysql_query("SELECT * FROM users");
	echo mysql_num_rows($result);
	mysql_close();
?>
