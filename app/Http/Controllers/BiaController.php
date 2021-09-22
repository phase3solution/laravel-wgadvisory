<?php

namespace App\Http\Controllers;

use App\Models\Bia;
use App\Models\BiaDepartment;
use App\Models\Company;
use App\Models\BiaDepartmentResult;
use App\Models\BiaServiceResult;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class BiaController extends Controller
{
    
    public function index()
    {
        $data['bias'] = Bia::with('company')->get();
        return view('pages.assessment.bia.index', $data);
    }

    public function biaDepartmentAssessment($id){

        $data['department'] = BiaDepartment::with('bia', 'biaDepartmentResult')
        ->with(array('biaService'=>function($q1){
            $q1->with('biaServiceResult')->get();
        }))
        
        ->where('id', $id)->first();

        return view('frontend.pages.bia.department', $data);

    }

    public function biaServiceAssessment($id){

        $data['department'] = BiaDepartment::with('bia', 'biaDepartmentResult')
        ->with(array('biaService'=>function($q1){
            $q1->with('biaServiceResult')->get();
        }))
        
        ->where('id', $id)->first();

        return view('frontend.pages.bia.service',$data);

    }

    public function biaRolesAssessment($id){

        $data['department'] = BiaDepartment::with('bia', 'biaDepartmentResult')
        ->with(array('biaService'=>function($q1){
            $q1->with('biaServiceResult')->get();
        }))
        
        ->where('id', $id)->first();

        return view('frontend.pages.bia.roles', $data);
    }

    public function biaTeamAssessment($id){

        $data['department'] = BiaDepartment::with('bia', 'biaDepartmentResult')
        ->with(array('biaService'=>function($q1){
            $q1->with('biaServiceResult')->get();
        }))
        
        ->where('id', $id)->first();
        return view('frontend.pages.bia.team', $data);

    }



    public function biaDepartmentAssessmentView($id){

        $data['department'] = BiaDepartment::with('bia', 'biaDepartmentResult')
        ->with(array('biaService'=>function($q1){
            $q1->with('biaServiceResult')->get();
        }))
        
        ->where('id', $id)->first();

        return view('frontend.pages.bia.view.department', $data);

    }

    public function biaServiceAssessmentView($id){

        $data['department'] = BiaDepartment::with('bia', 'biaDepartmentResult')
        ->with(array('biaService'=>function($q1){
            $q1->with('biaServiceResult')->get();
        }))
        
        ->where('id', $id)->first();

        return view('frontend.pages.bia.view.service',$data);

    }

    public function biaRolesAssessmentView($id){

        $data['department'] = BiaDepartment::with('bia', 'biaDepartmentResult')
        ->with(array('biaService'=>function($q1){
            $q1->with('biaServiceResult')->get();
        }))
        
        ->where('id', $id)->first();

        return view('frontend.pages.bia.view.roles', $data);
    }

    public function biaTeamAssessmentView($id){

        $data['department'] = BiaDepartment::with('bia', 'biaDepartmentResult')
        ->with(array('biaService'=>function($q1){
            $q1->with('biaServiceResult')->get();
        }))
        
        ->where('id', $id)->first();
        return view('frontend.pages.bia.view.team', $data);

    }

  
    public function create()
    {

        $data['companies'] = Company::all();
       return view('pages.assessment.bia.create', $data);
    }

 
    public function store(Request $request)
    {
        $bia = new Bia();
        $bia->name = $request->name;
        $bia->slug = Str::slug($request->input('name'), "-");
        $bia->description = $request->description;
        $bia->company_id = $request->company_id;
        $bia->created_by= Auth::id();



            $image=$request->file('image');
    
                if($image){
                    $image_name=Str::slug($request->input('name'), "-").Str::random(4);
                    $ext=strtolower($image->getClientOriginalExtension());
                    $image_full_name=$image_name.".".$ext;
                    $upload_path='assessmentLogo/';
                    $image_url=$upload_path.$image_full_name;
                    $success=$image->move($upload_path,$image_full_name);
                    if($success){
                        $bia->image=$image_url;
                    }

                }

        if($bia->save()){
            return redirect()->route('bia.index');
        }else{
            return redirect()->back();
        }

    }

 
    public function show( $bia)
    {
        //
    }

    public function edit($id)
    {
        $bia = Bia::where('id',$id)->first();
        if($bia){
            $data['bia'] = $bia;
            $data['companies'] = Company::all();
            return view('pages.assessment.bia.edit', $data);
        }else{
            return redirect()->back();
        }
    }

    public function editBia($id)
    {
        $data['bia'] = Bia::with('company')
        ->with(array('biaDepartment'=>function($q1){
            $q1->with('biaService')->get();
        }))
        ->where('id', $id)->first();

        // return response()->json($data, 200);
        return view('pages.assessment.bia.bia_edit', $data);

    }


    public function update(Request $request, $id)
    {
        $bia =  Bia::find($id);

        if($bia){

            $bia->name = $request->name;
            $bia->slug = Str::slug($request->input('name'), "-");
            $bia->description = $request->description;
            $bia->company_id = $request->company_id;
            $bia->updated_by= Auth::id();



            $image=$request->file('image');
    
                if($image){

                    if($bia->image){
                        unlink($bia->image);
                    }

                    $image_name=Str::slug($request->input('name'), "-").Str::random(4);
                    $ext=strtolower($image->getClientOriginalExtension());
                    $image_full_name=$image_name.".".$ext;
                    $upload_path='assessmentLogo/';
                    $image_url=$upload_path.$image_full_name;
                    $success=$image->move($upload_path,$image_full_name);
                    if($success){
                        $bia->image=$image_url;
                    }

                }

            if($bia->save()){

                $data['status'] =true;
                $data['message'] = "Update Successfully!";
                return response()->json($data, 200);
                // return redirect()->route('bia.index');
            }else{
                $data['status'] =false;
                $data['message'] = "Server Error!";
                return response()->json($data, 500);
                // return redirect()->back();
            }

        }else{
            $data['status'] =false;
            $data['message'] = "Data not found!";
            return response()->json($data, 404);
            // return redirect()->back();
        }


        
    }

    public function biaReset($id){

        $biaService = BiaServiceResult::where('bia_id', $id)->delete();
        $biaDepartmemt = BiaDepartmentResult::where('bia_id', $id)->delete();

        $data['status'] =true;
        $data['message'] = "Reset Successfully!";
        return response()->json($data, 200);
    }

    public function biaPublish($id){

        $bia = Bia::find($id);
        if($bia){
            $bia->status = 5;
            $bia->save();

            $data['status'] =true;
            $data['message'] = "Publish Successfully!";
            return response()->json($data, 200);

        }else{
            $data['status'] =false;
            $data['message'] = "Not Found!";
            return response()->json($data, 200);
        }

    }

    public function biaScoreCard($id){

        $departments= BiaDepartment::with('biaDepartmentResult')
        ->with(array('biaService'=>function($q1){
            $q1->with('biaServiceResult')->get();
        }))
        ->where('bia_id', $id)->get();


        if($departments){

            

            foreach($departments as $department){

                $ratingSummation = 0;
                $ratingCount = 0;
                $avgRating = 0;
                $criticalityLevel = "--";


                if($department->biaService){

                    foreach($department->biaService as $service){

                        if( $service->biaServiceResult){

                            if( $service->biaServiceResult->criticality_rating){

                                $ratingSummation  =   $ratingSummation + $service->biaServiceResult->criticality_rating; 
                                $ratingCount = $ratingCount + 1;

                            }

                        }

                    }

                }

                if($ratingSummation >0 && $ratingCount >0  ){

                    $avgRating = $ratingSummation/$ratingCount;
    
                }

              

                    if($avgRating >0 && $avgRating <=20){
                        $criticalityLevel = "Non-essential";
                    }elseif ($avgRating >21 && $avgRating <=40) {
                        $criticalityLevel = "Normal";
                    }elseif ($avgRating >41 && $avgRating <=60) {
                        $criticalityLevel = "Important";
                    }elseif ($avgRating >61 && $avgRating <=80) {
                        $criticalityLevel = "Urgent";
                    }elseif ($avgRating >80) {
                        $criticalityLevel = "Critical";
                    }


                

                $department->criticality_level = $criticalityLevel;
                $department->avg_rating = $avgRating;


            }


       

        }
        $data['departments'] = $departments;
        $data['bia'] = Bia::find($id);

        if($data['bia']){
            return view('frontend.pages.bia.scorecard',$data);
        }   else{
            return '<h1 class="text"danger>Not Found!</h1>';
        }     
       


    }


    public function biaPdfView($id){

        $data['department'] = BiaDepartment::with('bia', 'biaDepartmentResult')
        ->with(array('biaService'=>function($q1){
            $q1->with('biaServiceResult')->get();
        }))
        
        ->where('id', $id)->first();

        $html = view('frontend.pages.bia.pdf_template', $data)->render();
        $pdf = PDF::loadHTML($html);
        return $pdf->stream();
      

    }


    public function destroy($bia)
    {
        $bia = Bia::find($bia);
        if($bia){
            $bia->delete();
            return redirect()->back();

        }else{
            return redirect()->back();
        }
    }
}
