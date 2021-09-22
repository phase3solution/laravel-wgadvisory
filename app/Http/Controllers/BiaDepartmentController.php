<?php

namespace App\Http\Controllers;

use App\Models\BiaDepartment;
use App\Models\Bia;
use App\Models\Company;
use App\Models\BiaDepartmentResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BiaDepartmentController extends Controller
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

    public function questionnarieFormOne(Request $request){

        $query = BiaDepartmentResult::where('company_id', $request->company_id)
        ->where('bia_id', $request->bia_id)
        ->where('bia_department_id', $request->bia_department_id)
        ->first();

        if($query){
            $query->company_id = $request->company_id;
            $query->bia_id = $request->bia_id;
            $query->bia_department_id = $request->bia_department_id;
            $query->staff = $request->staff;
            $query->contact = $request->contact;
            $query->date = $request->date;
            $query->updated_by = Auth::id();

        }else{
            $query = new BiaDepartmentResult();
            $query->company_id = $request->company_id;
            $query->bia_id = $request->bia_id;
            $query->bia_department_id = $request->bia_department_id;
            $query->staff = $request->staff;
            $query->contact = $request->contact;
            $query->date = $request->date;
            $query->created_by = Auth::id();
        }


       

        if($query->save()){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }
    }

    public function questionnarieFormTwo(Request $request){

        $query = BiaDepartmentResult::where('company_id', $request->company_id)
        ->where('bia_id', $request->bia_id)
        ->where('bia_department_id', $request->bia_department_id)
        ->first();

        if($query){
            $query->company_id = $request->company_id;
            $query->bia_id = $request->bia_id;
            $query->bia_department_id = $request->bia_department_id;

            $query->high_level_description = $request->high_level_description;
            $query->updated_by = Auth::id();

        }else{
            $query = new BiaDepartmentResult();
            $query->company_id = $request->company_id;
            $query->bia_id = $request->bia_id;
            $query->bia_department_id = $request->bia_department_id;

            $query->high_level_description = $request->high_level_description;

            $query->created_by = Auth::id();
        }


       

        if($query->save()){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }

    }

    public function questionnarieFormFive(Request $request){

        $query = BiaDepartmentResult::where('company_id', $request->company_id)
        ->where('bia_id', $request->bia_id)
        ->where('bia_department_id', $request->bia_department_id)
        ->first();

        if($query){
            $query->company_id = $request->company_id;
            $query->bia_id = $request->bia_id;
            $query->bia_department_id = $request->bia_department_id;

            $query->explan_any_issue = $request->explan_any_issue;
            $query->updated_by = Auth::id();

        }else{
            $query = new BiaDepartmentResult();
            $query->company_id = $request->company_id;
            $query->bia_id = $request->bia_id;
            $query->bia_department_id = $request->bia_department_id;

            $query->explan_any_issue = $request->explan_any_issue;

            $query->created_by = Auth::id();
        }


       

        if($query->save()){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }

    }

    public function teamForm(Request $request){

        $query = BiaDepartmentResult::where('company_id', $request->company_id)
        ->where('bia_id', $request->bia_id)
        ->where('bia_department_id', $request->bia_department_id)
        ->first();

        if($query){
            $query->company_id = $request->company_id;
            $query->bia_id = $request->bia_id;
            $query->bia_department_id = $request->bia_department_id;

            $query->tap_service = $request->tap_service;
            $query->tap_prime = $request->tap_prime;
            $query->tap_prime_phone = $request->tap_prime_phone;
            $query->tap_primve_email = $request->tap_primve_email;
            $query->tap_secondary = $request->tap_secondary;
            $query->tap_secondary_phone = $request->tap_secondary_phone;
            $query->tap_secondary_email = $request->tap_secondary_email;
            $query->tap_service_impact = $request->tap_service_impact;
            $query->tap_day_1 = $request->tap_day_1;
            $query->tap_day_2 = $request->tap_day_2;


            $query->updated_by = Auth::id();

        }else{
            $query = new BiaDepartmentResult();
            $query->company_id = $request->company_id;
            $query->bia_id = $request->bia_id;
            $query->bia_department_id = $request->bia_department_id;

            $query->tap_service = $request->tap_service;
            $query->tap_prime = $request->tap_prime;
            $query->tap_prime_phone = $request->tap_prime_phone;
            $query->tap_primve_email = $request->tap_primve_email;
            $query->tap_secondary = $request->tap_secondary;
            $query->tap_secondary_phone = $request->tap_secondary_phone;
            $query->tap_secondary_email = $request->tap_secondary_email;
            $query->tap_service_impact = $request->tap_service_impact;
            $query->tap_day_1 = $request->tap_day_1;
            $query->tap_day_2 = $request->tap_day_2;

            $query->created_by = Auth::id();
        }


       

        if($query->save()){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }

    }

    public function roleFormTwo(Request $request){


        $query = BiaDepartmentResult::where('company_id', $request->company_id)
        ->where('bia_id', $request->bia_id)
        ->where('bia_department_id', $request->bia_department_id)
        ->first();

        if($query){
            $query->company_id = $request->company_id;
            $query->bia_id = $request->bia_id;
            $query->bia_department_id = $request->bia_department_id;

            $query->rac_notification_system = json_encode($request->rac_notification_system) ;
            $query->rac_notification_how_to_use = json_encode($request->rac_notification_how_to_use) ;
            $query->rac_notification_support_items = json_encode($request->rac_notification_support_items) ;
            $query->rac_notification_acces_list = json_encode($request->rac_notification_acces_list) ;
            $query->rac_internal_position = json_encode($request->rac_internal_position) ;
            $query->rac_internal_name = json_encode($request->rac_internal_name) ;
            $query->rac_internal_office_phone = json_encode($request->rac_internal_office_phone) ;
            $query->rac_internal_cell_phone = json_encode($request->rac_internal_cell_phone) ;
            $query->rac_internal_email = json_encode($request->rac_internal_email) ;
            $query->rac_external_vendor = json_encode($request->rac_external_vendor) ;
            $query->rac_external_contact = json_encode($request->rac_external_contact) ;
            $query->rac_external_phone = json_encode($request->rac_external_phone) ;
            $query->rac_external_email = json_encode($request->rac_external_email) ;
            $query->rac_external_comments = json_encode($request->rac_external_comments) ;


            $query->updated_by = Auth::id();

        }else{
            $query = new BiaDepartmentResult();
            $query->company_id = $request->company_id;
            $query->bia_id = $request->bia_id;
            $query->bia_department_id = $request->bia_department_id;

            $query->rac_notification_system = json_encode($request->rac_notification_system) ;
            $query->rac_notification_how_to_use = json_encode($request->rac_notification_how_to_use) ;
            $query->rac_notification_support_items = json_encode($request->rac_notification_support_items) ;
            $query->rac_notification_acces_list = json_encode($request->rac_notification_acces_list) ;
            $query->rac_internal_position = json_encode($request->rac_internal_position) ;
            $query->rac_internal_name = json_encode($request->rac_internal_name) ;
            $query->rac_internal_office_phone = json_encode($request->rac_internal_office_phone) ;
            $query->rac_internal_cell_phone = json_encode($request->rac_internal_cell_phone) ;
            $query->rac_internal_email = json_encode($request->rac_internal_email) ;
            $query->rac_external_vendor = json_encode($request->rac_external_vendor) ;
            $query->rac_external_contact = json_encode($request->rac_external_contact) ;
            $query->rac_external_phone = json_encode($request->rac_external_phone) ;
            $query->rac_external_email = json_encode($request->rac_external_email) ;
            $query->rac_external_comments = json_encode($request->rac_external_comments) ;

            $query->created_by = Auth::id();
        }


       

        if($query->save()){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }

    }

    public function serviceFormSix(Request $request){

        $query = BiaDepartmentResult::where('company_id', $request->company_id)
        ->where('bia_id', $request->bia_id)
        ->where('bia_department_id', $request->bia_department_id)
        ->first();

        if($query){
            $query->company_id = $request->company_id;
            $query->bia_id = $request->bia_id;
            $query->bia_department_id = $request->bia_department_id;

            $query->spe_vital_records_files = json_encode($request->spe_vital_records_files) ;
            $query->spe_vital_records_description = json_encode($request->spe_vital_records_description) ;
            $query->spe_vital_records_location = json_encode($request->spe_vital_records_location) ;
            $query->spe_vital_records_format = json_encode($request->spe_vital_records_format) ;
            $query->spe_vital_records_updated = json_encode($request->spe_vital_records_updated) ;

            $query->spe_technology_computers = json_encode($request->spe_technology_computers) ;
            $query->spe_technology_normal = json_encode($request->spe_technology_normal) ;
            $query->spe_technology_msl = json_encode($request->spe_technology_msl) ;
            $query->spe_technology_desktop_applications = json_encode($request->spe_technology_desktop_applications) ;
            $query->spe_technology_function = json_encode($request->spe_technology_function) ;
            $query->spe_technology_support_contact = json_encode($request->spe_technology_support_contact) ;
            $query->spe_technology_comments = json_encode($request->spe_technology_comments) ;
         


            $query->updated_by = Auth::id();

        }else{
            $query = new BiaDepartmentResult();
            $query->company_id = $request->company_id;
            $query->bia_id = $request->bia_id;
            $query->bia_department_id = $request->bia_department_id;

            $query->spe_vital_records_files = json_encode($request->spe_vital_records_files) ;
            $query->spe_vital_records_description = json_encode($request->spe_vital_records_description) ;
            $query->spe_vital_records_location = json_encode($request->spe_vital_records_location) ;
            $query->spe_vital_records_format = json_encode($request->spe_vital_records_format) ;
            $query->spe_vital_records_updated = json_encode($request->spe_vital_records_updated) ;

            $query->spe_technology_computers = json_encode($request->spe_technology_computers) ;
            $query->spe_technology_normal = json_encode($request->spe_technology_normal) ;
            $query->spe_technology_msl = json_encode($request->spe_technology_msl) ;
            $query->spe_technology_desktop_applications = json_encode($request->spe_technology_desktop_applications) ;
            $query->spe_technology_function = json_encode($request->spe_technology_function) ;
            $query->spe_technology_support_contact = json_encode($request->spe_technology_support_contact) ;
            $query->spe_technology_comments = json_encode($request->spe_technology_comments) ;

            $query->created_by = Auth::id();
        }


       

        if($query->save()){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }

    }


    public function biaDepartmentStore(Request $request){

        $name = $request->name;
        $description = $request->description;
        $gq_row_sp = $request->gq_row_sp;
        $gq_row_bl = $request->gq_row_bl;
        $se_row_vital_record = $request->se_row_vital_record;
        $se_row_technology_required = $request->se_row_technology_required;
        $se_row_notification_n_communication = $request->se_row_notification_n_communication;
        $se_row_department_contact_list = $request->se_row_department_contact_list;
        $se_row_external_contact_list = $request->se_row_external_contact_list;
        $se_row_other_internal_dependency = $request->se_row_other_internal_dependency;
        $cp_row_essential_personnel = $request->cp_row_essential_personnel;
        $tap_row_team_action_plan = $request->tap_row_team_action_plan;


        $nameU = $request->nameU;
        $descriptionU = $request->descriptionU;
        $gq_row_spU = $request->gq_row_spU;
        $gq_row_blU = $request->gq_row_blU;
        $se_row_vital_recordU = $request->se_row_vital_recordU;
        $se_row_technology_requiredU = $request->se_row_technology_requiredU;
        $se_row_notification_n_communicationU = $request->se_row_notification_n_communicationU;
        $se_row_department_contact_listU = $request->se_row_department_contact_listU;
        $se_row_external_contact_listU = $request->se_row_external_contact_listU;
        $se_row_other_internal_dependencyU = $request->se_row_other_internal_dependencyU;
        $cp_row_essential_personnelU = $request->cp_row_essential_personnelU;
        $tap_row_team_action_planU = $request->tap_row_team_action_planU;

        $saveCheck = false;
        if($name){
            foreach($name as $key=>$nam){
                $biaDepartment = new BiaDepartment();
                $biaDepartment->name = $nam;
                $biaDepartment->slug = Str::slug($nam, "-");
                $biaDepartment->description = $description[$key];

                $biaDepartment->gq_row_sp = $gq_row_sp[$key];
                $biaDepartment->gq_row_bl = $gq_row_bl[$key];
                $biaDepartment->se_row_vital_record = $se_row_vital_record[$key];
                $biaDepartment->se_row_technology_required = $se_row_technology_required[$key];
                $biaDepartment->se_row_notification_n_communication = $se_row_notification_n_communication[$key];
                $biaDepartment->se_row_department_contact_list = $se_row_department_contact_list[$key];
                $biaDepartment->se_row_external_contact_list = $se_row_external_contact_list[$key];
                $biaDepartment->se_row_other_internal_dependency = $se_row_other_internal_dependency[$key];
                $biaDepartment->cp_row_essential_personnel = $cp_row_essential_personnel[$key];
                $biaDepartment->tap_row_team_action_plan = $tap_row_team_action_plan[$key];








                $biaDepartment->company_id = $request->company_id;
                $biaDepartment->bia_id = $request->bia_id;
                $biaDepartment->created_by= Auth::id();
                if($biaDepartment->save()){
                    $saveCheck = true;
                }else{
                    $saveCheck = false;

                }
            }
        }


        if($nameU){
            foreach($nameU as $index=>$na){
                $biaDepartmen = BiaDepartment::find($index);
                $biaDepartmen->name = $na;
                $biaDepartmen->slug = Str::slug($na, "-");
                $biaDepartmen->description = $descriptionU[$index];

                $biaDepartmen->gq_row_sp = $gq_row_spU[$index];
                $biaDepartmen->gq_row_bl = $gq_row_blU[$index];
                $biaDepartmen->se_row_vital_record = $se_row_vital_recordU[$index];
                $biaDepartmen->se_row_technology_required = $se_row_technology_requiredU[$index];
                $biaDepartmen->se_row_notification_n_communication = $se_row_notification_n_communicationU[$index];
                $biaDepartmen->se_row_department_contact_list = $se_row_department_contact_listU[$index];
                $biaDepartmen->se_row_external_contact_list = $se_row_external_contact_listU[$index];
                $biaDepartmen->se_row_other_internal_dependency = $se_row_other_internal_dependencyU[$index];
                $biaDepartmen->cp_row_essential_personnel = $cp_row_essential_personnelU[$index];
                $biaDepartmen->tap_row_team_action_plan = $tap_row_team_action_planU[$index];




                $biaDepartmen->company_id = $request->company_id;
                $biaDepartmen->bia_id = $request->bia_id;
                $biaDepartmen->updated_by= Auth::id();
                if($biaDepartmen->save()){
                    $saveCheck = true;
                }else{
                    $saveCheck = false;
                }
            }
        }




        if($saveCheck){
            $data['status'] =true;
            $data['message'] = "Saved successfully!";
            return response()->json($data, 200);

        }else{

            $data['status'] =false;
            $data['message'] = "Server Error!";
            return response()->json($data, 500);

        }



    }


    public function addMoreBiaDepartment($rowId){
        $data['rowID'] = $rowId;
        return view('pages.assessment.bia.add_more_department', $data);
    }

    public function deleteBiaDepartment($id){
        $biaDepartment = BiaDepartment::find($id);

        if($biaDepartment){
            if($biaDepartment->delete()){
                $data['status'] = true;
                $data['message'] = "Department Deleted Successfully!";
                return response()->json($data, 200);
            }else{
                $data['status'] = false;
                $data['message'] = "Server Error!";
                return response()->json($data, 500);
            }

            

        }else{
            $data['status'] = false;
            $data['message'] = "Department Not Found";
            return response()->json($data, 404);
        }


    }

    public function show( $id)
    {
        //
    }

  
    public function edit( $id)
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
