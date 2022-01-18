<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\Company;
use App\Models\UserCompany;
use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    
    public function index()
    {


       


        $userRole = UserRole::where('user_id', Auth::id())->first();

        if($userRole->role_id == 1){

            $data['users'] = User::with(array('userRole'=>function($q1){
                $q1->with('role')->get();
            }))
            ->with(array('userCompany'=>function($q2){
                $q2->with('company')->get();
            }))
            ->orderBy('id', 'desc')
            ->get();

        }else if($userRole->role_id == 2){

            $superUsers = UserRole::select('user_id')->where('role_id', 1)->get();

            $data['users'] = User::with(array('userRole'=>function($q1){
                $q1->with('role')->get();
            }))
            ->with(array('userCompany'=>function($q2){
                $q2->with('company')->get();
            }))
            ->whereNotIn('id', $superUsers )
            ->orderBy('id', 'desc')
            ->get();

        }else{
            $data['users'] = array();
        }






        return view('pages.user.view', $data);
    }


    public function create()
    {

        $userRole = UserRole::where('user_id', Auth::id())->first();

        if($userRole->role_id == 1){
            $data['roles'] = Role::where('status', 1)->get();

        }else if($userRole->role_id == 2){
            $data['roles'] = Role::where('id', '!=', 1)->where('status', 1)->get();

        }else{
            $data['roles'] = array();
        }


        $data['companies'] = Company::where('status', 1)->get();
        return view('pages.user.create', $data);
    }

    public function store(Request $request)
    {
        $validate=  Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'required|unique:users|email',
            'password'=> 'required',
            'confirm_password'=> 'required_with:password|same:password',
            'role_id'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($validate->fails()){
            $data['status'] = false;
            $data['message'] = "Please enter all valid input";
            $data['errors'] = $validate->errors();
            return response()->json($data, 400);
        }else{

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->status = $request->status;
            $user->password = Hash::make($request->password);

            $image=$request->file('image');
    
            if($image){
                
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



           if( $user->save()){

                if($request->role_id){
                    $userRole = new  UserRole();
                    $userRole->user_id = $user->id;
                    $userRole->role_id = $request->role_id;
                    $userRole->created_by = Auth::id();
                    $userRole->save();
                }

                if($request->company_id){
                    $userRole = new  UserCompany();
                    $userRole->user_id = $user->id;
                    $userRole->company_id = $request->company_id;
                    $userRole->created_by = Auth::id();
                    $userRole->save();
                }

                $data['status'] = true;
                $data['message'] = "User created successfully!";
                return response()->json($data, 200);
           }else{

                $data['status'] = false;
                $data['message'] = "User create failed. Please try again";
                $data['errors'] = '';
                return response()->json($data, 500);
           }

        }

    }

   
    public function show(Role $role)
    {
        //
    }

  
    public function edit($id)
    {

        $userRole = UserRole::where('user_id', Auth::id())->first();

        if($userRole->role_id == 1){
            $data['roles'] = Role::where('status', 1)->get();

        }else if($userRole->role_id == 2){
            $data['roles'] = Role::where('id', '!=', 1)->where('status', 1)->get();

        }else{
            $data['roles'] = array();
        }
        $data['user'] = User::with('userRole', 'userCompany')->find($id);
        $data['companies'] = Company::where('status',1)->get();


        if($data['user']){
            return view('pages.user.edit',$data);
        }else{
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $validate=  Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'required|email|unique:users,email,'.$id,
            'role_id'=>'required',
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
                $user->status = $request->status;


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


               if( $user->save()){

                    if($request->role_id){

                        $userRole = UserRole::where('user_id', $id)->first();

                        if($userRole){
                            $userRole->user_id = $id;
                            $userRole->role_id = $request->role_id;
                            $userRole->updated_by = Auth::id();
                        }else{
                            $userRole = new UserRole();
                            $userRole->user_id = $id;
                            $userRole->role_id = $request->role_id;
                            $userRole->created_by = Auth::id();

                        }

                        $userRole->save();
                    }

                    if($request->company_id){

                        
                        $userCompany = UserCompany::where('user_id', $id)->first();

                        if($userCompany){
                            $userCompany->user_id = $id;
                            $userCompany->company_id = $request->company_id;
                            $userCompany->updated_by = Auth::id();
                        }else{
                            $userCompany = new UserCompany();
                            $userCompany->user_id = $id;
                            $userCompany->company_id = $request->company_id;
                            $userCompany->created_by = Auth::id();
                        }

                        $userCompany->save();

                    }


                    $data['status'] = true;
                    $data['message'] = "User updated successfully!";
                    return response()->json($data, 200);
               }else{
                    $data['status'] = false;
                    $data['message'] = "Failed to update user. Please try again.";
                    return response()->json($data, 500);
               }

            }else{
                $data['status'] = false;
                $data['message'] = "User not found!";
                return response()->json($data, 404);
            }
        }
    }


    public function updatePassword(Request $request){
        
        $validate=  Validator::make($request->all(),[
            'id' => 'required',
            'password'=> 'required|min:8|max:20',
            'confirm_password'=> 'required_with:password|same:password',
        ]);

        if($validate->fails()){

            $data['status'] = false;
            $data['message'] = "Please enter all valid input.";
            $data['errors'] = $validate->errors();
            return response()->json($data, 400);
        }else{

            $user =  User::find($request->id);
            $user->password = Hash::make($request->password);


           if( $user->save()){
                $data['status'] = true;
                $data['message'] = "User password changed successfuly!";
                return response()->json($data, 200);
           }else{
                $data['status'] = false;
                $data['message'] = "Failed to updated password. Please try again.";
                return response()->json($data, 500);
           }

        }

    }

    public function destroy($id)
    {   
        $user = User::find($id);

        if($user){
            if($user->image){
                unlink($user->image);
            }

            if($user->delete()){
                $userRole = UserRole::where('user_id', $id)->first();
                if($userRole){
                    $userRole->delete();
                }

                $userCompany = UserCompany::where('user_id', $id)->first();
                if($userCompany){
                    $userCompany->delete();
                }

                $data['status'] = true;
                $data['message'] = "User deleted successfully! ";
                return response()->json($data, 200);

            }else{
                $data['status'] = false;
                $data['message'] = "Server error! ";
                return response()->json($data, 500);
            }
        }

        $data['status'] = false;
        $data['message'] = "User not found! ";
        return response()->json($data, 404);
    }



    
}
