<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$query='SELECT name,pin,thought,nowplaying FROM users WHERE pin="'.$_GET['pin'].'"';
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	$out=$db_field['name'].' ( '.$db_field['pin'].' )<br/>Is listening to: '.$db_field['nowplaying'].'<br/>Is thinking: '.$db_field['thought'].'<br/>';
	echo $out;
	mysql_close();
?>
