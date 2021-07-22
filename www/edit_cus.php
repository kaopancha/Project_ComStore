<html>
<?php include "connect.php"; ?>
<head>
<title></title>
<meta charset="utf-8">
</head>
<body>
<?php
          
	if(isset($_POST["cus_id"]))  
	{  
	 
	mysqli_set_charset($connect,"utf8"); 
	$query = "SELECT * FROM customer WHERE cus_id = '".$_POST["cus_id"]."'";  
	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>

<form action="edit_cus2.php?Action=Save" name="frmAdd" method="post" enctype="multipart/form-data">
	<div class="table-responsive">  
    <table class="table table-bordered">
	  <tr>  
           <td width="30%"><label>รหัสลูกค้า</label></td>  
		   <td width="70%"><?php echo $row["cus_id"];?></td>
		   <input type="hidden" id="cus_id" name="cus_id" value="<?php echo $row["cus_id"];?>">
      </tr>
      <tr>  
           <td width="30%"><label>ชื่อลูกค้า</label></td>  
           <td width="70%"><input class="form-control" type="text" id="cus_name" name="cus_name" value="<?php echo $row["cus_name"];?>"></td>   
      </tr>
      <tr>  
           <td width="30%"><label>เบอร์โทรศัพท์ลูกค้า</label></td>  
           <td width="70%"><input class="form-control" type="text" maxlength="10" id="cus_tel" name="cus_tel" value="<?php echo $row["cus_tel"];?>"></td>   
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
