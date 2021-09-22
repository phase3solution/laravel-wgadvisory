<?php

namespace App\Http\Controllers;

use App\Models\DrmAssessmentResult;
use Illuminate\Http\Request;

use App\Models\Assessment;
use App\Models\BcpAssessmentResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DrmAssessmentResultController extends Controller
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
             $drm_result = DrmAssessmentResult::where('company_id', $company_id)->where('assessment_id', $key)->first();
  
             if($drm_result){
              $drm_result->assessment_id = $key;
              $drm_result->company_id = $company_id;
              $drm_result->average = $value;
              $drm_result->total = $total[$key];
              $drm_result->updated_by = Auth::id();
             }else{
              $drm_result = new DrmAssessmentResult();
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
  
              $drm_results = DrmAssessmentResult::where('company_id', $company_id)->where('assessment_id', $index)->first();
  
             if($drm_results){
              $drm_results->assessment_id = $index;
              $drm_results->company_id = $company_id;
              $drm_results->answer = $val;
              $drm_results->comment = $comment[$index];
              $drm_results->updated_by = Auth::id();
  
             }else{
              $drm_results = new DrmAssessmentResult();
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


   
    public function show( $drmAssessmentResult)
    {
        //
    }


    public function edit( $drmAssessmentResult)
    {
        //
    }


    public function update(Request $request,  $drmAssessmentResult)
    {
        //
    }


    public function destroy( $drmAssessmentResult)
    {
        if($drmAssessmentResult){
            $query = DrmAssessmentResult::where('company_id', $drmAssessmentResult )->exists();

            if($query){
                $result = DrmAssessmentResult::where('company_id', $drmAssessmentResult )->delete();
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
