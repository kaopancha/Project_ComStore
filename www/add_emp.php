<html>
<head>
<title></title>
<meta charset="utf-8">
</head>
<body>

<form action="add_emp2.php?Action=Save" name="frmAdd" method="post" enctype="multipart/form-data">
	<div class="table-responsive">  
    <table class="table table-bordered">
	  <tr>  
           <td width="30%"><label>รหัสพนักงาน</label></td>  
		   <td width="70%"><input class="form-control" type="text" id="emp_id" name="emp_id" value="" placeholder="กรอกรหัสพนักงาน" required></td>
      </tr>
      <tr>  
           <td width="30%"><label>รหัสผ่าน</label></td>  
		   <td width="70%"><input class="form-control" type="text" id="emp_pass" name="emp_pass" value="" placeholder="กรอกรหัสผ่านพนักงาน" required></td>
      </tr>
      <tr>  
           <td width="30%"><label>ชื่อพนักงาน</label></td>  
		   <td width="70%"><input class="form-control" type="text" id="emp_name" name="emp_name" value="" placeholder="กรอกชื่อพนักงาน" required></td>
      </tr>
      <tr>  
           <td width="30%"><label>นามสกุล</label></td>  
		   <td width="70%"><input class="form-control" type="text" id="emp_last" name="emp_last" value="" placeholder="กรอกนามสกุลพนักงาน" required></td>
      </tr>
      <tr>  
           <td width="30%"><label>เบอร์โทรศัพท์</label></td>  
           <td width="70%"><input class="form-control" type="tel" id="emp_tel" name="emp_tel" value="" placeholder="กรอกเบอร์โทรศัพท์พนักงาน" required maxlength="10"></td>   
      </tr>
      <tr>  
           <td width="30%"><label>ที่อยู่</label></td>  
           <td width="70%"><textarea rows="4" cols="60" id="emp_add" name="emp_add" class="form-control text-con" placeholder="กรอกที่อยู่พนักงาน" required></textarea></td>   
      </tr>  
	  </table>
       <button id="edit" name="edit" class="edit btn btn-success">บันทึก</button>
       <input type="hidden" name="action" value="edit" />
	  </div>  
</form>
	
</body>
</html>
