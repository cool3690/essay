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
<script>
	$(function(){
			$( "#start_d" ).datepicker({
				changeMonth:true,
				changeYear:true,
				dateFormat:"yy-mm-dd",
						
			});
		
		$( "#end_d" ).datepicker({
				changeMonth:true,
				changeYear:true,
				dateFormat:"yy-mm-dd",
						
			});
		
		});
		
  </script>
<?php
require_once("db.php");
global $CFG, $DB, $OUTPUT,$USER;
//require_once($CFG->dirroot.'/lib/moodlelib.php');

//$courseid = isset($_GET['id']);

if(isset($_GET['id']))$courseid =$_GET['id'] ;
if(isset($_GET['uid']))$userid =$_GET['uid'] ;
//echo $courseid ;
//echo $userid;
//require_login($courseid);
//$context = context_course::instance($courseid);
//require_capability('block/mygrade:viewpages', $context);
?>


    <body>
	 
        <font size="7"><center>登入次數查詢</font> </br> </br>
    <div class="container">
    <form id="form1" name="form1" method="post" action="test.php"  class="form-inline">
    起始日：<input type = "text" class="form-control" name="start_d" id= "start_d" size = "20" value="<?php if(isset($_POST['start_d'])) echo $_POST['start_d'];?>">
    結束日： <input type = "text" class="form-control" name= "end_d" id= "end_d" size = "20"  value="<?php if(isset($_POST['end_d'])) echo $_POST['end_d'];?>">
    <input type="submit" class="btn btn-primary" value="送出"><br>
       </form>
   
				<table class="table table-striped table-responsive-xl">
				<tbody>	
<tr>				
<?php
			$i=0;
//if(isset($_POST['emp2'])){
//	$sub=$_POST['emp2'];
  //$sub=$courseid;
	 
	// echo $sub."的成績"; 
$grade= "['time','rawgrade'],";
$grade_barchart= "['time','rawgrade', { role: 'style' }],";
if(isset($_POST['start_d'])&& isset($_POST['end_d'])){
 	$end_d=$_POST['end_d'];
     $start_d=$_POST['start_d'];//and FROM_UNIXTIME(`timecreated`, '%Y-%m-%d') BETWEEN '$start_d' and '$end_d'
/////
$sql="SELECT * FROM mdl_course where id='1'";
	$statement = $db->query($sql);
		foreach($statement as $row){
			 
			  echo "<h3> ".$row['fullname']."的登入次數</h3>"; 
		   
		 
 
	 	}
/////
$sql="select A.action,count(userid),FROM_UNIXTIME(A.timecreated, '%Y-%m-%d'),A.userid,A.courseid, B.id,B.firstname,B.lastname 
from mdl_logstore_standard_log A, mdl_user B 
where A.action='loggedin' and A.userid= B.id  and FROM_UNIXTIME(A.timecreated, '%Y-%m-%d') BETWEEN '$start_d' and '$end_d'
group by A.userid";
 //$sql="select userid,rawgrade,rawgrademax,timecreated from mdl_grade_grades where userid='$sub' and timecreated!='NULL'"
$statement = $db->query($sql);
 
 echo "<tr><th>姓名</th><th>登入次數</th></tr>";
foreach($statement as $row){
	$i++;
	
    echo "<tr><td>".$row['lastname'].$row['firstname']."</td><td>".$row['count(userid)']."</td></tr>";
    /* */
	$g=$row['count(userid)'];
	$h=$row['lastname'].$row['firstname'];
	
	//$grade.="['$i',$g],";
	$grade_barchart.="['$h', $g ,'gold'],";
   
}/**/
//$grade=rtrim($grade,",");
$grade_barchart=rtrim($grade_barchart,",");

///////////////creat post/////
$sql_post="select A.action,count(userid),FROM_UNIXTIME(A.timecreated, '%Y-%m-%d'),A.userid,A.courseid,A.component,A.target,A.objecttable,
B.id,B.firstname,B.lastname 
from mdl_logstore_standard_log A, mdl_user B 
where A.action='created' and  A.target='post' and  A.component='mod_forum' and A.objecttable='forum_posts'
and A.userid= B.id  and FROM_UNIXTIME(A.timecreated, '%Y-%m-%d') BETWEEN '$start_d' and '$end_d'
group by A.userid";
$i=0;
$statement_post = $db->query($sql_post);
foreach($statement_post as $row){
	$i++;
	 echo $i."<br>";
    echo  $row['lastname'].$row['firstname']. $row['count(userid)']."<br>";
     
   
}
////////////
?>

                                     
	</tr> 
	</tbody>
	</table>
  
   
	 

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php  echo "[$grade_barchart]"?>); 
        var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "登入次數",
        width: 600,
        height: 400,
        bar: {groupWidth: "20%"},
        legend: { position: "none" },
      };
        var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
	  google.setOnLoadCallback(drawChart1);
	  
    </script>
			<div id="chart_div2" style="width: 900px; height: 200px;"></div>
			 
         </div> 
         <?php
}
  
?>      
    </body>
</html>
