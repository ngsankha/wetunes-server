<?php
	function updateOverall($title,$artist){
		$actTitle=$title.' by '.$artist;
		$query = "SELECT MAX(playedTimes) AS playedTimes FROM songs";
		$result = mysql_query($query);
		$db_field = mysql_fetch_array($result);
		$maxPlayed=$db_field['playedTimes'];
		$query = "SELECT MAX(suggestedTimes) AS suggestedTimes FROM songs";
		$result = mysql_query($query);
		$db_field = mysql_fetch_array($result);
		$maxSuggested=$db_field['suggestedTimes'];
		$query = "SELECT title,playedTimes,suggestedTimes,rating FROM songs where title='".$actTitle."'";
		$result = mysql_query($query);
		$db_field = mysql_fetch_array($result);
		$playScore=($db_field['playedTimes']/$maxPlayed)*5.0;
		$suggestScore=($db_field['suggestedTimes']/$maxSuggested)*5.0;
		$overall=(2*($playScore+$db_field['rating'])+$suggestScore)/5.0;
		$query="UPDATE songs SET overall='".$overall."' WHERE title='".$actTitle."'";
		mysql_query($query);
		return $overall;
	}
?>
