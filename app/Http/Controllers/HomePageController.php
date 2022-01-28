<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\UserCompany;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function index(){
        $id = Auth::id();

        $userRole = UserRole::where('user_id', $id)->first();

        if($userRole){

            if($userRole  ){
                if($userRole->role_id == 3){
                    // Company Check
                    $userCompany = UserCompany::where('user_id', $id)->where('status', 1)->first();
                    if($userCompany){
                        return view('frontend.dashboards.a');
                    }else{
                        return view('frontend.dashboards.guest');
                    }
                    
                }else{

                    $data['companies'] = Company::where('status', 1)->get();
                    // status 5 = published
                    $data['assessments'] = Assessment::with('children')
                    
                    ->with(array('assignCompany'=>function($q1){
                        $q1->with('company')->get();
                    }))
                    ->where('status', 5)->get();

                    // echo '<br><pre>'.print_r($data, true).'</pre>';

                    // return $data;
                    return view('frontend.dashboards.admin', $data);
                }
            }else{
                return redirect()->route('signin');
            }

        }else{
            return redirect()->route('signin');
        }
    }
}
