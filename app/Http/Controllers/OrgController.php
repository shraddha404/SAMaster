<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrgController extends Controller
{
    public function index(){
        $orgs = \App\Organization::all();
        return view('organizations', ['orgs'=>$orgs]);
    }
}
