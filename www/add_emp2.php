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

	
	$sql = "INSERT INTO employee (emp_id,emp_pass,emp_name,emp_last,emp_tel,emp_add) VALUES 
	('".$_POST["emp_id"]."','".$_POST["emp_pass"]."','".$_POST["emp_name"]."','".$_POST["emp_last"]."','".$_POST["emp_tel"]."','".$_POST["emp_add"]."')";

	$objQuery = mysqli_query($connect,$sql);

  mysqli_close($connect);
  }
  ?>
  <script>
  Swal.fire({
	position: 'center',
	icon: 'success',
	title: 'บันทึกการเพิ่มพนักงาน',
	showConfirmButton: false,
	timer: 1500
	  }),window.setTimeout(function () {
   						location.replace("employee.php")
						}, 1500)
  </script>
  </body>
  </html>
