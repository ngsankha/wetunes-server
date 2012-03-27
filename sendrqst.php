<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$query='SELECT pin,pfriends FROM users WHERE pin="'.$_GET['mpin'].'"';
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	$query='SELECT pin FROM users WHERE pin="'.$_GET['mpin'].'"';
	$result2 = mysql_query($query);
	$fdb_field = mysql_fetch_array($result2);
	if($fdb_field['pin']!=''){
	$pfriends=$_GET['fpin'].','.$db_field['pfriends'];
	$pos=strrpos($pfriends,',');
	if($pos==(strlen($pfriends)-1))
		$pfriendsfinal=substr($pfriends,0,strlen($pfriends)-1);
	else
		$pfriendsfinal=$pfriends;
	$query="UPDATE users SET pfriends='".$pfriendsfinal."' WHERE pin='".$_GET['mpin']."'";
	mysql_query($query);
	echo '?';
	}else
	echo '!';
	mysql_close();
?>

