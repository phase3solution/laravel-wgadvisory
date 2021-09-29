<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\AssessmentType;
use App\Models\Bia;
use App\Models\Company;
use App\Models\CompanyAssessmentType;
use App\Models\Role;
use App\Models\Sfia;
use App\Models\User;
use App\Models\UserCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
   
    public function index()
    {
        $data['companies'] = Company::with(array('companyAsessmentType'=>function($q1){
            $q1->with('assessment', 'assessmentType')->get();
        }))
        ->with(array('userCompany'=>function($q2){
            $q2->with('user')->get();
        }))
        ->orderBy('id', 'desc')
        ->get();

        return view('pages.company.view', $data);
    }

    public function assignUserList(){

        $data['assign_users'] = UserCompany::with('company', 'user')->orderBy('id','desc')->get();
        $data['companies'] = Company::all();
        $data['users'] = User::all();
        return view('pages.company.assign_user', $data);

    }

    public function assignUserInsert(Request $request){

        $user_id = $request->user_id;
        $company_id = $request->company_id;
        $userCompany = UserCompany::where('user_id', $user_id)->first();

                    if($userCompany){
                        $userCompany->user_id = $user_id;
                        $userCompany->company_id = $company_id;
                        $userCompany->status = $request->status;
                        $userCompany->updated_by = Auth::id();
                    }else{

                        $userCompany = new UserCompany();
                        $userCompany->user_id = $user_id;
                        $userCompany->company_id = $company_id;
                        $userCompany->status = $request->status;

                        $userCompany->created_by = Auth::id();
                    }

                   if($userCompany->save()){

                        $data['status'] = true;
                        $data['message'] = "User assigned to the selected company successfully!";
                        return response()->json($data, 200);
                       
                   }else{

                        $data['status'] = false;
                        $data['message'] = "Server error!";
                        $data['errors'] = "";
                        return response()->json($data, 500);

                   }


    }



    public function assignUserDelete(Request $request, $id){

        $userCompany = UserCompany::find($id);
        if($userCompany){

            if($userCompany->delete()){

                $data['status'] = true;
                $data['message'] = "Assigned company user deleted successfully!";
                return response()->json($data, 200);

            }else{

                $data['status'] = false;
                $data['message'] = "Server error!";
                $data['errors'] = '';
                return response()->json($data, 500);

            }
            

        }else{

            $data['status'] = false;
            $data['message'] = "The given id not found !";
            $data['errors'] = '';
            return response()->json($data, 404);


        }


    }

    public function assignAssessmentList(){

        $data['assign_assessments'] = CompanyAssessmentType::with('company', 'assessment', 'assessmentType')->orderBy('updated_at', 'desc')->get();
        $data['companies'] = Company::all();
        $data['assessmentTypes'] = AssessmentType::all();
        $data['assessments'] = Assessment::where('parent_id', 0)->get();
        return view('pages.company.assign_assessment', $data);
    }

    public function assignAssessmentInsert( Request $request ){

        if($request->company_id){

            $companyAssessment = CompanyAssessmentType::where('assessment_type_id', $request->type_id)
            ->where('assessment_id', $request->assessment_id)
            ->first();

            if($companyAssessment){
                $companyAssessment->company_id = $request->company_id;
                $companyAssessment->assessment_id = $request->assessment_id;
                $companyAssessment->assessment_type_id =  $request->type_id;
                $companyAssessment->status = $request->status;
                $companyAssessment->updated_by = Auth::id();
            }else{
                $companyAssessment = new CompanyAssessmentType();
                $companyAssessment->company_id = $request->company_id;
                $companyAssessment->assessment_id = $request->assessment_id;
                $companyAssessment->assessment_type_id =  $request->type_id;
                $companyAssessment->status =  $request->status;

               
                $companyAssessment->created_by = Auth::id();
            }

            if($companyAssessment->save()){

                $data['status'] = true;
                $data['message'] = "Company assissment assigned successfully !";
                return response()->json($data, 200);

                

            }else{

                $data['status'] = false;
                $data['message'] = "Server error !";
                $data['errors'] = '';
                return response()->json($data, 500);

            }

            
        }else{

            $data['status'] = false;
            $data['message'] = "The given id not found !";
            $data['errors'] = '';
            return response()->json($data, 404);

        }


    }

    public function assignAssessmentDelete($id){

        $assessmentCompany = CompanyAssessmentType::find($id);
        if($assessmentCompany){
            if($assessmentCompany->delete()){
                $data['status'] = true;
                $data['message'] = "Company assissment deleted successfully !";
                return response()->json($data, 200);
            }else{
                $data['status'] = false;
                $data['message'] = "Server error !";
                return response()->json($data, 500);
            }
        }else{
            $data['status'] = false;
            $data['message'] = "The given id not found !";
            return response()->json($data, 404);
        }


    }

 
    public function create()
    {
        return view('pages.company.create');
    }

   
    public function store(Request $request)
    {
        $validate=  Validator::make($request->all(),[
            'name'=>'required',
            'description'=> 'nullable',
            'status'=> 'required'
        ]);

        if($validate->fails()){

            $data['status'] = false;
            $data['message'] = "Validation error!";
            $data['errors'] = "";
            return response()->json($data, 400);

        }else{

            $company = new Company();
            $company->name = $request->name;
            $company->slug = Str::slug($request->input('name'), "-");
            $company->description = $request->description;
            $company->dashboard_type = $request->dashboard_type;
            $company->status = $request->status;


            $image=$request->file('image');
    
            if($image){
                $image_name= Str::slug($request->input('name'), "-").Str::random(4);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path='companyImg/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                if($success){
                    $company->image=$image_url;
              
                }
            }

           if( $company->save()){

                $data['status'] = true;
                $data['message'] = "Company created successfully!";
                return response()->json($data, 200);

           }else{

            $data['status'] = false;
            $data['message'] = "Server error!";
            $data['errors'] = "";
            return response()->json($data, 500);

           }

        }
    }

  
    public function show($id)
    {
        //
    }

 
    public function edit($company)
    {
        $data['company'] = Company::find($company);

        if($data['company']){
            return view('pages.company.edit', $data);
        }else{
            return redirect()->back();
        }
    }

    public function update(Request $request, $companyId)
    {
        $validate=  Validator::make($request->all(),[
            'name'=>'required',
            'description'=> 'nullable',
            'status'=> 'required'
        ]);

        if($validate->fails()){


            $data['status'] = false;
            $data['message'] = "Validation error!";
            $data['errors'] = "";
            return response()->json($data, 400);


        }else{
            $company = Company::find($companyId);

            if($company){

                $company->name = $request->name;
                $company->description = $request->description;
                $company->dashboard_type = $request->dashboard_type;
                $company->status = $request->status;


                $image=$request->file('image');
    
                if($image){
                    if($company->image){
                        unlink($company->image);
                    }
                    $image_name= Str::slug($request->input('name'), "-").Str::random(4);
                    $ext=strtolower($image->getClientOriginalExtension());
                    $image_full_name=$image_name.".".$ext;
                    $upload_path='companyImg/';
                    $image_url=$upload_path.$image_full_name;
                    $success=$image->move($upload_path,$image_full_name);
                    if($success){
                        $company->image=$image_url;
                    }
                }

               if( $company->save()){

                    $data['status'] = true;
                    $data['message'] = "Company updated successfully!";
                    return response()->json($data, 200);

               }else{

                    $data['status'] = false;
                    $data['message'] = "Server error!";
                    $data['errors'] = "";
                    return response()->json($data, 500);

               }

            }else{
                $data['status'] = false;
                $data['message'] = "Company not found!";
                $data['errors'] = "";
                return response()->json($data, 404);
            }


        }
    }


    public function destroy($id)
    {
        $company = Company::find($id);
        if($company){

            if($company->delete()){

                CompanyAssessmentType::where('company_id', $id)->delete();
                UserCompany::where('company_id', $id)->delete();
                Bia::where('company_id', $id)->delete();
                Sfia::where('company_id', $id)->delete();

                $data['status'] = true;
                $data['message'] = "Company deleted successfully!";
                return response()->json($data, 200);

            }else{

                $data['status'] = false;
                $data['message'] = "Server error!";
                return response()->json($data, 500);

            }

            

        }else{

            $data['status'] = false;
            $data['message'] = "Company not found!";
            $data['errors'] = "";
            return response()->json($data, 404);

        }
    }
}
