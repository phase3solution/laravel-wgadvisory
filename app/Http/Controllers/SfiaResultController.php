<?php

namespace App\Http\Controllers;

use App\Models\SfiaResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SfiaResultController extends Controller
{
   
    public function index()
    {
        //
    }

  
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $company_id = $request->company_id;
        $sfia_id = $request->sfia_id;
        $sfia_user_id = $request->sfia_user_id;
        $sfia_team_id = $request->sfia_team_id;
        $sfia_name_role_id = $request->sfia_name_role_id;
        $sfia_title_role_id = $request->sfia_title_role_id;
        $notes = $request->notes;
        $level = $request->level;
        $skill_fit = $request->skill_fit;
        $technical_score = $request->technical_score;

        $sfiaResult = SfiaResult::where('sfia_id',$sfia_id)
                    ->where('company_id',$company_id)
                    ->where('sfia_team_id',$sfia_team_id)
                    ->where('sfia_name_role_id',$sfia_name_role_id)
                    ->first();

        if($sfiaResult){

            $sfiaResult->company_id = $company_id;
            $sfiaResult->sfia_id = $sfia_id;
            $sfiaResult->sfia_user_id = $sfia_user_id;
            $sfiaResult->sfia_team_id = $sfia_team_id;
            $sfiaResult->sfia_name_role_id = $sfia_name_role_id;
            $sfiaResult->sfia_title_role_id = $sfia_title_role_id;
            $sfiaResult->notes = $notes;
            $sfiaResult->level = $level;
            $sfiaResult->skill_fit = $skill_fit;
            $sfiaResult->technical_score = $technical_score;
            $sfiaResult->updated_by = Auth::id();



        }else{

            $sfiaResult = new SfiaResult();
            $sfiaResult->company_id = $company_id;
            $sfiaResult->sfia_id = $sfia_id;
            $sfiaResult->sfia_user_id = $sfia_user_id;
            $sfiaResult->sfia_team_id = $sfia_team_id;
            $sfiaResult->sfia_name_role_id = $sfia_name_role_id;
            $sfiaResult->sfia_title_role_id = $sfia_title_role_id;
            $sfiaResult->notes = $notes;
            $sfiaResult->level = $level;
            $sfiaResult->skill_fit = $skill_fit;
            $sfiaResult->technical_score = $technical_score;
            $sfiaResult->created_by = Auth::id();

        }

        if($sfiaResult->save()){

            $data['status'] = true;
            $data['message'] = "Sfia Assessment Result Saved Successfully!";
            return response()->json($data, 200);

        }else{
            $data['status'] = false;
            $data['message'] = "Server Error !";
            return response()->json($data, 500);
        }



    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request,  $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
