<?php
 	  
    	$host  ="androidmusicdownload.com";
        $uname = "andro_deneme";
        $pwd = "karakartal6541***";
        $db = "androidm_deneme";

	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	 
	$radioid=$_REQUEST['radioid'];
	$email=$_REQUEST['email'];
	 
	$flag['code']=0;
	 
	if($r=mysql_query("DELETE FROM radio_favori WHERE radioID= '$radioid' AND email='$email'",$con))
	{
		$flag['code']=1;
	}
	 
	print(json_encode($flag));
	mysql_close($con);
?>