<?php

namespace App\Http\Controllers;

use App\Models\NotifyEmail;
use Illuminate\Http\Request;

use App\Http\Requests;

class NotificationController extends Controller
{
    public function addEmail(Request $request){

        $email 		=	$request->input('email');
        $status 	=	$request->input('status');
        $frequency 	=	$request->input('frequency');
        $time 		=	$request->input('time');
        $date 		=	$request->input('date');
        $tankid 	=	$request->input('tankid');
        $type 		=	$request->input('type');
        $userid     =   $request->input('userid');

        $notify 				=	new NotifyEmail;
        $notify->tank_id 		=	$tankid;
        $notify->report_type 	=	$type;
        $notify->email 			=	$email;
        $notify->active 		=	$status;
        $notify->time 			=	$time;
        $notify->frequency 		=	$frequency;
        $notify->date 			=	$date;

        if($notify->save()){
            return redirect("/user/".$userid."/tank/".$tankid."/notifications");
        }
    }

    public function updateEmail(Request $request){
        $email 		=	$request->input('email');
        $status 	=	$request->input('status');
        $frequency 	=	$request->input('frequency');
        $time 		=	$request->input('time');
        $date 		=	$request->input('date');
        $id 		=	$request->input('id');
        $tankid 	=	$request->input('tankid');
        $type 		=	$request->input('type');
        $userid     =   $request->input('userid');

        $notify 	=	NotifyEmail::where('id','=',$id)->first();
        $notify->report_type 	=	$type;
        $notify->email 			=	$email;
        $notify->active 		=	$status;
        $notify->time 			=	$time;
        $notify->frequency 		=	$frequency;
        $notify->date 			=	$date;

        if($notify->save()){
            return redirect("/user/".$userid."/tank/".$tankid."/notifications");
        }
    }

    public function removeEmail(Request $request){
        $id 		=	$request->input('id');
        $details 	=	NotifyEmail::where('id','=',$id)->get()->first();

        if($details->delete()){
            return response()->json(['status'	=>	true]);
        }
    }

    public function alreadyExist(Request $request){
        $email 	=	$request->input('email');
        $type 	=	$request->input('type');
        $tankid =	$request->input('tankid');

        $check 	=	NotifyEmail::where('email','=',$email)
            ->where('tank_id','=',$tankid)
            ->where('report_type','=',$type);

        if($check->count()){
            return response()->json(['status' => true]);
        }

        return response()->json(['status' => false]);
    }

    public function getDetails(Request $request){
        $id 		=	$request->input('id');
        $details 	=	NotifyEmail::where('id','=',$id)->get()->first();
        return response()->json($details);
    }
}
