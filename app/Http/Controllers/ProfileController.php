<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\User;
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

 
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

  
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
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
            'name'=> 'required'
        ]);

        if($validate->fails()){
            $data['status'] = false;
            $data['message'] = "This email already used.";
            // return response()->json($data, 200);
            return redirect()->back();
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
                    // return response()->json($data, 200);
                    return redirect()->back();
    
                }else{
                    $data['status'] = false;
                    $data['message'] = "Server Error";
                    // return response()->json($data, 200);
                    return redirect()->back();

                }
    
            }else{
    
                $data['status'] = false;
                $data['message'] = "User not found";
                // return response()->json($data, 200);
                return redirect()->back();
    
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
