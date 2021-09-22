<?php

namespace App\Http\Controllers;

use App\Models\AssessmentType;
use App\Models\AssessmentLabel;
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
        $data['assessmentTypes'] = AssessmentType::all();
        return view('pages.assessment_type.view', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.assessment_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $assessmentType = new AssessmentType();
            $assessmentType->name = $request->name;
            $assessmentType->slug = Str::slug($request->input('name'), "-");
            $assessmentType->description = $request->description;
            $assessmentType->created_by = Auth::id();

           if( $assessmentType->save()){
            return redirect()->route('assessmentType.index');
           }else{
            return redirect()->back();
           }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssessmentType  $assessmentType
     * @return \Illuminate\Http\Response
     */
    public function show(AssessmentType $assessmentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssessmentType  $assessmentType
     * @return \Illuminate\Http\Response
     */
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


        $labels = $request->labels;
        $validate=  Validator::make($request->all(),[
            'name'=>'required',
            'description'=> 'nullable',
            'status'=> 'nullable'
        ]);

        if($validate->fails()){
            return redirect()->back();
        }else{

            $assessmentType = AssessmentType::find($assessmentTypeId);

            if($assessmentType){
                $assessmentType->name = $request->name;
                $assessmentType->description = $request->description;
                // $assessmentType->updated_by = Auth::id();

               if( $assessmentType->save()){
                return redirect()->route('assessmentType.index');
               }else{
                return redirect()->back();
               }

            }else{
                return redirect()->back();
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssessmentType  $assessmentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssessmentType $assessmentType)
    {
        //
    }
}
