<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database) or die('!');
	$actTitle=$_GET['title'].' by '.$_GET['artist'];
	$text=$actTitle.'|'.$_GET['mpin'].'|';
	$query='SELECT title,suggestedTimes FROM songs WHERE title="'.$actTitle.'"';
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	if(strcasecmp($db_field['title'],$actTitle)!==0){
		$query='INSERT INTO songs VALUES("'.$actTitle.'","'.$_GET['artist'].'","0","0","1","0","0")';
		mysql_query($query);
	}else{
		$num=$db_field['suggestedTimes']+1;
		$query="UPDATE songs SET suggestedTimes='".$num."' WHERE title='".$actTitle."'";
		mysql_query($query);
	}
	function endsWith($haystack, $needle){
    		$length = strlen($needle);
    		$start  = $length * -1; //negative
    		return (substr($haystack, $start) === $needle);
	}
	$query='SELECT suggestions,pin FROM users WHERE pin="'.$_GET['fpin'].'"';
	$result = mysql_query($query);
	$db_field = mysql_fetch_array($result);
	$suggest=$text.$db_field['suggestions'];
	if(endsWith($suggest,'|'))
		$suggestfinal=substr($suggest,0,strlen($suggest)-1);
	else
		$suggestfinal=$suggest;
	$query="UPDATE users SET suggestions='".$suggestfinal."' WHERE pin='".$_GET['fpin']."'";
	$r=mysql_query($query);
	if($r)
		echo '?';
	else
		echo '!';
	include('overall.php');
	updateOverall($_GET['title'],$_GET['artist']);
	mysql_close();
?>
