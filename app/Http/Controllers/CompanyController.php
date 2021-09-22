<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\AssessmentType;
use App\Models\Company;
use App\Models\CompanyAssessmentType;
use App\Models\Role;
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
        ->get();

        // return response()->json($data,200);
        return view('pages.company.view', $data);
    }

    public function assignUserList(){

        $data['assign_users'] = UserCompany::with('company', 'user')->get();
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
                        $userCompany->updated_by = Auth::id();
                    }else{
                        $userCompany = new UserCompany();
                        $userCompany->user_id = $user_id;
                        $userCompany->company_id = $company_id;
                        $userCompany->created_by = Auth::id();
                    }

                    $userCompany->save();

                    return redirect()->back();

    }



    public function assignUserDelete($id){

        $userCompany = UserCompany::find($id);
        if($userCompany){
            $userCompany->delete();
        }

        return redirect()->back();

    }

    public function assignAssessmentList(){

        $data['assign_assessments'] = CompanyAssessmentType::with('company', 'assessment', 'assessmentType')->get();
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
                if($request->status){
                    $companyAssessment->status =  $request->status;
                }
                $companyAssessment->created_by = Auth::id();
            }

            $companyAssessment->save();
        }

        return redirect()->back();

    }

    public function assignAssessmentDelete($id){

        $assessmentCompany = CompanyAssessmentType::find($id);
        if($assessmentCompany){
            $assessmentCompany->delete();
        }

        return redirect()->back();

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
            'status'=> 'nullable'
        ]);

        if($validate->fails()){
            return redirect()->back();
        }else{
            $company = new Company();
            $company->name = $request->name;
            $company->slug = Str::slug($request->input('name'), "-");
            $company->description = $request->description;
            $company->dashboard_type = $request->dashboard_type;

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
            return redirect()->route('company.index');
           }else{
            return redirect()->back();
           }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($company)
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
            'status'=> 'nullable'
        ]);

        if($validate->fails()){
            return redirect()->back();
        }else{
            $company = Company::find($companyId);

            if($company){
                $company->name = $request->name;
                $company->description = $request->description;
                $company->dashboard_type = $request->dashboard_type;

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
                return redirect()->route('company.index');
               }else{
                return redirect()->back();
               }

            }else{
                return redirect()->back();
            }


        }
    }


    public function destroy($company)
    {
        //
    }
}
