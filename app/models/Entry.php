<?php

class Entry  {

public static function mymodel($entry){
		$email=$entry["email"];
		$isexist = DB ::table('users')
					
					->where('email', '=' , $email)
					->get();

		if(empty($isexist)){
		
			
		$id = DB::table('users')->insertGetId(
    array('name' => $entry["name"],
			'username' =>$entry["username"],
			'roll' =>$entry["roll"],
			'email' =>$entry["email"],
			'pass' =>$entry["pass"]
	 )
);
return $id;		
}
else{
return 'not';
}

    }
	
public static function login($loginarr){
	
	$email = $loginarr['email'];
	$pass = $loginarr['pass'];
	$id  = DB::table('users')
    ->where('email', '=', $email)
	->where('pass', '=' , $pass)
	->get();
	if(empty($id)){
		return $id= 'not';
	}
	else{
    return $id;
	}
}		

public static function savemsg($msgarr){
	
	DB::table('status')->insert(array(
			'user_id' => $msgarr['u_id'],
			'msg' => $msgarr['msg']
   				)
   			);
}

public static function allstatus(){
		
		$all_status = DB::table('status')
            ->leftjoin('users', 'status.user_id', '=', 'users.user_id')
            
            ->select( 'users.user_id', 'users.name', 'users.roll', 'status.status_id', 'status.msg', 'status.Created_at')
			->orderBy('status.Created_at', 'DSC')
			->get();
			
			$uid= Session::get('u_id');
			
			$user_draft=self::userdraft($uid);
			$all_sta=array(); 
			
				foreach($all_status as $perstatus){
					$val=self::countlike_dis($perstatus->status_id); 				
					$all_sta[]= array(
						'user_id'=>$perstatus->user_id,
						'name' =>$perstatus->name,
						'roll' =>$perstatus->roll,
						'status_id' =>$perstatus->status_id,
						'msg' =>$perstatus->msg,
						'Created_at' =>$perstatus->Created_at,
						'like'=> $val['like'],
						'dislike' =>$val['dislike']
					);
					
				}
			$all_status=$all_sta;
					
		$feed = array(
			'all_status' => $all_status,
			'user_draft' => $user_draft
		
		);
	return $feed;		

}

public static function draftuser(){
		$uid= Session::get('u_id');
		$draft_user=self::userdraft($uid);
		foreach($draft_user as $draft){
			$all_status[] = DB::table('status')
            ->leftjoin('users', 'status.user_id', '=', 'users.user_id')
            ->where('status_id', '=', $draft->msg_id)
            ->select( 'users.user_id', 'users.name', 'users.roll', 'status.status_id', 'status.msg', 'status.Created_at')
			->orderBy('status.Created_at', 'DSC')
			->get();
			
		}
		if(empty($all_status)){
			 return $feed='not';
		}
		else{
		$all_sta=array(); 
			
				foreach($all_status as $perstatus){
					
					$val=self::countlike_dis($perstatus[0]->status_id); 				
					$all_sta[]= array(
						'user_id'=>$perstatus[0]->user_id,
						'name' =>$perstatus[0]->name,
						'roll' =>$perstatus[0]->roll,
						'status_id' =>$perstatus[0]->status_id,
						'msg' =>$perstatus[0]->msg,
						'Created_at' =>$perstatus[0]->Created_at,
						'like'=> $val['like'],
						'dislike' =>$val['dislike']
					);
					
				}
			$all_status=$all_sta;
			$feed = array(
			'all_status' => $all_status,
		
		);
		return $feed;
		}
			

}

public static function userdraft ($uid){
	$user_draft = DB ::	table('save_msg')
					->where('user_id' , '=' , $uid)
					->get();
					
	return $user_draft;				

}

public static function draftmsg($msgarr){
	
	DB::table('save_msg')->insert(array(
			'msg_id' => $msgarr['msg_id'],
			'user_id' => $msgarr['u_id']
			
   				)
   			);
}
		
public static function likeadd($likearr){
	$uid= $likearr['u_id'];
	$like_id =$likearr['like_id'];
		$islike = DB ::table('like_store')
					->where('user_id' , '=' , $uid)
					->where('status_id', '=' , $like_id)
					->get();
		if(empty($islike)){
			DB::table('like_store')->insert(array(
			'user_id' => $uid,
			'status_id' => $like_id,
			'like_count' => 1
   				)
   			); 
			$val=self::countlike_dis($like_id);
					print_r(json_encode($val));
		}
		else{
			$like_value=$islike[0]->like_count;
			if($like_value==0){
				DB::table('like_store')
            		->where('user_id' , '=' , $uid)
					->where('status_id', '=' , $like_id)
            		->update(array('like_count' => 1));
					$val=self::countlike_dis($like_id);
					print_r(json_encode($val));
			}
			else{
				echo 1;
			}
		}
}


public static function dislikeadd($likearr){
	$uid= $likearr['u_id'];
	$like_id =$likearr['like_id'];
		$islike = DB ::table('like_store')
					->where('user_id' , '=' , $uid)
					->where('status_id', '=' , $like_id)
					->get();
		if(empty($islike)){
			DB::table('like_store')->insert(array(
			'user_id' => $uid,
			'status_id' => $like_id,
			'like_count' => 0
   				)
   			); 
			$val=self::countlike_dis($like_id);
			print_r(json_encode($val));
		}
		else{
			$like_value=$islike[0]->like_count;
			if($like_value==1){
				DB::table('like_store')
            		->where('user_id' , '=' , $uid)
					->where('status_id', '=' , $like_id)
            		->update(array('like_count' => 0));
					
					$val=self::countlike_dis($like_id);
					print_r(json_encode($val));
				
			}
			else{
				echo 0;
			}
		}
}

public static function countlike_dis($status_id){
	
//count($check_friend_request)
	$like_count= DB ::table('like_store')
					->where('status_id' , '=' , $status_id)
					->where('like_count', '=' , 1)
					->get();
	$dislike_count= DB ::table('like_store')
					->where('status_id' , '=' , $status_id)
					->where('like_count', '=' , 0)
					->get();
	$like = count($like_count);
	$dislike = count($dislike_count);
	$like_dis_count=array(
			'like'=> $like,
			'dislike'=> $dislike
	);
	return $like_dis_count;
	
}


public static function addcoment($cmtarr){
		$uid = $cmtarr['u_id'];
		$status_id= $cmtarr['status_id'];
		$commnet = $cmtarr['cmnt']; 
		
		DB::table('comment')->insert(array(
			'user_id' => $uid,
			'status_id' => $status_id,
			'comment' => $commnet
   				)
   			); 
		$val=self::allcoment($status_id);	
		
		print_r(json_encode($val));
			
}
public static function allcoment($status_id){
					
						$all_status = DB::table('comment')
            			->leftjoin('users', 'comment.user_id', '=', 'users.user_id')
            			->where('comment.status_id', '=' , $status_id)
            			->select( 'users.user_id', 'users.name', 'users.roll' , 'comment.comment', 'comment.date')
						->orderBy('comment.date', 'ASC')
						->get();
						
				return $all_status;		

}


}