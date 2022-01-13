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

    public function signinCheck(Request $request){


        $validate      =  Validator::make($request->all(),[
            'email'    => 'required|max:190|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;

        if($validate->fails()){
            $data['status'] = false;
            $data['message'] = "Validation failed!";
            $data['errors'] = $validate->errors();
            return response()->json($data, 400);
        }else{

            if(Auth::attempt($request->only('email', 'password'), $remember_me)){

                $loginActivity = new LoginActivity();
                $loginActivity->user_id = Auth::id();
                $loginActivity->ip_address = Auth::id();
                // $loginActivity->



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

    public function forgetPasswordPage(){
        return view('frontend.auth.forget_password');
    }


    public function passwordForget(Request $request){

        $email = $request->email;
        $otp = $request->otp;
   


        if($otp){

            $validate      =  Validator::make($request->all(),[
                'email'    => 'required|max:190|email',
                'password' => 'required|between:8,255|confirmed',
                'g-recaptcha-response' => 'required|captcha'
            ]);
    
            if($validate->fails()){
                $data['status'] = false;
                $data['message'] = "Validation failed!";
                $data['errors'] = $validate->errors();
                return response()->json($data, 400);
            }else{

              $query =   DB::table('password_resets')->where('email', $email)->where('token', $otp)->first();

              if($query){

                $user = User::where('email', $email)->first();

                $user->password = Hash::make($request->password);
                
                if($user->save()){

                    DB::table('password_resets')->where('email', $email)->where('token', $otp)->delete();

                    $data['status'] = true;
                    $data['message'] = "Password reset successfully";
                    $data['otpMessage'] = "";
                    $data['passwordReset'] = true;
                    return response()->json($data, 200);

                }else{

                    $data['status'] = false;
                    $data['message'] = "Something went wrong!";
                    $data['otpMessage'] = "";
                    return response()->json($data, 500);

                }

                

              }else{

                $data['status'] = false;
                $data['message'] = "OTP does not match!";
                $data['otpMessage'] = "OTP does not match!";
                return response()->json($data, 404);

              }


            }

        }else{

            $validate      =  Validator::make($request->all(),[
                'email'    => 'required|max:190|email',
                'g-recaptcha-response' => 'required|captcha'
            ]);
    
            if($validate->fails()){
                $data['status'] = false;
                $data['message'] = "Validation failed!";
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
                            $data['message'] = "Failed to opt send in this email!";
                            return response()->json($data,200);
                        }else{
                            $data['status'] = true;
                            $data['message'] = " Otp sent successfully!";
                            $data['messageShow'] = "An otp sent to your email.";
                            return response()->json($data,200);
                        }
    
                    }else{
    
                        $data['status'] = false;
                        $data['message'] = "Something went wrong!";
                        return response()->json($data,500);
    
                    }
    
                
                    
    
                }else{
                    $data['status'] = false;
                    $data['message'] = "Email not found!";
                    $data['messageShow'] = "Email not found !";
                    return response()->json($data,404);
                }
    
    
            }

        }

       

     


    }



}