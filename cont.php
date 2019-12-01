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
    </head>
<?php
require_once("db.php");
/*
$statement = $db->query('select userid,rawgrade,rawgrademax from mdl_grade_grades');

foreach($statement as $row){
    echo $row['userid']." ".$row['rawgrade']." ".$row['rawgrademax']."<br>";
}
  */
?>

    <body>
        <font size="7"><center>成績</font> </br> </br>
    <div class="container"><form action="cont.php" method="post">
		<table class="table table-striped table-responsive-xl">
				
				<tbody>			      
				<tr>                                            
					<td id="emp_item">學生</td>                 
					<td>                                        
					 <select name="emp2">	                
					
	<?php

		$statement = $db->query('SELECT username,firstname,lastname FROM mdl_user');
		foreach($statement as $row){
			?>
			 <option value="<?= $row['username']?>"><?=$row['lastname'].$row['firstname']?></option>
		   
		<?php
 
		}
   	
	?>
	   </select>		
				    </td>                                       
				</tr> 
				</tbody>
			</table>
				<center><input type="submit" class="btn btn-primary" value="送出">
			</form>
         </div>
    </body>
</html>