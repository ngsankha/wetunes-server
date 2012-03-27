<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$query='SELECT pin,friends,pfriends FROM users WHERE pin="'.$_GET['mpin'].'"';
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	$friends=$db_field['friends'];
	$pfriends="";
	$tok = strtok($db_field['pfriends'], ",");
	while ($tok !== false) {
		if($tok==$_GET['fpin'])
			$friends=$tok.",".$friends;
		else
			$pfriends=$tok.",".$pfriends;
		$tok = strtok(",");
	}
	function endsWith($haystack, $needle){
    		$length = strlen($needle);
    		$start  = $length * -1; //negative
    		return (substr($haystack, $start) === $needle);
	}
	if(endsWith($pfriends,","))
		$pfriendsfinal=substr($pfriends,0,strlen($pfriends)-1);
	$query="UPDATE users SET pfriends='".$pfriendsfinal."' WHERE pin='".$_GET['mpin']."'";
	mysql_query($query);
	$query="UPDATE users SET friends='".$friends."' WHERE pin='".$_GET['mpin']."'";
	mysql_query($query);
	$query='SELECT pin,friends FROM users WHERE pin="'.$_GET['fpin'].'"';
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	$friends=$db_field['friends'];
	$friendsfinal=$_GET['mpin'].','.$friends;
	$query="UPDATE users SET friends='".$friendsfinal."' WHERE pin='".$_GET['fpin']."'";
	mysql_query($query);
	mysql_close();
?>

