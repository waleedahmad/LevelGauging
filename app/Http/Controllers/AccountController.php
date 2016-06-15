<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Http\Request;


class AccountController extends Controller
{

    /**
     * Authenticate User
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function login(Request $request){
        if($request->isMethod('GET')){
            return view('forms.auth.login');
        }

        if ($request->isMethod('POST')) {
            $validator 	=	Validator::make($request->all(),[
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validator->passes()){
                $email 		= $request->input('email');
                $password 	= $request->input('password');

                if (Auth::attempt(['email' => $email, 'password' => $password, 'approved' => 1])) {
                    return redirect('/')
                        ->with('global', 'Login Successfull');
                }else if(Auth::attempt(['email' => $email, 'password' => $password, 'approved' => 0])){
                    Auth::logout();
                    return redirect('/login')
                        ->with('global', 'Validated client holders only');
                }

                return redirect('/login')
                    ->with('global', 'Incorrect Login Credentials');
                
            }else{
                return redirect('/login')
                    ->withErrors($validator->errors()->all())
                    ->with('global', 'Form Validation Errors');
            }
        }
    }

    /**
     * Register User
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function register(Request $request){

        if ($request->isMethod('GET')) {
            return view('forms.auth.register');
        }

        if($request->isMethod('POST')){
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users',
                'password' => 'required'
            ]);

            if($validator->passes()){
                $email = $request->input('email');
                $password = Hash::make($request->input('password'));

                $user = new User();
                $user->email = $email;
                $user->password = $password;

                if (User::count() > 0) {
                    $user->type = 'user';
                    $user->approved = 0;
                }
                else {
                    $user->type = 'admin';
                    $user->approved = 1;
                }

                if ($user->save()) {
                    return redirect('/login')
                        ->with('global', 'Registration Successful');
                }

                return redirect('/register')
                    ->with('global', 'Unable to Register');

            }else {
                return redirect('/register')
                    ->withErrors($validator->errors()->all())
                    ->with('global', 'Form Validation Errors');
            }
        }
    }

    /**
     * Logout User
     * @return mixed
     */
    public function logout(){
        Auth::logout();
        return redirect('/login')
            ->with('global', 'Successfully Logged out');
    }

    /**
     * Get user details
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserDetails(Request $request){
        $email  =   $request->input('email');

        $user   =    User::where('email','=',$email)->get()->first();

        return response()->json($user);
    }

    public function alreadyExist(Request $request){
        $email  =   $request->input('email');

        $user   =    User::where('email','=',$email)->get();

        if($user->count()){
            return response()->json(true);
        }
    }

    /**
     * Update user details
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateUser(Request $request){

        $email          =   $request->input('email');
        $access         =   $request->input('access');
        $password       =   $request->input('password');
        $enote          =   $request->input('enote');
        $owner          =   $request->input('user-email');

        $user           =   User::where('email','=',$owner)->get()->first();

        $user->email        =   $email;
        $user->approved     =   $access;
        if($password){
            $user->password =   Hash::make($password);
        }
        $user->enote    =   $enote;

        if($user->save()){
            return redirect('/users/'.$user->email.'/authorize');
        }
    }

    /**
     * Delete User
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteUser(Request $request){
        $email     =   $request->input('email');
        $user      =   User::where('email','=',$email)->get()->first();

        if($user->delete()){
            return response()->json(true);
        }
    }

    /**
     * Search User
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userSearch(Request $request){
        $search     =   $request->input('search');

        $users      =   User::where('email','LIKE',$search.'%')->where('type','=','user')->get()->lists('email');

        return response()->json($users);
    }
}
