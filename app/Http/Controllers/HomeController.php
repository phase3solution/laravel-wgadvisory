<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use App\Models\Assessment;
use App\Models\AssessmentType;
use App\Models\Company;




class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $data['roles'] = Role::where('status',1)->get();
        $data['users'] = User::where('status',1)->get();
        $data['assessments'] = AssessmentType::where('status', 1)->get();
        $data['companies'] = Company::where('status',1)->get();
        return view('dashboard', $data);
    }
}
