<?php
 	  
 	$host  ="androidmusicdownload.com";
        $uname = "andro_deneme";
        $pwd = "karakartal6541***";
        $db = "androidm_deneme";

	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	 
	//$radioid=$_REQUEST['radioid'];
	$email=$_REQUEST['email'];
	 
	$flag['code']=0;


    // get all products from products table
     $result_last = mysql_query("SELECT *FROM radio_lastplayed WHERE email='$email' ORDER BY ID ASC") or die(mysql_error());



// check for empty result
if (mysql_num_rows($result_last) > 0) {
    // looping through all results

    while ($row = mysql_fetch_array($result_last)) {
	 
	   if($r=mysql_query("DELETE FROM radio_lastplayed WHERE ID= ".$row["ID"]." AND email='$email'",$con))
	    {
		$flag['code']=1;
		break;
	    }
	
	}
	
	}
	 
	print(json_encode($flag));
	mysql_close($con);
?>