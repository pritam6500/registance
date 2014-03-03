<html>
<head>
{{ HTML :: style('css/style.css'); }}
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); }}
{{ HTML::script('js/site.js'); }}


</head>
<body>
<div class="wrapper">
<?php if(!Session::has('u_id')){
return Redirect::to('login');
}
?>
<div class="header">{{ HTML :: image('images/logo.png'); }} </div>

 <div id="model_box_outer">
 	<div id="compose_msg">
	<label class="f_left font_24" style="width:90%;">Compose Message</label><div class="close_btn" ></div>
	<textarea id="inp_msg"></textarea>
	<div class="f_left" style="text-align:center;"><button id="post_btn">Post</button></div>
	<input type="hidden" value="<?php echo Session::get('u_id'); ?>" id="hid_u_id"  />
	</div>
 </div>

<div class="left_menu">
<ul>
<li class="com_msg">Compose Message</li>
<li ><a href="index.php"><div class="full">Show Feed</div></a></li>
<li><a href="logout"><div class="full">Logout</div></a></li>
</ul>
</div>
<div class="right_feed">
<ul class="feed f_left">

<?php if(isset($feed)){
		if($feed=='not'){ ?>
		<h2 style="color:red">You have not saved any message! </h2>
		<?php }else{
	if(isset($feed['all_status'])){
		 
foreach( $feed['all_status'] as $status ){


   ?>
	
<li class="f_left status" main_status="<?php echo $status['status_id'];  ?>" ><div class="without_cmmnt">
<div class="sts_avtr <?php if($status['name'] == 'John Connor'){ echo "l_avt";}else{ echo "n_avt";} ?>"></div>
<div class="cmmnt_sec <?php if($status['name'] == 'John Connor'){ echo "b_blue";}else{ echo "b_gray";} ?>">
<div class="f_left"><a class="name font_24" href=""><?php echo $status['name']; ?></a><span class="role font_24"><?php echo $status['roll']; ?></span><span class="date"><?php echo $status['Created_at']; ?></span></div><span class="f_left main_status"> <?php echo $status['msg']; ?> </span><div class="f_left comment_like"><span class="hide_show show" show_id="<?php echo $status['status_id']; ?>">Show Comments</span><span class="hide_show hide" style="display:none;" show_id="<?php echo $status['status_id'] ; ?>">Hide Comments</span>
<?php if( $status['name'] != 'John Connor'){ ?>

<div class="like_sec"><label class="like" ><b class="like_num"><?php echo $status['like']; ?></b><div class="like_img" like_id="<?php echo $status['status_id'] ; ?>"></div></label><label class="dislike"><b class="dislike_num"><?php echo $status['dislike']; ?></b><div class="dis_img" dislike_id="<?php echo $status['status_id']; ?>"></div></label></div>

<?php } ?>

<span class="add_cmnt" add="<?php echo $status['status_id']; ?>">Add Comment</span>
			
		 
		 </div></div>
</div>
<div class="comment_sec" row="<?php echo $status['status_id']; ?>">

<div class="right_cmmnt">
		<div class="upper_name"><a class="name font_24" href=""></a><span class="date"></span></div>
		<div class="lower"><span class="f_left"></span></div>
</div>
<div class="putcmmnt" put="<?php echo $status['status_id']; ?>">
<textarea class="cmnt"></textarea>
<span class="done_btn" >Done</span>
</div>
</div>
</li>
<?php } }
}
} ?>

</ul>
</div>
</div>
</body>
</html>