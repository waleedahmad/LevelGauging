<?php

class ContactController extends BaseController{

    public function addContact(){
        $title      =   Input::get("title");
        $name       =   Input::get("name");
        $job_title  =   Input::get("job-title");
        $company    =   Input::get("company");
        $phone1     =   Input::get("phone1");
        $phone2     =   Input::get("phone2");
        $email      =   Input::get("email");
        $tankid     =   Input::get("tankid");
        $userid     =   Input::get('userid');

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
            return Redirect::to('/user/'.$userid.'/tank/'.$tankid.'/contacts')
                            ->with('hus','Report saved successfully');
        }
    }

    public function updateContact(){

        $title      =   Input::get("title");
        $name       =   Input::get("name");
        $job_title  =   Input::get("job-title");
        $company    =   Input::get("company");
        $phone1     =   Input::get("phone1");
        $phone2     =   Input::get("phone2");
        $email      =   Input::get("email");
        $tankid     =   Input::get("tankid");
        $id         =   Input::get("id");
        $userid     =   Input::get('userid');

        $contact    =   Contacts::where('id','=',$id)->get()->first();

        $contact->title         =   $title;
        $contact->name          =   $name;
        $contact->job_title	    =   $job_title;
        $contact->company       =   $company;
        $contact->telephone_1   =   $phone1;
        $contact->telephone_2   =   $phone2;
        $contact->email         =   $email;

        if($contact->save()){
            return Redirect::to('/user/'.$userid.'/tank/'.$tankid.'/contacts')
                            ->with('hus','Report saved successfully');
        }
    }

    public function getContactDetails(){
        $id         =   Input::get('id');
        $contact    =   Contacts::where('id','=',$id)->get()->first();

        return Response::json($contact);
    }

    public function deleteContact(){
        $id         =   Input::get('id');
        $contact    =   Contacts::where('id','=',$id)->get()->first();

        if($contact->delete()){
            return Response::json(['status'     =>  true]);
        }
    }
}
