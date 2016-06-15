<?php

namespace App\Http\Controllers;

use App\Models\TankInspection;
use Illuminate\Http\Request;
use App\Http\Requests;

class InspectionController extends Controller
{
    public function updateInspectionDetails(Request $request){

        $id 					=	$request->input('tankid');
        $tank 					=	TankInspection::where('tank_id','=',$id)->get()->first();


        $contractor 			=	$request->input('contractor');
        $telephone 				=	$request->input('telephone');
        $email 					=	$request->input('email');
        $d_inspected 			=	$request->input('d-inspected');
        $d_cleaned 				=	$request->input('d-cleaned');
        $nex_inspection 		=	$request->input('d-next-inspection');
        $userid    				=   $request->input('userid');

        $tank->contractor		=	$contractor;
        $tank->phone			=	$telephone;
        $tank->email 			=	$email;
        $tank->date_inspected 	=	$d_inspected;
        $tank->date_cleaned 	=	$d_cleaned;
        $tank->next_inspection 	=	$nex_inspection;

        if($tank->save()){
            return redirect("/user/".$userid."/tank/".$id."/details");
        }
    }

    public function getInspectionDetails(Request $request){
        $id 	=	$request->input('tankid');
        $tank 	=	TankInspection::where('tank_id','=',$id)->get()->first();
        return response()->json($tank);
    }
}
