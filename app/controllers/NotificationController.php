<?php

class NotificationController extends BaseController{

	public function addEmail(){

		$email 		=	Input::get('email');
		$status 	=	Input::get('status');
		$frequency 	=	Input::get('frequency');
		$time 		=	Input::get('time');
		$date 		=	Input::get('date');
		$tankid 	=	Input::get('tankid');
		$type 		=	Input::get('type');
		
		$notify 				=	new NotifyEmail;
		$notify->tank_id 		=	$tankid;
		$notify->report_type 	=	$type;
		$notify->email 			=	$email;
		$notify->active 		=	$status;
		$notify->time 			=	$time;
		$notify->frequency 		=	$frequency;
		$notify->date 			=	$date;

		if($notify->save()){
			return Redirect::to("/tank/".$tankid."/notifications");
		}
	}

	public function updateEmail(){
		$email 		=	Input::get('email');
		$status 	=	Input::get('status');
		$frequency 	=	Input::get('frequency');
		$time 		=	Input::get('time');
		$date 		=	Input::get('date');
		$id 		=	Input::get('id');
		$tankid 	=	Input::get('tankid');
		$type 		=	Input::get('type');

		$notify 	=	NotifyEmail::where('id','=',$id)->first();
		$notify->report_type 	=	$type;
		$notify->email 			=	$email;
		$notify->active 		=	$status;
		$notify->time 			=	$time;
		$notify->frequency 		=	$frequency;
		$notify->date 			=	$date;

		if($notify->save()){
			return Redirect::to("/tank/".$tankid."/notifications");
		}
	}

	public function removeEmail(){
		$id 		=	Input::get('id');
		$details 	=	NotifyEmail::where('id','=',$id)->get()->first();

		if($details->delete()){
				return Response::json(['status'	=>	true]);
		}
	}

	public function alreadyExist(){
		$email 	=	Input::get('email');
		$type 	=	Input::get('type');
		$tankid =	Input::get('tankid');

		$check 	=	NotifyEmail::where('email','=',$email)
								->where('tank_id','=',$tankid)
								->where('report_type','=',$type);

		if($check->count()){
			return Response::json(['status' => true]);
		}

		return Response::json(['status' => false]);
	}

	public function getDetails(){
		$id 		=	Input::get('id');
		$details 	=	NotifyEmail::where('id','=',$id)->get()->first();
		return Response::json($details);
	}
}
