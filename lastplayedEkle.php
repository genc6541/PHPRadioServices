<?php
	
 	$host  ="androidmusicdownload.com";
        $uname = "andro_deneme";
        $pwd = "karakartal6541***";
        $db = "androidm_deneme";

	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	 
        $id=$_REQUEST['id'];	
        $email=$_REQUEST['email'];

 
        $int_id = intval($id);

     

	$flag['code']=0;

	if($r=mysql_query("INSERT INTO `radio_lastplayed`(`radioID`,`email`) VALUES ($int_id,'$email')",$con))
	{
		$flag['code']=1;
		echo"hi";
        echo $int_id;
echo $email;
	}

	print(json_encode($flag));
	mysql_close($con);
?>