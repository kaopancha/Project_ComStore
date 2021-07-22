<?php
	require "connect.php";
	session_start();

	 
	$strSQL = "SELECT * FROM employee WHERE emp_id = '".mysqli_real_escape_string($connect,$_POST['username'])."' 
	and emp_pass = '".mysqli_real_escape_string($connect,$_POST['password'])."'";
	$objQuery = mysqli_query($connect,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

	if(!$objResult)
	{
			echo "<h1 align='center'>login fail</h1>";
	}
	else{
			$sql2 = "UPDATE employee SET emp_login = now() WHERE emp_id = '".$objResult["emp_id"]."'";
				$objQuery2 = mysqli_query($connect,$sql2);
		
			$_SESSION["emp_id"] = $objResult["emp_id"];
		$_SESSION["emp_name"] = $objResult["emp_name"];
		
		header("Location: pages1.php");
		exit();
			
		}
	mysqli_close($connect);

?>