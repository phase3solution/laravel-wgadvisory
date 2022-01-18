<?php

namespace App\Http\Controllers;

use App\Mail\ForgetOtpMail;
use App\Models\LoginActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class SigninController extends Controller
{
    public function signPage(){
        return view('frontend.auth.login');
    }

    public function ipCheck(Request $request){
        $data['ip'] = $request->ip();
        $data['agent'] = $request->header('user-agent');
        return $data;
    }

    public function signinCheck(Request $request){


        $validate      =  Validator::make($request->all(),[
            'email'    => 'required|max:190|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;

        if($validate->fails()){
            $data['status'] = false;
            $data['message'] = "Please enter all valid input.";
            $data['errors'] = $validate->errors();
            return response()->json($data, 400);
        }else{

            $user = User::where('email', $request->email)->where('status',1)->first();

            if($user){
                if(Auth::attempt($request->only('email', 'password'), $remember_me)){
                    $user_id = Auth::id();
    
                    $loginActivity =  LoginActivity::where('user_id', $user_id)->first();
    
                    if($loginActivity){
                        $loginActivity->user_id = $user_id;
                        $loginActivity->ip_address = $request->ip();
                        $loginActivity->user_agent = $request->header('user-agent');
                        $loginActivity->event_type = "Login";
                    }else{
                        $loginActivity = new LoginActivity();
                        $loginActivity->user_id = $user_id;
                        $loginActivity->ip_address = $request->ip();
                        $loginActivity->user_agent = $request->header('user-agent');
                        $loginActivity->event_type = "Login";
                    }
    
                    $loginActivity->save(); 
    
                   
    
    
                    $data['status'] = true;
                    $data['message'] = "Login successfully.";
                    return response()->json($data, 200);
                }else{
    
                    $data['status'] = false;
                    $data['message'] = "Email or password does not match.";
                    return response()->json($data, 404);
                }
            }else{
                $data['status'] = false;
                $data['message'] = "Email or password does not match.";
                return response()->json($data, 404);
            }
            

        }

    }

    public function signOut(Request $request){
        $user_id = Auth::id();

        $loginActivity =  LoginActivity::where('user_id', $user_id)->first();

        if($loginActivity){
            $loginActivity->user_id = $user_id;
            $loginActivity->ip_address = $request->ip();
            $loginActivity->user_agent = $request->header('user-agent');
            $loginActivity->event_type = "Logout";
        }else{
            $loginActivity = new LoginActivity();
            $loginActivity->user_id = $user_id;
            $loginActivity->ip_address = $request->ip();
            $loginActivity->user_agent = $request->header('user-agent');
            $loginActivity->event_type = "Logout";
        }

        $loginActivity->save(); 

        Auth::logout();
        return redirect()->route('signin');
    }

    public function forgetPasswordPage(){
        return view('frontend.auth.forget_password');
    }


    public function passwordForget(Request $request){

        $email = $request->email;
        

        $validate      =  Validator::make($request->all(),[
            'email'    => 'required|max:190|email'
        ]);

        if($validate->fails()){
            $data['status'] = false;
            $data['message'] = "Invalid Email";
            $data['errors'] = $validate->errors();
            return response()->json($data, 400);
        }else{

            $user = User::where('email', $email)->where('status',1)->first();

            if($user){

                $opt =rand(111111,999999);
                $data['email'] = $email;
                $data['token'] = $opt;


                DB::table('password_resets')->where('email', $email)->delete();
                $optSaved =  DB::table('password_resets')->insert($data);

                if($optSaved){
                    $details = [

                        'otp' => $opt
    
                    ];
    
                    
    
                    Mail::to($email)->send(new ForgetOtpMail($details));
                    if (Mail::failures()) {
                        $data['status'] = false;
                        $data['message'] = "Failed to send the otp in this email!";
                        return response()->json($data,200);
                    }else{
                        Session::put('forget_email', $email);
                        $data['status'] = true;
                        $data['message'] = "An otp sent to your email.";
                        return response()->json($data,200);
                    }

                }else{

                    $data['status'] = false;
                    $data['message'] = "Failed to generate OTP!";
                    return response()->json($data,500);

                }

            
                

            }else{
                $data['status'] = false;
                $data['message'] = "Email not found!";
                return response()->json($data,404);
            }


        }

     


    }


    public function checkOtp(){
        $email = Session::get('forget_email');
        if($email){
            return view('frontend.auth.check_otp');
        }else{
            return redirect()->route('forgetPasswordPage');
        }
    }

    public function otpCheck(Request $request){

        $email = Session::get('forget_email');
        $otp = $request->otp;

            $validate      =  Validator::make($request->all(),[
                'otp'    => 'required|max:6|min:6',
            ]);
    
            if($validate->fails()){
                $data['status'] = false;
                $data['message'] = "Please enter a valid OTP.";
                $data['errors'] = $validate->errors();
                return response()->json($data, 400);
            }else{

              $query =   DB::table('password_resets')->where('email', $email)->where('token', $otp)->first();

              if($query){

                Session::put('forget_otp', $otp);
                $data['status'] = true;
                $data['message'] = "OTP Validated successfully";
                return response()->json($data, 200);

              }else{

                $data['status'] = false;
                $data['message'] = "OTP does not match.";
                return response()->json($data, 404);

              }


            }

    }

    public function resetPassword(){
        $email = Session::get('forget_email');
        $otp = Session::get('forget_otp');
        if($email && $otp ){
            return view('frontend.auth.reset_password');

        }else{
            return redirect()->route('forgetPasswordPage');
        }
    }

    public function passwordReset(Request $request){


        $email = Session::get('forget_email');
        $otp = Session::get('forget_otp');
   


        if($otp && $email){

            $validate      =  Validator::make($request->all(),[
                'password'    => 'required|max:20|min:8',
                'password_confirmation'    => 'required_with:password|same:password',
            ]);
    
            if($validate->fails()){
                $data['status'] = false;
                $data['message'] = "Please enter all valid input.";
                $data['errors'] = $validate->errors();
                return response()->json($data, 400);
            }else{

              $query =   DB::table('password_resets')->where('email', $email)->where('token', $otp)->first();

              if($query){

                $user = User::where('email', $email)->first();

                $user->password = Hash::make($request->password);
                
                if($user->save()){

                    DB::table('password_resets')->where('email', $email)->where('token', $otp)->delete();



                    Session::forget('forget_email');
                    Session::forget('forget_otp');
                    $data['status'] = true;
                    $data['message'] = "Password reset successfully";
                    return response()->json($data, 200);

                }else{

                    $data['status'] = false;
                    $data['message'] = "Failed to reset password. Try again...";
                    return response()->json($data, 500);

                }

                

              }else{

                $data['status'] = false;
                $data['message'] = "Authentication failed. Try again...";
                return response()->json($data, 404);

              }


            }

        }else{

            $data['status'] = false;
            $data['message'] = "Session expired. Try Again...";
            return response()->json($data,500);

        }


    }



}