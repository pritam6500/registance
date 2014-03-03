<?php

class ComposeController extends BaseController {

        # Handles "GET /" request
        public function getIndex()
        {		
			echo 'get';
        }
		

        # Handles "POST /"  request
        public function postIndex()
        {
		
			$user_id = Input::get('user_id');
			$msg = Input::get('msg');
			
		$msgarr = array(
		'u_id'  => $user_id,
		'msg'  => $msg
		
    	); 
		
		
		 Entry::savemsg($msgarr);
		
		/*if($id){
		Session::put('u_id', $id);
			return Redirect::to('/');
			
		}	*/
    

    
        }

}