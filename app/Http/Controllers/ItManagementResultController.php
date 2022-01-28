<?php

namespace App\Http\Controllers;

use App\Models\ItManagementResult;
use Illuminate\Http\Request;


use App\Models\Assessment;
use App\Models\BcpAssessmentResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItManagementResultController extends Controller
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


        $total = $request->total;
        $average = $request->average;

        $answer = $request->answer;
        $comment = $request->comment;

    
  
        $checkSave = false;
        DB::beginTransaction();
        if($average){
            foreach($average as $key=>$value){
             $drm_result = ItManagementResult::where('company_id', $company_id)->where('assessment_id', $key)->first();
  
             if($drm_result){
              $drm_result->assessment_id = $key;
              $drm_result->company_id = $company_id;
              $drm_result->average = $value;
              $drm_result->total = $total[$key];
              $drm_result->updated_by = Auth::id();
             }else{
              $drm_result = new ItManagementResult();
              $drm_result->assessment_id = $key;
              $drm_result->company_id = $company_id;
              $drm_result->average = $value;
              $drm_result->total = $total[$key];
              $drm_result->created_by = Auth::id();
             }
  
            if($drm_result->save()){
              $checkSave = true;
            }else{
              $checkSave = false;
            }
  
            }
        }
  
        if($answer){
  
            foreach($answer as $index=> $val){
  
              $drm_results = ItManagementResult::where('company_id', $company_id)->where('assessment_id', $index)->first();
  
             if($drm_results){
              $drm_results->assessment_id = $index;
              $drm_results->company_id = $company_id;
              $drm_results->answer = $val;
              $drm_results->comment = $comment[$index];
              $drm_results->updated_by = Auth::id();
  
             }else{
              $drm_results = new ItManagementResult();
              $drm_results->assessment_id = $index;
              $drm_results->company_id = $company_id;
              $drm_results->answer = $val;
 
              $drm_results->comment = $comment[$index];
              $drm_results->created_by = Auth::id();
             }
  
             if($drm_results->save()){
              $checkSave = true;
             }else{
              $checkSave = false;
             }
  
            }
        }
  
        DB::commit();
  
        if($checkSave){
          $data['status'] = true;
          $data['message'] = "Data saved successfully";
          return response()->json($data,200);
  
        }else{
            $data['status'] = false;
            $data['message'] = "Data save failed";
            return response()->json($data,200);
        }
    }


    public function publishAssessment($id){
        $assessment = Assessment::find($id);
        if($assessment){

            $assessment->status = 5;
            $assessment->published_at = date("Y-m-d H:s:i");
            
            if($assessment->save()){
                $data['status'] = true;
                $data['message'] = "Published Successfully";
                return response()->json($data,200);

            }else{
                $data['status'] = false;
                $data['message'] = "Server Error";
                return response()->json($data,200);
            }

        }else{

            $data['status'] = false;
            $data['message'] = "Not Found";
            return response()->json($data,200);

        }
    }



    
    public function show( $itManagementResult)
    {
        //
    }

   
    public function edit( $itManagementResult)
    {
        //
    }

  
    public function update(Request $request,  $itManagementResult)
    {
        //
    }

    public function destroy( $itManagementResult)
    {
        if($itManagementResult){
            $query = ItManagementResult::where('company_id', $itManagementResult )->exists();

            if($query){
                $result = ItManagementResult::where('company_id', $itManagementResult )->delete();
                if($result){
                    $data['status'] = true;
                    $data['message'] = "Reset Successfully";
                    return response()->json($data,200);

                }else{
                    $data['status'] = false;
                    $data['message'] = "Reset Failed! Server Error!!";
                    return response()->json($data,200);

                }
            }else{

                $data['status'] = false;
                $data['message'] = "Company not found !";
                return response()->json($data,200);


            }


        }else{

            $data['status'] = false;
            $data['message'] = "Company not found !";
            return response()->json($data,200);

        }
    }
}
