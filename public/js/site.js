$(document).ready(function(){
						   $('.regibtn').click(function(){
														$('.f_name').hide();
														$('.u_name').hide();
														$('.emailid').hide();
														$('.password').hide();
														$('.confpassword').hide();
														var isvalid = 1;	
														
														var name = $('#f_name').val();
															name=name.trim();
														var uname =$('#u_name').val();
															uname=uname.trim();
														var email =$('#emailid').val();
															email=email.trim();
														var pass= $('#password').val();
															pass=pass.trim();
														var conf=$('#confpassword').val();
															conf=conf.trim();
														
														if (  name.length =='' ||  name.length < 2 || name.length > 20   ) {
															isvalid=0;
															$('.f_name').show();
															$('.f_name').html('Name sholud be between 2 to 20 charecters');	
														}
														if (  uname.length =='' ||  uname.length < 2 || uname.length > 20   ) {
															isvalid=0;
															$('.u_name').show();
															$('.u_name').html('Username sholud be between 2 to 10 charecters');	
														}
														if( email.length ==''){
															isvalid=0;
															$('.emailid').show();
															$('.emailid').html('E-mail ID should not blank!');
														}
														else{
															
															var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
 															var valid = emailRegex.test(email);
  															if (!valid) {
																isvalid=0;
																$('.emailid').show();
																$('.emailid').html('Invalid E-mail ID!');
															}
														}
														
														if (  (pass.length == '') ||  (pass.length < 6 || pass.length > 12)   ) {
															
															isvalid=0;
															$('.password').show();
															$('.password').html('Password sholud be between 6 to 12 charecters');	
														}
														
														if (  conf != pass  ) {
															isvalid=0;
															$('.confpassword').show();
															$('.confpassword').html('Confirm password does not match!');	
														}
														
														if(isvalid==1){
															$('form').submit();
														}
		
														
														
														});
////////////////registation validation	
	
	$('.com_msg').click(function(){
								 $('#model_box_outer').show();
								 
								 });
	$('#post_btn').click(function(){
								  var user_id=$('#hid_u_id').val();
								  var msg=$.trim($('#inp_msg').val());
								  
								 	if( msg.length > 200 ){
										alert('Messages should be limited to 200 characters');
									}
							$.post("compose",{ user_id:user_id, msg:msg }, function(json,status){ 
																					
																	 if(status=='success'){
																			$('#model_box_outer').hide();
																				location.reload();
																			}
																	
																	
															}); 
								  });
	
	$('.save_msg').click(function(){
								  var msg_id=$(this).attr('id');
								  var select_btn=$(this);
								  
								$.post("save",{msg_id:msg_id},function(json,status){
															if(status=='success'){
																alert('Message saved for future reference');
																(select_btn).hide();
																
															}
															});
															
																						
								  });
	
	
	$('.add_cmnt').click(function(){
								  $('.comment_sec').hide();
								  $(this).parent().parent().parent().parent().find('.comment_sec').show();
								  var add=$(this).attr("add");
								  $('div[put="'+ add +'"]').show();
								  $('div[put="'+ add +'"] .cmnt').val('');
								  
								  });
	
	$('.done_btn').click(function(){
								 var cmmnt=$(this).siblings().val();
								 cmmnt=cmmnt.trim();
								 if(cmmnt==''){
									 alert('please put a comment');
								 }
								 if(cmmnt.length>200){
									  alert('Comment should be limited to 200 characters');
								 }
								 else{
								 var status=$(this).parent().attr("put");
								 $('div[put="'+ status +'"]').hide();
								 var sel_li =$('li[main_status="'+ status +'"]');
								 $.post("addcmnt",{status_id:status, cmmnt:cmmnt},function(json,status){
											if(status == 'success'){													
											 var objArr = jQuery.parseJSON(json);
											var i =0;
											var obj = objArr[i];
											$( sel_li ).find('.right_cmmnt').html('');
											while(obj)
											{
											
											if(obj.name=='John Connor'){
												block_cl= 'b_blue';
												small_l = 'small_l';
												
												}
												else{
													block_cl= 'b_gray';
													small_l ='';
												}
												
	$( sel_li ).find('.right_cmmnt').append('<div class="cmmnt_block '+ block_cl +'"><div class="left_cmmnt '+ block_cl +' ' + small_l + '"></div><div class="upper_name"><a class="name font_24" href="">'+obj.name+'</a><span class="date">'+obj.date+'</span></div><div class="lower"><span class="f_left">'+obj.comment+'</span></div></div>');
												i++;
												obj = objArr[i];
											}  
											
											}
														});
								 
								 }///else
								  });
	
	$('.show').click(function(){
		$('.comment_sec').hide();
		$(this).parent().parent().siblings().show();
		$('.putcmmnt').hide();					  
		var id=$(this).attr('show_id');
		
		$(this).hide();
		$(this).siblings().show();
	
		var sel_li =$('li[main_status="'+ id +'"]');
		  var sel_div =$('div[row="'+ id +'"]');
		$( sel_div ).show();
		$( sel_li ).find('.right_cmmnt').html('');
		$.post("showcmnt",{status_id:id},function(json,status){
															 
											var objArr = jQuery.parseJSON(json);
											var i =0;
											var obj = objArr[i];
											var isboss;
											var small_l;
											while(obj)
											{
												if(obj.name=='John Connor'){
												block_cl= 'b_blue';
												small_l = 'small_l';
												
												}
												else{
													block_cl= 'b_gray';
													small_l ='';
												}
	$( sel_li ).find('.right_cmmnt').append('<div class="cmmnt_block '+ block_cl +' "><div class="left_cmmnt '+ block_cl +' ' + small_l + ' "></div><div class="upper_name"><a class="name font_24" href="">'+obj.name+'</a><span class="date">'+obj.date+'</span></div><div class="lower"><span class="f_left">'+obj.comment+'</span></div></div>');
												i++;
												obj = objArr[i];
											}
														});
							  });
	
	
	$('.hide').click(function(){
							  $('.putcmmnt').hide();
							  $(this).hide();
							  $(this).siblings().show();
							  var id=$(this).attr('show_id');
							  var sel_li =$('div[row="'+ id +'"]');
		$( sel_li ).hide();
							  });
	
	
	
	
	$('.like_img').click(function(){
								  var id=$(this).attr('like_id');
								  var select_like =$(this);
								  $.post("like",{like_id:id},function(json,status){
																	  if(json==1){
																					alert('Already liked!');
																				}
																				
																				else{
																					var obj = jQuery.parseJSON(json);
																				(select_like).siblings().html(obj.like);
																				 (select_like).parent().parent().find('.dislike_num').html(obj.dislike);
																				}
																				 
																						});
								  });
	
	
	$('.dis_img').click(function(){
								 
								var id=$(this).attr('dislike_id');
								  var select_like =$(this);
								  $.post("dislike",{like_id:id},function(json,status){
																				
																				if(json==0){
																					alert('Already disliked!');
																				}
																				else{
																					
																					var obj = jQuery.parseJSON(json);
																				  
																				 (select_like).siblings().html(obj.dislike);
																				 (select_like).parent().parent().find('.like_num').html(obj.like);
																				 
																				}
													});
																						
								 
								 });
	$('.close_btn').click(function(){
								 $('#model_box_outer').hide();  
								   });
	
	$('.valid_login').click(function(){
									 var valid=1;
									 $('.error').hide();
									 var email=$('#login_emailid').val();
									 email=email.trim();
									 var pass=$('#login_password').val();
									 if(email==''){
										 $('.error_email').show();
										 $('.error_email').html('EmailId feild is empty!');
										 valid=0;
									 }
									 
									 var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
 									var valid = emailRegex.test(email);
									if (!valid) {
										 $('.error_email').show();
										 $('.error_email').html('EmailId not valid!');
										 valid=0;
									}
									 if(pass==''){
										 $('.error_pass').show();
										  $('.error_pass').html('Password feild is empty!');
										  valid=0;
									 }
									 if(pass.length<6 || pass.length>12){
										 $('.error_pass').show();
										  $('.error_pass').html('Password should be between 6 - 12 charecter!');
										  valid=0;
									 }
									 if(valid==1){
										 $('#login form').submit();
									 }
									 });
	
	});