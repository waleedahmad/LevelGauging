<?php

namespace App\Http\Controllers;

use App\Models\Tank;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function manageUsers(Request $request){
        return view('admin.authorize')->with('request', $request);
    }

    public function userSettings(Request $request){
        return view('admin.settings')->with('request', $request);
    }

    public function userAuthSettings(Request $request, $email){
        return view('admin.authorize')
            ->with('user_email',$email)
            ->with('request', $request);
    }

    public function userTankSettings(Request $request, $email){
        $tanks  =   $this->getTankDetails($email);
        return view('admin.settings')
            ->with('user_email',$email)
            ->with('tanks',$tanks)
            ->with('request', $request);
    }

    public function getTankDetails($email){
        return Tank::where('owner','=',$email)->get();
    }
}
