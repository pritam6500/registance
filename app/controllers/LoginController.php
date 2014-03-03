<?php

class LoginController extends BaseController {

        # Handles "GET /" request
        public function getIndex()
        {	$u_id = Session::get('u_id');
			 if(isset($u_id)){
			 	return Redirect::to('/');
			 }
			return View::make('login');
        }
		

        # Handles "POST /"  request
        public function postIndex()
        {
			$email=trim(Input::get('login_emailid'));
			$pass=md5(trim(Input::get('login_password')));
			
			$loginarr = array(
		        'email'    => $email,
        		'pass'  => $pass
    		);
			$id=Entry::login($loginarr);
			
			if($id){
				if($id=='not'){
				$data['not']='not';
					return View::make('login' ,$data);
				}
			$uid = $id[0]->user_id;	
			Session::put('u_id', $uid);
			return Redirect::to('/');
			
		}
			
			
        }

}