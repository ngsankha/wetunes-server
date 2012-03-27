<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$query="SELECT title,overall FROM songs ORDER BY overall DESC LIMIT 10";
	$result = mysql_query($query);
	$text="";
	while($db_field=mysql_fetch_array($result))
		$text=$text.$db_field['title'].'|';
	echo substr($text,0,strlen($text)-1);
	mysql_close();
?>
