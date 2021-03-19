<?php
	$db = mysqli_connect("localhost", "root", "", "moodle") or die("Could not connect: " . mysql_error());
	mysqli_query($db, "SET CHARACTER SET UTF8");
	mysqli_query($db, "SET NAMES UTF8");
	
?>