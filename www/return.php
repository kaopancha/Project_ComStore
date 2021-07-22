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
  
</head>

<!-- ID Name Employee -->
<?php
	  
	  error_reporting(~E_NOTICE);
	$strSQL = "SELECT * FROM employee WHERE emp_id = '".$_SESSION['emp_id']."' ";
	$objQuery = mysqli_query($connect,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	  
	  $_SESSION["emp_id"] = $objResult["emp_id"];
	  $_SESSION["emp_name"] = $objResult["emp_name"];
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
                <a href="pages1.php" class="nav-link">
                  <i class="nav-icon fas ion-md-cash col1"></i>
                  <p class="col1">ขายสินค้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="order.php" class="nav-link">
                  <i class="nav-icon ion-md-cart fas col1"></i>
                  <p class="col1">สั่งซื้อสินค้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link bg_col2">
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
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">สินค้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="employee.php" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">พนักงาน</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="customer.php" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">ลูกค้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="company.php" class="nav-link">
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
                <a href="printSale.php" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">การขายสินค้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="printOrder.php" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">การสั่งซื้อ/ส่งสินต้า</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="printReturn.php" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">การคืนสินค้า</p>
                </a>
							</li>
							<li class="nav-item">
                <a href="printReceipt.php" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">การชำระเงินบริษัท</p>
                </a>
							</li>
							<li class="nav-item">
                <a href="printBill.php" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">การชำระเงินลูกค้า</p>
                </a>
							</li>
							<li class="nav-item">
                <a href="printBest.php" class="nav-link">
                  <i class="far fa-circle nav-icon col1"></i>
                  <p class="col1">สินค้าขายดี</p>
                </a>
							</li>
							<li class="nav-item">
                <a href="printNot.php" class="nav-link">
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
            <h1 class="m-0 text-dark">รับคืนสินค้า</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
              <form action="<?php echo $_SERVER['SCRPIT_NAME']?>" method="post" role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label>เลขที่ใบเสร็จ</label>
                    <input type="text" name="txtbill_id" class="form-control" id="exampleInputEmail1" placeholder="กรอกเลขที่ใบเสร็จ">
                  </div>
                  <div>
                  <button type="submit" class="btn btn-success">ค้นหา</button>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row mb-2">
            <div class="card-body">
                  <?php
                  
                  $bill_id = null;
                  if(isset($_POST["txtbill_id"]))
                  {
                    $bill_id = $_POST["txtbill_id"];
                  
                  
                  mysqli_set_charset($connect,"utf8");

                  $sql1 = "SELECT * FROM bill WHERE bill_id = '$bill_id'";
                  $query1 = mysqli_query($connect,$sql1);
                  $bill = mysqli_fetch_assoc($query1);
                  
                  $cus_id = $bill["cus_id"];
                  $sql2 = "SELECT * FROM customer WHERE cus_id = '$cus_id'";
                  $query2 = mysqli_query($connect,$sql2);
                  $cus = mysqli_fetch_assoc($query2);

                  $sale_id = $bill["sale_id"];
                  $sql3 = "SELECT * FROM sale WHERE sale_id = '$sale_id'";
                  $query3 = mysqli_query($connect,$sql3);
                  $sale = mysqli_fetch_assoc($query3);

                  include "thaidate.php";
                  $time=$sale['sale_date'];

                  if(isset($bill['bill_id'])){
                  ?>

                  <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th><label>เลขที่ใบเสร็จ</label></th>
                      <th><label>ชื่อลูกค้า</label></th>
                      <th><label>รายการที่ซื้อ</label></th>
                      <th><label>ยอดรวมสุทธิ</label></th>
                      <th><label>วันที่ซื้อ</label></th>
                    </tr>
                  </thead>
                  <tr>
                  <td>
                  <div class="form-group">
                        <?php echo $bill['bill_id'];?>
                  </div>
                  </td>
                  <td>
                  <div class="form-group">
                        <?php echo $cus['cus_name'];?>
                  </div>
                  </td>
                  <td>
                  <div class="form-group">
                        <?php echo $sale['sale_pro'];?>
                  </div>
                  </td>
                  <td>
                  <div class="form-group">
                        <?php echo number_format($bill['bill_price']);?>
                  </div>
                  </td>
                  <td>
                  <div class="form-group">
                        <?php echo Thai_date($time);?>
                  </div>
                  </td>
                  </tr>
                  </table>
                  <br>

                  <div class="col-sm-6">
                  <form action="return2.php?Action=Save" method="post">
                      <div class="form-group">
                        <label>รหัสสินค้าที่คืน</label>
                        <select name="repro_id" class='form-control type'>
                                             <option value="" disabled selected>เลือกรหัสสินค้า</option>
                                              <?php
                                              $result1 = mysqli_query($connect,"SELECT * FROM count_salepro WHERE bill_id = '$bill_id'");
                                              while($row1 = mysqli_fetch_assoc($result1)){
                                              ?>                             
                                                      <option value="<?php echo $row1['pro_id']; ?>"><?php echo $row1['pro_id']; ?></option>
                                              <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>จำนวนที่คืน</label>
                        <input type="text" name="repro_amount" class="form-control" id="exampleInputEmail1" placeholder="กรอกจำนวนสินค้า">
                      </div>
                      <input type="hidden" name="sale_id" value="<?php echo $sale_id?>">
                      <input type="hidden" name="cus_id" value="<?php echo $cus_id?>">
                      <input type="hidden" name="emp_id" value="<?php echo $_SESSION["emp_id"]?>">

                      <div>
                      <button type="submit" class="btn btn-success">ยืนยัน</button>
                      </div>
                  </form>
                  </div>

                  <?php
                  }else{
                  ?>

              <script>
              Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'ไม่พบเลขที่ใบเสร็จ',
              showConfirmButton: false,
              timer: 1500
              })
              </script>  

                <?php }}?>
            </div>
        </div><!-- /.row -->  
      </div><!-- /.container-fluid -->

    <!-- /.content -->
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
