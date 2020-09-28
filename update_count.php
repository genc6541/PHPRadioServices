<?php

/*
 * Following code will update a product information
 * A product is identified by product id (pid)
 */

 	$host  ="androidmusicdownload.com";
        $uname = "andro_deneme";
        $pwd = "karakartal6541***";
        $db = "androidm_deneme";

	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	
	$id = $_REQUEST['id'];
  


	// get all products from products table
    $result_count = mysql_query("SELECT *FROM radiolar WHERE ID='$id'") or die(mysql_error());
	

if (mysql_num_rows($result_count) > 0) {


    while ($row = mysql_fetch_array($result_count)) {
 
         $count = $row["count"];
		 
		 }
	}
	
	$newcount = $count +1;

 	$flag['code']=0;

	if($r=mysql_query("UPDATE radiolar SET count='$newcount' WHERE ID='$id'",$con))
	{
		$flag['code']=1;
		echo"hi";
	}

	print(json_encode($flag));
	mysql_close($con);

?>