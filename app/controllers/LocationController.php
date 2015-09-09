<?php 

class LocationController extends BaseController{

	public function updateLocation(){
		//return Input::all();

		$name 			=	Input::get('name');
		$airportcode	=	Input::get('airportcode');
		$street1		=	Input::get('street1');
		$street2		=	Input::get('street2');
		$city			=	Input::get('city');
		$region			=	Input::get('region');
		$postcode		=	Input::get('postcode');
		$country		=	Input::get('country');
		$tankid			=	Input::get('tankid');

		$address 		=	[];

		$address 		=	json_encode(Input::all());

		$id 	=	Input::get('tankid');
		$tank 	=	Tank::where('id','=',$id)->get()->first();

		$tank->location_name 	=	$name;
		$tank->airport_code 	=	$airportcode;
		$tank->location_address	=	'';

		if($tank->save()){
			return Redirect::to("/tank/".$id."/details");
		}
	}

	public function getLocationDetails(){
		$id 	=	Input::get('tankid');
		$tank 	=	Tank::where('id','=',$id)->get()->first();
		return Response::json($tank);
	}
}