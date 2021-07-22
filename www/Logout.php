<?php
	include "connect.php";
	session_start();
	
	$sql2 = "UPDATE employee SET emp_logout = now() WHERE emp_id = '".$_SESSION['emp_id']."'";
	$objQuery2 = mysqli_query($connect,$sql2);
	session_destroy();
	
	header("location:index.php");
?>

<!-- onClick="return confirm('ยืนยันการออกจากระบบ')" -->



