<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    
    public function index()
    {
        $data['roles'] = Role::all();
        return view('pages.role.view', $data);
    }

 
    public function create()
    {
        return view('pages.role.create');
    }

 
    public function store(Request $request)
    {
        $validate=  Validator::make($request->all(),[
            'name'=>'required|unique:roles',
            'description'=> 'nullable',
            'status'=> 'nullable'
        ]);

        if($validate->fails()){

            $data['status'] = false;
            $data['message'] = "Please enter all valid input.";
            $data['errors'] = $validate->errors();
            return response()->json($data, 400);


        }else{

            $role = new Role();
            $role->name = $request->name;
            $role->slug = Str::slug($request->input('name'), "-");
            $role->description = $request->description;
            $role->status = $request->status;


           if( $role->save()){

            $data['status'] = true;
            $data['message'] = "User role created successfully!";
            return response()->json($data, 200);

           }else{

            $data['status'] = false;
            $data['message'] = "Failed to create role. Please try again.";
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
        $data['role'] = Role::find($id);

        if($data['role']){
            return view('pages.role.edit',$data);
        }else{
            return redirect()->back();
        }
    }

  
    public function update(Request $request,$id)
    {
        $validate=  Validator::make($request->all(),[

            'name'=>'required|unique:roles,name,'.$id,
            'description'=> 'nullable',
            'status'=> 'required'
        ]);

        if($validate->fails()){
            $data['status'] = false;
            $data['message'] = "Please enter all valid input";
            $data['errors'] = $validate->errors();
            return response()->json($data, 400);
        }else{
            $role = Role::find($id);

            if($role){

                $role->name = $request->name;
                $role->description = $request->description;
                $role->status = $request->status;

               if( $role->save()){
                    $data['status'] = true;
                    $data['message'] = "User role updated successfully!";
                    return response()->json($data, 200);
               }else{
                    $data['status'] = false;
                    $data['message'] = "Failed to update role. Please try again.";
                    return response()->json($data, 500);
               }

            }else{
                $data['status'] = false;
                $data['message'] = "User role not found!";
                return response()->json($data, 404);
            }



        }
    }

  
    public function destroy($id)
    {

        $role = Role::find($id);
        if($role){

            if($role->delete()){

                $userRole = UserRole::where('role_id', $id)->first();
                if($userRole){
                    $userRole->delete();
                }

                $data['status'] = true;
                $data['message'] = "User role deleted successfully!";
                return response()->json($data, 200);

            }else{
                $data['status'] = false;
                $data['message'] = "Server error!";
                $data['errors'] = "";
                return response()->json($data, 500);
            }



        }else{

            $data['status'] = false;
            $data['message'] = "User role error!";
            $data['errors'] = "";
            return response()->json($data, 404);

        }
        
    }
}
