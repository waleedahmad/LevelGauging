<?php

namespace App\Http\Controllers;

use App\Models\TankSpecs;
use Illuminate\Http\Request;

use App\Http\Requests;

class SpecificationController extends Controller
{
    public function updateSpecs(Request $request){
        $id 		=	$request->input('tankid');
        $fuelgrade 	=	$request->input('fuelgrade');
        $markingid 	=	$request->input('markingid');
        $tankshape 	=	$request->input('tankshape');
        $titled 	=	$request->input('titled');
        $internal 	=	$request->input('internal');
        $userid     =   $request->input('userid');

        $id 		=	$request->input('tankid');
        $tank 		=	TankSpecs::where('tank_id','=',$id)->get()->first();

        $tank->fuel_grade 	=	$fuelgrade;
        $tank->marking_id  	=	$markingid;
        $tank->shape 		=	$tankshape;
        $tank->titled 		=	$titled;
        $tank->internal 	=	$internal;

        if($tank->save()){
            return redirect("/user/".$userid."/tank/".$id."/details");
        }

    }

    public function getSpecs(Request $request){
        $id 	=	$request->input('tankid');
        $tank 	=	TankSpecs::where('tank_id','=',$id)->get()->first();
        return response($tank);
    }
}
