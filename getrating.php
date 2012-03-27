<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$actTitle=$_GET['title'].' by '.$_GET['artist'];
	$query = "SELECT title FROM songs where title='".$actTitle."'";
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	if(strcasecmp($db_field['title'],$actTitle)==0){
		include('overall.php');
		$overall=updateOverall($_GET['title'],$_GET['artist']);
		$query = "SELECT title,playedTimes,suggestedTimes,rating FROM songs where title='".$actTitle."'";
		$result = mysql_query($query);
		$db_field = mysql_fetch_array($result);
		echo '<b>'.$actTitle.'</b><br/><b>Average Rating: </b>'.$db_field['rating'].'<br/><b>Number of times played: </b>'.$db_field['playedTimes'].'<br/><b>Number of times suggested: </b>'.$db_field['suggestedTimes'].'<br/><br/><b>Overall Rating: </b>'.$overall;
	}else
		echo '!';
	mysql_close();
?>
