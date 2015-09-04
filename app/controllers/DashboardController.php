<?php

/**
 * Tank Controller
 */
class DashboardController extends BaseController
{

	public function initView(){
		$email 	=	Session::get('auth')['email'];
		$tank 	=	Tank::where('owner','=',$email)
						->orderBy('marking_id','ASC');
		if($tank->count()){
			$tank 	=	$tank->first();
			$id 	=	$tank->id;
			return	Redirect::to("/tank/".$id."/dashboard");
		}
		return $this->purgeSession();
	}

	public function tankDashboard($tank_id){
		$owner	=	Session::get('auth')['email'];
		$tank 	= 	Tank::where('owner','=',$owner)
						->where('id','=',$tank_id);
		if($tank->count()){
			$tank 	=	$tank->first();
			return View::make('client.dashboard')
						->with('tank',$tank);
		}
		return $this->notAllowedRedirect();
	}

	public function tankNotifications($tank_id){
		$owner	=	Session::get('auth')['email'];
		$tank 	= 	Tank::where('owner','=',$owner)
						->where('id','=',$tank_id);
		if($tank->count()){
			$tank 	=	$tank->first();
			return View::make('client.notifications')
						->with('tank',$tank);
		}
		return $this->notAllowedRedirect();
	}

	public function tankDetails($tank_id){
		$owner	=	Session::get('auth')['email'];
		$tank 	= 	Tank::where('owner','=',$owner)
						->where('id','=',$tank_id);
		if($tank->count()){
			$tank 	=	$tank->first();
			return View::make('client.details')
						->with('tank',$tank);
		}
		return $this->notAllowedRedirect();
	}

	public function tankData($tank_id){
		$owner	=	Session::get('auth')['email'];
		$tank 	= 	Tank::where('owner','=',$owner)
						->where('id','=',$tank_id);
		if($tank->count()){
			$tank 	=	$tank->first();
			return View::make('client.data')
						->with('tank',$tank);
		}
		return $this->notAllowedRedirect();
	}

	public function tankContacts($tank_id){
		$owner	=	Session::get('auth')['email'];
		$tank 	= 	Tank::where('owner','=',$owner)
						->where('id','=',$tank_id);
		if($tank->count()){
			$tank 	=	$tank->first();
			return View::make('client.addresses')
						->with('tank',$tank);
		}
		return $this->notAllowedRedirect();
	}

	public function notAllowedRedirect(){
		return Redirect::to('/');
	}

}
