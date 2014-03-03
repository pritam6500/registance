<html>
<head>
{{ HTML :: style('css/style.css'); }}
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); }}
{{ HTML::script('js/site.js'); }}


</head>
<body>
<div class="wrapper">
<div class="header">{{ HTML :: image('images/logo.png'); }} </div>

<div style="background:#ccc; height:100%; width:100%;">
<div class="login">
<?php if(isset($not)){
		 ?>
		<h1 style="color:red;">Email Password not matchs!!</h1>
		<?php } ?>

	<table id="login">
			<form action="login" enctype="multipart/form-data" method="post" >
			<tr><td><label>Email address</label></td><td><input id="login_emailid" type="text" name="login_emailid"></td><td class="error_email col_red error"></td></tr>
			
			<tr><td><label>Password</label></td><td><input id="login_password" type="password" name="login_password"></td><td class="error_pass col_red error"></td></tr>
			<tr><td></td><td><span class="valid_login">Login</span><a class="login_signup" href="signup" style="float:right;">User Signup</a></td></tr>
			
			</form>
		</table><!--login closed-->
</div>
</div>		
</div><!-- wrapper closed-->		
</body>
</html>