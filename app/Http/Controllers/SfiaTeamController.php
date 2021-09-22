<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\SfiaTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SfiaTeamController extends Controller
{
    
    public function index()
    {
        $data['sfiaTeams'] = SfiaTeam::with('company')->where('status', 1)->get();
        return view('pages.sfia_settings.team.index', $data);
    }

 
    public function create()
    {
       $data['companies'] = Company::where('status', 1)->get();
       return view('pages.sfia_settings.team.create', $data);
    }


    public function store(Request $request)
    {
        $sfiaTeam = new SfiaTeam();
        $sfiaTeam->company_id = $request->company_id;
        $sfiaTeam->name = $request->name;
        $sfiaTeam->description = $request->description;
        $sfiaTeam->created_by = Auth::id();
        $sfiaTeam->save();
        return redirect()->route('sfiaTeam.index');

    }


    public function show($id)
    {
        $data['sfiaTeam'] = SfiaTeam::with('company')->where('id', $id)->first();
        return view('pages.sfia_settings.team.show', $data);
    }


    public function edit($id)
    {
        $data['sfiaTeam'] = SfiaTeam::where('id', $id)->first();
        $data['companies'] = Company::where('status', 1)->get();
        return view('pages.sfia_settings.team.edit', $data);
    }


    public function update(Request $request,  $id)
    {

        $sfiaTeam = SfiaTeam::find($id);
        $sfiaTeam->company_id = $request->company_id;
        $sfiaTeam->name = $request->name;
        $sfiaTeam->description = $request->description;
        $sfiaTeam->updated_by = Auth::id();
        $sfiaTeam->save();

        return redirect()->route('sfiaTeam.index');

    }


    public function destroy($id)
    {
        $sfiaTeam = SfiaTeam::find($id);
        $sfiaTeam->delete();

        return redirect()->route('sfiaTeam.index');
    }
}
