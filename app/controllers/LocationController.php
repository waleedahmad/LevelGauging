<?php 

class LocationController extends BaseController{

	public function updateLocation(){

		$name 			=	Input::get('name');
		$airportcode	=	Input::get('airportcode');
		$street1		=	Input::get('street1');
		$street2		=	Input::get('street2');
		$city			=	Input::get('city');
		$region			=	Input::get('region');
		$postcode		=	Input::get('postcode');
		$country		=	Input::get('country');
		$tankid			=	Input::get('tankid');

		$id 			=	Input::get('tankid');
		$tank 			=	TankLocation::where('tank_id','=',$id)->get()->first();

		$tank->location_name 	=	$name;
		$tank->airport_code 	=	$airportcode;
		$tank->street1			=	$street1;
		$tank->street2			=	$street2;
		$tank->city				=	$city;
		$tank->region			=	$region;
		$tank->postcode			=	$postcode;
		$tank->country			=	$country;

		if($tank->save()){
			return Redirect::to("/tank/".$id."/details");
		}
	}

	public function getLocationDetails(){
		$id 	=	Input::get('tankid');
		$tank 	=	TankLocation::where('tank_id','=',$id)->get()->first();
		return Response::json($tank);
	}
}