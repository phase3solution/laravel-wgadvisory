<?php

namespace App\Http\Controllers;

use App\Models\SfiaTeamRole;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\SfiaRole;
use App\Models\SfiaTeam;
use Illuminate\Support\Facades\Auth;

class SfiaTeamRoleController extends Controller
{
    
    public function index()
    {
        $data['sfiaTeamRoles'] = SfiaTeamRole::with('company', 'sfiaTeam', 'sfiaRole')->where('status', 1)->get();
        return view('pages.sfia_settings.team_roles.index', $data);
    }

    public function findRoleByTeam($id){

        $sfiaTeamRoles = SfiaTeamRole::with('company', 'sfiaTeam', 'sfiaRole')->where('status', 1)->where('sfia_team_id', $id)->get();
        
        $html = '<option value="">Select Name</option>';

        if($sfiaTeamRoles){
            foreach($sfiaTeamRoles as $sfiaTeamRoles){
                $html .= '<option value="'.$sfiaTeamRoles->sfia_role_id.'">'.$sfiaTeamRoles->sfiaRole->name.'</option>';
            }

        }
        $html .='';

        
        return $html;

    }

 
    public function create()
    {
       $data['companies'] = Company::where('status', 1)->get();
       $data['sfiaTeams'] = SfiaTeam::where('status', 1)->get();
       $data['sfiaRoles'] = SfiaRole::where('status', 1)->get();

       return view('pages.sfia_settings.team_roles.create', $data);
    }


    public function store(Request $request)
    {
        $sfiaTeamRole = new SfiaTeamRole();

        $sfiaTeamRole->company_id = $request->company_id;
        $sfiaTeamRole->sfia_team_id = $request->sfia_team_id;
        $sfiaTeamRole->sfia_role_id = $request->sfia_role_id;

        $sfiaTeamRole->created_by = Auth::id();
        $sfiaTeamRole->save();
        return redirect()->route('sfiaTeamRole.index');

    }


    public function show($id)
    {
        $data['sfiaTeamRole'] = SfiaTeamRole::with('company')->where('id', $id)->first();
        return view('pages.sfia_settings.team_roles.show', $data);
    }


    public function edit($id)
    {
        $data['sfiaTeamRole'] = SfiaTeamRole::where('id', $id)->first();

        $data['companies'] = Company::where('status', 1)->get();
        $data['sfiaTeams'] = SfiaTeam::where('status', 1)->get();
        $data['sfiaRoles'] = SfiaRole::where('status', 1)->get();


        return view('pages.sfia_settings.team_roles.edit', $data);
    }


    public function update(Request $request,  $id)
    {

        $sfiaTeamRole = SfiaTeamRole::find($id);

        $sfiaTeamRole->company_id = $request->company_id;
        $sfiaTeamRole->sfia_team_id = $request->sfia_team_id;
        $sfiaTeamRole->sfia_role_id = $request->sfia_role_id;

        $sfiaTeamRole->updated_by = Auth::id();
        $sfiaTeamRole->save();

        return redirect()->route('sfiaTeamRole.index');

    }


    public function destroy($id)
    {
        $sfiaTeamRole = SfiaTeamRole::find($id);
        $sfiaTeamRole->delete();

        return redirect()->route('sfiaTeamRole.index');
    }
}

