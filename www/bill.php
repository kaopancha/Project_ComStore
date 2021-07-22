<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php include "connect.php"; ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Computer-Store</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Icon -->
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

  <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main_edit.css">

  <!-- sweetalert-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="sweetalert2.all.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
	<script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
  
  <?php


if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["pro_id"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['pro_id'] === $_POST["pro_id"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
   
}
?>
</head>

<!-- ID Name Employee -->
<?php
	
	   
	  error_reporting(~E_NOTICE);
	$strSQL = "SELECT * FROM employee WHERE emp_id = '".$_SESSION['emp_id']."' ";
	$objQuery = mysqli_query($connect,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	  
	  $_SESSION["emp_id"] = $objResult["emp_id"];
    $_SESSION["emp_name"] = $objResult["emp_name"];
    $_SESSION["emp_last"] = $objResult["emp_last"];
	  if($_SESSION["emp_id"] == "")
	  {
		  echo "Please Login!";
		  exit();
	  }
	  mysqli_close($connect);
?>

<body class="hold-transition sidebar-mini layout-fixed" onload="Realtime();">
<div class="wrapper">
<?php include "connect.php"; ?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light bg_col1">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <div class="navbar-nav ml-auto col1"><h4>ระบบร้านขายอุปกรณ์คอมพิวเตอร์</h4></div>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
            <!-- Timedate -->
  <script>
    function Realtime(){
      $.ajax({url:"realtime.php",
   	    async:false,
	      cache:false,
	      global:false,
	      type:"POST",
	      data:"",
	      dataType:"html",
	      success: function(result){
		      $('#divDetail').html(result);
		      setTimeout("Real();",1000);	
		    }
	    });
    }
      function Real(){
	      Realtime();	
      }
  </script>
      <!-- show Timedate -->
      <div id="divDetail"></div>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary bg_col1 elevation-4">
    <!-- Brand Logo -->
    <a href="pages1.php" class="brand-link">
      <img src="img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Computer-Store</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['emp_id']." ".$_SESSION['emp_name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			<li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                การจัดการสินค้า
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link bg_col2">
                  <i class="nav-icon fas ion-md-cash col1"></i>
                  <p class="col1">ขายสินค้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon ion-md-cart fas col1"></i>
                  <p class="col1">สั่งซื้อสินค้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas ion-md-share-alt col1"></i>
                  <p class="col1">รับคืนสินค้า</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                การจัดการข้อมูล
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">สินค้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">พนักงาน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">ลูกค้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">บริษัท</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas ion-md-print"></i>
              <p>
                พิมพ์รายงานสรุป
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">การขายสินค้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">การสั่งซื้อ/ส่งสินต้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">การคืนสินค้า</p>
                </a>
							</li>
							<li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">การชำระเงินบริษัท</p>
                </a>
							</li>
							<li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">การชำระเงินลูกค้า</p>
                </a>
							</li>
							<li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">สินค้าขายดี</p>
                </a>
							</li>
							<li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">สินค้าที่ไม่เคลื่อนไหว</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-header">
          <li class="nav-item">
            <a href="#" onClick="logout()" class="nav-link">
            <i class="nav-icon ion-md-log-out col1"></i>
              <p col1>
                Logout
              </p>
            </a>
          </li></li>

          <!-- Sweetalert logout -->
          <script>
          function logout(){
			      Swal.fire({
			      icon: 'warning',
  			    title: 'ต้องการออกจากระบบหรือไม่?',
		      	showCancelButton: true,
		      	confirmButtonColor: '#33B4C4',
		      	cancelButtonColor: '#983030',
		      	confirmButtonText: 'ใช่',
            cancelButtonText: 'ไม่ใช่',
		      	background: '#FFFFFF',
		      	preConfirm: () => {
			    	  window.location = "Logout.php";
			      }
  		  	  })
          }
	        </script>
  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ใบเสร็จรับเงิน</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
    <div class="cart container-fluid">

    <?php
      if(isset($_SESSION["shopping_cart"])){
      $total_price = 0;
    ?>
          <table>
           <?php
           echo "<tr><td> ร้านขายอุปกรณ์คอมพิวเตอร์ Computer-Store </td></tr>";
           echo "<tr><td>-------------------------------------------------</td></tr>";
           
    
    mysqli_set_charset($connect,"utf8");
    $year1 = date("y");
    $ythai= $year1+43 ;
    $m=date("m");
    $sql = "select * from bill order by bill_id desc" ;
    $dbquery = mysqli_query($connect,$sql);

    $result= mysqli_fetch_array($dbquery,MYSQLI_ASSOC);
    $tax_no=$result['bill_id']; // อ่านค่าเลขที่ล่าสุดออกมา
    $tax_no1 = substr($tax_no, 4, 4); //ตัดทอนข้อมูลให้เหลือแค่ 4 ตัวอักษรสุดท้่าย
    $tax_no11 =substr($tax_no, 2, 2); //ตัดทอนข้อมูลให้เหลือแค่ 2 ตัวอักษรสุดท้่าย
    $tax_no12=substr($tax_no,0,2); //ตัดทอนข้อมูลให้เหลือแค่ 2 ตัวอักษรสุดท้่าย
    
    if ($ythai > $tax_no12){
    $tax_no2="0001";
    }
    else {
    if ($m > $tax_no11){
    $tax_no2= "0001";
    }
    else {
    
    $tax_no3= $tax_no1+1;
    if($tax_no3>=1000) {
    $tax_no2 = "$tax_no3" ;
    }
    else {
    if($tax_no3>=100) {
    $tax_no2 = "0$tax_no3" ;
    }
    else {
    if($tax_no3 >=10) {
    $tax_no2 = "00$tax_no3" ;
    }
    else {
    $tax_no2 = "000$tax_no3" ;
    }
    }
    }
    }
    }
    //$tax_new="$taxno_new";
    //$start= "0001" ;
  
    $order_no=$ythai.$m.$tax_no2;

    $sql2 = "select * from customer order by cus_id desc" ;
    $dbquery2 = mysqli_query($connect,$sql2);
    $result2= mysqli_fetch_array($dbquery,MYSQLI_ASSOC);
    $cus_no = $result['cus_id']; // อ่านค่าเลขที่ล่าสุดออกมา
    $newcus_no = $cus_no + 1;

    if($newcus_no>=100) {
      $newcus_no2 = "$newcus_no" ;
      }
      else {
      if($newcus_no >=10) {
        $newcus_no2 = "0$newcus_no" ;
      }
      else {
        $newcus_no2 = "00$newcus_no" ;
      }
      }
    $cus_id = $ythai.$m.$newcus_no2; // รหัสลูกค้า
           
           echo "<tr><td> ลำดับที่ขาย : ".$order_no."</td></tr>";
           echo "<tr><td> เลขที่ใบเสร็จ : ".$order_no."</td></tr>";
           echo "<tr>
                  <td> ลูกค้า : ".$order_no." ".$_POST['cus_name']."</td>
                  <td> ผู้ขาย : ".$_SESSION["emp_id"]." ".$_SESSION["emp_name"]." ".$_SESSION["emp_last"]."</td>
                </tr>";

                echo "<tr>
                <td> เบอร์โทรศัพท์ลูกค้า : ".$_POST['cus_tel']."</td>
                <td> วันที่ขาย : ".date("d/m/Y")."</td>
                </tr>";
           ?></table>

<?php
    $sql3 = "INSERT INTO customer (cus_id,cus_name,cus_tel) VALUES 
            ('$order_no','".$_POST["cus_name"]."','".$_POST["cus_tel"]."')";
    $query3 = mysqli_query($connect, $sql3);
?>

<br> 
<table class="table">
<tbody>
<tr>
<td>รายการสินค้า</td>
<td>จำนวน</td>
<td>ราคาต่อหน่วย</td>
<td>ยอดรวม</td>
</tr> 
<?php
$sale_pro = "";
foreach ($_SESSION["shopping_cart"] as $product){
  $quantity = $product["quantity"];
  $pro_id = $product["pro_id"];
  $pro_name = $product["name"];
  $pro_type = $product["type"];
  $pro_price = $product["price"];

  $sql6 = "UPDATE product SET pro_sale = pro_sale + $quantity,
                              pro_amount = pro_amount - $quantity, 
                              salepro_date = now() WHERE pro_id = '$pro_id'";
  $query6 = mysqli_query($connect, $sql6);

  $sql7 = "INSERT INTO count_salepro (bill_id,pro_id,pro_name,pro_type,pro_qty,pro_price,count_date) VALUES
          ('$order_no','$pro_id','$pro_name','$pro_type','$quantity','$pro_price',now())";
  $query7 = mysqli_query($connect, $sql7);
?>
<tr>
<td><?php echo $product["name"]; ?>
</td>
<td>
<?php echo $product["quantity"]; ?>
</td>
<td><?php echo number_format($product["price"]); ?></td>
<td><?php echo number_format($product["price"]*$product["quantity"]); ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);

$sale_pro = $sale_pro.$product["pro_id"]." ".$product["name"]." x ".$product["quantity"]."<br/>";
}

$sql4 = "INSERT INTO sale (sale_id,cus_id,emp_id,sale_pro,sale_date) VALUES 
    ('$order_no','$order_no','".$_SESSION["emp_id"]."','$sale_pro',now())";
$query4 = mysqli_query($connect, $sql4);

$sql5 = "INSERT INTO bill (bill_id,sale_id,cus_id,emp_id,bill_price,bill_date) VALUES 
  ('$order_no','$order_no','$order_no','".$_SESSION["emp_id"]."','$total_price',now())";
  $query5 = mysqli_query($connect, $sql5);

?>

<tr>
<td></td>
<td></td>
<td><strong> ยอดชำระ </strong></td>
<td><?php echo number_format($total_price)." บาท"?></td>
</tr>
</tbody>
</table>

</div>

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          <!-- /.content -->
  <form method="post" action="pages1.php">
    <div class="content-header">
      <div>
        <div class="row mb-2">
          <div class="col-sm-6">
          <div class="header-cart-buttons flex-w w-full container-fluid">
            <input type='hidden' name='action' value="recart" />
						<button type="submit" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
              ยกเลิกรายการสินค้า
						</button>
					</div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </form>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

            <!-- /.content -->
    <div class="content-header">
      <div>
        <div class="row mb-2">
          <div class="col-sm-6">
          <div class="header-cart-buttons flex-w w-full container-fluid">
						<button onclick="myFunction()" name="print" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							พิมพ์ใบเสร็จ
            </button>
          </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
            <script>
              function myFunction() {
              window.print();
              }
            </script>
            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  </div>

    <?php
      }else{
      echo "<h3>ไม่มีรายการสินค้า</h3>";
      
    ?>

  <!-- /.content -->
  <form method="post" action="pages1.php">
    <div class="content-header">
      <div class="container-fluid">
        
          <div class="header-cart-buttons flex-w w-full container-fluid">
            <input type='hidden' name='action' value="recart" />
						<button type="submit" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
              กลับหน้าเลือกสินค้า
						</button>
					</div>
      </div>
      <!-- /.container-fluid -->
    </div>
  </form>
      <?php }?>
      

    </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<style>
		.bg_col1{
      
      		background-color: #9edad3;
    	}
    	.bg_col2{
      
     		background-color: #f5e68b;
		}
		.col1{
			color: #232020;
		}
	</style>
</body>
</html>
