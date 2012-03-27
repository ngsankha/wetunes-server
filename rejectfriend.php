<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$query='SELECT pin,pfriends FROM users WHERE pin="'.$_GET['mpin'].'"';
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	$pfriends="";
	$tok = strtok($db_field['pfriends'], ",");
	while ($tok !== false) {
		if($tok!==$_GET['fpin'])
			$pfriends=$tok.",".$pfriends;
		$tok = strtok(",");
	}
	$pfriendsfinal=substr($pfriends,0,strlen($pfriends)-1);
	$query="UPDATE users SET pfriends='".$pfriendsfinal."' WHERE pin='".$_GET['mpin']."'";
	mysql_query($query);
	mysql_close();
?>

