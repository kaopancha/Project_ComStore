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
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

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
		    	<li class="nav-item has-treeview">
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
                <a href="return.php" class="nav-link">
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
         
          <li class="nav-item has-treeview menu-open">
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
                  <p class="col1">การสั่งซื้อ/ส่งสินค้า</p>
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
                <a href="#" class="nav-link bg_col2">
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
            <h1 class="m-0 text-dark">สินค้าที่ไม่เคลื่อนไหว</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
            
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
        
        <div class="content-header"> <!-- ไม่แสดงตอนสั่งพิมพ์ -->
        <div>เลือกช่วงเวลาที่ต้องการ</div> 
                <!-- Date range -->
                <form method="post" action="printNot.php">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    
                    <input name="date" type="text" class="form-control float-right" id="reservation">
                    <input name="typetext" type="hidden" value="<?php echo $_POST['type'];?>">
                    
                    <input type="submit" class="btn btn-success" value="ยืนยัน">
                  </form>  

                <form method="post" action="printNot.php">
                    <input type="submit" class="btn btn-info" value="reset">

                </form>       

                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <form method="post" action="printNot.php">
                  <select name='type' id="type" class='form-control type' onChange="this.form.submit()">
									                           <option value="">แสดงทั้งหมด</option>
                                             <option value="CPU" <?php if($_POST['type']=="CPU") echo "selected";?>>CPU</option>
                                             <option value="MAINBOARD" <?php if($_POST['type']=="MAINBOARD") echo "selected";?>>MAINBOARD</option>
                                             <option value="VGA" <?php if($_POST['type']=="VGA") echo "selected";?>>VGA</option>
                                             <option value="RAM" <?php if($_POST['type']=="RAM") echo "selected";?>>RAM</option>
                                             <option value="HDD" <?php if($_POST['type']=="HDD") echo "selected";?>>HDD</option>
                                             <option value="SSD" <?php if($_POST['type']=="SSD") echo "selected";?>>SSD</option>
									                           <option value="POWERSUPPLY" <?php if($_POST['type']=="POWERSUPPLY") echo "selected";?>>POWERSUPPLY</option>
                                             <option value="CASE" <?php if($_POST['type']=="CASE") echo "selected";?>>CASE</option>
                                             <option value="COOLER" <?php if($_POST['type']=="COOLER") echo "selected";?>>COOLER</option>
                                             <option value="MORNITOR" <?php if($_POST['type']=="MORNITOR") echo "selected";?>>MONITOR</option>
		                </select>
                </form> 

             </div>
                

             <div class="card">
             <div class="container-fluid">
             <div align="center"><h4>ร้านขายอุปกรณ์คอมพิวเตอร์ Computer-Store</h4></div>
              <table width="100%">
              <tr>
              <td>
              <strong>รายงานสรุปสินค้าไม่เคลื่อนไหว 
              <?php 
              $sdate1 = substr($_POST['date'],3,2)."/".substr($_POST['date'],0,2)."/".substr($_POST['date'],6,4);
              $edate1 = substr($_POST['date'],16,2)."/".substr($_POST['date'],13,2)."/".substr($_POST['date'],19,4);

                    if($_POST['date'] != ""){
                      if($_POST['typetext'] != ""){echo "ประเภท ".$_POST['typetext']." ตั้งแต่วันที่ ".$sdate1." ถึง ".$edate1;
                      }else{echo "ตั้งแต่วันที่ ".$sdate1." ถึง ".$edate1; } 
                    }else if($_POST['type'] != ""){echo "ประเภท ".$_POST['type'];}
              ?>
              </strong>
              </td><td align="right"><strong>พิมพ์รายงาน <?php include "realtime.php"; ?></strong></td>
              </tr>
              </table>
             </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="" class="table table-bordered">
                <thead>
                <tr>
                  <th>รหัสสินค้า</th>
                  <th>ชื่อสินค้า</th>
                  <th>วันที่เพิ่มสินค้าเข้าระบบ</th>
                  <th>วันที่ขายล่าสุด</th>
                  <th>จำนวนวันที่ไม่เคลื่อนไหว</th>
                </tr>
                </thead>
                
                <tbody>
                <?php
                include "thaidate.php";
                $sdate = substr($_POST['date'],6,4)."-".substr($_POST['date'],0,2)."-".substr($_POST['date'],3,2);
                $edate = substr($_POST['date'],19,4)."-".substr($_POST['date'],13,2)."-".substr($_POST['date'],16,2);
                $nowdate = date("Y-m-d");
                $type = $_POST['typetext'];
                $type2 = $_POST['type'];

                $allprice = 0;
                $sumprice = 0;
                $count = 0;

                
                mysqli_set_charset($con,"utf8");
                if($_POST['date'] != "" && $type != ""){$result = mysqli_query($con,"SELECT * ,DATEDIFF(NOW(),salepro_date) AS date_diff ,DATEDIFF(NOW(),addpro_date) AS date_diff2 FROM product WHERE salepro_date NOT BETWEEN '$sdate' AND '$edate' and pro_type = '$type' ORDER BY date_diff DESC, date_diff2 DESC");}
                else if($type2 != ""){$result = mysqli_query($con,"SELECT * ,DATEDIFF(NOW(),salepro_date) AS date_diff ,DATEDIFF(NOW(),addpro_date) AS date_diff2 FROM product WHERE pro_type = '$type2' ORDER BY date_diff DESC, date_diff2 DESC");}
                else if($_POST['date'] != ""){$result = mysqli_query($con,"SELECT * ,DATEDIFF(NOW(),salepro_date) AS date_diff ,DATEDIFF(NOW(),addpro_date) AS date_diff2 FROM product WHERE salepro_date NOT BETWEEN '$sdate' AND '$edate' ORDER BY date_diff DESC, date_diff2 DESC");}
                else {$result = mysqli_query($con,"SELECT * ,DATEDIFF(NOW(),salepro_date) AS date_diff ,DATEDIFF(NOW(),addpro_date) AS date_diff2 FROM product ORDER BY date_diff DESC, date_diff2 DESC");}
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <form method='post' action=''>
                <tr>
                  <td><?php echo $row['pro_id']; ?></td>
                  <td><?php echo $row['pro_name']; ?></td>
                  <td><?php $time=$row['addpro_date']; echo Thai_date($time);?></td>
                  <td><?php if($row['salepro_date'] == "") {
                            echo "ไม่มี";}
                            else{$time=$row['salepro_date']; echo Thai_date($time); }
                      ?> 
                  </td>
                  <td><?php if($row['salepro_date'] == "") {
                            echo "ไม่มีการขายสินค้า";} //$row['date_diff2'].
                            else{echo $row['date_diff']; }
                      ?>
                  </td>                  
                </tr>
                </form>
                <?php $count = $count + 1; $allprice = $allprice + $sumprice; } mysqli_close($con);?>
                
                </tbody>

                <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>ยอดรวมทั้งหมด</th>                  
                  <th><?php echo $count; ?> รายการ</th>
                </tr>
                </tfoot>
                
              </table>
              <br>
              <br>
              <table width="100%">
              <tr>
              <td width="60%"></td>
              <td align="center"><strong> ผู้พิมพ์รายงาน <br><br>.........................................</strong></td>
              <td width="3%"></td>
              <td align="center"><strong> ผู้ตรวจสอบ <br><br>.........................................</strong></td>
              </tr>
              </table>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    <div class="content-header">
      <div>
        <div class="row mb-2">
          <div class="col-sm-6">
          <div class="header-cart-buttons flex-w w-full container-fluid">
						<button onclick="myFunction()" name="print" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							พิมพ์รายงาน
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
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

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
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false,
    });
  });

  //Date range picker
  $('#reservation').daterangepicker();
</script>


<style>
		.bg_col1{
      
      		background-color: #9edad3;
    	}
      .bg_col3{
      
      background-color: #E29587;
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
