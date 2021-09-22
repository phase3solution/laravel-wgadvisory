<?php

namespace App\Http\Controllers;

use App\Models\SfiaUser;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class SfiaUserController extends Controller
{
    
    public function index()
    {
        $data['sfiaUsers'] = SfiaUser::with('company')->where('status', 1)->get();
        return view('pages.sfia_settings.users.index', $data);
    }

 
    public function create()
    {
       $data['companies'] = Company::where('status', 1)->get();
       return view('pages.sfia_settings.users.create', $data);
    }


    public function store(Request $request)
    {
        $sfiaUser = new SfiaUser();
        $sfiaUser->company_id = $request->company_id;
        $sfiaUser->name = $request->name;
        $sfiaUser->description = $request->description;
        $sfiaUser->created_by = Auth::id();
        $sfiaUser->save();
        return redirect()->route('sfiaUser.index');

    }


    public function show($id)
    {
        $data['sfiaUser'] = SfiaUser::with('company')->where('id', $id)->first();
        return view('pages.sfia_settings.users.show', $data);
    }


    public function edit($id)
    {
        $data['sfiaUser'] = SfiaUser::where('id', $id)->first();
        $data['companies'] = Company::where('status', 1)->get();
        return view('pages.sfia_settings.users.edit', $data);
    }


    public function update(Request $request,  $id)
    {

        $sfiaUser = SfiaUser::find($id);
        $sfiaUser->company_id = $request->company_id;
        $sfiaUser->name = $request->name;
        $sfiaUser->description = $request->description;
        $sfiaUser->updated_by = Auth::id();
        $sfiaUser->save();

        return redirect()->route('sfiaUser.index');

    }


    public function destroy($id)
    {
        $sfiaUser = SfiaUser::find($id);
        $sfiaUser->delete();
        return redirect()->route('sfiaUser.index');
    }
}
