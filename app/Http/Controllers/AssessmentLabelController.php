<?php

namespace App\Http\Controllers;

use App\Models\AssessmentLabel;
use Illuminate\Http\Request;
use App\Models\AssessmentType;

use Illuminate\Support\Str;

class AssessmentLabelController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
  
    public function index()
    {
        $data['assessmentLabels'] = AssessmentLabel::with('assessmentType')->get();
        return view('pages.assessment_label.index', $data);
    }


    public function create()
    {
        $data['assessmentTypes'] = AssessmentType::all();
        return view('pages.assessment_label.create', $data);
    }


    public function store(Request $request)
    {
        $assessmentLabelId = AssessmentLabel::latest('id')->first();
        $assessmentLabel = new AssessmentLabel();
        $assessmentLabel->id = $assessmentLabelId->id+1;
        $assessmentLabel->assessment_type_id = $request->assessment_type_id;
        $assessmentLabel->name = $request->name;
        $assessmentLabel->slug = Str::slug($request->input('name'), "-");
        $assessmentLabel->description = $request->description;
        if($assessmentLabel->save()){
            return redirect()->route('assessmentLabel.index');
        }else{
            return redirect()->back();
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
        $assessmentLabel = AssessmentLabel::find($assessmentLabelId);

        if($assessmentLabel){
            $assessmentLabel->assessment_type_id = $request->assessment_type_id;
            $assessmentLabel->name = $request->name;
            $assessmentLabel->description = $request->description;
            if($assessmentLabel->save()){
                return redirect()->route('assessmentLabel.index');
            }else{
                return redirect()->back();
            }
            
        }else{
            return redirect()->back();
        }
    }

    public function destroy(AssessmentLabel $assessmentLabel)
    {
        //
    }
}
