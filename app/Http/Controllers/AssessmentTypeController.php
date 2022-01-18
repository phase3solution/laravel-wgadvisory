<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\AssessmentType;
use App\Models\AssessmentLabel;
use App\Models\CompanyAssessmentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AssessmentTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    
    public function index()
    {
        $data['assessmentTypes'] = AssessmentType::orderBy('id', 'desc')->get();
        return view('pages.assessment_type.view', $data);
    }

  
    public function create()
    {
        return view('pages.assessment_type.create');
    }

  
    public function store(Request $request)
    {
        $validate=  Validator::make($request->all(),[
            'name'=>'required|unique:assessment_types',
            'description'=> 'nullable',
            'status'=> 'required'
        ]);

        if($validate->fails()){

            $data['status'] = false;
            $data['message'] = "Please enter all valid input.";
            $data['errors'] = $validate->errors();
            return response()->json($data, 400);

        }else{
            $assessmentType = new AssessmentType();
            $assessmentType->name = $request->name;
            $assessmentType->slug = Str::slug($request->input('name'), "-");
            $assessmentType->description = $request->description;
            $assessmentType->status = $request->status;

            $assessmentType->created_by = Auth::id();

           if( $assessmentType->save()){
                $data['status'] = true;
                $data['message'] = "Assessment type created successfully!";
                return response()->json($data, 200);
           }else{
                $data['status'] = false;
                $data['message'] = "Failed to create assessment type. Please try again.";
                return response()->json($data, 500);
           }

        }
    }

   
    public function show(AssessmentType $assessmentType)
    {
        //
    }

    
    public function edit($assessmentType)
    {
        $data['assessmentType'] = AssessmentType::find($assessmentType);
        if($data['assessmentType']){

            return view('pages.assessment_type.edit', $data);

        }else{
            return redirect()->back();
        }
    }


    public function update(Request $request, $assessmentTypeId)
    {

        $validate=  Validator::make($request->all(),[
            'name'=>'required|unique:assessment_types,name,'.$assessmentTypeId,
            'description'=> 'nullable',
            'status'=> 'required'
        ]);

        if($validate->fails()){
            $data['status'] = false;
            $data['message'] = "Please enter all valid input.";
            $data['errors'] = $validate->errors();
            return response()->json($data, 400);
        }else{

            $assessmentType = AssessmentType::find($assessmentTypeId);

            if($assessmentType){
                $assessmentType->name = $request->name;
                $assessmentType->description = $request->description;
                $assessmentType->status = $request->status;
                $assessmentType->updated_by = Auth::id();

               if( $assessmentType->save()){
                    $data['status'] = true;
                    $data['message'] = "Assessment type updated successfully!";
                    return response()->json($data, 200);
               }else{
                    $data['status'] = false;
                    $data['message'] = "Failed to update assessment type. Please try again.";
                    return response()->json($data, 500);
               }

            }else{
                $data['status'] = false;
                $data['message'] = "Assessment type not found!";
                return response()->json($data, 404);
            }

        }
    }

 
    public function destroy($id)
    {
        $assessmentType = AssessmentType::find($id);
        if ($assessmentType) {

            if($assessmentType->delete()){
                 CompanyAssessmentType::where('assessment_type_id', $id)->delete();
                 Assessment::where('assessment_type_id', $id)->delete();
                 AssessmentLabel::where('assessment_type_id', $id)->delete();

                $data['status'] = true;
                $data['message'] = "Assessment type deleted successfully!";
                return response()->json($data, 200);

            }else{

                $data['status'] = false;
                $data['message'] = "Server error!";
                $data['errors'] = "";
                return response()->json($data, 500);

            }
            
        } else {

            $data['status'] = false;
            $data['message'] = "Assessment type not found!";
            $data['errors'] = "";
            return response()->json($data, 404);
           
        }
        
    }




}
