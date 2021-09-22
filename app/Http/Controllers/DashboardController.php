<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $id = Auth::id();

        $userRole = UserRole::where('user_id', $id)->first();

        if($userRole){

            if($userRole  ){
                if($userRole->role_id == 3){
                    // Company Check
                    return view('frontend.dashboards.a');
                }else{
                    return view('frontend.dashboards.admin');
                }
            }else{
                return redirect()->route('signin');
            }

        }else{
            return redirect()->route('signin');
        }
    }
}
