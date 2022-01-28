<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\BcpAssessmentResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class BcpAssessmentResultController extends Controller
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
      $average = $request->average;
    
      $summary = $request->summary;
      $historical_evidence = $request->historical_evidence;


      $company_id = $request->company_id;
      $vulnerability = $request->vulnerability;
      $impact = $request->impact;
      $probability = $request->probability;
      $risk = $request->risk;
      $comment = $request->comment;
      $vulnerability_codes = $request->vulnerability_codes;
      $asset_codes = $request->asset_codes;

      $checkSave = false;
      DB::beginTransaction();
      if($average){
          foreach($average as $key=>$value){
           $bcp_result = BcpAssessmentResult::where('company_id', $company_id)->where('assessment_id', $key)->first();

           if($bcp_result){
            $bcp_result->assessment_id = $key;
            $bcp_result->company_id = $company_id;
            $bcp_result->average = $value;
            $bcp_result->summary = $summary[$key];
            $bcp_result->historical_evidence = $historical_evidence[$key];
            $bcp_result->asset_codes = json_encode($asset_codes[$key]);
            $bcp_result->vulnerability_codes = json_encode($vulnerability_codes[$key]);
            $bcp_result->updated_by = Auth::id();
           }else{
            $bcp_result = new BcpAssessmentResult();
            $bcp_result->assessment_id = $key;
            $bcp_result->company_id = $company_id;
            $bcp_result->average = $value;
            $bcp_result->summary = $summary[$key];
            $bcp_result->historical_evidence = $historical_evidence[$key];
            $bcp_result->asset_codes = json_encode($asset_codes[$key]);
            $bcp_result->vulnerability_codes = json_encode($vulnerability_codes[$key]);
            $bcp_result->created_by = Auth::id();
           }

          if($bcp_result->save()){
            $checkSave = true;
          }else{
            $checkSave = false;
          }

          }
      }

      if($vulnerability){

          foreach($vulnerability as $index=> $val){

            $bcp_results = BcpAssessmentResult::where('company_id', $company_id)->where('assessment_id', $index)->first();

           if($bcp_results){
            $bcp_results->assessment_id = $index;
            $bcp_results->company_id = $company_id;
            $bcp_results->vulnerability = $val;
            $bcp_results->impact = $impact[$index];
            $bcp_results->probability = $probability[$index];
            $bcp_results->risk = $risk[$index];
            $bcp_results->comment = $comment[$index];
            $bcp_results->updated_by = Auth::id();

           }else{
            $bcp_results = new BcpAssessmentResult();
            $bcp_results->assessment_id = $index;
            $bcp_results->company_id = $company_id;
            $bcp_results->vulnerability = $val;
            $bcp_results->impact = $impact[$index];
            $bcp_results->probability = $probability[$index];
            $bcp_results->risk = $risk[$index];
            $bcp_results->comment = $comment[$index];
            $bcp_results->created_by = Auth::id();
           }

           if($bcp_results->save()){
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

    
    public function show(BcpAssessmentResult $bcpAssessmentResult)
    {
        //
    }

    
    public function edit(BcpAssessmentResult $bcpAssessmentResult)
    {
        //
    }

    
    public function update(Request $request, BcpAssessmentResult $bcpAssessmentResult)
    {
        //
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
    
    public function destroy($bcpAssessmentResult)
    {
        if($bcpAssessmentResult){
            $query = BcpAssessmentResult::where('company_id', $bcpAssessmentResult )->exists();

            if($query){
                $result = BcpAssessmentResult::where('company_id', $bcpAssessmentResult )->delete();
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
