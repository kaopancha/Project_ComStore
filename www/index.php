
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Computer-Store Login</title>
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
	
	
	<style>
		
		body{ 
	background-image:url("img/bg5.jpg");
	background-size: cover;
	font-family: cursive;
}

.lg-container{
	width:400px;
	margin:30px auto;
	padding:20px 40px;
	border:1px solid #f4f4f4;
	background:rgba(255,255,255,.5);
	-webkit-border-radius:20px;
	-moz-border-radius:10px;

	-webkit-box-shadow: 0 0 2px #aaa;
	-moz-box-shadow: 0 0 2px #aaa;
}


.lg-container2{
	margin:auto 10px auto auto;
	width:130px;
	border:1px solid #f4f4f4;
	background:rgba(255,255,255,.5);
	-webkit-border-radius:10px;
	-moz-border-radius:10px;

	-webkit-box-shadow: 0 0 2px #aaa;
	-moz-box-shadow: 0 0 2px #aaa;
}

.lg-container h1{
	font-size:40px;
	text-align:center;
}
#lg-form > div {
	margin:10px 5px;
	padding:5px 0;
}
#lg-form label{
	display: none;
	font-size: 20px;
	line-height: 25px;
}
#lg-form input[type="text"],
#lg-form input[type="password"]{
	border:1px solid rgba(51,51,51,.5);
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	padding: 5px;
	font-size: 16px;
	line-height: 20px;
	width: 100%;
	font-family: cursive;
	text-align:center;
}
#lg-form div:nth-child(3) {
	text-align:center;
}
#lg-form button{
	font-family: cursive;
	font-size: 18px;
	border:1px solid #000;
	padding:5px 10px;
	border:1px solid rgba(51,51,51,.5);
	-webkit-border-radius:10px;
	-moz-border-radius:10px;

	-webkit-box-shadow: 2px 1px 1px #aaa;
	-moz-box-shadow: 2px 1px 1px #aaa;
	cursor:pointer;
}
#lg-form button:active{
	-webkit-box-shadow: 0px 0px 1px #aaa;
	-moz-box-shadow: 0px 0px 1px #aaa;
}
#lg-form button:hover{
	background:#f4f4f4;
}
#message{width:100%;text-align:center}
.success {
	color:#065500;
}
.error {
	color: #920A0D;
}

	</style>
	
	 <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
	
	<!-- sweetalert-->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="sweetalert2.all.min.js"></script>
	<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

	
</head>
<body onload="Realtime();">
	
	<!-- show Timedate -->
		<div class="lg-container2" align="right" id="divDetail"></div>
	
	<div class="lg-container">
		<div align="center"><h2>ระบบร้านขายอุปกรณ์คอมพิวเตอร์</h2></div>
		<div align="center"><img height="250" width="320px" src="img/logo.png"></div>
		<h1>Employee Login</h1>
		<form action="checklogin.php" id="lg-form" name="lg-form" method="post">
			
			<div>
				<label for="username">Username:</label>
				<input autofocus type="text" name="username" id="username" placeholder="EmployeeID"/>
			</div>
			
			<div>
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" placeholder="Password" />
			</div>
			
			<div>				
				<button id="login" name="login" class="login">Login</button>
			</div>
			<div id="message"></div>
      	
		</form>

	</div>
	
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

	<!-- <script>
     $(document).ready(function(){
     $('#login').click(function(){  
			var username = $("#username").val();
			var password = $("#password").val();
            
            $.ajax(
				{
			url: "checklogin.php",
			method: "POST",
			data:{username:username,password:password},
			success: function(data)
			{
				if(data == 1)
				{
					$("#message").html('');
					$("#lg-form").slideUp('slow', function(){
					}),Toast.fire({
  							icon: 'success',
  							title: 'Login successfully'
						}),window.setTimeout(function () {
   						location.replace("pages1.php")
						}, 2000)
					
					$("form").trigger("reset");
				}
				else
					$("#message").html('<p class="error">ERROR: Invalid EmployeeID and/or Password.</p>');
			}
		});
          });  
     });  
	</script> -->
	
<!-- sweetalert login -->
	<!-- <script>
	const Toast = Swal.mixin({
  toast: true,
  position: 'top-start',
  showConfirmButton: false,
  timer: 2000,
  timerProgressBar: true,
  onOpen: (toast) => {
    //toast.addEventListener('mouseenter', Swal.stopTimer)
    //toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
	</script> -->

</body>
</html>