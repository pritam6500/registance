<?php

class DraftController extends BaseController {

        # Handles "GET /" request
        public function getIndex()
        {		
			$u_id = Session::get('u_id');
			 if(!isset($u_id)){
			 	return Redirect::to('login');
			 }
			 
			$data['feed'] = Entry :: draftuser();
				
			return View::make('draft' , $data);

        }
		

        # Handles "POST /"  request
        public function postIndex()
        {
		
			echo "ok";		
   

    
        }

}