<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\AssessmentLabel;
use App\Models\AssessmentType;
use App\Models\Company;
use App\Models\CompanyAssessmentType;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AssessmentGenerate extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($slug, $id)
    {

        $assessmentType = AssessmentType::where('slug', $slug)->first();

        // 1 MTA
        if($assessmentType->id == 1){

            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with(array('children'=>function($q2){
                    $q2->with(array('children'=>function($q3){
                        $q3->with('children')->get();
                    }))->get();
                }))->get();
            }))
            ->with('assessmentType') 
            ->where('id', $id)->first();

            return view('frontend.pages.mta.area', $data);

             // 9 BCP
        }else if($assessmentType->id == 9){

            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with(array('children'=>function($q2){
                    $q2->with('bcpResult')->get();
                }))->with('bcpResult')->get();
            }))
            ->with('assessmentType','bcpResult', 'parent') 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.bcp.threat_cats', $data);

            // 24 BCP Register
        }else if($assessmentType->id == 24){

            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with('children')->with('bcpRegisterResult')->get();
            }))
            ->with('assessmentType', 'bcpRegisterResult') 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.bcp_register.threat_cats', $data);

            // 10 Facility Risk
        }else if($assessmentType->id == 10){

            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with(array('children'=>function($q2){
                    $q2->with(array('children'=>function($q3){
                        $q3->with('facilityRiskResult')->get();
                    }))->with('facilityRiskResult')
                    ->get();
                }))->with('facilityRiskResult')
                ->get();
            }))
            ->with('assessmentType', 'facilityRiskResult', 'parent') 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.facility_risk.facilities', $data);

        }else if($assessmentType->id == 14){
            // 14 DRM
            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with(array('children'=>function($q2){
                    $q2->with(array('children'=>function($q3){
                        $q3->with('drmResult')->get();
                    }))
                    ->with('drmResult')->get();
                }))->with('drmResult')->get();
            }))
            ->with('assessmentType', 'parent', 'drmResult') 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.drm.area', $data);

        }else if($assessmentType->id == 15){
            // 14 DRM Register
            $data['assessment']= Assessment::with('assessmentType', 'parent')
            ->with(array('children'=>function($q1){
                $q1->with('drmRegisterResult')->get();
            })) 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.drm_register.area', $data);

        }else if($assessmentType->id == 5){
            // 5 IT Management
            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with(array('children'=>function($q2){
                    $q2->with(array('children'=>function($q3){
                        $q3->with('itManagementResult')->get();
                    }))
                    ->with('itManagementResult')->get();
                }))->with('itManagementResult')->get();
            }))
            ->with('assessmentType', 'parent', 'itManagementResult') 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.it_management.area', $data);

        }else if($assessmentType->id == 6){
            // 6 Cloud Readiness
            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with(array('children'=>function($q2){
                    $q2->with(array('children'=>function($q3){
                        $q3->with('cloudReadinessResult')->get();
                    }))
                    ->with('cloudReadinessResult')->get();
                }))->with('cloudReadinessResult')->get();
            }))
            ->with('assessmentType', 'parent', 'cloudReadinessResult') 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.cloud_readiness.area', $data);

        }else if($assessmentType->id == 13){
            // 13 Cybersecurity Maturity
            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with(array('children'=>function($q2){
                    $q2->with(array('children'=>function($q3){
                        $q3->with('cybersecurityMaturityResult')->get();
                    }))
                    ->with('cybersecurityMaturityResult')->get();
                }))->with('cybersecurityMaturityResult')->get();
            }))
            ->with('assessmentType', 'parent', 'cybersecurityMaturityResult') 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.cybersecurity_maturity.function', $data);

        }else if($assessmentType->id == 26){
            // 26 Cybersecurity Maturity Register
            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with(array('children'=>function($q2){
                    $q2->with(array('children'=>function($q3){
                        $q3->with('cybersecurityMaturityRegisterResult')->get();
                    }))
                    ->with('cybersecurityMaturityRegisterResult')->get();
                }))->with('cybersecurityMaturityRegisterResult')->get();
            }))
            ->with('assessmentType', 'parent', 'cybersecurityMaturityRegisterResult') 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.cybersecurity_maturity_register.function', $data);

        }else{
            return "Under Constructions";
        }
    }

    public function scoreCard($assessmentId){

        $assessment = Assessment::where('id',$assessmentId)->first();

        if($assessment){

            if($assessment->assessment_type_id == 9){
                // BCP 9    
                $data['assessments'] = Assessment::with('parent', 'bcpResult')
                ->where('base_id',$assessmentId)
                ->where('assessment_label_id',37)
                ->get();
                return view('frontend.scorecards.bcp', $data);

            }else if($assessment->assessment_type_id == 10){
                // Facility Risk 10    
                $data['assessments'] = Assessment::with('parent', 'facilityRiskResult')
                ->where('base_id',$assessmentId)
                ->where('assessment_label_id',42)
                ->get();
                return view('frontend.scorecards.facility_risk', $data);

            }else if($assessment->assessment_type_id == 14){
                // DRM 14    
                $data['assessments'] = Assessment::with(array('children'=>function($area){
                    $area->with(array('children'=>function($section){
                        $section->with(array('children'=>function($table){
                            $table->with('drmResult')->get();
                        }))->get();
                    }))->with('drmResult')->get();
                }))
                ->where('id',$assessmentId)
                ->first();
                // return response()->json($data,200);
                return view('frontend.scorecards.drm', $data);

            }else{
                return "Under Construction";
            }
    

        }else{
            return "Data Not Found !";
        }


       
    }

    public function view($slug, $id)
    {

        $assessmentType = AssessmentType::where('slug', $slug)->first();

        // 1 MTA
        if($assessmentType->id == 1){

            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with(array('children'=>function($q2){
                    $q2->with(array('children'=>function($q3){
                        $q3->with('children')->get();
                    }))->get();
                }))->get();
            }))
            ->with('assessmentType') 
            ->where('id', $id)->first();

            return view('frontend.pages.mta.view', $data);

             // 9 BCP
        }else if($assessmentType->id == 9){

            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with(array('children'=>function($q2){
                    $q2->with('bcpResult')->get();
                }))->with('bcpResult')->get();
            }))
            ->with('assessmentType','bcpResult', 'parent') 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.bcp.view', $data);

            // 24 BCP Register
        }else if($assessmentType->id == 24){

            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with('children')->get();
            }))
            ->with('assessmentType') 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.bcp_register.view', $data);

            // 10 Facility Risk
        }else if($assessmentType->id == 10){

            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with(array('children'=>function($q2){
                    $q2->with(array('children'=>function($q3){
                        $q3->with('facilityRiskResult')->get();
                    }))->with('facilityRiskResult')
                    ->get();
                }))->with('facilityRiskResult')
                ->get();
            }))
            ->with('assessmentType', 'facilityRiskResult', 'parent') 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.facility_risk.view', $data);

        }else if($assessmentType->id == 14){

            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with(array('children'=>function($q2){
                    $q2->with(array('children'=>function($q3){
                        $q3->with('drmResult')->get();
                    }))
                    ->with('drmResult')->get();
                }))->with('drmResult')->get();
            }))
            ->with('assessmentType', 'parent', 'drmResult') 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.drm.view', $data);

        }else if($assessmentType->id == 5){

            // 5 IT Management
            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with(array('children'=>function($q2){
                    $q2->with(array('children'=>function($q3){
                        $q3->with('itManagementResult')->get();
                    }))
                    ->with('itManagementResult')->get();
                }))->with('itManagementResult')->get();
            }))
            ->with('assessmentType', 'parent', 'itManagementResult') 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.it_management.view', $data);

        }else if($assessmentType->id == 6){

            // 6 Cloud Readiness
            $data['assessment']= Assessment::with(array('children'=>function($q1){
                $q1->with(array('children'=>function($q2){
                    $q2->with(array('children'=>function($q3){
                        $q3->with('itManagementResult')->get();
                    }))
                    ->with('itManagementResult')->get();
                }))->with('itManagementResult')->get();
            }))
            ->with('assessmentType', 'parent', 'itManagementResult') 
            ->where('id', $id)->first();

            // return response()->json($data, 200);
            return view('frontend.pages.cloud_readiness.view', $data);

        }else{
            return "Under Constructions";
        }
    }



    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
