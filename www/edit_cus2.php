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

	
	$sql = "UPDATE customer SET
		cus_name = '".mysqli_real_escape_string($connect,$_POST['cus_name'])."',
        cus_tel = '".mysqli_real_escape_string($connect,$_POST['cus_tel'])."'
		WHERE cus_id = '".mysqli_real_escape_string($connect,$_POST['cus_id'])."' ";

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
   						location.replace("customer.php")
						}, 1500)
  </script>
  </body>
  </html>
