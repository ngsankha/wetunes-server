<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$actTitle=$_GET['title'].' by '.$_GET['artist'];
	$query='SELECT title,votedTimes,rating FROM songs WHERE title="'.$actTitle.'"';
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	if(strcasecmp($db_field['title'],$actTitle)!==0){
		$query='INSERT INTO songs VALUES("'.$actTitle.'","'.$_GET['artist'].'","0","1","0","'.$_GET['rating'].'","0")';
		$result=mysql_query($query);
		if($result)
			echo '?';
		else
			echo '!';
	}else{
		$votes=$db_field['votedTimes']+1;
		$total=$db_field['votedTimes']*$db_field['rating']+$_GET['rating'];
		//echo $total;
		$rating=$total/$votes;
		$query="UPDATE songs SET votedTimes='".$votes."',rating='".$rating."' WHERE title='".$actTitle."'";
		mysql_query($query);
		echo '?';
	}
	include('overall.php');
	updateOverall($_GET['title'],$_GET['artist']);
	mysql_close();
?>
