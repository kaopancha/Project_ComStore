<html>
<?php include "connect.php"; ?>
<!-- sweetalert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="sweetalert2.all.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
	<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<body>
<?php
    if($_GET["Action"] == "Save"){
    $date1 = date("Ymd_his");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
 
	//รับชื่อไฟล์จากฟอร์ม 
	$file2 = $_POST['file2'];//รับชื่อไฟล์เดิม
	
	$img = (isset($_REQUEST['img']) ? $_REQUEST['img'] : '');
	
	$upload=$_FILES['img']['name'];
	if($upload <> '') { 
 
	//โฟลเดอร์ที่เก็บไฟล์
	$path="img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['img']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname =$numrand.$date1.$type;
 
	$path_copy=$path.$newname;
	$path_file_img="img/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['img']['tmp_name'],$path_copy);  
	}else{
		$path_copy = $file2;//ถ้าไม่เลือกรูปให้กลับเป็นรูปเดิม
		}
    
	
	$sql = "UPDATE product SET
		pro_name = '".mysqli_real_escape_string($connect,$_POST['pro_name'])."' ,
		pro_type = '".mysqli_real_escape_string($connect,$_POST['pro_type'])."' ,
		pro_desc = '".mysqli_real_escape_string($connect,$_POST['pro_desc'])."' ,
		pro_price = '".mysqli_real_escape_string($connect,$_POST['pro_price'])."',
		pro_amount = '".mysqli_real_escape_string($connect,$_POST['pro_amount'])."',
    pro_img = '$path_copy' WHERE pro_id = '".mysqli_real_escape_string($connect,$_POST['pro_id'])."' ";

	$objQuery = mysqli_query($connect,$sql);

  mysqli_close($connect);
  }
  ?>
  <script>
  Swal.fire({
	position: 'center',
	icon: 'success',
	title: 'บันทึกการแก้ไข',
	showConfirmButton: false,
	timer: 1500
	  }),window.setTimeout(function () {
   						location.replace("product.php")
						}, 1500)
  </script>
  </body>
  </html>
