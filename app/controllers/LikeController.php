<?php

class LikeController extends BaseController {

        # Handles "GET /" request
        public function getIndex()
        {		
			echo 'get';
        }
		

        # Handles "POST /"  request
        public function postIndex()
        {
		
			$user_id = Session::get('u_id');
			$like_id = Input::get('like_id');
			
		$likearr = array(
		'u_id'  => $user_id,
		'like_id'  => $like_id
		
    	); 
		
		
		 Entry::likeadd($likearr);
		
		/*if($id){
		Session::put('u_id', $id);
			return Redirect::to('/');
			
		}	*/
    

    
        }

}