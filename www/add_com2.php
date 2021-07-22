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

	$sql = "INSERT INTO company (com_name,com_tel,com_lo) VALUES 
	('".$_POST["com_name"]."','".$_POST["com_tel"]."','".$_POST["com_lo"]."')";;

	$objQuery = mysqli_query($connect,$sql);

  mysqli_close($connect);
  }
  ?>
  <script>
  Swal.fire({
	position: 'center',
	icon: 'success',
	title: 'บันทึกการเพิ่มบริษัท',
	showConfirmButton: false,
	timer: 1500
	  }),window.setTimeout(function () {
   						location.replace("company.php")
						}, 1500)
  </script>
  </body>
  </html>
