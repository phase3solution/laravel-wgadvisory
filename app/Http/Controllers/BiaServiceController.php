<?php

namespace App\Http\Controllers;

use App\Models\BiaService;
use Illuminate\Http\Request;
use App\Models\BiaDepartment;
use App\Models\Bia;
use App\Models\Company;
use App\Models\BiaServiceResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BiaServiceController extends Controller
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
        //
    }

    public function questionnarieFormThree(Request $request){


        $company_id = $request->company_id;
        $bia_id = $request->bia_id;
        $key_purpose = $request->key_purpose;
        $critical_dates = $request->critical_dates;

        $checkSave = false;

        if($key_purpose){

            foreach( $key_purpose as $key=>$value ){

                $query = BiaServiceResult::where('company_id', $request->company_id)
                ->where('bia_id', $request->bia_id)
                ->where('bia_service_id', $key)
                ->first();
        
                if($query){
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->key_purpose = $value;
                    $query->critical_dates = $critical_dates[$key];

                    $query->updated_by = Auth::id();
        
                }else{
                    $query = new BiaServiceResult();
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->key_purpose = $value;
                    $query->critical_dates = $critical_dates[$key];
        
                    $query->created_by = Auth::id();
                }

                if($query->save()){
                    $checkSave = true;
                }else{
                    $checkSave = false;
                }



            }

        }


        if($checkSave){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }




    }

    public function questionnarieFormFour(Request $request){

        $company_id = $request->company_id;
        $bia_id = $request->bia_id;

        $activity = $request->activity;
        $responsibility = $request->responsibility;
        $estimate = $request->estimate;


        $checkSave = false;

        if($activity){

            foreach( $activity as $key=>$value ){

                $query = BiaServiceResult::where('company_id', $request->company_id)
                ->where('bia_id', $request->bia_id)
                ->where('bia_service_id', $key)
                ->first();
        
                if($query){
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->activity = $value;
                    $query->responsibility = $responsibility[$key];
                    $query->estimate = $estimate[$key];


                    $query->updated_by = Auth::id();
        
                }else{
                    $query = new BiaServiceResult();
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->activity = $value;
                    $query->responsibility = $responsibility[$key];
                    $query->estimate = $estimate[$key];
        
                    $query->created_by = Auth::id();
                }

                if($query->save()){
                    $checkSave = true;
                }else{
                    $checkSave = false;
                }



            }

        }


        if($checkSave){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }

        
    }



    public function roleFormOne(Request $request){
        $company_id = $request->company_id;
        $bia_id = $request->bia_id;

        $rac_perform = $request->rac_perform;
        $rac_cross_trained = $request->rac_cross_trained;
        $rac_comments = $request->rac_comments;


        $checkSave = false;

        if($rac_perform){

            foreach( $rac_perform as $key=>$value ){

                $query = BiaServiceResult::where('company_id', $request->company_id)
                ->where('bia_id', $request->bia_id)
                ->where('bia_service_id', $key)
                ->first();
        
                if($query){
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->rac_perform = $value;
                    $query->rac_cross_trained = $rac_cross_trained[$key];
                    $query->rac_comments = $rac_comments[$key];


                    $query->updated_by = Auth::id();
        
                }else{
                    $query = new BiaServiceResult();
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->rac_perform = $value;
                    $query->rac_cross_trained = $rac_cross_trained[$key];
                    $query->rac_comments = $rac_comments[$key];
        
                    $query->created_by = Auth::id();
                }

                if($query->save()){
                    $checkSave = true;
                }else{
                    $checkSave = false;
                }



            }

        }


        if($checkSave){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }

    }

    public function serviceFormNine(Request $request){

        $spe_internal_upstream_dependency = $request->spe_internal_upstream_dependency;
        $spe_internal_downstream_dependency = $request->spe_internal_downstream_dependency;
        $spe_internal_comments = $request->spe_internal_comments;


        $checkSave = false;

        if($spe_internal_upstream_dependency){

            foreach( $spe_internal_upstream_dependency as $key=>$value ){

                $query = BiaServiceResult::where('company_id', $request->company_id)
                ->where('bia_id', $request->bia_id)
                ->where('bia_service_id', $key)
                ->first();
        
                if($query){
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->spe_internal_upstream_dependency = $value;
                    $query->spe_internal_downstream_dependency = $spe_internal_downstream_dependency[$key];
                    $query->spe_internal_comments = $spe_internal_comments[$key];


                    $query->updated_by = Auth::id();
        
                }else{
                    $query = new BiaServiceResult();
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->spe_internal_upstream_dependency = $value;
                    $query->spe_internal_downstream_dependency = $spe_internal_downstream_dependency[$key];
                    $query->spe_internal_comments = $spe_internal_comments[$key];
        
                    $query->created_by = Auth::id();
                }

                if($query->save()){
                    $checkSave = true;
                }else{
                    $checkSave = false;
                }



            }

        }


        if($checkSave){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }

    }


    public function serviceFormTwo(Request $request){

    
        $spe_critical_impact_comments = $request->spe_critical_impact_comments;


        $checkSave = false;

        if($spe_critical_impact_comments){

            foreach( $spe_critical_impact_comments as $key=>$value ){

                $query = BiaServiceResult::where('company_id', $request->company_id)
                ->where('bia_id', $request->bia_id)
                ->where('bia_service_id', $key)
                ->first();
        
                if($query){
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->spe_critical_impact_comments = $value;
             


                    $query->updated_by = Auth::id();
        
                }else{
                    $query = new BiaServiceResult();
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->spe_critical_impact_comments = $value;
           
        
                    $query->created_by = Auth::id();
                }

                if($query->save()){
                    $checkSave = true;
                }else{
                    $checkSave = false;
                }



            }

        }


        if($checkSave){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }

    }

    public function serviceFormThree(Request $request){

        $spe_rpo = $request->spe_rpo;
        $spe_process_tomanually = $request->spe_process_tomanually;

        $checkSave = false;

        if($spe_rpo){

            foreach( $spe_rpo as $key=>$value ){

                $query = BiaServiceResult::where('company_id', $request->company_id)
                ->where('bia_id', $request->bia_id)
                ->where('bia_service_id', $key)
                ->first();
        
                if($query){
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->spe_rpo = $value;
                    $query->spe_process_tomanually = $spe_process_tomanually[$key];
             


                    $query->updated_by = Auth::id();
        
                }else{
                    $query = new BiaServiceResult();
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->spe_rpo = $value;
                    $query->spe_process_tomanually = $spe_process_tomanually[$key];
           
        
                    $query->created_by = Auth::id();
                }

                if($query->save()){
                    $checkSave = true;
                }else{
                    $checkSave = false;
                }



            }

        }


        if($checkSave){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }

    }

    public function serviceFormFive(Request $request){

        $spe_external_functions = $request->spe_external_functions;
        $spe_cloud_providers = $request->spe_cloud_providers;
        $spe_mobile_apps = $request->spe_mobile_apps;


        $checkSave = false;

        if($spe_external_functions){

            foreach( $spe_external_functions as $key=>$value ){

                $query = BiaServiceResult::where('company_id', $request->company_id)
                ->where('bia_id', $request->bia_id)
                ->where('bia_service_id', $key)
                ->first();
        
                if($query){
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->spe_external_functions = $value;
                    $query->spe_cloud_providers = json_encode($spe_cloud_providers[$key]) ;
                    $query->spe_mobile_apps = json_encode($spe_mobile_apps[$key]) ;

             


                    $query->updated_by = Auth::id();
        
                }else{
                    $query = new BiaServiceResult();
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->spe_external_functions = $value;
                    $query->spe_cloud_providers = json_encode($spe_cloud_providers[$key]) ;
                    $query->spe_mobile_apps = json_encode($spe_mobile_apps[$key]) ;

           
        
                    $query->created_by = Auth::id();
                }

                if($query->save()){
                    $checkSave = true;
                }else{
                    $checkSave = false;
                }



            }

        }


        if($checkSave){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }

    }


    public function serviceFormFourA(Request $request){

        $spe_comments = $request->spe_comments;
        $spe_desktop_applications = $request->spe_desktop_applications;
        $spe_upstream_dependencies = $request->spe_upstream_dependencies;


        $checkSave = false;

        if($spe_comments){

            foreach( $spe_comments as $key=>$value ){

                $query = BiaServiceResult::where('company_id', $request->company_id)
                ->where('bia_id', $request->bia_id)
                ->where('bia_service_id', $key)
                ->first();
        
                if($query){
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->spe_comments = $value;
                    $query->spe_desktop_applications = json_encode($spe_desktop_applications[$key]) ;
                    $query->spe_upstream_dependencies = json_encode($spe_upstream_dependencies[$key]) ;

             


                    $query->updated_by = Auth::id();
        
                }else{
                    $query = new BiaServiceResult();
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->spe_comments = $value;
                    $query->spe_desktop_applications = json_encode($spe_desktop_applications[$key]) ;
                    $query->spe_upstream_dependencies = json_encode($spe_upstream_dependencies[$key]) ;

           
        
                    $query->created_by = Auth::id();
                }

                if($query->save()){
                    $checkSave = true;
                }else{
                    $checkSave = false;
                }



            }

        }


        if($checkSave){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }

    }

    public function serviceFormFourB(Request $request){

        $spe_tier_1 = $request->spe_tier_1;
        $spe_tier_2 = $request->spe_tier_2;
        $spe_tier_3 = $request->spe_tier_3;
        $spe_tier_4 = $request->spe_tier_4;
        $spe_tier_5 = $request->spe_tier_5;


        $checkSave = false;

        if($spe_tier_1){

            foreach( $spe_tier_1 as $key=>$value ){

                $query = BiaServiceResult::where('company_id', $request->company_id)
                ->where('bia_id', $request->bia_id)
                ->where('bia_service_id', $key)
                ->first();
        
                if($query){
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->spe_tier_1 = json_encode($value);
                    $query->spe_tier_2 = json_encode($spe_tier_2[$key]) ;
                    $query->spe_tier_3 = json_encode($spe_tier_3[$key]) ;
                    $query->spe_tier_4 = json_encode($spe_tier_4[$key]) ;
                    $query->spe_tier_5 = json_encode($spe_tier_5[$key]) ;

             


                    $query->updated_by = Auth::id();
        
                }else{
                    $query = new BiaServiceResult();
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->spe_tier_1 = json_encode($value);
                    $query->spe_tier_2 = json_encode($spe_tier_2[$key]) ;
                    $query->spe_tier_3 = json_encode($spe_tier_3[$key]) ;
                    $query->spe_tier_4 = json_encode($spe_tier_4[$key]) ;
                    $query->spe_tier_5 = json_encode($spe_tier_5[$key]) ;

           
        
                    $query->created_by = Auth::id();
                }

                if($query->save()){
                    $checkSave = true;
                }else{
                    $checkSave = false;
                }



            }

        }


        if($checkSave){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }

    }


    public function serviceFormOne(Request $request){

        $spe_mto = $request->spe_mto;

        $criticality_level = $request->criticality_level;
        $criticality_rating = $request->criticality_rating;
        $calculated_rto = $request->calculated_rto;

        $spe_day_1 = $request->spe_day_1;
        $spe_day_3 = $request->spe_day_3;
        $spe_week_1 = $request->spe_week_1;
        $spe_week_2 = $request->spe_week_2;
        $spe_week_4 = $request->spe_week_4;
        $spe_weight = $request->spe_weight;


        $checkSave = false;

        if($spe_mto){

            foreach( $spe_mto as $key=>$value ){

                $query = BiaServiceResult::where('company_id', $request->company_id)
                ->where('bia_id', $request->bia_id)
                ->where('bia_service_id', $key)
                ->first();
        
                if($query){
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->spe_mto = $value;
                    $query->spe_day_1 = json_encode($spe_day_1[$key]) ;
                    $query->spe_day_3 = json_encode($spe_day_3[$key]) ;
                    $query->spe_week_1 = json_encode($spe_week_1[$key]) ;
                    $query->spe_week_2 = json_encode($spe_week_2[$key]) ;
                    $query->spe_week_4 = json_encode($spe_week_4[$key]) ;
                    $query->spe_weight = json_encode($spe_weight[$key]) ;

                    $query->criticality_level = $criticality_level[$key];
                    $query->criticality_rating = $criticality_rating[$key];
                    $query->calculated_rto = $calculated_rto[$key];


             


                    $query->updated_by = Auth::id();
        
                }else{
                    $query = new BiaServiceResult();
                    $query->company_id = $request->company_id;
                    $query->bia_id = $request->bia_id;
                    $query->bia_service_id = $key;
        
                    $query->spe_mto = $value;
                    $query->spe_day_1 = json_encode($spe_day_1[$key]) ;
                    $query->spe_day_3 = json_encode($spe_day_3[$key]) ;
                    $query->spe_week_1 = json_encode($spe_week_1[$key]) ;
                    $query->spe_week_2 = json_encode($spe_week_2[$key]) ;
                    $query->spe_week_4 = json_encode($spe_week_4[$key]) ;
                    $query->spe_weight = json_encode($spe_weight[$key]) ;

                    $query->criticality_level = $criticality_level[$key];
                    $query->criticality_rating = $criticality_rating[$key];
                    $query->calculated_rto = $calculated_rto[$key];

           
        
                    $query->created_by = Auth::id();
                }

                if($query->save()){
                    $checkSave = true;
                }else{
                    $checkSave = false;
                }



            }

        }


        if($checkSave){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }

    }



    public function biaServiceStore(Request $request){

        $company_id = $request->company_id;
        $bia_id = $request->bia_id;
        $bia_department_id = $request->bia_department_id;

        $name = $request->name;
        $description = $request->description;

        $financial = $request->financial;
        $impact = $request->impact;
        $criteria_weight = $request->criteria_weight;
        $impact_criteria_field = $request->impact_criteria_field;



       

        $nameU = $request->nameU;
        $descriptionU = $request->descriptionU;

        $financialU = $request->financialU;
        $impactU = $request->impactU;
        $criteria_weightU = $request->criteria_weightU;
        $impact_criteria_fieldU = $request->impact_criteria_fieldU;

        $saveCheck = false;

        if($name){
            foreach($name as $key=>$nam){
                $biaService = new BiaService();
                $biaService->company_id = $company_id;
                $biaService->bia_id = $bia_id;
                $biaService->bia_department_id = $bia_department_id;
                $biaService->name = $nam;
                $biaService->slug = Str::slug($nam, "-");
                $biaService->description = $description[$key];
                $biaService->impact_criteria_field = $impact_criteria_field[$key];

                $biaService->financial = json_encode($financial[$key]);
                $biaService->impact = json_encode($impact[$key]);
                $biaService->criteria_weight = json_encode($criteria_weight[$key]);


                $biaService->created_by= Auth::id();

                if($biaService->save()){
                    $saveCheck = true;
                }else{
                    $saveCheck = false;

                }

            }
        }


        if($nameU){

            foreach($nameU as $index=>$na){
                $biaServic = BiaService::find($index);
                $biaServic->company_id = $company_id;
                $biaServic->bia_id = $bia_id;
                $biaServic->bia_department_id = $bia_department_id;
                $biaServic->name = $na;
                $biaServic->slug = Str::slug($na, "-");
                $biaServic->description = $descriptionU[$index];

                $biaServic->financial = json_encode($financialU[$index]) ;
                $biaServic->impact = json_encode($impactU[$index]) ;
                $biaServic->criteria_weight = json_encode($criteria_weightU[$index]) ;
                $biaServic->impact_criteria_field =$impact_criteria_fieldU[$index] ;



                $biaServic->updated_by= Auth::id();

                if($biaServic->save()){
                    $saveCheck = true;
                }else{
                    $saveCheck = false;

                }

            }

        }





        if($saveCheck){
            $data['status'] =true;
            $data['message'] = "Updated successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }
    }


    public function addMoreBiaService($serviceRow, $departmentId){

        $data['departmentId'] = $departmentId;
        $data['serviceRow'] = $serviceRow;
        return view('pages.assessment.bia.add_more_service', $data);

    }


    public function show(BiaService $biaService)
    {
        //
    }


    public function edit(BiaService $biaService)
    {
        //
    }


    public function update(Request $request, BiaService $biaService)
    {
        //
    }


    public function deleteBiaServie($id){

        $biaService = BiaService::find($id);
        if($biaService){

            if($biaService->delete()){
                $data['status'] = true;
                $data['message'] = "Service Deleted Successfully!";
                return response()->json($data, 200);

            }else{

                $data['status'] = false;
                $data['message'] = "Server Error!";
                return response()->json($data, 200);

            }

        }else{
            $data['status'] = false;
            $data['message'] = "Service Not Found!";
            return response()->json($data, 404);
        }

    }


    public function destroy(BiaService $biaService)
    {
        //
    }
}
