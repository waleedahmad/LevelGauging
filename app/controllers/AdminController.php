<?php 

class AdminController extends BaseController{
	public function manageUsers(){
        return View::make('admin.authorize');
    }

    public function userSettings(){
        return View::make('admin.settings');
    }

    public function userAuthSettings($email){
    	return View::make('admin.authorize')
    				->with('user_email',$email);
    }

    public function userTankSettings($email){
        $tanks  =   $this->getTankDetails($email);
    	return View::make('admin.settings')
    				->with('user_email',$email)
                    ->with('tanks',$tanks);
    }

    public function getTankDetails($email){
        return Tank::where('owner','=',$email)->get();
    }


}
