<?php
	include('dbinfo.php');
	mysql_connect($host,$user,$pwd);
	mysql_select_db($database);// or die('!');
	function randomAlphaNum($length){
		$rangeMin = pow(36, $length-1);
		$rangeMax = pow(36, $length)-1;
		$base10Rand = mt_rand($rangeMin, $rangeMax);
		$newRand = base_convert($base10Rand, 10, 36);
		return $newRand;
	}
	$pin=randomAlphaNum(5);
	$query='INSERT INTO users VALUES("'.$_GET['name'].'","'.$_GET['email'].'","'.$pin.'","","","","","")';
	$result=mysql_query($query);
	if($result)
		echo $pin;
	else
		echo '!';
	mysql_close();
	$body="<html><body>Hi,<br/>
Thanks for downloading WeTunes! Now you can interact, share and listen to music among your friends to get a better listening experience.<br/><br/>

What are you waiting for? Tell your friends with android phones to download WeTunes and then exchange your pins to send friend requests! Voila, you will be connected. You can then see what you friends are upto and what are they listening to! Give ratings to new songs and get to know the names new songs that are going down well with your friends. You can even send and receive song suggestions from your friends! A new world of discovering music awaits you!<br/><br/>

In case of any problem or assistance regarding the app please reply to me at this address and I promise I will follow up with further support!<br/><br/>

You can check out a demo video at Youtube at <a href=\"http://www.youtube.com/watch?v=6b4rAJXQ1I4\">http://www.youtube.com/watch?v=6b4rAJXQ1I4</a> !<br/><br/>

<a href=\"https://market.android.com/details?id=sngforge.android.wetunes\">https://market.android.com/details?id=sngforge.android.wetunes</a><br/>
WeTunes is a part of my student project and is completely running on free software and services. So please provide me with feedback and any other suggestions that you might have to keep it improving!
<br/><br/><br/>

Regards,<br/>
Sankha Narayan Guria<br/>
";
	mail($_GET['email'],"Welcome to WeTunes",$body,"From:Sankha Narayan Guria <sankha93@gmail.com>\nReply-To:Sankha Narayan Guria<sankha93@gmail.com>\nMIME-Version: 1.0\nContent-type: text/html; charset=iso-8859-1");
?>
