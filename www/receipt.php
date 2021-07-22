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

    $count = $_POST['count3'];
    
    $sql = "select * from receipt order by re_id desc" ;
		$dbquery = mysqli_query($connect,$sql);
		$result= mysqli_fetch_array($dbquery,MYSQLI_ASSOC);

    $re_id = intval($result['re_id']) + 1;

      for ($i=1; $i <= $count; $i++) {
    
        if(isset($_POST["check".$i])) {
    
            $sql1 = "UPDATE sent_pro SET pay_status = 1 WHERE sent_id = '".mysqli_real_escape_string($connect,$_POST['sent_id'.$i])."' and pro_id = '".$_POST['pro_id'.$i]."' ";
            $objQuery = mysqli_query($connect,$sql1);
            
            $sql2 = "INSERT INTO receipt (re_id,sent_id,com_id,emp_id,pro_id,re_price,re_date) VALUES 
                        ('$re_id','".$_POST["sent_id".$i]."','".$_POST["com_id".$i]."','".$_SESSION["emp_id"]."','".$_POST['pro_id'.$i]."','".$_POST["re_price".$i]."',now())";
            $objQuery2 = mysqli_query($connect,$sql2);

      } } }
  ?>
  <script>
  Swal.fire({
	position: 'center',
	icon: 'success',
	title: 'บันทึกการชำระเงิน',
	showConfirmButton: false,
	timer: 1500
	  }),window.setTimeout(function () {
   						location.replace("order.php")
						}, 1500)
  </script>
  </body>
  </html>
