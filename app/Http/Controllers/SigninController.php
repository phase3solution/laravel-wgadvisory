<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class SigninController extends Controller
{
    public function signPage(){
        return view('frontend.auth.login');
    }

    public function signinCheck(Request $request){


        $validate      =  Validator::make($request->all(),[
            'email'    => 'required|max:190|email',
            'password' => 'required|min:6',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;

        if($validate->fails()){
            $data['status'] = false;
            $data['message'] = "Validation error!";
            $data['errors'] = $validate->errors();
            return response()->json($data, 400);
        }else{

            if(Auth::attempt($request->only('email', 'password'), $remember_me)){
                $data['status'] = true;
                $data['message'] = "Login successfully!";
                return response()->json($data, 200);
            }else{
                $data['status'] = false;
                $data['message'] = "Login failed!";
                $data['messageShow'] = "Email or password does not match!";
                return response()->json($data, 500);
            }

        }

    }

    public function signOut(Request $request){
        Auth::logout();
        return redirect()->route('signin');
    }
}