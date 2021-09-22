<?php

namespace App\Http\Controllers;

use App\Models\Role;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=  Validator::make($request->all(),[
            'name'=>'required',
            'description'=> 'nullable',
            'status'=> 'nullable'
        ]);

        if($validate->fails()){
            return redirect()->back();
        }else{
            $role = new Role();
            $role->name = $request->name;
            $role->slug = Str::slug($request->input('name'), "-");
            $role->description = $request->description;
           if( $role->save()){
            return redirect()->route('role.index');
           }else{
            return redirect()->back();
           }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['role'] = Role::find($id);

        if($data['role']){
            return view('pages.role.edit',$data);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validate=  Validator::make($request->all(),[

            'name'=>'required',
            'description'=> 'nullable',
            'status'=> 'nullable'
        ]);

        if($validate->fails()){
            return redirect()->back();
        }else{
            $role = Role::find($id);

            if($role){

                $role->name = $request->name;
                $role->description = $request->description;
               if( $role->save()){
                return redirect()->route('role.index');
               }else{
                return redirect()->back();
               }

            }else{
                return redirect()->back();
            }



        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
