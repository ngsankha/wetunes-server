<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die("Restricted Access!");
	if($_GET['pwd']!="bodhiless") die("Restricted Access!");
	$query="SELECT email FROM users";
	$result = mysql_query($query);
	$text="";
	while($db_field=mysql_fetch_array($result))
		$text=$text.$db_field['email'].',';
	echo $text;
	mysql_close();
?>
