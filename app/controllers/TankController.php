<?php 

class TankController extends BaseController{
	public function addTank(){
		$markingid 	=	Input::get('markingid');
		$fuelgrade 	=	Input::get('fuelgrade');
		$capacity  	=	Input::get('capacity');
		$max_sfl 	=	Input::get('max-sfl');
		$order_p 	=	Input::get('order-point');
		$empty_p	=	Input::get('empty-point');
		$email 		=	Input::get('email');

		$tank 			=	new Tank;
		$tank->owner 	=	$email;

		if($tank->save()){
			$tank_levels 	=	new TankLevels;
			$tank_man_det 	=	new TankManufacturer;
			$tank_specs		=	new TankSpecs;
			$tank_inspec	=	new TankInspection;
			$tank_loc 		=	new TankLocation;

			$tank_levels->tank_id 	= 	$tank->id;
			$tank_man_det->tank_id 	= 	$tank->id;
			$tank_specs->tank_id 	= 	$tank->id;
			$tank_inspec->tank_id 	= 	$tank->id;
			$tank_loc->tank_id 		= 	$tank->id;


			$tank_specs->marking_id 	=	$markingid;
			
			$tank_levels->max_sfl 		=	$max_sfl;
			$tank_levels->empty_point 	=	$empty_p;
			$tank_levels->reorder_point =	$order_p;

			$tank_man_det->design_total_capacity	=	$capacity;

			$tank_specs->fuel_grade 	=	$fuelgrade;

			if(	$tank_levels->save() && 
				$tank_man_det->save() &&
				$tank_specs->save() && 
				$tank_inspec->save() &&
				$tank_loc->save())
			{
				return Redirect::to('/users/'.$email.'/settings');
			}
		}
	}

	public function removeTank(){
		return Input::all();
	}
}