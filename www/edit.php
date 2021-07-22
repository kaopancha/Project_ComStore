<html>
<?php include "connect.php"; ?>
<head>
<title></title>
<meta charset="utf-8">
</head>
<body>
<?php
          
	if(isset($_POST["pro_id"]))  
	{  
	 
	mysqli_set_charset($connect,"utf8"); 
	$query = "SELECT * FROM product WHERE pro_id = '".$_POST["pro_id"]."'";  
	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>

<form action="product2.php?Action=Save" name="frmAdd" method="post" enctype="multipart/form-data">
	<div class="table-responsive">  
    <table class="table table-bordered">
	  <tr>  
           <td width="30%"><label>รหัสสินค้า</label></td>  
		   <td width="70%"><?php echo $row["pro_id"];?></td>
		   <input type="hidden" id="pro_id" name="pro_id" value="<?php echo $row["pro_id"];?>">
      </tr>  
      <tr>  
           <td width="30%"><label>ชื่อสินค้า</label></td>  
           <td width="70%"><input class="form-control" type="text" id="pro_name" name="pro_name" value="<?php echo $row["pro_name"];?>"></td>  
      </tr>  
      <tr>  
           <td width="30%"><label>ประเภทสินค้า</label></td>  
           <td width="70%">
           <select name='pro_type' id="pro_type" class='form-control pro_type'>
									<option value="<?php echo $row["pro_type"];?>"><?php echo $row["pro_type"];?></option>
                                             <option value="CPU">CPU</option>
                                             <option value="MAINBOARD">MAINBOARD</option>
                                             <option value="VGA">VGA</option>
                                             <option value="RAM">RAM</option>
                                             <option value="HDD">HDD</option>
                                             <option value="SSD">SSD</option>
									<option value="POWERSUPPLY">POWERSUPPLY</option>
                                             <option value="CASE">CASE</option>
                                             <option value="COOLER">COOLER</option>
                                             <option value="MORNITOR">MORNITOR</option>
		 </select>
           </td>  
      </tr>  
      <tr>  
           <td width="30%"><label>รายละเอียดสินค้า</label></td>  
		   <td width="70%"><textarea rows="5" cols="60" id="pro_desc" name="pro_desc" class="text-con"><?php echo $row["pro_desc"];?></textarea>
		</td>
      </tr>  
      <tr>  
           <td width="30%"><label>จำนวนที่มีอยู่ในคลัง</label></td>  
           <td width="70%"><input class="form-control" type="text" id="pro_amount" name="pro_amount" value="<?php echo $row["pro_amount"];?>"></td>  
      </tr>  
      <tr>  
           <td width="30%"><label>ราคา</label></td>  
           <td width="70%"><input class="form-control" type="text" id="pro_desc" name="pro_price" value="<?php echo $row["pro_price"];?>"></td> 
      </tr> 
      <tr>  
          <td width="30%"><label>รูปภาพ</label></td>  
		  <td width="70%">
            <img id="blah2" src="<?php echo $row["pro_img"]; ?>" alt="" width="200" />
            <br/>
            <input type="file" name="img" id="img" value="<?php echo $row["pro_img"]; ?>" onchange="readURL2(this);" />
             <input name="file2" type="hidden" id="file2" value="<?php echo $row["pro_img"]; ?>" />
          </td>
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
