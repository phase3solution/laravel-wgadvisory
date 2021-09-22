<?php

namespace App\Http\Controllers;

use App\Models\BcpRegisterResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class BcpRegisterResultController extends Controller
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


        // return request()->all();
        $company_id = $request->company_id;

        $risk_owner = $request->risk_owner;

        $inherent_vulnerability = $request->inherent_vulnerability;
        $inherent_impact = $request->inherent_impact;
        $inherent_probability = $request->inherent_probability;
        $inherent_risk = $request->inherent_risk;

        $controls = $request->controls;

        $avoid = $request->avoid;
        $mitigate = $request->mitigate;
        $accept = $request->accept;
        $transfer = $request->transfer;

        $residual_vulnerability = $request->residual_vulnerability;
        $residual_impact = $request->residual_impact;
        $residual_probability = $request->residual_probability;
        $notes = $request->notes;


        $asset_codes = $request->asset_codes;
        $vulnerability_codes = $request->vulnerability_codes;

        $summary = $request->summary;
        $historical_evidence = $request->historical_evidence;
  
        $checkSave = false;
        DB::beginTransaction();
        if($risk_owner){
            foreach($risk_owner as $key=>$value){
             $bcp_result = BcpRegisterResult::where('company_id', $company_id)->where('assessment_id', $key)->first();
  
             if($bcp_result){
              $bcp_result->assessment_id = $key;
              $bcp_result->company_id = $company_id;
              $bcp_result->risk_owner = $value;

              $bcp_result->inherent_vulnerability = $inherent_vulnerability[$key];
              $bcp_result->inherent_impact = $inherent_impact[$key];
              $bcp_result->inherent_probability = $inherent_probability[$key];
              $bcp_result->risk = $inherent_risk[$key];
              $bcp_result->controls = $controls[$key];

              $bcp_result->avoid = $avoid[$key];
              $bcp_result->mitigate = $mitigate[$key];
              $bcp_result->accept = $accept[$key];
              $bcp_result->transfer = $transfer[$key];

              $bcp_result->residual_vulnerability = $residual_vulnerability[$key];
              $bcp_result->residual_impact = $residual_impact[$key];
              $bcp_result->residual_probability = $residual_probability[$key];
              $bcp_result->notes = $notes[$key];

  
              $bcp_result->asset_codes = json_encode($asset_codes[$key]);
              $bcp_result->vulnerability_codes = json_encode($vulnerability_codes[$key]);

              $bcp_result->summary =  $summary[$key];
              $bcp_result->historical_evidence = $historical_evidence[$key];

              $bcp_result->updated_by = Auth::id();
             }else{
              $bcp_result = new BcpRegisterResult();
              $bcp_result->assessment_id = $key;
              $bcp_result->company_id = $company_id;
              $bcp_result->risk_owner = $value;

              $bcp_result->inherent_vulnerability = $inherent_vulnerability[$key];
              $bcp_result->inherent_impact = $inherent_impact[$key];
              $bcp_result->inherent_probability = $inherent_probability[$key];
              $bcp_result->risk = $inherent_risk[$key];
              $bcp_result->controls = $controls[$key];

              $bcp_result->avoid = $avoid[$key];
              $bcp_result->mitigate = $mitigate[$key];
              $bcp_result->accept = $accept[$key];
              $bcp_result->transfer = $transfer[$key];

              $bcp_result->residual_vulnerability = $residual_vulnerability[$key];
              $bcp_result->residual_impact = $residual_impact[$key];
              $bcp_result->residual_probability = $residual_probability[$key];
              $bcp_result->notes = $notes[$key];

              $bcp_result->asset_codes = json_encode($asset_codes[$key]);
              $bcp_result->vulnerability_codes = json_encode($vulnerability_codes[$key]);

              $bcp_result->summary =  $summary[$key];
              $bcp_result->historical_evidence = $historical_evidence[$key];


              $bcp_result->created_by = Auth::id();
             }
  
            if($bcp_result->save()){
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
 
    public function show($bcpRegisterResult)
    {
        //
    }


    public function edit($bcpRegisterResult)
    {
        //
    }

 
    public function update(Request $request, $bcpRegisterResult)
    {
        //
    }

    public function destroy($bcpRegisterResult)
    {
        //
    }
}
