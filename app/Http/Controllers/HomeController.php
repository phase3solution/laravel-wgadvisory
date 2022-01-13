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

        $data['userList'] = User::with(array('userRole'=>function($q1){
            $q1->with('role')->get();
        }))
        ->with(array('userCompany'=>function($q2){
            $q2->with('company')->get();
        }))
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();

        $data['assessments'] = AssessmentType::where('status', 1)->get();

        $data['assessmentList'] = Assessment::with('company', 'assessmentType')->where('status', 1)->where('parent_id', 0)->limit(10)->get();


        $data['companies'] = Company::where('status',1)->get();

        $data['companyList'] = Company::with(array('userCompany'=>function($q4){
            $q4->with('user')->get();
        }))
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();

        return view('dashboard', $data);
    }
}
