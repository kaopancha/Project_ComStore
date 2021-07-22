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
    session_start();

    if($_GET["Action"] == "Save"){

    $count = $_POST['count2'];
    
    $sql = "select * from sent_pro order by sent_id desc" ;
		$dbquery = mysqli_query($connect,$sql);
		$result= mysqli_fetch_array($dbquery,MYSQLI_ASSOC);

      $sent_id = intval($result['sent_id']) + 1;
      
    for ($i=1; $i <= $count; $i++) {
    
      if($_POST["sentamount".$i] != "" && $_POST["sentamount".$i] != "0"){

          $sentamount = $_POST['sentamount'.$i];

          $sql1 = "UPDATE order_pro SET order_sent = order_sent + $sentamount WHERE order_id = '".mysqli_real_escape_string($connect,$_POST['order_id'.$i])."' and pro_id = '".$_POST['pro_id'.$i]."' ";
          $objQuery = mysqli_query($connect,$sql1);
          
          $sql2 = "INSERT INTO sent_pro (sent_id,order_id,com_id,pro_id,emp_id,sent_amount,sent_date) VALUES 
                      ('$sent_id','".$_POST["order_id".$i]."','".$_POST["com_id".$i]."','".$_POST["pro_id".$i]."','".$_SESSION["emp_id"]."','$sentamount',now())";
          $objQuery2 = mysqli_query($connect,$sql2);

          $sql3 = "UPDATE product SET pro_amount = pro_amount + $sentamount WHERE pro_id = '".mysqli_real_escape_string($connect,$_POST['pro_id'.$i])."' ";
          $objQuery3 = mysqli_query($connect,$sql3);

  } } }
  ?>
  <script>
  Swal.fire({
	position: 'center',
	icon: 'success',
	title: 'บันทึกการรับสินค้า',
	showConfirmButton: false,
	timer: 1500
	  }),window.setTimeout(function () {
   						location.replace("order.php")
						}, 1500)
  </script>
  </body>
  </html>
