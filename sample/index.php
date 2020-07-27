<?php
//'6FHzChshWrTfDVs-z7s',
//'2QZ72aAJQsLmIMd2ILs'
$loader = require '../vendor/autoload.php';

$lrs = new TinCan\RemoteLRS(
    'https://cloud.scorm.com/lrs/SF85CK9136/',
    '1.0.0',
    '6FHzChshWrTfDVs-z7s',
    '2QZ72aAJQsLmIMd2ILs'
);
$response = $lrs->queryStatements(['limit' =>3]);
$test2 = json_encode($response, JSON_PRETTY_PRINT);
HEADER('Content-Type: application/json; charset=utf-8');
$json = json_decode($test2,true);


  $json_data = json_decode($test2, true);
   //  print_r($json_data );
   $test3=$json_data["httpResponse"]["_content"];
  // print_r($test3["more"]);
  
 $test4= json_decode($test3, true);
 print_r($json_data   );

print_r($test4 ["statements"][0]["id"] );



/*  foreach($json as $value) {
	 		  ;
       // echo  $value .'<br><br>';  
	
    }
	 
*/
 // var_dump($test2);
//$debug = var_export($test2, true);
 
// echo $json->{'httpResponse'};

?>
