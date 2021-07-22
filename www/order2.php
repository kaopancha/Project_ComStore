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

		$count = $_POST['count'];
        if($_POST['com_id'] != ""){

			
			$sql1 = "select * from order_pro order by order_id desc" ;
			$dbquery = mysqli_query($con,$sql1);
			$result= mysqli_fetch_array($dbquery,MYSQLI_ASSOC);

			$order_id = intval($result['order_id']) + 1;
		
		for ($i=1; $i <= $count; $i++) {

			if($_POST["order_amount".$i] != "" && $_POST["order_amount".$i] != "0"){ 
			$order_price = intval($_POST["pro_price".$i]) * intval($_POST["order_amount".$i]);

			$sql = "INSERT INTO order_pro (order_id,com_id,pro_id,emp_id,order_amount,order_price,order_date) VALUES 
				('$order_id','".$_POST["com_id"]."','".$_POST["pro_id".$i]."','".$_SESSION["emp_id"]."','".$_POST["order_amount".$i]."','$order_price',now())";
			$query = mysqli_query($con,$sql);
			}
		}	
?>

          <script>
          
          Swal.fire({
	        position: 'center',
	        icon: 'success',
        	title: 'บันทึกการสั่งซื้อสินค้า',
        	showConfirmButton: false,
        	timer: 1500
	        }),window.setTimeout(function () {
   						location.replace("order.php")
						}, 1500)
          </script>

<?php     
    }else{
?>
		<script>
          
          Swal.fire({
	        position: 'center',
	        icon: 'warning',
        	title: 'กรุณาเลือกบริษัท',
        	showConfirmButton: false,
        	timer: 1500
	        }),window.setTimeout(function () {
   						location.replace("order.php")
						}, 1500)
          </script>
<?php        
    }
?>
</body>
</html>