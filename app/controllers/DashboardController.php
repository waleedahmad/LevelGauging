<?php

/**
 * Tank Controller
 */
class DashboardController extends BaseController
{

	public function initView(){
		$email 	=	Session::get('auth')['email'];
		$tank 	=	Tank::where('owner','=',$email);

		if($tank->count()){
			$tank 	=	$tank->first();
			$id 	=	$tank->id;
			return	Redirect::to("/tank/".$id."/dashboard");
		}
		return $this->notAllowedRedirect();
	}

	public function tankDashboard($tank_id){
		$owner			=	Session::get('auth')['email'];
		$tank 			= 	Tank::where('owner','=',$owner)
								->where('id','=',$tank_id)
								->get();
		
		if($tank->count()){
			$tank 			=	$tank->first();
			$tank_levels	=	TankLevels::where('tank_id','=',$tank_id)->get()->first();
			$tank_specs 	=	TankSpecs::where('tank_id','=',$tank_id)->get()->first();
			$tank_loc 		=	TankLocation::where('tank_id','=',$tank_id)->get()->first();
			return View::make('client.dashboard')
						->with('tank',$tank)
						->with('tanklevels',$tank_levels)
						->with('tank_specs',$tank_specs)
						->with('tank_location',$tank_loc);
		}
		return $this->notAllowedRedirect();
	}

	public function tankNotifications($tank_id){
		$owner	=	Session::get('auth')['email'];
		$tank 	= 	Tank::where('owner','=',$owner)
						->where('id','=',$tank_id);
		if($tank->count()){
			$tank 				=	$tank->first();
			$email_reportings 	=	NotifyEmail::where('tank_id','=',$tank_id)
												->get();
			$tank_specs 	=	TankSpecs::where('tank_id','=',$tank_id)->get()->first();
			$tank_loc 		=	TankLocation::where('tank_id','=',$tank_id)->get()->first();
			return View::make('client.notifications')
						->with('tank',$tank)
						->with('email_reportings',$email_reportings)
						->with('tank_specs',$tank_specs)
						->with('tank_location',$tank_loc);
		}
		return $this->notAllowedRedirect();
	}

	public function tankDetails($tank_id){
		$owner	=	Session::get('auth')['email'];
		$tank 	= 	Tank::where('owner','=',$owner)
						->where('id','=',$tank_id);
		if($tank->count()){
			$tank 	=	$tank->first();
			$files 	=	ReportHistory::where('tank_id','=',$tank_id)
									->get();
			$tank_specs 	=	TankSpecs::where('tank_id','=',$tank_id)->get()->first();
			$tank_loc 		=	TankLocation::where('tank_id','=',$tank_id)->get()->first();
			$tank_inspec 	=	TankInspection::where('tank_id','=',$tank_id)->get()->first();
			return View::make('client.details')
						->with('tank',$tank)
						->with('files',$files)
						->with('tank_specs',$tank_specs)
						->with('tank_location',$tank_loc)
						->with('tank_inspection',$tank_inspec);
		}
		return $this->notAllowedRedirect();
	}

	public function tankData($tank_id){
		$owner	=	Session::get('auth')['email'];
		$tank 	= 	Tank::where('owner','=',$owner)
						->where('id','=',$tank_id);
		if($tank->count()){
			$tank 	=	$tank->first();
			$tank_specs 	=	TankSpecs::where('tank_id','=',$tank_id)->get()->first();
			$tank_loc 		=	TankLocation::where('tank_id','=',$tank_id)->get()->first();
			return View::make('client.data')
						->with('tank',$tank)
						->with('tank_specs',$tank_specs)
						->with('tank_location',$tank_loc);
		}
		return $this->notAllowedRedirect();
	}

	public function tankContacts($tank_id){
		$owner	=	Session::get('auth')['email'];
		$tank 	= 	Tank::where('owner','=',$owner)
						->where('id','=',$tank_id);
		if($tank->count()){
			$tank 		=	$tank->first();
			$d_address 	=	Contacts::where('permissions','=','admin')
									->get()
									->first();
			$addresses 	=	Contacts::where('tank_id','=',$tank->id)
									->where('permissions','!=','admin')
									->get();
			$tank_specs 	=	TankSpecs::where('tank_id','=',$tank_id)->get()->first();
			$tank_loc 		=	TankLocation::where('tank_id','=',$tank_id)->get()->first();
			return View::make('client.addresses')
						->with('tank',$tank)
						->with('d_address',$d_address)
						->with('addresses',$addresses)
						->with('tank_specs',$tank_specs)
						->with('tank_location',$tank_loc);
		}
		return $this->notAllowedRedirect();
	}

	public function notAllowedRedirect(){
		Session::forget('auth');
		return Redirect::to('/');
	}

	public function uploadHistory(){
		$validator 	=	Validator::make(Input::all(),[
							'history'	=>	'required'
						]);
		if($validator->passes()){
			$ext    = 	strtolower(Input::file('history')->getClientOriginalExtension());
			$id     = 	str_random(15);
			$name 	=	strtolower(Input::file('history')->getClientOriginalName());
			$uri 	= 	'/uploads/history/'.$id.'.'.$ext;
			$tank_id= 	Input::get('tankid');

			if(!File::exists(public_path().'/uploads/history/')) {
                File::makeDirectory(public_path().'/uploads/history/');
            }
            Input::file('history')->move(public_path().'/uploads/history/',$id.'.'.$ext);
            $history 			=	new ReportHistory;
            $history->tank_id 	=	$tank_id;
            $history->file_name =	$name;
            $history->uri 		=	$uri;

            if($history->save()){
            	return Redirect::to('/tank/'.$tank_id.'/details')
            					->with('hus','Report saved successfully');
            }else{
            	return "Unable to save";
            }

		}else{
			return "Validator Failed";
		}
	}

	public function deleteHistory(){
		$id 		=	Input::get('id');
		$history 	=	ReportHistory::where('id','=',$id);

		if($history->count()){
			$history 	=	$history->first();

			if(File::delete(public_path().$history->uri)){
				if($history->delete()){
					return Response::json(['status' => true]);
				}
			}
			return Response::json(['status' => false]);
		}else{
			return Response::json(['status' => false]);
		}

	}

}
