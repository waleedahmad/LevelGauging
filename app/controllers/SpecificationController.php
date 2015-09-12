<?php

class SpecificationController extends BaseController{
	
	public function updateSpecs(){
		$id 		=	Input::get('tankid');
		$fuelgrade 	=	Input::get('fuelgrade');
		$markingid 	=	Input::get('markingid');
		$tankshape 	=	Input::get('tankshape');
		$titled 	=	Input::get('titled');
		$internal 	=	Input::get('internal');
		$userid     =   Input::get('userid');

		$id 		=	Input::get('tankid');
		$tank 		=	TankSpecs::where('tank_id','=',$id)->get()->first();

		$tank->fuel_grade 	=	$fuelgrade;
		$tank->marking_id  	=	$markingid;
		$tank->shape 		=	$tankshape;
		$tank->titled 		=	$titled;
		$tank->internal 	=	$internal;

		if($tank->save()){
			return Redirect::to("/user/".$userid."/tank/".$id."/details");
		}

	}

	public function getSpecs(){
		$id 	=	Input::get('tankid');
		$tank 	=	TankSpecs::where('tank_id','=',$id)->get()->first();
		return Response::json($tank);
	}
}