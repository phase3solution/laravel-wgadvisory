<?php

namespace App\Http\Controllers;

use App\Models\SfiaRole;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;


class SfiaRoleController extends Controller
{
    
    public function index()
    {
        $data['sfiaRoles'] = SfiaRole::with('company')->where('status', 1)->get();
        return view('pages.sfia_settings.roles.index', $data);
    }

 
    public function create()
    {
       $data['companies'] = Company::where('status', 1)->get();
       return view('pages.sfia_settings.roles.create', $data);
    }


    public function store(Request $request)
    {
        $sfiaRole = new SfiaRole();
        $sfiaRole->company_id = $request->company_id;
        $sfiaRole->name = $request->name;
        $sfiaRole->description = $request->description;
        $sfiaRole->created_by = Auth::id();
        $sfiaRole->save();
        return redirect()->route('sfiaRole.index');

    }


    public function show($id)
    {
        $data['sfiaRole'] = SfiaRole::with('company')->where('id', $id)->first();
        return view('pages.sfia_settings.roles.show', $data);
    }


    public function edit($id)
    {
        $data['sfiaRole'] = SfiaRole::where('id', $id)->first();
        $data['companies'] = Company::where('status', 1)->get();
        return view('pages.sfia_settings.roles.edit', $data);
    }


    public function update(Request $request,  $id)
    {

        $sfiaRole = SfiaRole::find($id);
        $sfiaRole->company_id = $request->company_id;
        $sfiaRole->name = $request->name;
        $sfiaRole->description = $request->description;
        $sfiaRole->updated_by = Auth::id();
        $sfiaRole->save();

        return redirect()->route('sfiaRole.index');

    }


    public function destroy($id)
    {
        $sfiaRole = SfiaRole::find($id);
        $sfiaRole->delete();
        return redirect()->route('sfiaRole.index');
    }
}