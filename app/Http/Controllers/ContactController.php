<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{
    public function addContact(Request $request){
        $title      =   $request->input("title");
        $name       =   $request->input("name");
        $job_title  =   $request->input("job-title");
        $company    =   $request->input("company");
        $phone1     =   $request->input("phone1");
        $phone2     =   $request->input("phone2");
        $email      =   $request->input("email");
        $tankid     =   $request->input("tankid");
        $userid     =   $request->input('userid');

        $contact                =   new Contacts;
        $contact->tank_id       =   $tankid;
        $contact->title         =   $title;
        $contact->name          =   $name;
        $contact->job_title	    =   $job_title;
        $contact->company       =   $company;
        $contact->telephone_1   =   $phone1;
        $contact->telephone_2   =   $phone2;
        $contact->email         =   $email;



        if($contact->save()){
            return redirect('/user/'.$userid.'/tank/'.$tankid.'/contacts')
                ->with('hus','Report saved successfully');
        }
    }

    public function updateContact(Request $request){

        $title      =   $request->input("title");
        $name       =   $request->input("name");
        $job_title  =   $request->input("job-title");
        $company    =   $request->input("company");
        $phone1     =   $request->input("phone1");
        $phone2     =   $request->input("phone2");
        $email      =   $request->input("email");
        $tankid     =   $request->input("tankid");
        $id         =   $request->input("id");
        $userid     =   $request->input('userid');

        $contact    =   Contacts::where('id','=',$id)->get()->first();

        $contact->title         =   $title;
        $contact->name          =   $name;
        $contact->job_title	    =   $job_title;
        $contact->company       =   $company;
        $contact->telephone_1   =   $phone1;
        $contact->telephone_2   =   $phone2;
        $contact->email         =   $email;

        if($contact->save()){
            return redirect('/user/'.$userid.'/tank/'.$tankid.'/contacts')
                ->with('hus','Report saved successfully');
        }
    }

    public function getContactDetails(Request $request){
        $id         =   $request->input('id');
        $contact    =   Contacts::where('id','=',$id)->get()->first();

        return response()->json($contact);
    }

    public function deleteContact(Request $request){
        $id         =   $request->input('id');
        $contact    =   Contacts::where('id','=',$id)->get()->first();

        if($contact->delete()){
            return response()->json(['status'     =>  true]);
        }
    }
}
