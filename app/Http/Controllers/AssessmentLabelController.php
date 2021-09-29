<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\AssessmentLabel;
use Illuminate\Http\Request;
use App\Models\AssessmentType;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AssessmentLabelController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
  
    public function index()
    {
        $data['assessmentLabels'] = AssessmentLabel::with('assessmentType')->orderBy('id', 'desc')->get();
        return view('pages.assessment_label.index', $data);
    }


    public function create()
    {
        $data['assessmentTypes'] = AssessmentType::where('status', 1)->get();
        return view('pages.assessment_label.create', $data);
    }


    public function store(Request $request)
    {

        $validate=  Validator::make($request->all(),[
            'name'=>'required',
            'assessment_type_id'=> 'required',
            'description'=> 'nullable',
            'status'=> 'required'
        ]);

        if($validate->fails()){

            $data['status'] = false;
            $data['message'] = "Validation error!";
            $data['errors'] = "";
            return response()->json($data, 400);

        }else{


                $assessmentLabelId = AssessmentLabel::latest('id')->first();
                $assessmentLabel = new AssessmentLabel();
                $assessmentLabel->id = $assessmentLabelId->id+1;
                $assessmentLabel->assessment_type_id = $request->assessment_type_id;
                $assessmentLabel->name = $request->name;
                $assessmentLabel->slug = Str::slug($request->input('name'), "-");
                $assessmentLabel->description = $request->description;
                $assessmentLabel->status = $request->status;
                $assessmentLabel->created_by = Auth::id();

                if($assessmentLabel->save()){
                    $data['status'] = true;
                    $data['message'] = "Assessment label created successfully!";
                    return response()->json($data, 200);
                }else{
                    $data['status'] = false;
                    $data['message'] = "Server error!";
                    $data['errors'] = "";
                    return response()->json($data, 500);
                }
        }   




    }

    public function show(AssessmentLabel $assessmentLabel)
    {
        //
    }


    public function edit($assessmentLabelId)
    {
        $data['assessmentTypes'] = AssessmentType::all();
        $data['assessmentLabel'] = AssessmentLabel::find($assessmentLabelId);
        return view('pages.assessment_label.edit', $data);
    }


    public function update(Request $request,  $assessmentLabelId)
    {


        $validate=  Validator::make($request->all(),[
            'name'=>'required',
            'assessment_type_id'=> 'required',
            'description'=> 'nullable',
            'status'=> 'required'
        ]);

        if($validate->fails()){

            $data['status'] = false;
            $data['message'] = "Validation error!";
            $data['errors'] = "";
            return response()->json($data, 400);

        }else{




            $assessmentLabel = AssessmentLabel::find($assessmentLabelId);

            if($assessmentLabel){
                $assessmentLabel->assessment_type_id = $request->assessment_type_id;
                $assessmentLabel->name = $request->name;
                $assessmentLabel->description = $request->description;
                $assessmentLabel->status = $request->status;

                if($assessmentLabel->save()){

                    $data['status'] = true;
                    $data['message'] = "Assessment label updated successfully!";
                    return response()->json($data, 200);

                }else{
                    $data['status'] = false;
                    $data['message'] = "Server error!";
                    $data['errors'] = "";
                    return response()->json($data, 500);
                }
                
            }else{
                $data['status'] = false;
                $data['message'] = "Assessment label not found!";
                $data['errors'] = "";
                return response()->json($data, 404);
            }

        }


    }

    public function destroy($id)
    {
        $assessmentLabel = AssessmentLabel::find($id);
        if($assessmentLabel){
            if($assessmentLabel->delete()){

                Assessment::where('assessment_label_id', $id)->delete();

                $data['status'] = true;
                $data['message'] = "Assessment label deleted successfully!";
                return response()->json($data, 200);

            }else{

                $data['status'] = false;
                $data['message'] = "Server error!";
                $data['errors'] = "";
                return response()->json($data, 500);

            }

        }else{

            $data['status'] = false;
            $data['message'] = "Assessment label not found!";
            $data['errors'] = "";
            return response()->json($data, 404);

        }
    }
}
