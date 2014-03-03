<?php

class IndexController extends BaseController {

        # Handles "GET /" request
        public function Index()
        {		
			$u_id = Session::get('u_id');
			 if(!isset($u_id)){
			 	return Redirect::to('login');
			 }
			 
			$data['feed'] = Entry :: allstatus();
				
			return View::make('index' , $data);
        }
		

        # Handles "POST /"  request
        public function postIndex()
        {
		echo "ok"; 
        }

}