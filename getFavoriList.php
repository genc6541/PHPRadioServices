<?php

/*
 * Following code will list all the products
 */


header("Content-type: text/html; charset=utf-8");
$email =$_GET['email'];

// array for JSON response
$response = array();


// include db connect class
require_once("../radio/db_connect.php");

// connecting to db
$db = new DB_CONNECT();

mysql_query("SET NAMES 'utf8'");
mysql_query ("SET CHARACTER SET utf8");
mysql_query ("SET COLLATION_CONNECTION = 'utf8_general_ci'");

// get all products from products table
$result_fav = mysql_query("SELECT *FROM radio_favori WHERE email='$email'") or die(mysql_error());



// check for empty result
if (mysql_num_rows($result_fav) > 0) {
    // looping through all results
    // products node
   


     $response["favoriler"] = array();
     $product = array();

    while ($row_fav = mysql_fetch_array($result_fav)) {
 
         $result_radio = mysql_query("SELECT *FROM radiolar WHERE ID=".$row_fav["radioID"]) or die(mysql_error());

            while ($row_radio = mysql_fetch_array($result_radio)) {

              
                 $product["id"] = $row_radio["ID"];
                 $product["country"] = $row_radio["CountryName"];
                 $product["radio"] = $row_radio["RadioName"];
                 $product["stream"] = $row_radio["StreamLink"];
                 $product["logo"] = $row_radio["RadioLogo"];


                      // push single product into final response array
                      array_push($response["favoriler"], $product);

                                                     }


    }

   

    // success
    $response["success"] = 1;

function jsonRemoveUnicodeSequences($struct) {
   return preg_replace("/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($struct));
}
   echo jsonRemoveUnicodeSequences($response);


    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";

    // echo no users JSON
    echo json_encode($response);
}
?>