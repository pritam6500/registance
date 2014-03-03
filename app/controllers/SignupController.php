<?php

class SignupController extends BaseController {

        # Handles "GET /" request
        public function getIndex()
        {	$u_id = Session::get('u_id');
			 if(isset($u_id)){
			 	return Redirect::to('/');
			 }	
			return View::make('signup');
        }
		

        # Handles "POST /"  request
        public function postIndex()
        {
			$name = trim(Input::get('f_name'));
			$uname=trim(Input::get('u_name'));
			$roll = trim(Input::get('role'));
			$email=trim(Input::get('emailid'));
			$pass=md5(trim(Input::get('password')));
		$entry = array(
		'name'  =>$name,
		'username'  =>$uname,
		'roll'  => $roll,
        'email'    => $email,
        'pass'  => $pass
    	); 
		
		$id=Entry::mymodel($entry);
		
		if($id){
		if($id=='not'){
			$data['not']='not';
			return View::make('signup',$data);
		}
		else{
		Session::put('u_id', $id);
		return Redirect::to('/');
			}
			
		}	
    

    
        }

}