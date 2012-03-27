<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$query='SELECT name,email,pin,thought,nowplaying FROM users WHERE pin="'.$_GET['fpin'].'"';
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	$out='<b>Name:</b> '.$db_field['name'].'<br/><b>Email:</b> '.$db_field['email'].'<br/><b>Pin:</b> '.$db_field['pin'].'<br/><br/><b>Is thinking:</b> '.$db_field['thought'].'<br/><br/><b>Is listening to:</b> '.$db_field['nowplaying'];
	echo $out;
?>
