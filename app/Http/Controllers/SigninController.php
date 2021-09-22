<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SigninController extends Controller
{
    public function signPage(){
        return view('frontend.auth.login');
    }

    public function signinCheck(Request $request){

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('dashboard');
        }else{
            Session::flash('signFailed', "Email or password does not match !");
            return redirect()->route('signin');
        }

    }

    public function signOut(Request $request){
        Auth::logout();
        return redirect()->route('signin');
    }
}