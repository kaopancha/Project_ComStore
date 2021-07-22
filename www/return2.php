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
        
        $sql2 = "select * from return_pro order by return_id desc" ;
        $dbquery = mysqli_query($con,$sql2);
        $result= mysqli_fetch_array($dbquery,MYSQLI_ASSOC);

        $return_id = intval($result['return_id']) + 1;

        $sql = "INSERT INTO return_pro (return_id,sale_id,cus_id,emp_id,pro_id,return_amount,return_date) VALUES 
                ('$return_id','".$_POST["sale_id"]."','".$_POST["cus_id"]."','".$_POST["emp_id"]."','".$_POST["repro_id"]."','".$_POST["repro_amount"]."',now())";
        if(mysqli_query($con,$sql)){
    
  ?>
  <script>
  Swal.fire({
	position: 'center',
	icon: 'success',
	title: 'บันทึกการคืนสินค้า',
	showConfirmButton: false,
	timer: 1500
	  }),window.setTimeout(function () {
   						location.replace("return.php")
						}, 1500)
  </script>
  <?php }}?>
  </body>
  </html>
