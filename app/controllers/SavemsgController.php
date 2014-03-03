<?php

class SavemsgController extends BaseController {

        # Handles "GET /" request
        public function getIndex()
        {		
			echo 'get';
        }
		

        # Handles "POST /"  request
        public function postIndex()
        {
		
			$user_id = Session::get('u_id');
			$msg_id = Input::get('msg_id');
			
		$msgarr = array(
		'u_id'  => $user_id,
		'msg_id'  => $msg_id
		
    	); 
		
		
		 Entry::draftmsg($msgarr);
		
		/*if($id){
		Session::put('u_id', $id);
			return Redirect::to('/');
			
		}	*/
    

    
        }

}