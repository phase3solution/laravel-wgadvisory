<?php

namespace App\Http\Controllers;

use App\Models\CybersecurityMaturityResult;
use Illuminate\Http\Request;


use App\Models\Assessment;
use App\Models\BcpAssessmentResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CybersecurityMaturityResultController extends Controller
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


        $function_average = $request->function_average;

        $category_average	 = $request->category_average;

        $maturity_rating = $request->maturity_rating;
        
        $response = $request->response;
        $score = $request->score;
        $comment = $request->comment;

        
    
  
        $checkSave = false;
        DB::beginTransaction();



        if($function_average){
            foreach($function_average as $key=>$value){
             $maturityFunction = CybersecurityMaturityResult::where('company_id', $company_id)->where('assessment_id', $key)->first();
  
             if($maturityFunction){
              $maturityFunction->assessment_id = $key;
              $maturityFunction->company_id = $company_id;
              $maturityFunction->function_average = $value;
              $maturityFunction->updated_by = Auth::id();
             }else{
              $maturityFunction = new CybersecurityMaturityResult();
              $maturityFunction->assessment_id = $key;
              $maturityFunction->company_id = $company_id;
              $maturityFunction->function_average = $value;
              $maturityFunction->created_by = Auth::id();
             }
  
            if($maturityFunction->save()){
              $checkSave = true;
            }else{
              $checkSave = false;
            }
  
            }
        }


        if($category_average){
            foreach($category_average as $ke=>$valueCategory){
             $maturityFunction = CybersecurityMaturityResult::where('company_id', $company_id)->where('assessment_id', $ke)->first();
  
             if($maturityFunction){
              $maturityFunction->assessment_id = $ke;
              $maturityFunction->company_id = $company_id;
              $maturityFunction->category_average = $valueCategory;
              $maturityFunction->updated_by = Auth::id();
             }else{
              $maturityFunction = new CybersecurityMaturityResult();
              $maturityFunction->assessment_id = $ke;
              $maturityFunction->company_id = $company_id;
              $maturityFunction->category_average = $valueCategory;
              $maturityFunction->created_by = Auth::id();
             }
  
            if($maturityFunction->save()){
              $checkSave = true;
            }else{
              $checkSave = false;
            }
  
            }
        }


        if($maturity_rating){
            foreach($maturity_rating as $sl=>$valueRating){
             $maturityRating = CybersecurityMaturityResult::where('company_id', $company_id)->where('assessment_id', $sl)->first();
  
             if($maturityRating){
              $maturityRating->assessment_id = $sl;
              $maturityRating->company_id = $company_id;
              $maturityRating->maturity_rating = $valueRating;
              $maturityRating->updated_by = Auth::id();
             }else{
              $maturityRating = new CybersecurityMaturityResult();
              $maturityRating->assessment_id = $sl;
              $maturityRating->company_id = $company_id;
              $maturityRating->maturity_rating = $valueRating;
              $maturityRating->created_by = Auth::id();
             }
  
            if($maturityRating->save()){
              $checkSave = true;
            }else{
              $checkSave = false;
            }
  
            }
        }
  


        if($response){
  
            foreach($response as $index=> $val){
  
              $maturityResponse = CybersecurityMaturityResult::where('company_id', $company_id)->where('assessment_id', $index)->first();
  
             if($maturityResponse){
              $maturityResponse->assessment_id = $index;
              $maturityResponse->company_id = $company_id;
              $maturityResponse->response = $val;
              $maturityResponse->score = $score[$index];
              $maturityResponse->comment = $comment[$index];
              $maturityResponse->updated_by = Auth::id();
  
             }else{
              $maturityResponse = new CybersecurityMaturityResult();
              $maturityResponse->assessment_id = $index;
              $maturityResponse->company_id = $company_id;
              $maturityResponse->response = $val;
              $maturityResponse->score = $score[$index];
              $maturityResponse->comment = $comment[$index];
              $maturityResponse->created_by = Auth::id();
             }
  
             if($maturityResponse->save()){
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


  
    public function show( $cybersecurityMaturityResult)
    {
        //
    }

 
    public function edit( $cybersecurityMaturityResult)
    {
        //
    }

  
    public function update(Request $request,  $cybersecurityMaturityResult)
    {
        //
    }

    public function destroy( $cybersecurityMaturityResult)
    {
        if($cybersecurityMaturityResult){
            $query = CybersecurityMaturityResult::where('company_id', $cybersecurityMaturityResult )->exists();

            if($query){
                $result = CybersecurityMaturityResult::where('company_id', $cybersecurityMaturityResult )->delete();
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
