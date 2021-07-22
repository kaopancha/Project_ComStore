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
          <a class="d-block"><?php echo $_SESSION['emp_id']." ".$_SESSION['emp_name']; ?></a>
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
                <a href="#" class="nav-link bg_col2">
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
            <h1 class="m-0 text-dark">สั่งซื้อสินค้า</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">

            <h4>เลือกบริษัท</h4>
            <?php 
            $_SESSION['com_id'] = $_POST['secom_id'];
            
            mysqli_set_charset($con,"utf8");         
            $result2 = mysqli_query($con,"SELECT * FROM company WHERE com_id = '".$_POST['secom_id']."'");
            $row2 = mysqli_fetch_assoc($result2);
            ?>

            <form method="post" action="order.php">
            <select name="secom_id" class='form-control type' placeholder="กรุณาเลือกบริษัท" onChange="this.form.submit()">
                                             <option value="" disabled selected>กรุณาเลือกบริษัท</option>
              <?php
              $result1 = mysqli_query($con,"SELECT * FROM company");
              while($row1 = mysqli_fetch_assoc($result1)){
              ?>                             
                                             <option <?php if($_POST["secom_id"]==$row1['com_id']) echo "selected";?> value="<?php echo $row1['com_id']; ?>"><?php echo $row1['com_name']; ?></option>
              <?php } ?>
		        </select>
            </form>

            <br>
            <form method="post" action="order2.php">
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>รหัสสินค้า</th>
                  <th>ชื่อสินค้า</th>
                  <th>รายละเอียดสินค้า</th>
                  <th>จำนวนในคลัง</th>
                  <th>จำนวนที่ขายได้</th>
                  <th>ราคาสินค้า</th>
                  <th>จำนวนสั่งซื้อ</th>
                </tr>
                </thead>
                <tbody>
                
                <?php
                
                mysqli_set_charset($con,"utf8");
                $result = mysqli_query($con,"SELECT * FROM product");

                $count = 0;
                while($row = mysqli_fetch_assoc($result)){
                  $count = $count + 1;
                ?>
                <tr>
                  <td><?php echo $row['pro_id']; ?></td>
                  <td><?php echo $row['pro_name']; ?></td>
                  <td><?php echo $row['pro_desc']; ?></td>
                  <td><?php echo $row['pro_amount']; ?></td>
                  <td><?php echo $row['pro_sale']; ?></td>
                  <td><?php $proprice = intval($row['pro_price']) * 70/100; echo number_format($proprice); ?></td>
                  <input type="hidden" name="pro_price<?php echo $count; ?>" value="<?php echo $proprice; ?>">
                  <input type="hidden" name="pro_id<?php echo $count; ?>" value="<?php echo $row['pro_id']; ?>">
                  <input type="hidden" name="com_id" value="<?php echo $_POST['secom_id']; ?>">
                  <input type="hidden" name="count" value="<?php echo $count ; ?>">
                  <td>
                  <input type="number" min="0" name="order_amount<?php echo $count; ?>" placeholder="ใส่จำนวน">
                  </td>
                  
                </tr>
                <?php } ?>
                
                </tbody>
                
                <tfoot>
                <tr>
                  <th>รหัสสินค้า</th>
                  <th>ชื่อสินค้า</th>
                  <th>รายละเอียดสินค้า</th>
                  <th>จำนวนในคลัง</th>
                  <th>จำนวนที่ขายได้</th>
                  <th>ราคาสินค้า</th>
                  <th><input type="submit" class="btn btn-block btn-success" value="สั่งซื้อ" onclick="return confirm('ยืนยันการสั่งซื้อสินค้า')"></th>
                </tr>
                </tfoot>
              </table>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">รายการสั่งซื้อสินค้า</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">รับสินค้า</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">ชำระเงิน</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <form method="post" action="sent.php?Action=Save">
                    <table id="example3" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>เลขที่ใบสั่งซื้อ</th>
                        <th>ชื่อบริษัท</th>
                        <th>รหัสพนักงาน</th>
                        <th>รหัสสินค้า</th>
                        <th>จำนวนที่สั่งซื้อ</th>
                        <th>จำนวนที่ได้รับ</th>
                        <th>ราคารวม</th>
                        <th>วันที่สั่งซื้อ</th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php
                      include "thaidate.php";
                      
                      mysqli_set_charset($con,"utf8");
                      $result3 = mysqli_query($con,"SELECT * FROM order_pro");
                      
                      $count2 = 0;
                      while($row3 = mysqli_fetch_assoc($result3)){
                        $maxsent = intval($row3["order_amount"]) - intval($row3["order_sent"]);
                        if($maxsent > 0){
                          $count2 = $count2 + 1;
                      ?>
                      <tr>
                        
                        <td><?php echo $row3['order_id']; ?></td>
                        <td><?php $comid = $row3['com_id']; $result4 = mysqli_query($con,"SELECT * FROM company WHERE com_id = '$comid'"); $row4 = mysqli_fetch_assoc($result4); echo $row4['com_name']; ?></td>
                        <td><?php echo $row3['emp_id']; ?></td>
                        <td><?php echo $row3['pro_id']; ?></td>
                        <td><?php echo $row3['order_amount']; ?></td>
                        <td><?php echo $row3['order_sent']; ?></td>
                        <td><?php echo number_format($row3['order_price']); ?></td>
                        <td>
                        <?php
                        $time=$row3['order_date']; 
                        echo Thai_date($time);
                        ?>
                        </td>
                        <input type="hidden" name="order_id<?php echo $count2; ?>" value="<?php echo $row3['order_id']; ?>">
                        <input type="hidden" name="com_id<?php echo $count2; ?>" value="<?php echo $row3['com_id']; ?>">
                        <input type="hidden" name="pro_id<?php echo $count2; ?>" value="<?php echo $row3['pro_id']; ?>">
                        <input type="hidden" name="count2" value="<?php echo $count2; ?>">
                        <td>
                        <div class="btn-group">
                        <input type="number" name="sentamount<?php echo $count2; ?>" min="0" max="<?php echo $maxsent?>" value="0">
                        
                        </div></td>
                        
                      </tr>
                      <?php } } ?>
                      
                      </tbody>
                      
                      <tfoot>
                      <tr>
                        <th>เลขที่ใบสั่งซื้อ</th>
                        <th>ชื่อบริษัท</th>
                        <th>รหัสพนักงาน</th>
                        <th>รหัสสินค้า</th>
                        <th>จำนวนที่สั่งซื้อ</th>
                        <th>จำนวนที่ได้รับ</th>
                        <th>ยอดรวม</th>
                        <th>วันที่สั่งซื้อ</th>
                        <th><input type="submit" onclick="return confirm('ยืนยันการรับสินค้า')" class="btn btn-block btn-success" value="รับสินค้า"></th>
                      </tr>
                      </tfoot>
                    </table>
                    <div class="col_error">*หมายเหตุ การรับสินค้าหลายรายการต้องเป็นเลขที่ใบสั่งซื้อเดียวกันเท่านั้น!</div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                  <form method="post" action="receipt.php?Action=Save">
                  <table id="example4" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>เลขที่ใบส่งสินค้า</th>
                        <th>เลขที่ใบสั่งซื้อ</th>
                        <th>ชื่อบริษัท</th>
                        <th>รหัสพนักงาน</th>
                        <th>รหัสสินค้า</th>
                        <th>จำนวนสินค้า</th>
                        <th>ราคารวม</th>
                        <th>วันที่รับสินค้า</th>
                        <th>วันครบกำหนดชำระเงิน</th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php

                      
                      mysqli_set_charset($con,"utf8");
                      $result5 = mysqli_query($con,"SELECT sent_id,order_id,com_id,emp_id,pro_id,sent_amount,sent_date,pay_status,DATE_ADD(sent_date,INTERVAL 30 DAY) As paydate, DATE_ADD(sent_date,INTERVAL 15 DAY) As paydate_sale FROM sent_pro");
                      
                      $count3 = 0;
                      while($row5 = mysqli_fetch_assoc($result5)){
                        if($row5['pay_status'] == "0"){
                          $count3 = $count3 + 1;
                      ?>
                      <tr>
                        <td><?php echo $row5['sent_id']; ?></td>
                        <td><?php echo $row5['order_id']; ?></td>
                        <td><?php $comid = $row5['com_id']; $result4 = mysqli_query($con,"SELECT * FROM company WHERE com_id = '$comid'"); $row4 = mysqli_fetch_assoc($result4); echo $row4['com_name']; ?></td>
                        <td><?php echo $row5['emp_id']; ?></td>
                        <td><?php echo $row5['pro_id']; ?></td>
                        <td><?php echo $row5['sent_amount']; ?></td>
                        <td width="11%">
                          <?php $time = date("Y-m-d",strtotime("+1 days",strtotime($row5['paydate_sale'])));
                          $time2 = date("Y-m-d",strtotime("+1 days",strtotime($row5['paydate'])));
                          $pro_id = $row5['pro_id']; 
                          $order_id = $row5['order_id'];
                          $result6 = mysqli_query($con,"SELECT * FROM order_pro WHERE order_id = '$order_id' and pro_id = '$pro_id'");
                          $row6 = mysqli_fetch_assoc($result6);

                          if(strtotime($time)>=time()){

                            if($row5['com_id'] == "1"){
                            $price = intval($row6['order_price']) / intval($row6['order_amount']) * 80/100 * intval($row5['sent_amount']);
                            echo number_format($price)."<br/>"; ?> <strong class="col_success"> (ส่วนลด 20%) </strong> <?php }

                            elseif($row5['com_id'] == "2"){
                            $price = intval($row6['order_price']) / intval($row6['order_amount']) * 85/100 * intval($row5['sent_amount']);
                            echo number_format($price)."<br/>"; ?> <strong class="col_success"> (ส่วนลด 15%) </strong> <?php }

                            elseif($row5['com_id'] == "3"){
                            $price = intval($row6['order_price']) / intval($row6['order_amount']) * 90/100 * intval($row5['sent_amount']);
                            echo number_format($price)."<br/>"; ?> <strong class="col_success"> (ส่วนลด 10%) </strong> <?php }

                            else{
                              $price = intval($row6['order_price']) / intval($row6['order_amount']) * 95/100 * intval($row5['sent_amount']);
                              echo number_format($price)."<br/>"; ?> <strong class="col_success"> (ส่วนลด 5%) </strong> <?php }

                          }elseif(strtotime($time2)>=time()) {
                            $price = intval($row6['order_price']) / intval($row6['order_amount']) * intval($row5['sent_amount']);
                            echo number_format($price);

                          }else{ if($row5['com_id'] == "1"){
                                 $price = intval($row6['order_price']) / intval($row6['order_amount']) * 120/100 * intval($row5['sent_amount']); 
                                 echo number_format($price)."<br/>";?> <strong class="col_error"> (ค่าปรับ 20%) </strong> <?php }
                                
                                 elseif($row5['com_id'] == "2"){
                                  $price = intval($row6['order_price']) / intval($row6['order_amount']) * 115/100 * intval($row5['sent_amount']);
                                  echo number_format($price)."<br/>"; ?> <strong class="col_error"> (ค่าปรับ 15%) </strong> <?php }

                                  elseif($row5['com_id'] == "3"){
                                    $price = intval($row6['order_price']) / intval($row6['order_amount']) * 110/100 * intval($row5['sent_amount']);
                                    echo number_format($price)."<br/>"; ?> <strong class="col_error"> (ค่าปรับ 10%) </strong> <?php }

                                  else{
                                      $price = intval($row6['order_price']) / intval($row6['order_amount']) * 95/100 * intval($row5['sent_amount']);
                                      echo number_format($price)."<br/>"; ?> <strong class="col_error"> (ค่าปรับ 5%) </strong> <?php }
                          }
                           
                          ?>
                        </td>
                        <td>
                        <?php
                        $time=$row5['sent_date'];
                        echo Thai_date($time);
                        ?>
                        </td>
                        <td>
                        <?php
                        $time2=$row5['paydate']; 
                        echo Thai_date($time2);
                        ?>
                        </td>
                        <td>
                          <input name="check<?php echo $count3; ?>" class="form-control" type="checkbox" value="1">
                        </td>
                        <input type="hidden" name="sent_id<?php echo $count3; ?>" value="<?php echo $row5['sent_id']; ?>">
                        <input type="hidden" name="pro_id<?php echo $count3; ?>" value="<?php echo $row5['pro_id']; ?>">
                        <input type="hidden" name="com_id<?php echo $count3; ?>" value="<?php echo $row5['com_id']; ?>">
                        <input type="hidden" name="re_price<?php echo $count3; ?>" value="<?php echo $price; ?>">
                        <input type="hidden" name="count3" value="<?php echo $count3; ?>">
                        
                      </tr>
                      <?php } } ?>

                      </tbody>
    
                      <tfoot>
                      <tr>
                      <th>เลขที่ใบส่งสินค้า</th>
                        <th>เลขที่ใบสั่งซื้อ</th>
                        <th>ชื่อบริษัท</th>
                        <th>รหัสพนักงาน</th>
                        <th>รหัสสินค้า</th>
                        <th>จำนวนสินค้า</th>
                        <th>ราคารวม</th>
                        <th>วันที่รับสินค้า</th>
                        <th>วันครบกำหนดชำระเงิน</th>
                        <th><input type="submit" onclick="return confirm('ยืนยันการชำระเงิน')" class="btn btn-block btn-success" value="ชำระเงิน"></th>
                      </tr>
                      </tfoot>
                    </table>
                    <div class="col_error">*หมายเหตุ การชำระเงินหลายรายการต้องเป็นเลขที่ใบส่งเดียวกันเท่านั้น!</div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
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
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $("#example3").DataTable();
    $("#example4").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

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
    .col_success{
			color: #14b09b;
    }
    .col_error{
			color: #e81e25;
    }
	</style>
</body>
</html>
