<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\AssessmentLabel;
use App\Models\AssessmentType;
use App\Models\Company;
use App\Models\CompanyAssessmentType;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AssessmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index($typeId)
    {
        $data['assessments'] = Assessment::where('assessment_type_id', $typeId)->where('parent_id',0)->get();
        $data['assessmentType'] = AssessmentType::find($typeId);
        return view('pages.assessment.view', $data);
    }


    public function create($typeId)
    {
        $data['assessmentLabel'] =  AssessmentLabel::where('assessment_type_id', $typeId)->first();
        $data['assessmentType'] =  AssessmentType::where('id', $typeId)->first();
        $data['companies'] = Company::where('status',1)->get();
        return view('pages.assessment.store', $data);
        
    }

    public function findAssessment(Request $request){
        $data['assessments'] = Assessment::where('parent_id', $request->assessmentId)->get();
        return view('pages.assessment.dynamic_select_option', $data);
    }

    public function findAssessmentByType(Request $request){

        $assessments = Assessment::where('assessment_type_id', $request->id)->where('parent_id', 0)->get();
        
        if($assessments){
            $selectAssessment = '<option value="">Select Assessment</option>';
            foreach($assessments as $assessment){
                $selectAssessment .= '<option value="'.$assessment->id.'">'.$assessment->name.'</option>';
            }

            return  $selectAssessment;
        }else{
            $selectAssessment = '<option value="">NOT FOUND !</option>';
        }

    }


    public function editParent($assessmentId){
        $data['assessment'] =  Assessment::with('company')->where('id', $assessmentId)->first();
        $data['assessmentLabel'] =  AssessmentLabel::where('assessment_type_id', $data['assessment']->assessment_type_id)->first();
        $data['assessmentType'] =  AssessmentType::where('id', $data['assessment']->assessment_type_id)->first();
        $data['companies'] = Company::where('status',1)->get();
        $data['registers'] = Assessment::where('name', 'like', '%Register%')->get();
        // return response()->json($data, 200);
        return view('pages.assessment.edit_parent', $data);
    }

    public function updateParent(Request $request){
        $id = $request->id;
        if($id){
            $assessment = Assessment::find($id);

            if($assessment){

                if($request->company_id){

                    $companyAssessment = CompanyAssessmentType::where('assessment_type_id', $assessment->assessment_type_id)
                    ->where('assessment_id', $id)
                    ->first();

                    if($companyAssessment){
                        $companyAssessment->company_id = $request->company_id;
                        $companyAssessment->assessment_id = $id;
                        $companyAssessment->assessment_type_id =  $assessment->assessment_type_id;
                        $companyAssessment->updated_by = Auth::id();
                    }else{
                        $companyAssessment = new CompanyAssessmentType();
                        $companyAssessment->company_id = $request->company_id;
                        $companyAssessment->assessment_id = $id;
                        $companyAssessment->assessment_type_id =  $assessment->assessment_type_id;
                        $companyAssessment->created_by = Auth::id();
                    }

                    $companyAssessment->save();
                }


                $image=$request->file('image');
    
                if($image){
                    if($assessment->image){
                        unlink($assessment->image);
                    }
                    $image_name=Str::slug($request->input('name'), "-").Str::random(4);
                    $ext=strtolower($image->getClientOriginalExtension());
                    $image_full_name=$image_name.".".$ext;
                    $upload_path='assessmentLogo/';
                    $image_url=$upload_path.$image_full_name;
                    $success=$image->move($upload_path,$image_full_name);
                    if($success){
                        $assessment->image=$image_url;
                    }

                }

                if(isset($request->register_id)){
                    $assessment->register_id = $request->register_id;
                }

                $assessment->name = $request->name;
                $assessment->description = $request->description;
                $assessment->status = $request->status;
                if($assessment->save()){
                    return redirect()->route('assessmentList',$request->assessment_type_id);
                }else{
                    return redirect()->back();
                }
            }else{
                return redirect()->back();
            }


        }
    }


    public function deleteParent(Request $request, $assessmentId){



        $assessment =  Assessment::where('id', $assessmentId)->first();
        if($assessment){
           if($assessment->delete()){

                if($assessment->image){
                    unlink($assessment->image);
                }
               
                CompanyAssessmentType::where('assessment_id', $assessmentId)->delete();
                Assessment::where('base_id', $assessmentId)->delete();

                $data['status'] =true;
                $data['message'] = "Assessment deleted successfully";
                return response()->json($data,200);
           }else{
                $data['status'] =true;
                $data['message'] = "Server error";
                return response()->json($data,500);
           }
        }else{
            $data['status'] =true;
            $data['message'] = "Not found!";
            return response()->json($data,404);
        }


    }


    public function store(Request $request)
    {
        $validate=  Validator::make($request->all(),[
            'name'=>'required',
            'description'=> 'nullable',
            // 'status'=> 'nullable'
        ]);

        if($validate->fails()){

            $data['status'] = false;
            $data['message'] = "Validation error!";
            $data['errors'] = "";
            return response()->json($data, 400);

        }else{
            $assessmentType = new Assessment();
            $assessmentType->parent_id = $request->parent_id;
            $assessmentType->name = $request->name;
            $assessmentType->assessment_type_id = $request->assessment_type_id;
            $assessmentType->assessment_label_id = $request->assessment_label_id;
            $assessmentType->slug = Str::slug($request->input('name'), "-");
            $assessmentType->description = $request->description;
            // $assessmentType->status = $request->status;

            $assessmentType->created_by = Auth::id();

            $image=$request->file('image');
    
            if($image){
               
                $image_name=Str::slug($request->input('name'), "-").Str::random(4);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path='assessmentLogo/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                if($success){
                    $assessmentType->image=$image_url;
                }

            }


           if( $assessmentType->save()){
            // return redirect()->route('assessmentList',$request->assessment_type_id);
                $data['status'] = true;
                $data['message'] = "Assessment created successfully!";
                return response()->json($data, 200);
           }else{

                $data['status'] = false;
                $data['message'] = "Server error!";
                $data['errors'] = "";
                return response()->json($data, 500);

           }

        }
    }


    public function show(Assessment $assessment)
    {
        //
    }


    public function edit($assessmentId)
    {
        $assessment = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
            $query->with('assessmentLabel')->get();
        }))->where('id', $assessmentId)->first();
        
        $data['assessment'] = $assessment;
        $data['assessmentTypeForTitle'] = AssessmentType::find($assessment->assessment_type_id);

        return view('pages.assessment.edit', $data);
    }


    public function findTabContent(Request $request){

      
        $labelId = $request->labelId;
        $assessmentId = $request->assessmentId;
        $typeId = $request->typeId;

        $data['general'] = Assessment::find($assessmentId);
        $data['assessmentLabel'] = AssessmentLabel::find($labelId);
        $data['areas'] = Assessment::where('assessment_label_id', $labelId)->where('parent_id', $assessmentId)->get();
        

        
       if( $typeId == 1 ){
            // 1 MTA

            // 1 General 
            if($labelId == 1){

                $assessment = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                
                $data['assessment'] = $assessment;


               return view('pages.assessment.mta.general', $data);
           
            // 2 Area 
            }else if($labelId == 2){

                 $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('parent_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                return view('pages.assessment.mta.area', $data);

            // 3 Sections 
            }else if($labelId == 3){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',2)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                return view('pages.assessment.mta.sections', $data);

            // 4 Table 
            }else if($labelId == 4){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id', 3)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();


                return view('pages.assessment.mta.tables', $data);

            // 5 Questions
            }else if($labelId == 5){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id', 4)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                return view('pages.assessment.mta.questions', $data);

            }
       }else if($typeId == 9){
           // 9 BCP

            //35 General
            if($labelId == 35){

                $assessment = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                
                $data['assessment'] = $assessment;
                $data['label_id'] = 35;


               return view('pages.assessment.bcp.general', $data);

            //36 Threat Cats
            }else if($labelId == 36 ) {

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('parent_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 36;

                return view('pages.assessment.bcp.threat_cats', $data);

            //37 Threats
            }else if($labelId == 37 ) {

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',36 )->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                $data['label_id'] = 37;

                // return response()->json($data);
                return view('pages.assessment.bcp.threats', $data);

            //38 Question
            }else if($labelId == 38 ) {

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id', 37)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 38;


                return view('pages.assessment.bcp.questions', $data);

            //39 Threat Cat Question
            }else if($labelId == 39 ) {

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id', 38)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                $data['label_id'] = 39;

                return view('pages.assessment.bcp.threat_cat_questions', $data);

            }


       }else if($typeId == 24){
            // 24 BCP REGISTER

            //82 General
            if($labelId == 82){

                $assessment = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                
                $data['assessment'] = $assessment;


                return view('pages.assessment.bcp_register.general', $data);

            //83 Threat Cats
            }else if($labelId == 83 ) {

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('parent_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                return view('pages.assessment.bcp_register.threat_cats', $data);

            //84 Threats
            }else if($labelId == 84 ) {

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',2)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                return view('pages.assessment.bcp_register.threats', $data);

            //85 Question
            }else if($labelId == 85 ) {

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id', 3)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();


                return view('pages.assessment.bcp_register.questions', $data);

            //86 Threat Cat Question
            }else if($labelId == 86 ) {

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id', 4)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                return view('pages.assessment.bcp_register.threat_cat_questions', $data);

            }

       }else if($typeId == 10){
            // 1 Facility Risk

            // 1 General 
            if($labelId == 40){

                $assessment = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['assessment'] = $assessment;


               return view('pages.assessment.facility_risk.general', $data);
           
            // 41 Facilities 
            }else if($labelId == 41){

                 $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('parent_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                $data['label_id'] = 41;


                return view('pages.assessment.facility_risk.facilities', $data);

            // 42 Threat Cats 
            }else if($labelId == 42){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',41)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                $data['label_id'] = 42;

                return view('pages.assessment.facility_risk.threat_cats', $data);

            // 43 Statemets 
            }else if($labelId == 43){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id', 42)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 43;

                return view('pages.assessment.facility_risk.statements', $data);

            // 44 Statement Questions
            }else if($labelId == 44){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id', 43)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 44;
                return view('pages.assessment.facility_risk.statement_questions', $data);

            }
       }else if($typeId == 25){
            // 1 Facility Risk Register

            // 1 General 
            if($labelId == 87){

                $assessment = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                
                $data['assessment'] = $assessment;


            return view('pages.assessment.facility_risk_register.general', $data);
       
            // 41 Facilities 
            }else if($labelId == 88){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('parent_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                return view('pages.assessment.facility_risk_register.facilities', $data);

            // 42 Threat Cats 
            }else if($labelId == 89){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',2)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                return view('pages.assessment.facility_risk_register.threat_cats', $data);

            // 43 Statemets 
            }else if($labelId == 90){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id', 3)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();


                return view('pages.assessment.facility_risk_register.statements', $data);

            // 44 Statement Questions
            }else if($labelId == 91){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id', 4)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                return view('pages.assessment.facility_risk_register.statement_questions', $data);

            }
       }else if($typeId == 14){
             // 14 DRM

            // 60 General 
            if($labelId == 60){

                $assessment = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                
                $data['assessment'] = $assessment;

                $data['label_id'] = 60;
               return view('pages.assessment.drm.general', $data);
           
            // 61 Area 
            }else if($labelId == 61){

                 $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('parent_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                $data['label_id'] = 61;
                return view('pages.assessment.drm.area', $data);

            // 62 Sections 
            }else if($labelId == 62){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',61)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 62;

                return view('pages.assessment.drm.sections', $data);

            // 63 Table 
            }else if($labelId == 63){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id', 62)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 63;

                return view('pages.assessment.drm.tables', $data);

            // 64 Questions
            }else if($labelId == 64){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id', 63)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 64;

                return view('pages.assessment.drm.questions', $data);

            }
       }else if($typeId == 15){
            // 15 DRM Register

            // 65 General 
            if($labelId == 65){

                $assessment = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                
                $data['assessment'] = $assessment;

                $data['label_id'] = 65;
                return view('pages.assessment.drm.general', $data);
            
            // 66 Area 
            }else if($labelId == 66){

                    $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('parent_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                $data['label_id'] = 66;
                return view('pages.assessment.drm.area', $data);

            // 67 Threat 
            }else if($labelId == 67){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',66)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 67;

                return view('pages.assessment.drm.sections', $data);
            }
       }else if($typeId == 13){
        // 13 Cubersecuirty Maturity

        // 55 General 
        if($labelId == 55){

            $assessment = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('id', $assessmentId)->first();
            
            $data['assessment'] = $assessment;

            $data['label_id'] = 55;
            return view('pages.assessment.cybersecurity_maturity.general', $data);
        
        }

        // 56 Function 
        else if($labelId == 56){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('parent_id', $assessmentId)->get();

            $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('id', $assessmentId)->first();

            $data['label_id'] = 56;
            return view('pages.assessment.cybersecurity_maturity.function', $data);

        
        }

        // 57 Categories 
        else if($labelId == 57){

            $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('assessment_label_id',56)->where('base_id', $assessmentId)->get();

            $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('id', $assessmentId)->first();
            $data['label_id'] = 57;

            return view('pages.assessment.cybersecurity_maturity.categories', $data);
        }

         // 58 Categories Statements 
        else if($labelId == 58){

            $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('assessment_label_id',57)->where('base_id', $assessmentId)->get();

            $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('id', $assessmentId)->first();
            $data['label_id'] = 58;

            return view('pages.assessment.cybersecurity_maturity.categories_statements', $data);
        }

         // 59 Questions
        else if($labelId == 59){

            $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('assessment_label_id',58)->where('base_id', $assessmentId)->get();

            $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('id', $assessmentId)->first();
            $data['label_id'] = 59;

            return view('pages.assessment.cybersecurity_maturity.questions', $data);
        }


       }else if($typeId == 26){
            // 26 Cubersecuirty Maturity Register

            // 92 General 
            if($labelId == 92){

                $assessment = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                
                $data['assessment'] = $assessment;

                $data['label_id'] = 92;
                return view('pages.assessment.cybersecurity_maturity_register.general', $data);
            
            }

            // 93 Function 
            else if($labelId == 93){

                    $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('parent_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                $data['label_id'] = 93;
                return view('pages.assessment.cybersecurity_maturity_register.function', $data);

            
            }

            // 94 Categories 
            else if($labelId == 94){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',93)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 94;

                return view('pages.assessment.cybersecurity_maturity_register.categories', $data);
            }

            // 95 Categories Statements 
            else if($labelId == 95){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',94)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 95;

                return view('pages.assessment.cybersecurity_maturity_register.categories_statements', $data);
            }

            // 96 Questions
            else if($labelId == 96){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',95)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 96;

                return view('pages.assessment.cybersecurity_maturity_register.questions', $data);
            }


       }else if($typeId == 6){
            // 6 Cloud Readiness

            // 23 General 
            if($labelId == 23){

                $assessment = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                
                $data['assessment'] = $assessment;

                $data['label_id'] = 23;
                return view('pages.assessment.cloud_readiness.general', $data);
            
            }

            // 24 Area 
            else if($labelId == 24){

                    $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('parent_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                $data['label_id'] = 24;
                return view('pages.assessment.cloud_readiness.area', $data);

            
            }

            // 25 Sections 
            else if($labelId == 25){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',24)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 25;

                return view('pages.assessment.cloud_readiness.section', $data);
            }

            // 26 Tables
            else if($labelId == 26){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',25)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 26;

                return view('pages.assessment.cloud_readiness.table', $data);
            }

            // 27 Questions
            else if($labelId == 27){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',26)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 27;

                return view('pages.assessment.cloud_readiness.question', $data);
            }


       }else if($typeId == 5){
            // 5 IT Management

            // 18 General 
            if($labelId == 18){

                $assessment = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                
                $data['assessment'] = $assessment;

                $data['label_id'] = 18;
                return view('pages.assessment.it_management.general', $data);
            
            }

            // 19 Area 
            else if($labelId == 19){

                    $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('parent_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();

                $data['label_id'] = 19;
                return view('pages.assessment.it_management.area', $data);

            
            }

            // 20 Sections 
            else if($labelId == 20){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',19)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 20;

                return view('pages.assessment.it_management.section', $data);
            }

            // 21 Tables
            else if($labelId == 21){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',20)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 21;

                return view('pages.assessment.it_management.table', $data);
            }

            // 22 Questions
            else if($labelId == 22){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('assessment_label_id',21)->where('base_id', $assessmentId)->get();

                $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                    $query->with('assessmentLabel')->get();
                }))->where('id', $assessmentId)->first();
                $data['label_id'] = 22;

                return view('pages.assessment.it_management.question', $data);
            }


       }else if($typeId == 21){
        // 21 SFIA

        // 97 General 
        if($labelId == 97){

            $assessment = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('id', $assessmentId)->first();
            
            $data['assessment'] = $assessment;

            $data['label_id'] = 97;
            return view('pages.assessment.sfia.general', $data);
        
        }

        // 98 Categories 
        else if($labelId == 98){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('parent_id', $assessmentId)->get();

            $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('id', $assessmentId)->first();

            $data['label_id'] = 98;
            return view('pages.assessment.sfia.categories', $data);

        
        }

        // 99 Sub-Categories 
        else if($labelId == 99){

            $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('assessment_label_id',98)->where('base_id', $assessmentId)->get();

            $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('id', $assessmentId)->first();
            $data['label_id'] = 99;

            return view('pages.assessment.sfia.sub_categories', $data);
        }

        // 100 Skills
        else if($labelId == 100){

            $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('assessment_label_id',99)->where('base_id', $assessmentId)->get();

            $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('id', $assessmentId)->first();
            $data['label_id'] = 100;

            return view('pages.assessment.sfia.skills', $data);
        }


       }else if($typeId == 7){
        // 7 BIA

        // 28 General 
        if($labelId == 28){

            $assessment = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('id', $assessmentId)->first();
            
            $data['assessment'] = $assessment;

            $data['label_id'] = 28;
            return view('pages.assessment.bia.general', $data);
        
        }

        // 29 Departments 
        else if($labelId == 29){

                $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('parent_id', $assessmentId)->get();

            $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('id', $assessmentId)->first();

            $data['label_id'] = 29;
            return view('pages.assessment.bia.department', $data);

        
        }

        // 30 Services
        else if($labelId == 30){

            $data['assessments'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('assessment_label_id',29)->where('base_id', $assessmentId)->get();

            $data['assessment'] = Assessment::with('children', 'assessmentLabel')->with(array('assessmentType'=>function($query){
                $query->with('assessmentLabel')->get();
            }))->where('id', $assessmentId)->first();
            $data['label_id'] = 30;

            return view('pages.assessment.bia.services', $data);
        }



        }else{
            return view('pages.assessment.under_construction');
        }


            
    }

        public function update(Request $request)
        {


            $checkSave = false;

            if($request->name){
                foreach($request->name as $key=>$nameItem){
                    $assessmentType = Assessment::find($key);
                    $assessmentType->name = $nameItem;
                    $assessmentType->assessment_label_id = $request->assessment_label_id;
                    $assessmentType->description = $request->description[$key]; 
                    $assessmentType->updated_by = Auth::id();
                    if($assessmentType->save()){
                        $checkSave = true;
                    }else{
                        $checkSave = false;
                    }
                }
            }


            if($request->nameInput){
                foreach($request->nameInput as $index=>$name){
                    $assessmentType = new Assessment();
                    $assessmentType->parent_id = $request->parent_id;
                    $assessmentType->base_id = $request->base_id;
                    $assessmentType->name = $name;
                    $assessmentType->assessment_type_id = $request->assessment_type_id;
                    $assessmentType->assessment_label_id = $request->assessment_label_id;
                    $assessmentType->slug = Str::slug($name, "-");
                    $assessmentType->description = $request->descriptionInput[$index];
                    $assessmentType->created_by = Auth::id();
                    if($assessmentType->save()){
                        $checkSave = true;
                    }else{
                        $checkSave = false;
                    }
                }
            }

            if($checkSave){
                $data['status'] = true;
                $data['message'] = "Data saved succeffully !";
                return response()->json($data,200);
            }else{
                $data['status'] = false;
                $data['message'] = "Data saved failed !";
                return response()->json($data,500);
            }
            
            
        }


        public function destroy($assessmentId)
        {
            $assessment =  Assessment::where('id', $assessmentId)->first();
            if($assessment){
                $assessment->delete();
                $data['status'] =true;
                $data['message'] = "Deleted Successfully";
            }else{
                $data['status'] =false;
                $data['message'] = "Data not found !";
            }

            return response()->json($data,200);
        }

        public function deleteAssessment(Request $request){
            $assessmentId = $request->id;
            $assessment =  Assessment::where('id', $assessmentId)->first();
            if($assessment){
                $assessment->delete();
                $data['status'] =true;
                $data['message'] = "Deleted Successfully";
                return response()->json($data,200);
            }else{
                $data['status'] =false;
                $data['message'] = "Data not found !";
                return response()->json($data,500);
            }

            
        }
}
