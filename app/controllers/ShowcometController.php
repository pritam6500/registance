<?php

class ShowcometController extends BaseController {

        # Handles "GET /" request
        public function getIndex()
        {		
			echo 'get';
        }
		

        # Handles "POST /"  request
        public function postIndex()
        {
		
		
			$status_id = Input::get('status_id');
		
		
		
		 $val=Entry::allcoment($status_id);
		 print_r(json_encode($val));
		
		/*if($id){
		Session::put('u_id', $id);
			return Redirect::to('/');
			
		}	*/
    

    
        }

}