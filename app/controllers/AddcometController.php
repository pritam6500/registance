<?php

class AddcometController extends BaseController {

        # Handles "GET /" request
        public function getIndex()
        {		
			echo 'get';
        }
		

        # Handles "POST /"  request
        public function postIndex()
        {
		
			$user_id = Session::get('u_id');
			$status_id = Input::get('status_id');
			$commnt    = Input::get('cmmnt');
			
		$cmtarr = array(
		'u_id'  => $user_id,
		'status_id'  => $status_id,
		'cmnt' => $commnt
		
    	); 
		
		
		 Entry::addcoment($cmtarr);
		
		/*if($id){
		Session::put('u_id', $id);
			return Redirect::to('/');
			
		}	*/
    

    
        }

}