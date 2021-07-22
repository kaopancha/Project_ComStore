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

	
	$sql = "UPDATE employee SET
		emp_pass = '".mysqli_real_escape_string($connect,$_POST['emp_pass'])."'
		WHERE emp_id = '".mysqli_real_escape_string($connect,$_POST['emp_id'])."' ";

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
   						location.replace("employee.php")
						}, 1500)
  </script>
  </body>
  </html>
