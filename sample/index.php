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
$actor = new TinCan\Agent(
    [ 'name' => '名 小' ]
);
$verb = new TinCan\Verb(
    [ 'id' => 'http://adlnet.gov/expapi/verbs/completed' ]
);
$activity = new TinCan\Activity(
    [ 'id' => 'http://rusticisoftware.github.com/TinCanPHP' ]
);
$statement = new TinCan\Statement(
    [
         
        'verb'  => $verb,
         
    ]
);
$result =  new TinCan\Result(
    [
         "success" => true,
         
         
    ]
);

 $response = $lrs->queryStatements(
			[ 'actor'  =>$actor ,
			  'verb'  => $verb,
			  'result' => $result
			]
 
			);
		
$test2 = json_encode($response, JSON_PRETTY_PRINT);
HEADER('Content-Type: application/json; charset=utf-8');
$json = json_decode($test2,true);
	

  $json_data = json_decode($test2, true);
     
   $test3=$json_data["httpResponse"]["_content"];
  
  
 $test4= json_decode($test3, true);
  print_r($test4 );

//print_r($test4 ["statements"][0]["id"] );
?>
