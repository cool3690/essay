<?php
//'6FHzChshWrTfDVs-z7s',
//'2QZ72aAJQsLmIMd2ILs'
$loader = require '../vendor/autoload.php';

$lrs = new TinCan\RemoteLRS(
    'https://cloud.scorm.com/lrs/SF85CK9136/',
    '1.0.2',
    '6FHzChshWrTfDVs-z7s',
    '2QZ72aAJQsLmIMd2ILs'
);
$actor = new TinCan\Group(
    ['name'=> '名 小'] 
);
$verb = new TinCan\Verb(
    [ 'id' => 'http://adlnet.gov/expapi/verbs/experienced' ]
);
$activity = new TinCan\Activity(
    [  
	'id'=> 'http://localhost/moodle/mod/quiz/view.php?id=2']
);
$timestamp = new TinCan\Result(
    [  
	'id'=> '2020-08-13T05:31:20.108Z'
	]
);
/*
$statementsQuery = array(
"agent" => $agent,
"verb" => new \TinCan\Verb(array("id" => trim($verb))),
"activity" => new \TinCan\Activity(array("id" => trim($activityid))),
"related_activities" => "false",
"format" => "ids"
);
   */
/*'name' => '名 小'
  'activity' => $activity,
   'verb'  => $verb,
   'id' => 'http://adlnet.gov/expapi/verbs/completed' 
*/
 $statement = new TinCan\Statement(
            [
            'actor' => $actor,
            'limit'  => 8,
            
            ]
    );
	 
 $response = $lrs->queryStatements(
			[ 'agent' => $actor,
			   
			   
			'limit' =>8 ,
			
			]
 
			);
		
$test2 = json_encode($response, JSON_PRETTY_PRINT);
HEADER('Content-Type: application/json; charset=utf-8');
$json = json_decode($test2,true);
	

  $json_data = json_decode($test2, true);
     
   $test3=$json_data["httpResponse"]["_content"];
  
  
 $test4= json_decode($test3, true);
  print_r($test3);

//print_r($test4 ["statements"][0]["id"] );

 print_r("姓名: ".$test4 ["statements"][0]["actor"]["name"]);
  print_r(" , 科目: ".$test4 ["statements"][0]["context"]["contextActivities"]["grouping"][1]["definition"]["name"]["en"]);
 print_r(" , 成績: ".$test4 ["statements"][0]["result"]["score"]["raw"]);
  

  
 

?>
