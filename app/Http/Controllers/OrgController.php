<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $org->name = $request->input('org_name');
        $org->valid_till = $request->input('valid_till');
        $org->subdomain = $request->input('subdomain');
        $org->db = $request->input('db');
        $org->email = $request->input('email');
        $org->save();
    
        return redirect('/organizations');
    }
}
