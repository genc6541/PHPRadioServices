<?php

/*
 * Following code will list all the products
 */


header('Content-Type: application/json; charset=utf-8');
//$country =$_GET['id'];


// array for JSON response
$response = array();



//mysql_query("SET NAMES 'utf8'");
//mysql_query ("SET CHARACTER SET utf8");
//mysql_query ("SET COLLATION_CONNECTION = 'utf8_general_ci'");

       $response["radiolar"] = array();
	  
$stmt = $DBS>PrepareSP('bando'); 


							//$DBS->debug=true;
			                $result = $DBS->Execute($stmt );
							if($result->MaxRecordCount() > 1)
							{
							
							while ($array = $result->FetchRow()) {
                               $product = array();
							 $product["id"] = $result->fields["ID"];
						     $product["country"] = $result->fields["CountryName"];
                             $product["radio"] = $result->fields["RadioName"];
                             $product["stream"] = $result->fields["StreamLink"];
                             $product["logo"] = $result->fields["RadioLogo"];
                             $product["count"] = $result->fields["count"];
                             $product["tur"] = $result->fields["Tur"];
	                    
						      array_push($response["radiolar"], $product);
                                                             }
           						 
								 }
							   $response["success"] = 1;
							}
							else
							{
							 $response["success"]  = 0;
							  $response["message"] = "No products found";
							}


    // echoing JSON response

function jsonRemoveUnicodeSequences($struct) {
   return preg_replace("/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($struct));
}
   echo jsonRemoveUnicodeSequences($response);


    //echo json_encode($response);


    // echo no users JSON
    echo json_encode($response);*/
}
?>