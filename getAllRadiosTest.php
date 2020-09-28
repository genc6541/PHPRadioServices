<?php

/*
 * Following code will list all the products
 */


header("Content-type: text/html; charset=utf-8");
//$country =$_GET['id'];


// array for JSON response
$response = array();


// include db connect class
require_once("../android/db_connect.php");

// connecting to db
$db = new DB_CONNECT();


mysql_query("SET NAMES 'utf8'");
mysql_query ("SET CHARACTER SET utf8");
mysql_query ("SET COLLATION_CONNECTION = 'utf8_general_ci'");



//$sql = sprintf("call bando()");
$sql = 'Select * from radiolar';
// get all products from products table
$result = mysql_query($sql) or die(mysql_error());


//$connection = mysqli_connect("bandofm.com", "bandocu", "radio6541", "bando_radio");

  //run the store proc
  //$result = mysqli_query($connection, 
  //   "CALL bando") or die("Query fail: " . mysqli_error());


// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
  $response = array();
    
    while ($row = mysql_fetch_assoc($result)) {
        // temp user array
		
		/*
        $product = array();
        $product["id"] = $row["ID"];
        $product["country"] = $row["CountryName"];
        $product["radio"] = $row["RadioName"];
        $product["stream"] = $row["StreamLink"];
        $product["logo"] = $row["RadioLogo"];
        $product["count"] = $row["count"];
      $product["tur"] = $row["Tur"];
	  */
 
        //echo $row["RadioName"];
		
		    $response[] = $row;

        // push single product into final response array
        
         //array_push($response["radiolar"], $product);
    }
    // success
    //$response["success"] = 1;

    // echoing JSON response

function jsonRemoveUnicodeSequences($struct) {
   return preg_replace("/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($struct));
}
   echo jsonRemoveUnicodeSequences($response);


    //echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";

    // echo no users JSON
    echo json_encode($response);
}
?>