<?php

/**
 * Tank Controller
 */
class DashboardController extends BaseController
{

	public function initView(){
		
		if($this->userIsAdmin()){
			return Redirect::to('/users/authorize');
		}else{
			$email 	=	$this->getSessionUserEmail();
			$userid =	$this->getSessionUserID();
			$tank 	=	$this->getUserTanks($email);
			if($tank->count()){
				$tank 	=	$tank->first();
				$id 	=	$tank->id;
				return	Redirect::to("/user/".$userid."/tank/".$id."/dashboard");
			}
			return $this->notAllowedRedirect();
		}
		
		
	}

	public function tankDashboard( $user_id,  $tank_id ){
		$owner			=	$this->getSessionUserEmail();

		if($this->userIsAdmin()){
			$tank 	= 	$this->getTankDetailsForAdmin($tank_id);

		}else{
			$tank 	= 	$this->getTankDetailsForUser($owner,$tank_id);
		}
		
		
		if($tank->count()){
			$tank 			=	$tank->first();
			$tank_levels	=	$this->getTankLevels($tank_id);
			$tank_specs 	=	$this->getTankSpecs($tank_id);
			$tank_loc 		=	$this->getTankLocation($tank_id);
			
			return View::make('client.dashboard')
						->with(
							'tank'			,	$tank
						)
						->with(
							'tanklevels'	,	$tank_levels
						)
						->with(
							'tank_specs'	,	$tank_specs
						)
						->with(
							'tank_location'	,	$tank_loc
						)->with(
							'user_id'		, 	$user_id
						);
		}
		return $this->notAllowedRedirect();
	}

	public function tankNotifications($user_id , $tank_id){
		$owner	=	$this->getSessionUserEmail();
		$userid =	$this->getSessionUserID();
		
		if($this->userIsAdmin()){
			$tank 	= 	$this->getTankDetailsForAdmin($tank_id);
		}else{
			$tank 	= 	$this->getTankDetailsForUser($owner,$tank_id);
		}

		if($tank->count()){

			$tank 				=	$tank->first();
			$email_reportings 	=	$this->getNotificationEmails($tank_id);
			$tank_specs 		=	$this->getTankSpecs($tank_id);
			$tank_loc 			=	$this->getTankLocation($tank_id);

			return View::make('client.notifications')
						->with(
							'tank'				,	$tank
						)
						->with(
							'email_reportings'	,	$email_reportings
						)
						->with(
							'tank_specs'		,	$tank_specs
						)
						->with(
							'tank_location'		,	$tank_loc
						)->with(
							'user_id'		, 	$user_id
						);
		}
		return $this->notAllowedRedirect();
	}

	public function tankDetails($user_id, $tank_id){
		$owner	=	$this->getSessionUserEmail();
		$userid =	$this->getSessionUserID();
		
		if($this->userIsAdmin()){
			$tank 	= 	$this->getTankDetailsForAdmin($tank_id);
		}else{
			$tank 	= 	$this->getTankDetailsForUser($owner,$tank_id);
		}

		if($tank->count()){
			$tank 			=	$tank->first();
			$files 			=	$this->getReportHistory($tank_id);
			$tank_specs 	=	$this->getTankSpecs($tank_id);
			$tank_loc 		=	$this->getTankLocation($tank_id);
			$tank_inspec 	=	$this->getTankInspectionDetails($tank_id);

			return View::make('client.details')
						->with(
							'tank'				,	$tank
						)
						->with(
							'files'				,	$files
						)
						->with(
							'tank_specs'		,	$tank_specs
						)
						->with(
							'tank_location'		,	$tank_loc
						)
						->with(
							'tank_inspection'	,	$tank_inspec
						)->with(
							'user_id'		, 	$user_id
						);
		}
		return $this->notAllowedRedirect();
	}

	public function tankData($user_id,$tank_id){
		$owner	=	$this->getSessionUserEmail();
		$userid =	$this->getSessionUserID();
		
		if($this->userIsAdmin()){
			$tank 	= 	$this->getTankDetailsForAdmin($tank_id);
		}else{
			$tank 	= 	$this->getTankDetailsForUser($owner,$tank_id);
		}

		if($tank->count()){
			$tank 			=	$tank->first();
			$tank_specs 	=	$this->getTankSpecs($tank_id);
			$tank_loc 		=	$this->getTankLocation($tank_id);

			return View::make('client.data')
						->with(
							'tank'			,	$tank
						)
						->with(
							'tank_specs'	,	$tank_specs
						)
						->with(
							'tank_location'	,	$tank_loc
						)->with(
							'user_id'		, 	$user_id
						);
		}
		return $this->notAllowedRedirect();
	}

	public function tankContacts($user_id,$tank_id){
		$owner	=	$this->getSessionUserEmail();
		$userid =	$this->getSessionUserID();
		
		if($this->userIsAdmin()){
			$tank 	= 	$this->getTankDetailsForAdmin($tank_id);
		}else{
			$tank 	= 	$this->getTankDetailsForUser($owner,$tank_id);
		}

		if($tank->count()){
			$tank 			=	$tank->first();
			$d_address 		=	$this->getTankContacts($tank_id,'admin');
			$addresses 		=	$this->getTankContacts($tank_id,'user');
			$tank_specs 	=	$this->getTankSpecs($tank_id);
			$tank_loc 		=	$this->getTankLocation($tank_id);

			return View::make('client.addresses')
						->with(
							'tank'			,	$tank
						)
						->with(
							'd_address'		,	$d_address
						)
						->with(
							'addresses'		,	$addresses
						)
						->with(
							'tank_specs'	,	$tank_specs
						)
						->with(
							'tank_location'	,	$tank_loc
						)->with(
							'user_id'		, 	$user_id
						);
		}
		return $this->notAllowedRedirect();
	}

	/**
	 * Purge Session on Invalid Tank ID Redirect
	 */
	public function notAllowedRedirect(){
		Session::forget('auth');
		return Redirect::to('/');
	}

	/**
	 * Return User Assigned Tanks
	 */
	public function getUserTanks($email){
		return Tank::where('owner','=',$email);
	}

	/**
	 * Return Tank Details
	 * @Params
	 * $owner 	- 	Tank Owner (Email)
	 * $tank_id	-	Tank Unqiue ID
	 */
	public function getTankDetailsForAdmin($tank_id){
		return 	Tank::where('id','=',$tank_id)
					->get();
	}

	public function getTankDetailsForUser($owner, $tank_id){
		return 	Tank::where('owner','=',$owner)
					->where('id','=',$tank_id)
					->get();
	}

	/**
	 * Return Tank Level Details
	 */
	public function getTankLevels($tank_id){
		return TankLevels::where('tank_id','=',$tank_id)->get()->first();
	}

	/**
	 * Return Tank Specification Details
	 */
	public function getTankSpecs($tank_id){
		return TankSpecs::where('tank_id','=',$tank_id)->get()->first();
	}

	/**
	 * Return Tank Location Details
	 */
	public function getTankLocation($tank_id){
		return TankLocation::where('tank_id','=',$tank_id)->get()->first();
	}

	/**
	 * Return Tank Notification Emails
	 */
	public function getNotificationEmails($tank_id){
		return NotifyEmail::where('tank_id','=',$tank_id)->get();
	}

	/**
	 * Return Tank Inspection Details
	 */
	public function getTankInspectionDetails($tank_id){
		return TankInspection::where('tank_id','=',$tank_id)->get()->first();
	}

	/**
	 * Return Tank Hisotory Upload Details
	 */
	public function getReportHistory($tank_id){
		return ReportHistory::where('tank_id','=',$tank_id)->get();
	}

	/**
	 * Return Tank Contacts
	 */
	public function getTankContacts($tank_id,$permissions){
		if($permissions === "admin"){
			return Contacts::where('permissions','=','admin')->get()->first();
		}else{
			return Contacts::where('tank_id','=',$tank_id)
							->where('permissions','!=','admin')
							->get();
		}
	}

	/**
	 * Returns Authenticated User Session Email
	 */
	public function getSessionUserEmail(){
		return Session::get('auth')['email'];
	}

	/**
	 * Return Authenticated USER ID
	 */
	public function getSessionUserID(){
		return Session::get('auth')['id'];
	}

	/**
	 * Check if Authenticated user is admin
	 */
	public function userIsAdmin(){
		return (Session::get('auth')['type'] === "admin") ? true : false;
	}



}


