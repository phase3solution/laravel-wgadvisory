<?php

namespace App\Http\Controllers;

use App\Models\SfiaRoleUser;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\SfiaCategory;
use App\Models\SfiaRole;
use App\Models\SfiaTeam;
use App\Models\SfiaUser;
use Illuminate\Support\Facades\Auth;

class SfiaRoleUserController extends Controller
{
    
    public function index()
    {
        $data['sfiaRoleUsers'] = SfiaRoleUser::with('company', 'sfiaTeam', 'sfiaRole', 'sfiaUser')->where('status', 1)->get();
        return view('pages.sfia_settings.roles_users.index', $data);
    }

    public function findUserByRole($id){

        $sfiaRoleUser = SfiaRoleUser::with('company', 'sfiaTeam', 'sfiaRole', 'sfiaUser')->where('status', 1)->where('sfia_role_id', $id)->first();


        $dat['company_id'] =  $sfiaRoleUser->company_id;
        $dat['categories'] = SfiaCategory::with(array('sfiaSubcategory'=>function($q1){
            $q1->with('sfiaSkill')->get();
        }))->where('status', 1)->where('company_id', $sfiaRoleUser->company_id)->get();

        if($sfiaRoleUser){
            $data['status'] = true;
            $data['message'] = "Found";
            $data['userName'] =  '<h1>ID: '.$sfiaRoleUser->sfiaUser->name.'</h1>';
            $data['userId'] = $sfiaRoleUser->sfia_user_id;
            $data['notes'] = view('frontend.pages.sfia.load_notes')->render();
            $data['assessmentBody'] = view('frontend.pages.sfia.load_assessment_body',$dat)->render();

            return response()->json($data, 200);
        }else{
            $data['status'] = false;
            $data['message'] = "Not Found !";
            return response()->json($data, 404);
        }
        
       

    }

    public function addMoreCategories(Request $request){

        $data['categories'] = SfiaCategory::with(array('sfiaSubcategory'=>function($q1){
            $q1->with('sfiaSkill')->get();
        }))->where('status', 1)->where('company_id', $request->company_id)->get();

        $data['rowCount'] = $request->row_id;


        return view('frontend.pages.sfia.load_add_more', $data);

    }

 
    public function create()
    {
       $data['companies'] = Company::where('status', 1)->get();
       $data['sfiaTeams'] = SfiaTeam::where('status', 1)->get();
       $data['sfiaRoles'] = SfiaRole::where('status', 1)->get();
       $data['sfiaUsers'] = SfiaUser::where('status', 1)->get();

       return view('pages.sfia_settings.roles_users.create', $data);
    }


    public function store(Request $request)
    {
        $sfiaRoleUser = new SfiaRoleUser();

        $sfiaRoleUser->company_id = $request->company_id;
        $sfiaRoleUser->sfia_team_id = $request->sfia_team_id;
        $sfiaRoleUser->sfia_role_id = $request->sfia_role_id;
        $sfiaRoleUser->sfia_user_id = $request->sfia_user_id;

        $sfiaRoleUser->created_by = Auth::id();
        $sfiaRoleUser->save();
        return redirect()->route('sfiaRoleUser.index');

    }


    public function show($id)
    {
        $data['sfiaRoleUser'] = SfiaRoleUser::with('company', 'sfiaUser')->where('id', $id)->first();
        return view('pages.sfia_settings.roles_users.show', $data);
    }


    public function edit($id)
    {
        $data['sfiaRoleUser'] = SfiaRoleUser::where('id', $id)->first();

        $data['companies'] = Company::where('status', 1)->get();
        $data['sfiaTeams'] = SfiaTeam::where('status', 1)->get();
        $data['sfiaRoles'] = SfiaRole::where('status', 1)->get();
        $data['sfiaUsers'] = SfiaUser::where('status', 1)->get();


        return view('pages.sfia_settings.roles_users.edit', $data);
    }


    public function update(Request $request,  $id)
    {

        $sfiaRoleUser = SfiaRoleUser::find($id);

        $sfiaRoleUser->company_id = $request->company_id;
        $sfiaRoleUser->sfia_team_id = $request->sfia_team_id;
        $sfiaRoleUser->sfia_role_id = $request->sfia_role_id;
        $sfiaRoleUser->sfia_user_id = $request->sfia_user_id;


        $sfiaRoleUser->updated_by = Auth::id();
        $sfiaRoleUser->save();

        return redirect()->route('sfiaRoleUser.index');

    }


    public function destroy($id)
    {
        $sfiaRoleUser = SfiaRoleUser::find($id);
        $sfiaRoleUser->delete();

        return redirect()->route('sfiaRoleUser.index');
    }
}
