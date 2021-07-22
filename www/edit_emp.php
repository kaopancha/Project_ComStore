<html>
<?php include "connect.php"; ?>
<head>
<title></title>
<meta charset="utf-8">
</head>
<body>
<?php
          
	if(isset($_POST["emp_id"]))  
	{  
	 
	mysqli_set_charset($connect,"utf8"); 
	$query = "SELECT * FROM employee WHERE emp_id = '".$_POST["emp_id"]."'";  
	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>

<form action="edit_emp2.php?Action=Save" name="frmAdd" method="post" enctype="multipart/form-data">
	<div class="table-responsive">  
    <table class="table table-bordered">
	  <tr>  
           <td width="30%"><label>รหัสพนักงาน</label></td>  
		   <td width="70%"><?php echo $row["emp_id"];?></td>
		   <input type="hidden" id="emp_id" name="emp_id" value="<?php echo $row["emp_id"];?>">
      </tr>
      <tr>  
           <td width="30%"><label>รหัสผ่านพนักงาน</label></td>  
           <td width="70%"><input class="form-control" type="text" id="emp_pass" name="emp_pass" value="<?php echo $row["emp_pass"];?>"></td>   
      </tr> 
	  </table>
       <button id="edit" name="edit" class="edit btn btn-success">บันทึก</button>
       <input type="hidden" name="action" value="edit" />
	  </div>  
</form>
	
<?php
     }mysqli_close($connect);
?>

</body>
</html>
