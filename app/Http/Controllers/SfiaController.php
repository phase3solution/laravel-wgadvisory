<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Sfia;
use App\Models\SfiaRole;
use App\Models\SfiaSubcategory;
use App\Models\SfiaTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class SfiaController extends Controller
{
    
    public function index()
    {
        
        $data['sfias'] = Sfia::with('company')->get();
        return view('pages.assessment.sfias.index', $data);

    }

    public function dashboard($id){
        return view('frontend.pages.sfia.dashboard');
    }

    public function assessment($id){

        $data['sfia'] = Sfia::with('company')->where('id',$id)->first();
        $data['sfiaRoles'] = SfiaRole::where('status', 1)->where('company_id',$data['sfia']->company_id)->get();
        $data['sfiaTeams'] = SfiaTeam::where('status', 1)->where('company_id',$data['sfia']->company_id)->get();

        return view('frontend.pages.sfia.assessment', $data);
    }

    public function missingSkills(){
        return view('frontend.pages.sfia.missing-skills');
    }

  
    public function create()
    {
        $data['companies'] = Company::all();

        return view('pages.assessment.sfias.create', $data);

    }


    public function store(Request $request)
    {
        $sfia = new Sfia();
        $sfia->name = $request->name;
        $sfia->slug = Str::slug($request->input('name'), "-");
        $sfia->description = $request->description;
        $sfia->company_id = $request->company_id;
        $sfia->created_by= Auth::id();



            $image=$request->file('image');
    
            if($image){
                $image_name=Str::slug($request->input('name'), "-").Str::random(4);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path='assessmentLogo/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                if($success){
                    $sfia->image=$image_url;
                }

            }

        if($sfia->save()){
            return redirect()->route('sfia.index');
        }else{
            return redirect()->back();
        }
    }


    public function show($id)
    {
        //
    }


    public function edit( $id)
    {
        $data['companies'] = Company::all();
        $data['sfia'] = Sfia::find($id);
        return view('pages.assessment.sfias.edit', $data);
    }

    public function editSfia($id){

        $data['sfia'] = Sfia::with('company')
        ->with(array('sfiaCategory'=>function($q1){
            $q1->with(array('sfiaSubcategory'=>function($q2){
                $q2->with('sfiaSkill')->get();
            }))
            
            ->get();
        }))
        ->where('id', $id)->first();

        $data['sfiaSubCategories'] = SfiaSubcategory::with('sfiaCategory', 'sfiaSkill')->where('sfia_id', $id)->get();

        // return response()->json($data, 200);
        return view('pages.assessment.sfias.sfia_edit', $data);

    }

    public function addModeSfiaCategory($id){
        
    }


    public function update(Request $request, $id)
    {



        $sfia = Sfia::find($id);


        if($sfia){

        $sfia->name = $request->name;
        $sfia->slug = Str::slug($request->input('name'), "-");
        $sfia->description = $request->description;
        $sfia->company_id = $request->company_id;
        $sfia->updated_by= Auth::id();



            $image=$request->file('image');
    
            if($image){

                if($sfia->image){
                    unlink($sfia->image);
                }

                $image_name=Str::slug($request->input('name'), "-").Str::random(4);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path='assessmentLogo/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                if($success){
                    $sfia->image=$image_url;
                }

            }

        if($sfia->save()){
            $data['status'] =true;
            $data['message'] = "Update Successfully!";
            return response()->json($data, 200);
        }else{
            $data['status'] =false;
            $data['message'] = "Update Failed!";
            return response()->json($data, 500);
        }

        }else{

            $data['status'] =false;
            $data['message'] = "Not Found!";
            return response()->json($data, 404);

        }


        
    }

    public function destroy( $id)
    {
        //
    }
}
