<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Validator;
use App\Models\ReportHistory;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    public function uploadHistory(Request $request){
        $validator 	=	Validator::make($request->all(),[
            'history'	=>	'required|file'
        ]);
        if($validator->passes()){
            $ext    = 	strtolower($request->file('history')->getClientOriginalExtension());
            $id     = 	str_random(15);
            $name 	=	strtolower($request->file('history')->getClientOriginalName());
            $uri 	= 	'/uploads/history/'.$id.'.'.$ext;
            $tank_id= 	$request->input('tankid');
            $user_id=	$request->input('userid');

            //$request->file('history')->move(public_path().'/uploads/history/',$id.'.'.$ext);

            Storage::disk('local')->put('/public/history/'.$id.'.'.$ext,  File::get($request->file('history')) , 'public');
            $history 			=	new ReportHistory;
            $history->tank_id 	=	$tank_id;
            $history->file_name =	$name;
            $history->uri 		=	$uri;
            $history->identifier =  $id.'.'.$ext;

            if($history->save()){
                return redirect("/user/".$user_id."/tank/".$tank_id.'/details')
                    ->with('hus','Report saved successfully');
            }else{
                return "Unable to save";
            }

        }else{
            return "Validator Failed";
        }
    }

    public function deleteHistory(Request $request){
        $id 		=	$request->input('id');
        $history 	=	ReportHistory::where('id','=',$id);

        if($history->count()){
            $history 	=	$history->first();

            if(Storage::disk('local')->delete('/public/history/'.$history->identifier)){
                if($history->delete()){
                    return response()->json(['status' => true]);
                }
            }
            return response()->json(['status' => false]);
        }else{
            return response()->json(['status' => false]);
        }

    }
}
