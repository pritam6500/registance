<?php
class LogoutController extends BaseController {

        # Handles "GET /" request
        public function getIndex()
        {		Session::flush();
			return Redirect::to('/');
        }
	}