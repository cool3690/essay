
<?php
require_once("db.php");
   /*
	$emp_id=$_POST['emp_id'];
	$pwd=$_POST['pwd'];//
    $sql = "select* from emp where emp_id='$emp_id' and pwd= '$pwd'";
	
	
 $sql = "select userid,rawgrade,rawgrademax from mdl_grade_grades ";
$q=mysqli_query($db,$sql);
while($e=mysqli_fetch_assoc($q))
$output[]=$e;
print(json_encode($output));*/
//mysql_close();
$statement = $db->query('select userid,rawgrade,rawgrademax from mdl_grade_grades');

foreach($statement as $row){
    echo $row['userid']." ".$row['rawgrade']." ".$row['rawgrademax']."<br>";
}
   
?>