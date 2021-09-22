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
        $data['users'] = User::with(array('userRole'=>function($q1){
            $q1->with('role')->get();
        }))
        ->with(array('userCompany'=>function($q2){
            $q2->with('company')->get();
        }))
        ->get();
        return view('pages.user.view', $data);
    }


    public function create()
    {
        $data['roles'] = Role::all();
        return view('pages.user.create', $data);
    }

    public function store(Request $request)
    {
        $validate=  Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'required',
            'password'=> 'required',
            'confirm_password'=> 'required_with:password|same:password',
            'role_id'=>'nullable'

        ]);

        if($validate->fails()){
            return redirect()->back();
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
           if( $user->save()){

            if($request->role_id){
              $userRole = new  UserRole();
              $userRole->user_id = $user->id;
              $userRole->role_id = $request->role_id;
              $userRole->created_by = Auth::id();
              $userRole->save();
            }

            return redirect()->route('user.index');
           }else{
            return redirect()->back();
           }

        }

    }

   
    public function show(Role $role)
    {
        //
    }

  
    public function edit($id)
    {
        $data['user'] = User::with('userRole', 'userCompany')->find($id);
        $data['roles'] = Role::all();
        $data['companies'] = Company::all();


        if($data['user']){
            return view('pages.user.edit',$data);
        }else{
            return redirect()->back();
        }
    }

    public function update(Request $request,$id)
    {
        $validate=  Validator::make($request->all(),[
            'name'=>'required',
        ]);

        if($validate->fails()){
            return redirect()->back();
        }else{
            $user = User::find($id);

            if($user){
                $user->name = $request->name;
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


                return redirect()->route('user.index');
               }else{
                return redirect()->back();
               }

            }else{
                return redirect()->back();
            }



        }
    }


    public function updatePassword(Request $request){
        
        $validate=  Validator::make($request->all(),[
            'id' => 'required',
            'password'=> 'required',
            'confirm_password'=> 'required_with:password|same:password',

        ]);

        if($validate->fails()){
            return redirect()->back();
        }else{
            $user =  User::find($request->id);
            $user->password = Hash::make($request->password);
           if( $user->save()){
            return redirect()->route('user.index');
           }else{
            return redirect()->back();
           }

        }

    }

    public function destroy(Role $role)
    {
        //
    }



    
}
