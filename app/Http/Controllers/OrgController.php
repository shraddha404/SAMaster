<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class OrgController extends Controller
{
    public function index(){
        $orgs = \App\Organization::all();
        return view('organizations', ['orgs'=>$orgs]);
    }

    public function org_form($org_id = null){
        if(empty($org_id)){
            $org = new \App\Organization;
        }
        else{
            $org = \App\Organization::find($org_id);
        }
        return view('org-form',['org'=>$org]);
    }

    public function save(Request $request){
        if(empty($request->input('org_id'))){
            $org = new \App\Organization;
        }
        else{
            $org = \App\Organization::find($request->input('org_id'));
        }
        if($this->validateOrgDetails($request)){
            $org->name = $request->input('org_name');
            $org->valid_till = $request->input('valid_till');
            $org->subdomain = $request->input('subdomain');
            if(!empty($request->input('db'))){
                //create a new database
                $this->createWidgetDB($request->input('db'));
                $org->db = $request->input('db');
            }
            $org->email = $request->input('email');
            try{
                $org->save();
            }
            catch(\Exception $e){
                Session::flash('alert-danger', $e->getMessage());
                return \Redirect::back();
            }
            return redirect('/organizations');
        }
        else{
            return \Redirect::back();
        }
    }

    public function validateOrgDetails($request){
        if($this->dbExists($request->input('db'))){
            Session::flash('alert-danger', 'DB exists');
            return false;
        }
        return true;
    }

    public function dbExists($db_name){
        $db = \DB::select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?",[$db_name]);
        if(!empty($db)){
            return true;
        }
       return false; 
    }

    private function createWidgetDB($db_name){
        $db = \DB::statement("CREATE DATABASE $db_name");
        // more code to be added here to import SQL structure with default master data
    }
}
