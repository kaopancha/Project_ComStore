<html>
<head>
<title></title>
<meta charset="utf-8">
</head>
<body>

<form action="add_com2.php?Action=Save" name="frmAdd" method="post" enctype="multipart/form-data">
	<div class="table-responsive">  
    <table class="table table-bordered">
	  <tr>  
           <td width="30%"><label>ชื่อบริษัท</label></td>  
		   <td width="70%"><input class="form-control" type="text" id="com_name" name="com_name" value="" placeholder="กรอกชื่อบริษัท" required></td>
      </tr>
	  <tr>  
           <td width="30%"><label>ที่ตั้ง</label></td>  
           <td width="70%"><textarea rows="4" cols="60" id="com_lo" name="com_lo" class="form-control text-con" placeholder="กรอกที่ตั้งบริษัท" required></textarea></td>   
      </tr> 
      <tr>  
           <td width="30%"><label>เบอร์โทรศัพท์</label></td>  
           <td width="70%"><input class="form-control" type="tel" id="com_tel" name="com_tel" value="" placeholder="กรอกเบอร์โทรศัพท์บริษัท" required maxlength="10"></td>   
      </tr> 
	  </table>
       <button id="edit" name="edit" class="edit btn btn-success">บันทึก</button>
       <input type="hidden" name="action" value="edit" />
	  </div>  
</form>
	
</body>
</html>
