<html>
<head>
{{ HTML :: style('css/style.css'); }}
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); }}
{{ HTML::script('js/site.js'); }}

</head>
<body>
<div class="wrapper" style="background-color:bisque;">
<div class="header">{{ HTML :: image('images/logo.png'); }} 


</div>
<label class="create_acc">Create an account</label>
<div class="login" style="min-height:700px;">
<?php 
		if(isset($not)){
		 ?>
		<h1 style="color:red;">Email Exist!</h1>
		<?php } ?>
			
		
	<table id="register">
	<form action="signup" method="post" enctype="multipart/form-data">
		<tr><td><label>Name / </label></td><td><input class="textbox"  type="text" name="f_name" id="f_name" class="regi_fi" ></td><td class="f_name col_red"></td></tr>
		<tr><td><label>User name / </label></td><td><input  class="textbox" type="text" name="u_name" id="u_name" class="regi_fi" ></td><td class="u_name col_red"></td></tr>
		<tr><td><label>Role / </label></td><td><select id="role" name="role">
					<option value="Resistance Leader">Resistance Leader</option>
					<option value="Squadron Leader" selected="selected">Squadron Leader</option>
		
		</select></td></tr>
		<tr><td><label>Email id /</label></td><td><input class="textbox" type="text" name="emailid" id="emailid" class="regi_fi" ></td><td class="emailid col_red">
		</td></tr>
		
		
		<tr><td><label>Password / </label></td><td><input  type="password" class="textbox" name="password" id="password" class="regi_fi" ></td><td class=" password col_red"></td></tr>
		
		<tr><td><label>Confirm Password / </label></td><td><input  type="password" class="textbox" name="confpassword" id="confpassword" class="regi_fi" ></td><td class=" confpassword col_red"></td></tr>
		<tr><td></td><td><span class="regibtn" style="cursor:pointer;">Submit</span><a href="login" style="float:right;float: left;
background: gray;
padding: 6px;
color: white;
text-decoration:none;
border: 1px solid;
border-radius: 10px;">Back to login</a></td></tr>
	</form>	
		</table><!--register closed-->
</div>
</div>
</body>
</html>