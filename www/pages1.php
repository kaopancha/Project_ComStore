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

<!-- add to cart-->
<?php

$status="";
if (isset($_POST['pro_id']) && $_POST['pro_id']!=""){
$pro_id = $_POST['pro_id'];
$result = mysqli_query(
$con,
"SELECT * FROM product WHERE pro_id ='$pro_id'"
);
$row = mysqli_fetch_assoc($result);
$id = $row['pro_id'];
$name = $row['pro_name'];
$type = $row['pro_type'];
$pro_amount = $row['pro_amount'];
$price = $row['pro_price'];
$img = $row['pro_img'];
 
$cartArray = array(
 $pro_id=>array(
 'pro_id'=>$id,
 'name'=>$name,
 'type'=>$type,
 'amount'=>$pro_amount,
 'price'=>$price,
 'quantity'=>1,
 'img'=>$img)
);
 
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($pro_id,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Product is already added to your cart!</div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
 }
 
 }
}
?>

<!-- cart detail -->
<?php 
    if (isset($_POST['action']) && $_POST['action']=="recart"){
      if(!empty($_SESSION["shopping_cart"])) {

            unset($_SESSION["shopping_cart"]);
      }
      }
  ?>

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

<body class="animsition hold-transition sidebar-mini layout-fixed" onload="Realtime();">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg_col1 navbar-white navbar-light">
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

		<!-- Cart -->

		<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
}else $cart_count = 0;
?>
		<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php echo $cart_count; ?>">
							<i class="nav-item zmdi zmdi-shopping-cart"></i>
		</div>


	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					รายการสินค้า
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<div class="cart">
					<?php
					if(isset($_SESSION["shopping_cart"])){
    				$total_price = 0;
					?>
				<ul class="header-cart-wrapitem w-full">
					<?php 
						foreach ($_SESSION["shopping_cart"] as $product){
					?>
					<li class="header-cart-item flex-w flex-t m-b-12">

						<form method='post' action=''>
						<input type='hidden' name='pro_id' value="<?php echo $product["pro_id"]; ?>" />
						<input type='hidden' name='action' value="remove" />
					
						<button type='submit' class='remove'><div class="header-cart-item-img">
						<img src="<?php echo $product["img"]; ?>" alt="IMG">
						</div></button>
						</form>

						<div class="header-cart-item-txt p-t-8">
							<a class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?php echo $product["name"]; ?>
							</a>

							<span class="header-cart-item-info">
								<form method='post' action=''>
									<input type='hidden' name='pro_id' value="<?php echo $product["pro_id"]; ?>" />
									<input type='hidden' name='action' value="change" />

									<div class="input-group">
									<input type="number" value="<?php echo $product["quantity"];?>" min="1" max="<?php echo $product["amount"];?>" name='quantity' class='quantity' onChange="this.form.submit()" >
									x <?php echo " ".number_format( $product["price"] ); ?>
									(max <?php echo $product["amount"];?>)
									</div>

								</form>
								ยอดรวม<?php echo " ".number_format($product["price"]*$product["quantity"])." บาท"; ?>
							</span>
						</div>
					</li>
					<?php
						$total_price += ($product["price"]*$product["quantity"]);
						}
					?>	
				</ul>
				
				<div class="w-full">
					<form method="post" action="bill.php">
					
					<input class="form-control" type="text" placeholder="ชื่อลูกค้า" name="cus_name" id="cus_name" required><br>
					<input class="form-control" type="tel" placeholder="เบอร์โทรศัพท์ลูกค้า" name="cus_tel" id="cus_tel" maxlength="10" pattern="[0-9]{10}" required>

					<div class="header-cart-total w-full p-tb-40">
						ยอดชำระ : <?php echo " ".number_format($total_price); ?> บาท
					</div>

					<div id="message"></div>
					
					<div class="header-cart-buttons flex-w w-full">
						<button name="submit" id="ok" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							ชำระเงิน
					</button>
					</div></form>
				</div>
			
				<?php
				}else
					{ echo "<h3>ไม่มีรายการสินค้า!</h3>";
				}?>

				</div>
			</div>
		</div>
	</div>      

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

    <!-- Main content -->

    <!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container-fluid">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
                ขายสินค้า
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".CPU">
						CPU
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".MAINBOARD">
						Mainboard
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".RAM">
						RAM
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".VGA">
						VGA Card
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".HDD">
						HDD
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".SSD">
						SSD
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".POWERSUPPLY">
						Power Supply
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".CASE">
						Case
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".COOLER">
						Cooler
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".MORNITOR">
						Monitor
					</button>
				</div>
					  
		  			<!-- 
					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>-->
				</div>
				
				<!-- Search product 
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" value="ss" name="search-product" placeholder="Search">
					</div>	
				</div>-->

			</div>


			<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
          crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
          crossorigin="anonymous"></script> 
	 
		  <div class="container-fluid">
			<div class="row isotope-grid">
			<?php include "connect.php"; ?>
				<?php
				$result = mysqli_query($con,"SELECT * FROM product");
				while($row = mysqli_fetch_assoc($result)){
					?>
				<form method='post' action=''>
				<input type='hidden' name='pro_id' value="<?php echo $row['pro_id'];?>">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $row['pro_type'];?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img width="350px" height="200px" src="<?php echo $row['pro_img']; ?>" alt="IMG-PRODUCT">

							<a href="#" id="<?php echo $row["pro_id"]; ?>" name="view" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 view_data">
								รายละเอียด
							</a>
						</div> 

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    <?php echo $row['pro_name']; ?>
								</a>

								<span class="stext-105 cl3">
                                    <?php echo number_format($row['pro_price']); ?> บาท
								</span>
								<span>
									<button class="buy flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">เลือกสินค้า</button>
								</span>
							</div>

						</div>
					</div>
				</div></form><?php }  mysqli_close($con);?>

			</div></div>
	 
	 <div id="dataModal" class="modal fade">
	 
      <div class="modal-dialog">  
           <div class="modal-content">               
                <div class="modal-body" id="VIEW">  
				</div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>


 <!-- Modal1 -->
 <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>
		
		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>
				<div class="modal-body" id="VIEW">  
                </div>  
			</div>
		</div>
	</div>

	  <script>  
     $(document).ready(function(){
          $(document).on('click', '.view_data', function(){  
               var pro_id = $(this).attr("id");  
               if(pro_id != '')  
               {  
                    $.ajax({  
                         url:"showproduct.php",  
                         method:"POST",  
                         data:{pro_id:pro_id},  
                         success:function(data){  
                              $('#VIEW').html(data);  
                              $('#dataModal').modal('show');  
                         }  
                    });  
               }            
          });  
     });  
     </script>


  <!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	

  

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

<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	


    <link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
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
