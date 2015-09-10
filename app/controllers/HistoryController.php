<?php 

class HistoryController extends BaseController{
	public function uploadHistory(){
		$validator 	=	Validator::make(Input::all(),[
							'history'	=>	'required'
						]);
		if($validator->passes()){
			$ext    = 	strtolower(Input::file('history')->getClientOriginalExtension());
			$id     = 	str_random(15);
			$name 	=	strtolower(Input::file('history')->getClientOriginalName());
			$uri 	= 	'/uploads/history/'.$id.'.'.$ext;
			$tank_id= 	Input::get('tankid');

			if(!File::exists(public_path().'/uploads/history/')) {
                File::makeDirectory(public_path().'/uploads/history/');
            }
            Input::file('history')->move(public_path().'/uploads/history/',$id.'.'.$ext);
            $history 			=	new ReportHistory;
            $history->tank_id 	=	$tank_id;
            $history->file_name =	$name;
            $history->uri 		=	$uri;

            if($history->save()){
            	return Redirect::to('/tank/'.$tank_id.'/details')
            					->with('hus','Report saved successfully');
            }else{
            	return "Unable to save";
            }

		}else{
			return "Validator Failed";
		}
	}

	public function deleteHistory(){
		$id 		=	Input::get('id');
		$history 	=	ReportHistory::where('id','=',$id);

		if($history->count()){
			$history 	=	$history->first();

			if(File::delete(public_path().$history->uri)){
				if($history->delete()){
					return Response::json(['status' => true]);
				}
			}
			return Response::json(['status' => false]);
		}else{
			return Response::json(['status' => false]);
		}

	}
}