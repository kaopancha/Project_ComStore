<?php
 include "connect.php";

 if(isset($_POST["pro_id"]))  
 {  
      $output = '';  
      
      mysqli_set_charset($connect,"utf8"); 
      $query = "SELECT * FROM product WHERE pro_id = '".$_POST["pro_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '
      <div class="table-responsive">  
           <table class="table table-bordered">';     
      if($row = mysqli_fetch_array($result))  
      {  
           $output .= '
           
           <tr>  
           <td width="30%"><label>รหัสสินค้า</label></td>  
           <td width="70%">'.$row["pro_id"].'</td>  
      </tr>  
      <tr>  
           <td width="30%"><label>ชื่อสินค้า</label></td>  
           <td width="70%">'.$row["pro_name"].'</td>  
      </tr>  
      <tr>  
           <td width="30%"><label>ประเภทสินค้า</label></td>  
           <td width="70%">'.$row["pro_type"].'</td>  
      </tr>  
      <tr>  
           <td width="30%"><label>รายละเอียดสินค้า</label></td>  
           <td width="70%">'.$row["pro_desc"].'</td>  
      </tr>  
      <tr>  
           <td width="30%"><label>จำนวนที่มีอยู่ในคลัง</label></td>  
           <td width="70%">'.$row["pro_amount"].'</td>  
      </tr>  
      <tr>  
           <td width="30%"><label>จำนวนที่ขายได้</label></td>  
           <td width="70%">'.$row["pro_sale"].'</td>  
      </tr>    
      <tr>  
           <td width="30%"><label>ราคา</label></td>  
           <td width="70%">'.number_format($row["pro_price"]).' บาท</td>  
      </tr> 
      <tr>  
          <td width="30%"><label>รูปภาพ</label></td>  
          <td width="70%"><img width="250px" hieght="250px" src='.$row["pro_img"].'></td>  
      </tr> 
           
               
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
