<?php

class AccountController extends BaseController
{
    
    public function register() {
        if (Request::isMethod('GET')) {
            return View::make('forms.auth.register');
        }
        
        if (Request::isMethod('POST')) {
            $validator 	= 	Validator::make(Request::all(), [
            					'email' => 'required|email|unique:users',
            	 				'password' => 'required'
            				]);
            
            if ($validator->passes()) {

                $email = Input::get('email');
                $password = Input::get('password');
                
                $user = new User;
                $user->email = $email;
                $user->password = Hash::make($password);
                
                if (User::count() > 0) {
                    $user->type = 'user';
                    $user->approved = 0;
                } 
                else {
                    $user->type = 'admin';
                    $user->approved = 1;
                }
                
                if ($user->save()) {
                    return Redirect::to('/login')
                    				->with('global', 'Registration Successfull');
                }
                
                return Redirect::to('/register')
                				->with('global', 'Unable to Register');
            } 
            else {
                return Redirect::to('/register')
                				->withErrors($validator->errors()->all())
                				->with('global', 'Form Validation Errors');
            }
        }
    }
    
    public function login() {
        if (Request::isMethod('GET')) {
            return View::make('forms.auth.login');
        }
        
        if (Request::isMethod('POST')) {
        	$validator 	=	Validator::make(Input::all(),[
        						'email' => 'required|email',
            	 				'password' => 'required'
        					]);

        	if($validator->passes()){
        		$email 		= Input::get('email');
                $password 	= Input::get('password');

                $user 	=	User::where([
                				'email'		=>	$email,
                			]);
                if($user->count()){
                	$user =	$user->first();

                	if(Hash::check($password, $user->password)){
                		if($user->approved == 0){
                			return Redirect::to('/login')
                				->with('global', 'Waiting for admin approval');
                		}else{
                			Session::put('auth',$user);
                			return Redirect::to('/')
                							->with('global', 'Login Successfull');
                		}
                		
                	}
                }
                return Redirect::to('/login')
                				->with('global', 'Incorrect Login Credentials');
        	}else{
        		return Redirect::to('/login')
                				->withErrors($validator->errors()->all())
                				->with('global', 'Form Validation Errors');
        	}
        }
    }

    public function logout(){
    	Session::forget('auth');
    	return Redirect::to('/login')
                				->with('global', 'Successfully Logged out');
    }
}
