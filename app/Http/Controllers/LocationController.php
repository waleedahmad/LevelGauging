<?php

namespace App\Http\Controllers;

use App\Models\TankLocation;
use Illuminate\Http\Request;

use App\Http\Requests;

class LocationController extends Controller
{
    public function updateLocation(Request $request){

        $name 			=	$request->input('name');
        $airportcode	=	$request->input('airportcode');
        $street1		=	$request->input('street1');
        $street2		=	$request->input('street2');
        $city			=	$request->input('city');
        $region			=	$request->input('region');
        $postcode		=	$request->input('postcode');
        $country		=	$request->input('country');
        $tankid			=	$request->input('tankid');
        $userid    				=   $request->input('userid');

        $id 			=	$request->input('tankid');
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
            return redirect("/user/".$userid."/tank/".$id."/details");
        }
    }

    public function getLocationDetails(Request $request){
        $id 	=	$request->input('tankid');
        $tank 	=	TankLocation::where('tank_id','=',$id)->get()->first();
        return response()->json($tank);
    }
}
