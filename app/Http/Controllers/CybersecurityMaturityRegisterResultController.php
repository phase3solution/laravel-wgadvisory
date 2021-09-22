<?php

namespace App\Http\Controllers;

use App\Models\CybersecurityMaturityRegisterResult;
use Illuminate\Http\Request;

use App\Models\Assessment;
use App\Models\BcpAssessmentResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CybersecurityMaturityRegisterResultController extends Controller
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


        $maturity_rating = $request->maturity_rating;
        $action_plan = $request->action_plan;
        $priority = $request->priority;
        $accountable = $request->accountable;

        
        $response = $request->response;
        $comment = $request->comment;

        $summary1 = $request->summary1;
        $summary2 = $request->summary2;

  
        $checkSave = false;
        DB::beginTransaction();


        if($summary1){
            foreach($summary1 as $suma=>$summary){
                $summa = CybersecurityMaturityRegisterResult::where('company_id', $company_id)->where('assessment_id', $suma)->first();

                if($summa){
                    $summa->assessment_id = $suma;
                    $summa->company_id = $company_id;
                    $summa->summary1 = $summary;
                    $summa->summary2 = $summary2[$suma];
                    $summa->updated_by = Auth::id();
                   }else{
                    $summa = new CybersecurityMaturityRegisterResult();
                    $summa->assessment_id = $suma;
                    $summa->company_id = $company_id;
                    $summa->summary1 = $summary;
                    $summa->summary2 = $summary2[$suma];
                    $summa->created_by = Auth::id();
                   }
        
                  if($summa->save()){
                    $checkSave = true;
                  }else{
                    $checkSave = false;
                  }
            }
        }
       


        if($maturity_rating){
            foreach($maturity_rating as $sl=>$valueRating){
             $maturityRating = CybersecurityMaturityRegisterResult::where('company_id', $company_id)->where('assessment_id', $sl)->first();
  
             if($maturityRating){
              $maturityRating->assessment_id = $sl;
              $maturityRating->company_id = $company_id;
              $maturityRating->maturity_rating = $valueRating;
              $maturityRating->action_plan = $action_plan[$sl];
              $maturityRating->priority = $priority[$sl];
              $maturityRating->accountable = $accountable[$sl];

              $maturityRating->updated_by = Auth::id();
             }else{
              $maturityRating = new CybersecurityMaturityRegisterResult();
              $maturityRating->assessment_id = $sl;
              $maturityRating->company_id = $company_id;
              $maturityRating->maturity_rating = $valueRating;
              $maturityRating->action_plan = $action_plan[$sl];
              $maturityRating->priority = $priority[$sl];
              $maturityRating->accountable = $accountable[$sl];

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
  
              $maturityResponse = CybersecurityMaturityRegisterResult::where('company_id', $company_id)->where('assessment_id', $index)->first();
  
             if($maturityResponse){
              $maturityResponse->assessment_id = $index;
              $maturityResponse->company_id = $company_id;
              $maturityResponse->response = $val;
              $maturityResponse->comment = $comment[$index];
              $maturityResponse->updated_by = Auth::id();
  
             }else{
              $maturityResponse = new CybersecurityMaturityRegisterResult();
              $maturityResponse->assessment_id = $index;
              $maturityResponse->company_id = $company_id;
              $maturityResponse->response = $val;
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

    public function show( $cybersecurityMaturityRegisterResult)
    {
        //
    }

  
    public function edit( $cybersecurityMaturityRegisterResult)
    {
        //
    }

 
    public function update(Request $request,  $cybersecurityMaturityRegisterResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CybersecurityMaturityRegisterResult  $cybersecurityMaturityRegisterResult
     * @return \Illuminate\Http\Response
     */
    public function destroy( $cybersecurityMaturityRegisterResult)
    {
        //
    }
}
