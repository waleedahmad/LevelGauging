<?php

class SpecificationController extends BaseController{
	
	public function updateSpecs(){
		$id 		=	Input::get('tankid');
		$fuelgrade 	=	Input::get('fuelgrade');
		$markingid 	=	Input::get('markingid');
		$tankshape 	=	Input::get('tankshape');
		$titled 	=	Input::get('titled');
		$internal 	=	Input::get('internal');

		$id 	=	Input::get('tankid');
		$tank 	=	Tank::where('id','=',$id)->get()->first();

		$tank->fuel_grade 	=	$fuelgrade;
		$tank->marking_id  	=	$markingid;
		$tank->shape 		=	$tankshape;
		$tank->titled 		=	$titled;
		$tank->internal 	=	$internal;

		if($tank->save()){
			return Redirect::to("/tank/".$id."/details");
		}

	}

	public function getSpecs(){
		$id 	=	Input::get('tankid');
		$tank 	=	Tank::where('id','=',$id)->get()->first();
		return Response::json($tank);
	}
}