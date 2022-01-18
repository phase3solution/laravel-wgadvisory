<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function edit()
    {
        return view('profile.edit');
    }

 
    public function update(Request $request)
    {
        $user_id = Auth::id();
        $validate      =  Validator::make($request->all(),[
            'email'     => 'required|max:190|email|unique:users,email,'.$user_id,
            'name'      => 'required|max:190|',
        ]);

        if($validate->fails()){
            $data['status'] = false;
            $data['message'] = "Please enter all valid input.";
            $data['errors'] = $validate->errors();
            return response()->json($data, 400);
        }else{ 

            $user = User::find($user_id);
            if($user){

                $user->name = $request->name;
                $user->email = $request->email;

                if($user->save()){

                    $data['status'] = true;
                    $data['message'] = 'Profile successfully updated.';
                    return response()->json($data,200);

                }else{

                    $data['status'] = false;
                    $data['message'] = 'Profile update failed. Please try again.';
                    return response()->json($data,500);

                }


            }else{

                $data['status'] = false;
                $data['message'] = 'You are not authorized.';
                return response()->json($data,404);

            }

        }



    }

  
    public function password(Request $request)
    {

        $user_id = Auth::id();

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

            $user = User::find($user_id);
            if($user){
    
                if(Hash::check($request->old_password, $user->password)){
    
                    $user->password = Hash::make($request->password);
                    if($user->save()){
    
                        $data['status'] = true;
                        $data['message'] = 'Password successfully updated.';
                        return response()->json($data,200);
    
                    }else{
    
                        $data['status'] = false;
                        $data['message'] = 'Password updated failed. Please try again.';
                        return response()->json($data,500);
    
                    }
    
                }else{
                    $err = array();
                    $err['old_password'] = ["Current password does not match"];
    
                    $data['status'] = false;
                    $data['message'] = 'Current password does not match.';
                    $data['errors']= $err;
                    return response()->json($data,400);
    
                }
    
                
    
    
            }else{
    
                $data['status'] = false;
                $data['message'] = 'You are not authorized.';
                return response()->json($data,404);
    
            }


        }


       

    }

    public function profile($id){
        $user = User::find($id);
        if($user){
            $data['user'] = $user;
            return view('frontend.pages.user.profile', $data);
        }else{
            return redirect()->back();
        }
    }

    public function profileUpdate(Request $request){

     

        $id = $request->id;

        $validate=  Validator::make($request->all(),[
            'email'=>'required|email|unique:users,email,'.$id,
            'name'=> 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        if($validate->fails()){
            $data['status'] = false;
            $data['message'] = "Please enter all valid input.";
            $data['errors'] = $validate->errors();
            return response()->json($data, 400);
        }else{
            $user = User::find($id);
            if($user){
    
                $user->name = $request->name;
                $user->email = $request->email;

                $image=$request->file('image');
    
                if($image){
                    if($user->image){
                        unlink($user->image);
                    }
                    $image_name=Str::slug($request->input('name'), "-").Str::random(4);
                    $ext=strtolower($image->getClientOriginalExtension());
                    $image_full_name=$image_name.".".$ext;
                    $upload_path='userImg/';
                    $image_url=$upload_path.$image_full_name;
                    $success=$image->move($upload_path,$image_full_name);
                    if($success){
                        $user->image=$image_url;
                    }

                }
    
                if($user->save()){
    
                    $data['status'] = true;
                    $data['message'] = "User updated successfuly";
                    return response()->json($data, 200);
    
                }else{
                    $data['status'] = false;
                    $data['message'] = "Failed to update user. Please try again.";
                    return response()->json($data, 200);

                }
    
            }else{
    
                $data['status'] = false;
                $data['message'] = "User not found";
                return response()->json($data, 404);
    
            }
        }

        

    }

    public function profilePassword(Request $request){




        $id = $request->id;
        $user = User::find($id);
        if($user){

            if(Hash::check($request->current_password, $user->password)) {
                $user->password = Hash::make($request->password);

                if($user->save()){
                    $data['status'] = true;
                    $data['message'] = "Password Updated Successfully";
                    return response()->json($data, 200);
                    
                }else{
                    $data['status'] = false;
                    $data['message'] = "Server Error";
                    return response()->json($data, 200);
                }
            } else {
                $data['status'] = false;
                $data['message'] = "Current Password Does Not Match !";
                 return response()->json($data, 200);
            }

           

        }else{

            $data['status'] = false;
            $data['message'] = "User not found";
            return response()->json($data, 200);

        }





    }
}
