<?php 

class InspectionController extends BaseController{

	public function updateInspectionDetails(){
		
		$id 					=	Input::get('tankid');
		$tank 					=	TankInspection::where('tank_id','=',$id)->get()->first();
	
		
		$contractor 			=	Input::get('contractor');
		$telephone 				=	Input::get('telephone');
		$email 					=	Input::get('email');
		$d_inspected 			=	Input::get('d-inspected');
		$d_cleaned 				=	Input::get('d-cleaned');
		$nex_inspection 		=	Input::get('d-next-inspection');
		$userid    				=   Input::get('userid');

		$tank->contractor		=	$contractor;
		$tank->phone			=	$telephone;
		$tank->email 			=	$email;
		$tank->date_inspected 	=	$d_inspected;
		$tank->date_cleaned 	=	$d_cleaned;
		$tank->next_inspection 	=	$nex_inspection;

		if($tank->save()){
			return Redirect::to("/user/".$userid."/tank/".$id."/details");
		}
	}

	public function getInspectionDetails(){
		$id 	=	Input::get('tankid');
		$tank 	=	TankInspection::where('tank_id','=',$id)->get()->first();
		return Response::json($tank);
	}
}