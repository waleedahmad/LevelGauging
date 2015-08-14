<?php

Route::get('/', ['as' => 'MainView', 'uses' => 'TankController@tankers', ]);

Route::post('/api/hit', function () {

    $id = Input::get('id');
    $level = Input::get('level');

    $validator 	= 	Validator::make(Input::all(),array(
    					'id'	=> 'required',
    					'level'	=> 'required'
    				));

    if($validator->passes()){
    	$tank_check = Tank::where('id','=',$id);

	    if($tank_check->count()){
	    	$tank = $tank_check->first();
	    	$tank->level = $level;

	    	if($tank->save()){
	    		return Response::make(['message' => 'Level values for tank id#'.$id.' successfully updated']);
	    	}else{
	    		return Response::make(['error_message' => 'Unkown error occured']);
	    	}
	    }else{
	    	$tank = new Tank;
	    	$tank->id = $id;
	    	$tank->level = $level;
	    	if($tank->save()){
	    		return Response::make(['message' => 'New Tank Created and Level Updated']);
	    	}else{
	    		return Response::make(['error_message' => 'Unkown error occured']);
	    	}
	    	
	    }
    }else{
    	return Response::make($validator->errors()->all());
    }
});

Route::post('/api/get/levels', function(){
	$id = Input::get('id');

	$tank = Tank::where('id','=',$id);

	if($tank->count()){
		$level = $tank->first()->level;
		return Response::json(['status' => true, 'levels' => $level]);
	}else{
		return Response::json(['status' => false,'error_message' => 'Invalid Tank ID']);
	}
});

Route::get('/get',function(){

	$result = file_get_contents("http://192.168.1.10:8080/recieve");
	// Will dump a beauty json :3
	return $result;
});

Route::get('/recieve', function(){
	return Response::json(['message' => 'Sup?']);
});

