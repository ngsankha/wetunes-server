<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$actTitle=$_GET['title'].' by '.$_GET['artist'];
	$query="UPDATE users SET nowplaying='".$actTitle."' WHERE pin='".$_GET['mpin']."'";
	mysql_query($query);
	$query='SELECT title,playedTimes FROM songs WHERE title="'.$actTitle.'"';
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	if(strcasecmp($db_field['title'],$actTitle)!==0){
		$query='INSERT INTO songs VALUES("'.$actTitle.'","'.$_GET['artist'].'","1","0","0","0","0")';
		$result=mysql_query($query);
		if($result)
			echo '?';
		else
			echo '!';
	}else{
		$num=$db_field['playedTimes']+1;
		$query="UPDATE songs SET playedTimes='".$num."' WHERE title='".$actTitle."'";
		mysql_query($query);
		echo '?';
	}
	include('overall.php');
	updateOverall($_GET['title'],$_GET['artist']);
	mysql_close();
?>
