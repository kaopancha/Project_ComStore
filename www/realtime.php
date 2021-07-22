<?php
date_default_timezone_set("Asia/Bangkok");
echo "วันที่ " . date("d/m/Y") . "<br>";
echo "เวลา " . date("H:i:s");
?>

<!-- another code

<form name="checkForm">
<input type="text" class="Input" name="txtTime" id="txtTime" maxlength="200" value="" />
<script>
function show(){
var Digital=new Date()
var hours=Digital.getHours()
var minutes=Digital.getMinutes()
var seconds=Digital.getSeconds()
var dn="AM" 
if (hours>=12)
dn="PM"
if (hours>12)
hours=hours-12
if (hours==0)
hours=12
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
document.checkForm.txtTime.value=hours+":"+minutes+":"
+seconds+" "+dn
setTimeout("show()",1000)
}
show()
</script>
</form>    

-->