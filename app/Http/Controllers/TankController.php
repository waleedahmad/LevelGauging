<?php

namespace App\Http\Controllers;

use App\Models\Tank;
use App\Models\TankInspection;
use App\Models\TankLevels;
use App\Models\TankLocation;
use App\Models\TankManufacturer;
use App\Models\TankSpecs;
use Illuminate\Http\Request;

use App\Http\Requests;

class TankController extends Controller
{
    public function addTank(Request $request){
        $markingid 	=	$request->input('markingid');
        $fuelgrade 	=	$request->input('fuelgrade');
        $capacity  	=	$request->input('capacity');
        $max_sfl 	=	$request->input('max-sfl');
        $order_p 	=	$request->input('order-point');
        $empty_p	=	$request->input('empty-point');
        $email 		=	$request->input('email');

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
                return redirect('/users/'.$email.'/settings');
            }
        }
    }

    public function removeTank(Request $request){
        return $request->all();
    }
}
