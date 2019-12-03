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
<?php
require_once("db.php");
?>


    <body>
	 
        <font size="7"><center>成績</font> </br> </br>
    <div class="container">
	<form action="cont.php" method="post">
		<table class="table table-striped table-responsive-xl">
				
				<tbody>			      
				<tr>                                            
					<td id="emp_item">學生</td>                 
					<td>                                        
					 <select name="emp2">	                
					
	<?php
		$statement = $db->query('SELECT id, username,firstname,lastname FROM mdl_user');
		foreach($statement as $row){
			?>
			 <option value="<?= $row['id']?>"><?=$row['lastname'].$row['firstname']?></option>
		   
		<?php
 
		}
   	
	?>
	   </select>		
				    </td>                                       
				</tr> 
				</tbody>
			</table>
				<center><input type="submit" class="btn btn-primary" value="送出"><br>
			</form>
			<br><br><br>
				<table class="table table-striped table-responsive-xl">
				<tbody>	
<tr>				
			<?php
			$i=0;
if($_POST['emp2']!=null){
	$sub=$_POST['emp2'];
$grade= "['time','rawgrade'],";
$statement = $db->query("select userid,rawgrade,rawgrademax,timecreated from mdl_grade_grades where userid='$sub' and timecreated!='NULL'");
//$statement->bindParam(':name', $sub); 
 echo "<tr><th>次數</th><th>考試成績  /  總分</th></tr>";
foreach($statement as $row){
	$i++;
	
    echo "<tr><td>". $i."</td><td>".round($row['rawgrade'],2)."   /  ".round($row['rawgrademax'],2)."</td></tr>";
	$g=$row['rawgrade'];
	
	
	$grade.="['$i',$g],";
}
$grade=rtrim($grade,",");
}

/**/

  
?>
                                     
				</tr> 
				</tbody>
			</table>
	<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo "[$grade]"?>);     
        var options = {title: '成績', backgroundColor:'yellow'};
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
	  google.setOnLoadCallback(drawChart1);
	  
    </script>
			<div id="chart_div" style="width: 900px; height: 200px;"></div>
			 
         </div>
    </body>
</html>