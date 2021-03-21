<!DOCTYPE html>
<html>
<head>	 
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">
	<link  href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"></head>
<body>
<?php
     
    if(isset($_POST['submit'])){
        $subject=$_POST['subject'];
        $quiz=$_POST['quiz'];
        echo $subject." ".$quiz;

    }

 
	 
?>
<?php
    	require 'db.php';	
         
        
        $sql = mysqli_query($db, "SELECT * FROM mdl_course where category !='0'");	
         
?>
<div class="container"> 
    <form id="myform" name="myform" method="post" action="e.php">
        <select class="form-control" name="subject"">
            <option value="">請選擇科目</option>
            <?php
						while ($row = mysqli_fetch_array($sql)) {
							$fullname=$row['fullname'];	
							 $sortorder=$row['sortorder'];			
							echo "<option value='$sortorder'>".$fullname." </option>";
						}
				 
			?>
        </select>
        <select class="form-control" name="quiz">
            <option value="">請選擇考試</option>
            <option value="dog">Dog</option>
            <option value="cat" >Cat</option>
            <option value="hamster">Hamster</option>
            <option value="parrot">Parrot</option>
            <option value="spider">Spider</option>
            <option value="goldfish">Goldfish</option>
        </select>
        <button type="submit" name="submit" class="btn-primary " > 確認 </button>
    </form>

    <?php
     
        if(isset($_POST['submit'])){
            $subject=$_POST['subject'];
            $quiz=$_POST['quiz'];
            echo $subject." ".$quiz;

        }

 
	 
    ?>
</div>
 
<script type="text/javascript">
 
</script>
</body>
</html>