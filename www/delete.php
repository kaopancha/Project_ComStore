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
    $pro_id = $_POST["pro_id"];
    
    $sql = "DELETE FROM product WHERE pro_id = '$pro_id';" ;
    $query = mysqli_query($connect,$sql);

    mysqli_close($connect);
?>

<script>
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'ลบข้อมูลสำเร็จ',
  showConfirmButton: false,
  timer: 1500
    }),window.setTimeout(function () {
                         location.replace("product.php")
                      }, 1500)
</script>
 </body>
  </html>