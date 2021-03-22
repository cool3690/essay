<html>
    <head>
   <meta charset="utf-8">
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script type="text/javascript" src="jquery/jquery-ui-timepicker-zh-TW.js"></script>
    <link rel="stylesheet" href="https://cdn.rawgit.com/dmuy/MDTimePicker/7d5488f/mdtimepicker.min.css">
    <script src="https://cdn.rawgit.com/dmuy/MDTimePicker/7d5488f/mdtimepicker.min.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    </head>
    <body>
<?php
require_once("db.php");
?>
<?php
  $sub=3;
  $sql="select id,userid,action, FROM_UNIXTIME(`timecreated`, '%Y %m %d')
   from `mdl_logstore_standard_log` 
   where FROM_UNIXTIME(`timecreated`, '%Y %m %d')<'2021 03 22'";
  //$sql="select A.userid, A.rawgrade, A.rawgrademax, A.timecreated,A.itemid,B.id,B.itemname,B.courseid,B.courseid,C.id,C.fullname
      //  from mdl_grade_grades A, mdl_grade_items B,mdl_course C
      //  where userid='3' and A.timecreated!='NULL' and B.id=A.itemid and C.id=B.courseid ";
		$statement = $db->query($sql);
		foreach($statement as $row){
			 
			 echo $row['action'].'<br>'.'<br>' ;
		   
	 
		}
   	
	?>
</body>
</html>