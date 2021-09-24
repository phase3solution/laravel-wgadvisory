<?php

namespace App\Http\Controllers;

use App\Models\SfiaCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SfiaCategoryController extends Controller
{

    public function addMoreSfiaCategory($rowID){

        $data['categoryRow'] = $rowID;
        return view('pages.assessment.sfias.add_more_category', $data);

    }

    
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


        $saveCheck = false;
        $name = $request->name;
        $description = $request->description;

        $nameU = $request->nameU;
        $descriptionU = $request->descriptionU;

        if($name){
            foreach($name as $key=>$nam){
                $sfiaCategory = new SfiaCategory();
                $sfiaCategory->name = $nam;
            
                $sfiaCategory->slug = Str::slug($nam, "-");
                $sfiaCategory->description = $description[$key];


                $sfiaCategory->company_id = $request->company_id;
                $sfiaCategory->sfia_id = $request->sfia_id;
                $sfiaCategory->created_by= Auth::id();
                if($sfiaCategory->save()){
                    $saveCheck = true;
                }else{
                    $saveCheck = false;

                }
            }
        }


        if($nameU){
            foreach($nameU as $index=>$na){
                $sfiaCategor = SfiaCategory::find($index);
                $sfiaCategor->name = $na;
                $sfiaCategor->slug = Str::slug($na, "-");
                $sfiaCategor->description = $descriptionU[$index];

         

                $sfiaCategor->company_id = $request->company_id;
                $sfiaCategor->sfia_id = $request->sfia_id;
                $sfiaCategor->updated_by= Auth::id();
                if($sfiaCategor->save()){
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

   
    public function destroy( $id)
    {
        $query = SfiaCategory::find($id);
        if($query){

            if($query->delete()){
                $data['status'] = true;
                $data['message'] = "Successfully Deleted!";
                return response()->json($data, 200);
            }else{
                $data['status'] = false;
                $data['message'] = "Not Found !";
                return response()->json($data, 500);
            }

        }else{
            $data['status'] = false;
            $data['message'] = "Not Found !";
            return response()->json($data, 404);
        }
    }
}
