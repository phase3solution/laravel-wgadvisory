<?php

namespace App\Http\Controllers;

use App\Models\DrmRegisterResult;
use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\BcpAssessmentResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DrmRegisterResultController extends Controller
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


  

        $description = $request->description;
        $owner = $request->owner;

        $last_assessment = $request->last_assessment;

        $rating = $request->rating;

        $recommendation	= $request->recommendation	;

        $start_date = $request->start_date;

        $end_date= $request->end_date;

        $notes = $request->notes;

        $target = $request->target;

    
  
        $checkSave = false;
        DB::beginTransaction();
        if($description){
            foreach($description as $key=>$value){
             $drm_result = DrmRegisterResult::where('company_id', $company_id)->where('assessment_id', $key)->first();
  
             if($drm_result){
              $drm_result->assessment_id = $key;
              $drm_result->company_id = $company_id;
              $drm_result->description = $value;

              $drm_result->owner = $owner[$key];
              $drm_result->last_assessment = $last_assessment[$key];
              $drm_result->rating = $rating[$key];
              $drm_result->recommendation = $recommendation[$key];
              $drm_result->start_date = $start_date[$key];
              $drm_result->end_date = $end_date[$key];
              $drm_result->notes = $notes[$key];
              $drm_result->target = $target[$key];






              $drm_result->updated_by = Auth::id();
             }else{
              $drm_result = new DrmRegisterResult();
              $drm_result->assessment_id = $key;
              $drm_result->company_id = $company_id;
              $drm_result->description = $value;

              $drm_result->owner = $owner[$key];
              $drm_result->last_assessment = $last_assessment[$key];
              $drm_result->rating = $rating[$key];
              $drm_result->recommendation = $recommendation[$key];
              $drm_result->start_date = $start_date[$key];
              $drm_result->end_date = $end_date[$key];
              $drm_result->notes = $notes[$key];
              $drm_result->target = $target[$key];

              $drm_result->created_by = Auth::id();
             }
  
            if($drm_result->save()){
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

    public function show($drmRegisterResult)
    {
        //
    }

 
    public function edit( $drmRegisterResult)
    {
        //
    }


    public function update(Request $request,  $drmRegisterResult)
    {
        //
    }


    public function destroy( $drmRegisterResult)
    {
        //
    }
}
