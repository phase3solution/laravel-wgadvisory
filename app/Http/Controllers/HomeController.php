<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use App\Models\Assessment;
use App\Models\Company;




class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $data['roles'] = Role::all();
        $data['users'] = User::all();
        $data['assessments'] = Assessment::where('parent_id', 0)->get();
        $data['companies'] = Company::all();
        return view('dashboard', $data);
    }
}
