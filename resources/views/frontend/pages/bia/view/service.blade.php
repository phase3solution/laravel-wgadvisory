@extends('frontend.master')

@section('content')

    @include('frontend.layouts.sidebar_user')

    <!--begin::Wrapper-->
    <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
        {{-- @include('frontend.layouts.header_user') --}}

        <!--begin::Header-->
        <div id="kt_header" class="header header-fixed">
            <!--begin::Container-->
            <div class="container-fluid d-flex align-items-stretch justify-content-between">
                <!--begin::Page Title-->
                <div class="d-flex align-items-center flex-wrap mr-2">

                    @php
                        $userCheck = \App\Models\UserCompany::with('company')
                            ->where('user_id', Auth::id())
                            ->first();
                        
                        if (Session::get('old_user')) {
                            $userRole = \App\Models\UserRole::where('user_id', Session::get('old_user'))->first();
                        }
                        
                    @endphp

                    @if ($userCheck)
                        <!--begin::Page Title-->
                        <img class="company-img-2" src="{{ asset('frontend/assets/media/company-logo1.png') }}" alt="">
                        <h2 class="text-dark mt-2 mb-2 mr-5 text-weight">{{ $userCheck->company->name }}</h2>
                        <!--begin::Actions-->
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                        <!--end::Actions-->
                        <img class="menu-icon-thum" src="{{ asset($department->bia->image) }}" alt=""
                            style="background-color:#282828;border-radius:8px">
                        <h5 class="font-weight-bold mt-2 mb-2 mr-5">{{$department->bia->name}}</h5>
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                        <h5 class="font-weight-bold text-muted mt-2 mb-2 mr-5">{{$department->name}}</h5>
                        <!--end::Page Title-->
                    @endif


                </div>
                <!--end::Page Title-->
                <!--begin::Topbar-->
                <div class="topbar">
                    <div class="topbar-item">
                        {{-- {{Session::get('old_user')}} --}}
                        @if (Session::get('old_user'))
                            @if ($userRole->role_id != 3)
                                <a href="{{ route('switch-back') }}"
                                    class="btn btn-light-primary px-6 font-weight-bold btn-lg mr-1">Switch to Admin </a>
                            @endif
                        @endif


                        {{-- <a href="#" class="btn btn-fixed-height btn-primary font-weight-bold px-2 px-lg-5 mr-2"> <span class="flaticon-support fa-lg mr-2"></span> <strong>Support</strong> </a> --}}

                        <!--begin::User-->
                        <div class="topbar-item">
                            <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                id="kt_quick_user_toggle">
                                <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                                <span
                                    class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->name }}</span>
                                <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                    <span class="symbol-label font-size-h5 font-weight-bold">


                                        @if (Auth::user()->image)
                                            <img src="{{ asset(Auth::user()->image) }}" height="24" width="24" alt="">
                                        @else

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <path
                                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    <path
                                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>



                                        @endif

                                    </span>
                                </span>
                            </div>
                        </div>
                        <!--end::User-->
                    </div>
                </div>
                <!--end::Topbar-->
            </div>
            <!--end::Container-->
        </div>
        <!--edn::Header-->


        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Entry-->
  

            <!--begin::Container-->
                <div class="container-fluid">
                    <div class="">

                        <div class="card mt-1">
                            <div class="card-title">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="btn-wrap">
                                                <a href="{{route('bia.department',$department->id)}}" class="btn btn-primary px-6 font-weight-bold btn-lg btn-block mr-1">
                                                    <span class="label label-sm label-white mr-2">1</span>
                                                    Department Questionnaire
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="btn-wrap">
                                                <a href="{{route('bia.service',$department->id)}}" class="btn btn-success px-6 font-weight-bold btn-lg btn-block mr-1">
                                                    <span class="label label-sm label-white mr-2">2</span>
                                                    Service/Process Evaluation
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="btn-wrap">
                                                <a href="{{route('bia.roles',$department->id)}}" class="btn btn-warning px-6 font-weight-bold btn-lg btn-block mr-1">
                                                    <span class="label label-sm label-white mr-2">3</span>
                                                    Roles and Contacts
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="btn-wrap">
                                                <a href="{{route('bia.team',$department->id)}}" class="btn btn-info px-6 font-weight-bold btn-lg btn-block mr-1">
                                                    <span class="label label-sm label-white mr-2">4</span>
                                                    Team Action Plan
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <h2 class="bold">Step 1: Business Impact Analysis</h2>
                                        <p>
                                            The Objective of the Business Impact Analysis (BIA) ois the identification and analysis of business processes/activities (including required resources), with the objective of understanding the impact of downtime, which drives the assignment of the recovery objectives and prioritization.
                                        </p>
                                        <p>
                                            Following the BIA, the organization should be positioned to identify the critical activities that contribute to the delivery of its most important products and services, list all resources needed for recovery, and prioritize activities and resources by recovery objective.
                                        </p>
                                        <p>
                                            ProbSol:<br>
                                            Now, let us point out the reasons for this instance.
                                        </p>
                                    </div>
                                    <div class="col-sm-5">
                                        <p class="bold">The major outcomes associated with the BIA, include:</p>
                                        <ul>
                                            <li>Understanding of business process/activities, including:
                                                <ol>
                                                    <li>Customers (internal and external)</li>
                                                    <li>Outputs/Deliverables</li>
                                                    <li>Inputs (which enable the process to function, including resources and other internal and third-party dependancies)</li>
                                                </ol>
                                            </li>
                                            <li>
                                                Understanding an estimation of the impact of downtime, which serves as business justification for establishing recovery objecttice
                                            </li>
                                            <li>
                                                Identification of the recovery objetives and a prioritized order of recovery for business processes and resources
                                            </li>
                                            <li>
                                                Collection of information to help drive appropriate recovery strategies
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="thum">
                                            <img src="{{asset('frontend')}}/assets/img/icon/bia_process.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
               



                        <div class="card mt-2">
                            <form method="POST" id="biaServiceFormOne">

                                @csrf
                                <input type="hidden" name="company_id" value="{{$department->company_id}}">
                                <input type="hidden" name="bia_id" value="{{$department->bia_id}}">
                                <input type="hidden" name="bia_department_id" value="{{$department->id}}">


                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <h3 class="title bold">1. List ALL services/processes - Determine the financial, reputational, and operational consequences of an interruption which lasts for the given period of time.</h3>
                                            <p>*For Financial Impact - Corporation needs to determine the thresholds that determine the five levels of severity</p>
                                        </div>

                                        <div class="col-sm-1">
                                            {{-- <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i> Submit</button> --}}
                                        </div>

                                    </div>

                                    @if ($department->biaService)

                                        @foreach ($department->biaService as $service)
                                            <div class="row mt-5">

                                                <div class="col-sm-12">
        
                                                <table class="table">
        
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td class="bg-dark">CRITICALITY LEVEL</td>
                                                        <td class="bg-dark">CRITICALITY RATING</td>
                                                        <td class="bg-dark">CALCULATED RTO</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="bg-dark">SERVICE/PROCESS	</td>
                                                        <td class="bg-dark">{{$service->name}}</td>
                                                        <td class="c-5">


                                                            @if (isset($service->biaServiceResult->criticality_level))
                                                            <span class="criticality_level_s">{{$service->biaServiceResult->criticality_level}}</span>
                                                            <input type="hidden" name="criticality_level[{{$service->id}}]" value="{{$service->biaServiceResult->criticality_level}}" class="criticality_level_i">
                                                             @else 

                                                            <span class="criticality_level_s">Non-essential</span>
                                                            <input type="hidden" name="criticality_level[{{$service->id}}]" value="Non-essential" class="criticality_level_i">
 
                                                            @endif

                                
                                                        </td>

                                                        <td class="c-5"> 
                                                            @if (isset($service->biaServiceResult->criticality_rating))
                                                                <span class="criticality_rating_s">{{$service->biaServiceResult->criticality_rating}}</span> 
                                                                <input type="hidden" name="criticality_rating[{{$service->id}}]" value="{{$service->biaServiceResult->criticality_rating}}" class="criticality_rating_i">
                                                            @else 

                                                                <span class="criticality_rating_s">0</span> 
                                                                <input type="hidden" name="criticality_rating[{{$service->id}}]" value="0" class="criticality_rating_i">
                                                                
                                                            @endif
                                                          
                                                        </td>
                                                        <td class="c-5">
                                                            
                                                            @if (isset($service->biaServiceResult->calculated_rto))
                                                            <span class="calculated_rto_s">{{$service->biaServiceResult->calculated_rto}}</span>
                                                            <input type="hidden" name="calculated_rto[{{$service->id}}]" value="{{$service->biaServiceResult->calculated_rto}}" class="calculated_rto_i">
 
                                                            @else 

                                                            <span class="calculated_rto_s">2 - 4 Weeks</span>
                                                            <input type="hidden" name="calculated_rto[{{$service->id}}]" value="2 - 4 Weeks" class="calculated_rto_i">
 
                                                                
                                                            @endif

                                                          
                                                        </td>
                                                    </tr>
        
                                                    <tr class="bg-primary">
                                                        <td class="">IMPACT</td>
                                                        <td class="">

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    1 Day
                                                                </div>
                                                                <div class="col-md-4">
                                                                    3 Day
                                                                </div>
                                                                <div class="col-md-4">
                                                                    1 Week
                                                                </div>

                                                            </div>
                                                         
                                                        </td>
                                                        <td class="">2 WEEK</td>
                                                        <td class="">4 WEEK</td>
                                                        <td class="">WEIGHT</td>
                                                    </tr>

                                                    @php
                                                        $impacts = json_decode($service->impact, true);
                                                        $financials = json_decode($service->financial, true);

                                                    if ($service->biaServiceResult) {
                                                        $spe_day_1 = json_decode($service->biaServiceResult->spe_day_1, true);
                                                        $spe_day_3 = json_decode($service->biaServiceResult->spe_day_3, true);
                                                        $spe_week_1 = json_decode($service->biaServiceResult->spe_week_1, true);
                                                        $spe_week_2 = json_decode($service->biaServiceResult->spe_week_2, true);
                                                        $spe_week_4 = json_decode($service->biaServiceResult->spe_week_4, true);
                                                        $spe_weight = json_decode($service->biaServiceResult->spe_weight, true);

                                                    }

                                                       
                                                        // print_r($service->biaServiceResult->spe_day_1);
                                                        // exit();
                                                    @endphp
        
                                                        <tr class="">
                                                            <td class="">Financial</td>
                                                            <td >
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <select name="spe_day_1[{{$service->id}}][Financial]" class="biaScore spe_day_1 @if (isset($service->biaServiceResult->spe_day_1)) c-{{$spe_day_1['Financial']}} @else c-0 @endif ">
                                                                            @foreach ($financials as $key=>$financial)

                                                                            @if (isset($service->biaServiceResult->spe_day_1))
                                                                                <option value="{{$key}}" @if($spe_day_1['Financial'] == $key) selected @endif>{{$financial}}</option>
                                                                            @else 
                                                                                <option value="{{$key}}">{{$financial}}</option>
                                                                            @endif





                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <select name="spe_day_3[{{$service->id}}][Financial]" class="biaScore spe_day_3 @if (isset($service->biaServiceResult->spe_day_3)) c-{{$spe_day_3['Financial']}} @else c-0 @endif ">
                                                                            @foreach ($financials as $key=>$financial)

                                                                                @if (isset($service->biaServiceResult->spe_day_3))
                                                                                    <option value="{{$key}}" @if($spe_day_3['Financial'] == $key) selected @endif >{{$financial}}</option>

                                                                                @else 

                                                                                    <option value="{{$key}}">{{$financial}}</option>

                                                                                    
                                                                                @endif

                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <select name="spe_week_1[{{$service->id}}][Financial]" class="biaScore spe_week_1 @if (isset($service->biaServiceResult->spe_week_1)) c-{{$spe_week_1['Financial']}} @else c-0 @endif ">
                                                                            @foreach ($financials as $key=>$financial)
                                                                                @if (isset($service->biaServiceResult->spe_week_1))
                                                                                    <option value="{{$key}}" @if($spe_week_1['Financial'] == $key) selected @endif >{{$financial}}</option>

                                                                                @else 

                                                                                    <option value="{{$key}}">{{$financial}}</option>

                                                                                    
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>


                                                                </div>

                                                            </td>
                                                            <td class="@if (isset($service->biaServiceResult->spe_week_2)) c-{{$spe_week_2['Financial']}} @else c-0 @endif">
                                                                <select name="spe_week_2[{{$service->id}}][Financial]" class="biaScore spe_week_2 @if (isset($service->biaServiceResult->spe_week_2)) c-{{$spe_week_2['Financial']}} @else c-0 @endif">
                                                                    @foreach ($financials as $key=>$financial)
                                                                        @if (isset($service->biaServiceResult->spe_week_2))
                                                                            <option value="{{$key}}" @if($spe_week_2['Financial'] == $key) selected @endif >{{$financial}}</option>

                                                                        @else 

                                                                            <option value="{{$key}}">{{$financial}}</option>

                                                                            
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td class="@if (isset($service->biaServiceResult->spe_week_4)) c-{{$spe_week_4['Financial']}} @else c-0 @endif">
                                                                <select name="spe_week_4[{{$service->id}}][Financial]" class=" biaScore spe_week_4 @if (isset($service->biaServiceResult->spe_week_4)) c-{{$spe_week_4['Financial']}} @else c-0 @endif">
                                                                    @foreach ($financials as $key=>$financial)
                                                                        @if (isset($service->biaServiceResult->spe_week_4))
                                                                            <option value="{{$key}}" @if($spe_week_4['Financial'] == $key) selected @endif >{{$financial}}</option>

                                                                        @else 

                                                                            <option value="{{$key}}">{{$financial}}</option>

                                                                            
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                
                                                            </td>
                                                            <td class="@if (isset($service->biaServiceResult->spe_weight)) c-{{$spe_weight['Financial']}} @else c-0 @endif">
                                                                <select name="spe_weight[{{$service->id}}][Financial]" class="biaWeight spe_weight @if (isset($service->biaServiceResult->spe_weight)) c-{{$spe_weight['Financial']}} @else c-0 @endif">

                                                                        @if (isset($service->biaServiceResult->spe_weight))
                                                                            <option value="1" @if($spe_weight['Financial'] == 1) selected @endif >Normal</option>
                                                                            <option value="2" @if($spe_weight['Financial'] == 2) selected @endif>Important</option>
                                                                            <option value="3" @if($spe_weight['Financial'] == 3) selected @endif>Vital</option>
                                                                        @else 

                                                                        <option value="1" >Normal</option>
                                                                        <option value="2">Important</option>
                                                                        <option value="3">Vital</option>

                                                                            
                                                                        @endif

                                                                    

                                                                </select>

                                                                <input type="hidden" name="score_weight_value" class="score_weight_value" value="0">

                                                            </td>
                                                        </tr>

                                                    @if ($impacts)

                                                        @foreach ($impacts as $impact)

                                                        <tr class="">
                                                            <td class="">{{$impact}}</td>
                                                            <td>


                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <select name="spe_day_1[{{$service->id}}][{{$impact}}]" class="biaScore spe_day_1 @if (isset($service->biaServiceResult->spe_day_1)) c-{{$spe_day_1[$impact]}} @else c-0 @endif">

                                                                            @if (isset($service->biaServiceResult->spe_day_1))
                                                                            <option value="0" @if ($spe_day_1[$impact] == 0) selected @endif >No to Low</option>
                                                                            <option value="1" @if ($spe_day_1[$impact] == 1) selected @endif>Low to Moderate</option>
                                                                            <option value="2" @if ($spe_day_1[$impact] == 2) selected @endif>Moderate to High</option>
                                                                            <option value="5" @if ($spe_day_1[$impact] == 5) selected @endif>High</option>
                                                                            <option value="7" @if ($spe_day_1[$impact] == 7) selected @endif>High to Catastrophic</option>

                                                                            @else 

                                                                            <option value="0" >No to Low</option>
                                                                            <option value="1">Low to Moderate</option>
                                                                            <option value="2">Moderate to High</option>
                                                                            <option value="5">High</option>
                                                                            <option value="7">High to Catastrophic</option>
                                                                                
                                                                            @endif

                                                                            
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <select name="spe_day_1[{{$service->id}}][{{$impact}}]" class="biaScore spe_day_1  @if (isset($service->biaServiceResult->spe_day_1)) c-{{$spe_day_1[$impact]}} @else c-0 @endif">
                                                                            @if (isset($service->biaServiceResult->spe_day_1))
                                                                            <option value="0" @if ($spe_day_1[$impact] == 0) selected @endif >No to Low</option>
                                                                            <option value="1" @if ($spe_day_1[$impact] == 1) selected @endif>Low to Moderate</option>
                                                                            <option value="2" @if ($spe_day_1[$impact] == 2) selected @endif>Moderate to High</option>
                                                                            <option value="5" @if ($spe_day_1[$impact] == 5) selected @endif>High</option>
                                                                            <option value="7" @if ($spe_day_1[$impact] == 7) selected @endif>High to Catastrophic</option>

                                                                            @else 

                                                                            <option value="0" >No to Low</option>
                                                                            <option value="1">Low to Moderate</option>
                                                                            <option value="2">Moderate to High</option>
                                                                            <option value="5">High</option>
                                                                            <option value="7">High to Catastrophic</option>
                                                                                
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <select name="spe_week_1[{{$service->id}}][{{$impact}}]" class="biaScore spe_week_1 @if (isset($service->biaServiceResult->spe_week_1)) c-{{$spe_week_1[$impact]}} @else c-0 @endif ">
                                                                            @if (isset($service->biaServiceResult->spe_week_1))
                                                                            <option value="0" @if ($spe_week_1[$impact] == 0) selected @endif >No to Low</option>
                                                                            <option value="1" @if ($spe_week_1[$impact] == 1) selected @endif>Low to Moderate</option>
                                                                            <option value="2" @if ($spe_week_1[$impact] == 2) selected @endif>Moderate to High</option>
                                                                            <option value="5" @if ($spe_week_1[$impact] == 5) selected @endif>High</option>
                                                                            <option value="7" @if ($spe_week_1[$impact] == 7) selected @endif>High to Catastrophic</option>

                                                                            @else 

                                                                            <option value="0" >No to Low</option>
                                                                            <option value="1">Low to Moderate</option>
                                                                            <option value="2">Moderate to High</option>
                                                                            <option value="5">High</option>
                                                                            <option value="7">High to Catastrophic</option>
                                                                                
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                </div>



                                                               
                                                            </td>
                                                            <td class="@if (isset($service->biaServiceResult->spe_week_2)) c-{{$spe_week_2[$impact]}} @else c-0 @endif">
                                                                <select name="spe_week_2[{{$service->id}}][{{$impact}}]" class="biaScore spe_week_2 @if (isset($service->biaServiceResult->spe_week_2)) c-{{$spe_week_2[$impact]}} @else c-0 @endif">
                                                                    @if (isset($service->biaServiceResult->spe_week_2))
                                                                    <option value="0" @if ($spe_week_2[$impact] == 0) selected @endif >No to Low</option>
                                                                    <option value="1" @if ($spe_week_2[$impact] == 1) selected @endif>Low to Moderate</option>
                                                                    <option value="2" @if ($spe_week_2[$impact] == 2) selected @endif>Moderate to High</option>
                                                                    <option value="5" @if ($spe_week_2[$impact] == 5) selected @endif>High</option>
                                                                    <option value="7" @if ($spe_week_2[$impact] == 7) selected @endif>High to Catastrophic</option>

                                                                    @else 

                                                                    <option value="0" >No to Low</option>
                                                                    <option value="1">Low to Moderate</option>
                                                                    <option value="2">Moderate to High</option>
                                                                    <option value="5">High</option>
                                                                    <option value="7">High to Catastrophic</option>
                                                                        
                                                                    @endif
                                                                </select>
                                                            </td>
                                                            <td class="@if (isset($service->biaServiceResult->spe_week_4)) c-{{$spe_week_4[$impact]}} @else c-0 @endif">
                                                                <select name="spe_week_4[{{$service->id}}][{{$impact}}]" class="biaScore spe_week_4 @if (isset($service->biaServiceResult->spe_week_4)) c-{{$spe_week_4[$impact]}} @else c-0 @endif">
                                                                    @if (isset($service->biaServiceResult->spe_week_4))
                                                                                <option value="0" @if ($spe_week_4[$impact] == 0) selected @endif >No to Low</option>
                                                                                <option value="1" @if ($spe_week_4[$impact] == 1) selected @endif>Low to Moderate</option>
                                                                                <option value="2" @if ($spe_week_4[$impact] == 2) selected @endif>Moderate to High</option>
                                                                                <option value="5" @if ($spe_week_4[$impact] == 5) selected @endif>High</option>
                                                                                <option value="7" @if ($spe_week_4[$impact] == 7) selected @endif>High to Catastrophic</option>

                                                                                @else 

                                                                                <option value="0" >No to Low</option>
                                                                                <option value="1">Low to Moderate</option>
                                                                                <option value="2">Moderate to High</option>
                                                                                <option value="5">High</option>
                                                                                <option value="7">High to Catastrophic</option>
                                                                                    
                                                                                @endif
                                                                </select>
                                                            </td>
                                                            <td class="@if (isset($service->biaServiceResult->spe_weight)) c-{{$spe_weight[$impact]}} @else c-0 @endif">
                                                                <select name="spe_weight[{{$service->id}}][{{$impact}}]" class="biaWeight spe_weight @if (isset($service->biaServiceResult->spe_weight)) c-{{$spe_weight[$impact]}} @else c-0 @endif">

                                                                    @if (isset($service->biaServiceResult->spe_weight))
                                                                        <option value="1" @if ($spe_weight[$impact] == 1) selected @endif >Normal</option>
                                                                        <option value="2" @if ($spe_weight[$impact] == 2) selected @endif>Important</option>
                                                                        <option value="3" @if ($spe_weight[$impact] == 3) selected @endif>Vital</option>
                                                                    
                                                                    @else 

                                                                        <option value="1" >Normal</option>
                                                                        <option value="2">Important</option>
                                                                        <option value="3">Vital</option>
                                                                        
                                                                    @endif

                                                                    



                                                                </select>

                                                                <input type="hidden" name="score_weight_value" class="score_weight_value" value="0">


                                                            </td>
                                                        </tr>
                                                            
                                                        @endforeach
                                                        
                                                    @endif
                                                        
                                                    <tr>
                                                        <td colspan="2"></td>
                                                        <td colspan="2">Maximum Tolerable Outage (MTO)</td>
                                                        <td>
                                                            <select name="spe_mto[{{$service->id}}]">

                                                                @if (isset($service->biaServiceResult->spe_mto))
                                                                <option value="0" @if ($service->biaServiceResult->spe_mto == 0) selected @endif >Over 3-Days</option>
                                                                <option value="2"  @if ($service->biaServiceResult->spe_mto == 2) selected @endif  >72-hours</option>
                                                                <option value="6"   @if ($service->biaServiceResult->spe_mto == 6) selected @endif >24-hours</option>
                                                                <option value="10"   @if ($service->biaServiceResult->spe_mto == 10) selected @endif >0-4 hours</option>

                                                                @else 

                                                                <option value="0">Over 3-Days</option>
                                                                <option value="2" >72-hours</option>
                                                                <option value="6" >24-hours</option>
                                                                <option value="10" >0-4 hours</option>
                                                                    
                                                                @endif

                                                                
                                                            </select>
                                                        </td>
                                                    </tr>
        
                                                </table>
                                                </div>
        
                                            </div>
                                        @endforeach
                                        
                                    @endif

                                    
                                    
                                </div>
                            </form>
                        </div>



                        <div class="card mt-2">
                            <form method="POST" id="biaServiceFormTwo">

                                @csrf
                                <input type="hidden" name="company_id" value="{{$department->company_id}}">
                                <input type="hidden" name="bia_id" value="{{$department->bia_id}}">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <h3 class="title bold">2. For each service/process provide additional details for critical impact critera</h3>
                                            <p>Examples Include: Financial, Reputation, Operational, Legal and Regulatory Compliance, Contractual Compliance, Health and Safety</p>
                                        </div>

                                        <div class="col-sm-1">
                                            {{-- <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i> Submit</button> --}}
                                        </div>

                                    </div>
                                    <table class="table table-bordered section-table">
                                        <tr>
                                            <td style="width: 20%" class="sub-title-txt bg-gray">SERVICE/PROCESS</td>
                                            <td style="width: 80%" class="sub-title-txt bg-gray">COMMENTS</td>
                                        </tr>
                                        @if ($department->biaService)

                                            @foreach ($department->biaService as $service)

                                                <tr>
                                                    <td class="bg-light bold">{{$service->name}}</td>
                                                    <td><textarea name="spe_critical_impact_comments[{{$service->id}}]" class="form-control" rows="5"> @if($service->biaServiceResult){{$service->biaServiceResult->spe_critical_impact_comments}}@endif</textarea></td>
                                                   
                                                </tr>
                                                
                                            @endforeach
                                            
                                        @endif
                                        
                                    
                                    </table>
                                </div>

                            </form>

                        </div>

                        <div class="card mt-2">

                            <form method="POST" id="biaServiceFormThree">

                                @csrf
                                <input type="hidden" name="company_id" value="{{$department->company_id}}">
                                <input type="hidden" name="bia_id" value="{{$department->bia_id}}">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <h3 class="title bold">3. If the IT systems were impacted, what is the maximum acceptable level of data loss (hours/day/weeks)?</h3>
                                            <p>This represents the Recovery Point Objective (RPO) or tolerance to lose data</p>
                                        </div>

                                        <div class="col-sm-1">
                                            {{-- <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i> Submit</button> --}}
                                        </div>

                                    </div>
                                    
                                    <table class="table table-bordered section-table">
                                        <tr>
                                            <td class="sub-title-txt bg-gray">SERVICE/PROCESS</td>
                                            <td class="sub-title-txt bg-gray">RPO</td>
                                            <td class="sub-title-txt bg-gray">PROCESS TO MANUALLY RECREATE DATA (IF ANY)</td>
                                        </tr>
                                        @if ($department->biaService)

                                            @foreach ($department->biaService as $service)

                                                <tr>
                                                    <td class="bg-light bold">{{$service->name}}</td>
                                                    <td>
                                                        <select name="spe_rpo[{{$service->id}}]">

                                                            @if($service->biaServiceResult)

                                                            <option value="0" @if ($service->biaServiceResult->spe_rpo==0) selected @endif>0-4 hours</option>
                                                            <option value="1" @if ($service->biaServiceResult->spe_rpo==1) selected @endif>1-day</option>
                                                            <option value="2" @if ($service->biaServiceResult->spe_rpo==2) selected @endif>3-days</option>
                                                            <option value="3" @if ($service->biaServiceResult->spe_rpo==3) selected @endif>1-week</option>
                                                            
                                                            @else 
                                                                <option value="0">0-4 hours</option>
                                                                <option value="1">1-day</option>
                                                                <option value="2">3-days</option>
                                                                <option value="3">1-week</option>
                                                            @endif


                                                            
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <textarea name="spe_process_tomanually[{{$service->id}}]" class="form-control" rows="5">@if($service->biaServiceResult){{$service->biaServiceResult->spe_process_tomanually}}@endif</textarea>
                                                    </td>
                                                  
                                                </tr>
                                                
                                            @endforeach
                                            
                                        @endif
                                        
                                    
                                    </table>
                                </div>

                            </form>


                        </div>

                        <div class="card mt-2">

                            <form method="POST" id="biaServiceFormFourA">

                                @csrf
                                <input type="hidden" name="company_id" value="{{$department->company_id}}">
                                <input type="hidden" name="bia_id" value="{{$department->bia_id}}">
                                <input type="hidden" name="bia_department_id" value="{{$department->id}}">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <h3 class="title bold">4(a). List ALL IT upstream dependencies for each service/process</h3>
                                            <p>UPSTREAM DEPENDENCIES (IT) - These are services defined within the organizations IT service catalogue DESKTOP APPLICATIONS - These are applications installed locally on user devices (desktops, laptops, tablets etc.)</p>
                                        </div>
                                        <div class="col-sm-1">
                                            {{-- <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i> Submit</button> --}}
                                        </div>

                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr class="bg-dark">
                                                        <td>INTERNAL FUNCTION (SERVICE/PROCESS)</td>
                                                        <td>(SERVICE/PROCESS)	UPSTREAM DEPENDENCIES (IT)</td>
                                                        <td>DESKTOP APPLICATIONS</td>
                                                        <td>COMMENTS</td>
                                                    </tr>

                                                    @if ($department->biaService)

                                                    @foreach ($department->biaService as $key=>$service)

                                                    @php
                                                        $upStreamDependenciesArray = array();
                                                        $desktopAppsArray = array();
                                                    @endphp
        
                                                    @if ($service->biaServiceResult)
                                                        @php
                                                            

                                                            if ($service->biaServiceResult->spe_upstream_dependencies) {
                                                                $upStreamDependenciesArray = json_decode($service->biaServiceResult->spe_upstream_dependencies, true);
                                                            }else{
                                                                $upStreamDependenciesArray  = array();
                                                            }

                                                            if ($service->biaServiceResult->spe_desktop_applications) {
                                                                $desktopAppsArray = json_decode($service->biaServiceResult->spe_desktop_applications, true);
                                                            }else{
                                                                $desktopAppsArray = array();
                                                            }

                                                        @endphp
                                                    @endif
        
                                                        <tr>
                                                            <td class="bg-light bold">{{$service->name}}</td>

                                                            <td class=" @if(count($upStreamDependenciesArray)>1 ) bg-success @else bg-danger @endif " data-toggle="modal" data-target="#upStreamDependenciesModal{{$key}}"></td>
                                                            <div class="modal fade invers" id="upStreamDependenciesModal{{$key}}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <h4 class="modal-title"
                                                                                style="color:#ffffff;">IT Service Catalouge</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body text-left">
                                                                            <div class="firstHalf" style="width:50%; float:left;">
    
                                                                                <label class="@if(in_array(1, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(1, $upStreamDependenciesArray)) checked @endif class="upstream" name="spe_upstream_dependencies[{{$service->id}}][]" value="1">
                                                                                    ADP Report Smith
                                                                                </label>
    
                                                                                <label class="@if(in_array(2, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(2, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="2">
                                                                                        Application Services (ArcGIS Server)
                                                                                </label>
    
                                                                                <label class="@if(in_array(3, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(3, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="3">
                                                                                        Application Services (Burnside Mobile)
                                                                                </label>
    
                                                                                <label class="@if(in_array(4, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(4, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="4">
                                                                                        Application Services (CityWorks)
                                                                                </label>
    
    
                                                                                <label class="@if(in_array(5, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(5, $upStreamDependenciesArray)) checked @endif class="upstream" name="spe_upstream_dependencies[{{$service->id}}][]" value="5">
                                                                                    Application Services (CodeTwo)
                                                                                </label>
    
                                                                                <label class="@if(in_array(6, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(6, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="6">
                                                                                        Application Services (GeoCortex)
                                                                                </label>
    
                                                                                <label class="@if(in_array(7, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(7, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="7">
                                                                                        Application Services (InfoHR)
                                                                                </label>
    
                                                                                <label class="@if(in_array(8, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(8, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="8">
                                                                                        Application Services (LaserFiche + Weblink)
                                                                                </label>
    
                                                                                <label class="@if(in_array(9, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(9, $upStreamDependenciesArray)) checked @endif class="upstream" name="spe_upstream_dependencies[{{$service->id}}][]" value="9">
                                                                                    Application Services (Maestro)
                                                                                </label>
    
                                                                                <label class="@if(in_array(10, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(10, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="10">
                                                                                        Application Services (Municipal Data Works)
                                                                                </label>
    
                                                                                <label class="@if(in_array(11, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(11, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="11">
                                                                                        Application Services (Orchid)
                                                                                </label>
    
                                                                                <label class="@if(in_array(12, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(12, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="12">
                                                                                        Application Services (Protege)
                                                                                </label>
    
                                                                                <label class="@if(in_array(13, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(13, $upStreamDependenciesArray)) checked @endif class="upstream" name="spe_upstream_dependencies[{{$service->id}}][]" value="13">
                                                                                    Application Services (Sage Intelligence Report Viewer)
                                                                                </label>
    
                                                                                <label class="@if(in_array(14, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(14, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="14">
                                                                                        Application Services (TimeManager)
                                                                                </label>
    
                                                                                <label class="@if(in_array(15, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(15, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="15">
                                                                                        Application Services (Wellspring Print Boss)
                                                                                </label>
    
                                                                                <label class="@if(in_array(16, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(16, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="16">
                                                                                        Application Services (Winfuel)
                                                                                </label>
    
                                                                                <label class="@if(in_array(17, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(17, $upStreamDependenciesArray)) checked @endif class="upstream" name="spe_upstream_dependencies[{{$service->id}}][]" value="17">
                                                                                    Application Services (WinPAK)
                                                                                </label>
    
                                                                                <label class="@if(in_array(18, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(18, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="18">
                                                                                        Avigilon Control Center/Cameras
                                                                                </label>
    
                                                                            
    
                                                                                
    
                                                                             
    
                                                                                
    
                                                                           
                                                                            </div>
    
                                                                            <div class="secondHalf"
                                                                                style="width:50%; float:left;">

                                                                                <label class="@if(in_array(19, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(19, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="19">
                                                                                        Blackberry Enterprise Server
                                                                                </label>
    
                                                                                <label class="@if(in_array(20, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(20, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="20">
                                                                                        CellAsyst
                                                                                </label>
    
                                                                                <label class="@if(in_array(21, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(21, $upStreamDependenciesArray)) checked @endif class="upstream" name="spe_upstream_dependencies[{{$service->id}}][]" value="21">
                                                                                    CiscoAnyConnectVPN
                                                                                </label>
    
                                                                                <label class="@if(in_array(22, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(22, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="22">
                                                                                        Database Services (GeoCortex)
                                                                                </label>
    
                                                                                <label class="@if(in_array(23, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(23, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="23">
                                                                                        Database Services (GISSQL)
                                                                                </label>
                                                                                
                                                                                <label class="@if(in_array(24, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(24, $upStreamDependenciesArray)) checked @endif class="upstream" name="spe_upstream_dependencies[{{$service->id}}][]" value="24">
                                                                                    Database Services (MS Access)
                                                                                </label>
    
                                                                                <label class="@if(in_array(25, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(25, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="25">
                                                                                        Database Services (SQL)
                                                                                </label>
    
                                                                                <label class="@if(in_array(26, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(26, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="26">
                                                                                        Email (Microsoft Exchange) + Weblink
                                                                                </label>
    
                                                                                <label class="@if(in_array(27, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(27, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="27">
                                                                                        File Services (File Shares)
                                                                                </label>
    
    
                                                                                <label class="@if(in_array(28, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(28, $upStreamDependenciesArray)) checked @endif class="upstream" name="spe_upstream_dependencies[{{$service->id}}][]" value="28">
                                                                                    Internet Access
                                                                                </label>
    
                                                                                <label class="@if(in_array(29, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(29, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="29">
                                                                                        LogMeIn
                                                                                </label>
    
                                                                                <label class="@if(in_array(30, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(30, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="30">
                                                                                        Network Access
                                                                                </label>
    
                                                                                <label class="@if(in_array(31, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(31, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="31">
                                                                                        Print/Fax Service
                                                                                </label>
    
                                                                                <label class="@if(in_array(32, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(32, $upStreamDependenciesArray)) checked @endif class="upstream" name="spe_upstream_dependencies[{{$service->id}}][]" value="32">
                                                                                    SFTP(File Transfers)
                                                                                </label>
    
                                                                                <label class="@if(in_array(33, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(33, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="33">
                                                                                        Telephone (Cellular)
                                                                                </label>
    
                                                                                <label class="@if(in_array(34, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(34, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="34">
                                                                                        Telephone (ShoreTel System)
                                                                                </label>
    
                                                                                <label class="@if(in_array(35, $upStreamDependenciesArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(35, $upStreamDependenciesArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_upstream_dependencies[{{$service->id}}][]" value="35">
                                                                                        ZendTo (File Transfers)
                                                                                </label>
    
    
                                                                             
    
    
                                                                                <input type="hidden" name="spe_upstream_dependencies[{{$service->id}}][]" value="0">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <div class="col-md-12 text-right">
                                                                                <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <td class="@if(count($desktopAppsArray)>1 ) bg-success @else bg-danger @endif" data-toggle="modal" data-target="#desktopAppsModal{{$key}}"></td>
                                                         

                                                            <div class="modal fade invers" id="desktopAppsModal{{$key}}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <h4 class="modal-title"
                                                                                style="color:#ffffff;">Desktop Applications</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body text-left">
                                                                            <div class="firstHalf" style="width:50%; float:left;">
    
                                                                                <label class="@if(in_array(1, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(1, $desktopAppsArray)) checked @endif class="upstream" name="spe_desktop_applications[{{$service->id}}][]" value="1">
                                                                                    Access Database
                                                                                </label>
    
                                                                                <label class="@if(in_array(2, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(2, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="2">
                                                                                        ACT!
                                                                                </label>
    
                                                                                <label class="@if(in_array(3, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(3, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="3">
                                                                                        Adobe Pro DC
                                                                                </label>
    
                                                                                <label class="@if(in_array(4, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(4, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="4">
                                                                                        Adobe Reader DC
                                                                                </label>
    
    
                                                                                <label class="@if(in_array(5, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(5, $desktopAppsArray)) checked @endif class="upstream" name="spe_desktop_applications[{{$service->id}}][]" value="5">
                                                                                    ADP
                                                                                </label>
    
                                                                                <label class="@if(in_array(6, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(6, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="6">
                                                                                        ADP Report Smith
                                                                                </label>
    
                                                                                <label class="@if(in_array(7, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(7, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="7">
                                                                                        APC/Liebert Alerting
                                                                                </label>
    
                                                                                <label class="@if(in_array(8, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(8, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="8">
                                                                                        ArcGIS Desktop
                                                                                </label>
    
                                                                                <label class="@if(in_array(9, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(9, $desktopAppsArray)) checked @endif class="upstream" name="spe_desktop_applications[{{$service->id}}][]" value="9">
                                                                                    ArcGIS Pro
                                                                                </label>
    
                                                                                <label class="@if(in_array(10, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(10, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="10">
                                                                                        AutoCAD Civil3D
                                                                                </label>
    
                                                                                <label class="@if(in_array(11, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(11, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="11">
                                                                                        Avigilon Control Center/Cameras
                                                                                </label>
    
                                                                                <label class="@if(in_array(12, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(12, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="12">
                                                                                        CAD (EWSWA)
                                                                                </label>
    
                                                                                <label class="@if(in_array(13, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(13, $desktopAppsArray)) checked @endif class="upstream" name="spe_desktop_applications[{{$service->id}}][]" value="13">
                                                                                    Clinical Connect
                                                                                </label>
    
                                                                                <label class="@if(in_array(14, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(14, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="14">
                                                                                        CODE-STAT
                                                                                </label>
    
                                                                                <label class="@if(in_array(15, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(15, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="15">
                                                                                        Email (Microsoft Exchange) + Weblink
                                                                                </label>
    
                                                                                <label class="@if(in_array(16, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(16, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="16">
                                                                                        FitPro
                                                                                </label>
    
                                                                                <label class="@if(in_array(17, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(17, $desktopAppsArray)) checked @endif class="upstream" name="spe_desktop_applications[{{$service->id}}][]" value="17">
                                                                                    GeoCortex Report Designer
                                                                                </label>
    
                                                                                <label class="@if(in_array(18, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(18, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="18">
                                                                                        GeoCortex Workflow Designer
                                                                                </label>
    
                                                                                <label class="@if(in_array(19, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(19, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="19">
                                                                                        GeoExpress (LizardTech)
                                                                                </label>
    
                                                                                
    
                                                                             
    
                                                                                
    
                                                                           
                                                                            </div>
    
                                                                            <div class="secondHalf"
                                                                                style="width:50%; float:left;">
    
                                                                                <label class="@if(in_array(20, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(20, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="20">
                                                                                        Geologix (GPS Software)
                                                                                </label>
    
                                                                                <label class="@if(in_array(21, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(21, $desktopAppsArray)) checked @endif class="upstream" name="spe_desktop_applications[{{$service->id}}][]" value="21">
                                                                                    GEOWare
                                                                                </label>
    
                                                                                <label class="@if(in_array(22, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(22, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="22">
                                                                                        GridSmart
                                                                                </label>
    
                                                                                <label class="@if(in_array(23, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(23, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="23">
                                                                                        InfoHR
                                                                                </label>
                                                                                
                                                                                <label class="@if(in_array(24, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(24, $desktopAppsArray)) checked @endif class="upstream" name="spe_desktop_applications[{{$service->id}}][]" value="24">
                                                                                    Laserfiche + Weblink
                                                                                </label>
    
                                                                                <label class="@if(in_array(25, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(25, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="25">
                                                                                        LogMeIn
                                                                                </label>
    
                                                                                <label class="@if(in_array(26, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(26, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="26">
                                                                                        MESH
                                                                                </label>
    
                                                                                <label class="@if(in_array(27, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(27, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="27">
                                                                                        Microsoft Office 2019
                                                                                </label>
    
    
                                                                                <label class="@if(in_array(28, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(28, $desktopAppsArray)) checked @endif class="upstream" name="spe_desktop_applications[{{$service->id}}][]" value="28">
                                                                                    NexTalk TextNet Client
                                                                                </label>
    
                                                                                <label class="@if(in_array(29, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(29, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="29">
                                                                                        PriijectorMMX
                                                                                </label>
    
                                                                                <label class="@if(in_array(30, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(30, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="30">
                                                                                        Protege
                                                                                </label>
    
                                                                                <label class="@if(in_array(31, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(31, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="31">
                                                                                        Sage 300 Accounting (Accpac)
                                                                                </label>
    
                                                                                <label class="@if(in_array(32, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(32, $desktopAppsArray)) checked @endif class="upstream" name="spe_desktop_applications[{{$service->id}}][]" value="32">
                                                                                    Synchro Traffic Software
                                                                                </label>
    
                                                                                <label class="@if(in_array(33, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(33, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="33">
                                                                                        TES Map
                                                                                </label>
    
                                                                                <label class="@if(in_array(34, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(34, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="34">
                                                                                        TextNet
                                                                                </label>
    
                                                                                <label class="@if(in_array(35, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(35, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="35">
                                                                                        Wellspring Print Boss
                                                                                </label>
    
                                                                                <label class="@if(in_array(36, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(36, $desktopAppsArray)) checked @endif class="upstream" name="spe_desktop_applications[{{$service->id}}][]" value="36">
                                                                                    Winfuel
                                                                                </label>
    
                                                                                <label class="@if(in_array(37, $desktopAppsArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(37, $desktopAppsArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_desktop_applications[{{$service->id}}][]" value="37">
                                                                                        Zoom
                                                                                </label>
    
                                                                             
    
    
                                                                                <input type="hidden" name="spe_desktop_applications[{{$service->id}}][]" value="0">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <div class="col-md-12 text-right">
                                                                                <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <td><textarea name="spe_comments[{{$service->id}}]" class="form-control" rows="5">  @if($service->biaServiceResult) {{$service->biaServiceResult->spe_comments}} @endif</textarea></td>
                                                          
                                                        </tr>
                                                        
                                                    @endforeach
                                                    
                                                @endif

                                                </table>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </form>



                        </div>

                        <div class="card mt-2">

                            <form method="POST" id="biaServiceFormFourB">

                                @csrf
                                <input type="hidden" name="company_id" value="{{$department->company_id}}">
                                <input type="hidden" name="bia_id" value="{{$department->bia_id}}">
                                <input type="hidden" name="bia_department_id" value="{{$department->id}}">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <h3 class="title bold">4(b). List ALL secondary IT service requirements</h3>
                                            <p>Secondary IT service requirements are defined as those which are not required to meet the service/process RTO but are needed at some point in time as part of the business delivery process</p>
                                        </div>
                                        <div class="col-sm-1">
                                            {{-- <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i> Submit</button> --}}
                                        </div>

                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr class="bg-dark">
                                                        <td>INTERNAL FUNCTION (SERVICE/PROCESS)</td>
                                                        <td>TIER 1 (0-4 HOURS)</td>
                                                        <td>TIER 2 (24 - HOURS)</td>
                                                        <td>TIER 3 (3 - DAYS)</td>
                                                        <td>TIER 4 (7 - DAYS)</td>
                                                        <td>TIER 5 (2-4 WEEKS)</td>
                                                    </tr>

                                                    @if ($department->biaService)

                                                    @foreach ($department->biaService as $key=>$service)


                                                    @php
                                                        $tirerOneArray = array();
                                                        $tirerTwoArray = array();
                                                        $tirerThreeArray = array();
                                                        $tirerFourArray = array();
                                                        $tirerFiveArray = array();
                                                    @endphp
        
                                                    @if ($service->biaServiceResult)
                                                        @php
                                                            
                                                            if ($service->biaServiceResult->spe_tier_1) {
                                                                $tirerOneArray = json_decode($service->biaServiceResult->spe_tier_1, true);
                                                            }else{
                                                                $tirerOneArray  = array();
                                                            }

                                                            if ($service->biaServiceResult->spe_tier_2) {
                                                                $tirerTwoArray = json_decode($service->biaServiceResult->spe_tier_2, true);
                                                            }else{
                                                                $tirerTwoArray = array();
                                                            }

                                                            if ($service->biaServiceResult->spe_tier_3) {
                                                                $tirerThreeArray = json_decode($service->biaServiceResult->spe_tier_3, true);
                                                            }else{
                                                                $tirerThreeArray  = array();
                                                            }

                                                            if ($service->biaServiceResult->spe_tier_4) {
                                                                $tirerFourArray = json_decode($service->biaServiceResult->spe_tier_4, true);
                                                            }else{
                                                                $tirerFourArray = array();
                                                            }

                                                            if ($service->biaServiceResult->spe_tier_5) {
                                                                $tirerFiveArray = json_decode($service->biaServiceResult->spe_tier_5, true);
                                                            }else{
                                                                $tirerFiveArray  = array();
                                                            }

                                                        
                    
                                                        @endphp
                                                    @endif


                                                

        
                                                        <tr>
                                                            <td class="bg-light bold">{{$service->name}}</td>


                                                            <td class="@if(count($tirerOneArray )>1) bg-danger @else bg-success @endif " data-toggle="modal" data-target="#tirerOneModal{{$key}}"></td>
                                                            <div class="modal fade invers" id="tirerOneModal{{$key}}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <h4 class="modal-title"
                                                                                style="color:#ffffff;">IT Service Catalouge</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body text-left">
                                                                            <div class="firstHalf" style="width:50%; float:left;">
    
                                                                                <label class="@if(in_array(1, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(1, $tirerOneArray)) checked @endif class="upstream" name="spe_tier_1[{{$service->id}}][]" value="1">
                                                                                    ADP Report Smith
                                                                                </label>
    
                                                                                <label class="@if(in_array(2, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(2, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="2">
                                                                                        Application Services (ArcGIS Server)
                                                                                </label>
    
                                                                                <label class="@if(in_array(3, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(3, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="3">
                                                                                        Application Services (Burnside Mobile)
                                                                                </label>
    
                                                                                <label class="@if(in_array(4, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(4, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="4">
                                                                                        Application Services (CityWorks)
                                                                                </label>
    
    
                                                                                <label class="@if(in_array(5, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(5, $tirerOneArray)) checked @endif class="upstream" name="spe_tier_1[{{$service->id}}][]" value="5">
                                                                                    Application Services (CodeTwo)
                                                                                </label>
    
                                                                                <label class="@if(in_array(6, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(6, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="6">
                                                                                        Application Services (GeoCortex)
                                                                                </label>
    
                                                                                <label class="@if(in_array(7, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(7, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="7">
                                                                                        Application Services (InfoHR)
                                                                                </label>
    
                                                                                <label class="@if(in_array(8, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(8, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="8">
                                                                                        Application Services (LaserFiche + Weblink)
                                                                                </label>
    
                                                                                <label class="@if(in_array(9, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(9, $tirerOneArray)) checked @endif class="upstream" name="spe_tier_1[{{$service->id}}][]" value="9">
                                                                                    Application Services (Maestro)
                                                                                </label>
    
                                                                                <label class="@if(in_array(10, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(10, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="10">
                                                                                        Application Services (Municipal Data Works)
                                                                                </label>
    
                                                                                <label class="@if(in_array(11, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(11, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="11">
                                                                                        Application Services (Orchid)
                                                                                </label>
    
                                                                                <label class="@if(in_array(12, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(12, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="12">
                                                                                        Application Services (Protege)
                                                                                </label>
    
                                                                                <label class="@if(in_array(13, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(13, $tirerOneArray)) checked @endif class="upstream" name="spe_tier_1[{{$service->id}}][]" value="13">
                                                                                    Application Services (Sage Intelligence Report Viewer)
                                                                                </label>
    
                                                                                <label class="@if(in_array(14, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(14, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="14">
                                                                                        Application Services (TimeManager)
                                                                                </label>
    
                                                                                <label class="@if(in_array(15, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(15, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="15">
                                                                                        Application Services (Wellspring Print Boss)
                                                                                </label>
    
                                                                                <label class="@if(in_array(16, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(16, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="16">
                                                                                        Application Services (Winfuel)
                                                                                </label>
    
                                                                                <label class="@if(in_array(17, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(17, $tirerOneArray)) checked @endif class="upstream" name="spe_tier_1[{{$service->id}}][]" value="17">
                                                                                    Application Services (WinPAK)
                                                                                </label>
    
                                                                                <label class="@if(in_array(18, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(18, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="18">
                                                                                        Avigilon Control Center/Cameras
                                                                                </label>
    
                                                                            
    
                                                                                
    
                                                                             
    
                                                                                
    
                                                                           
                                                                            </div>
    
                                                                            <div class="secondHalf"
                                                                                style="width:50%; float:left;">

                                                                                <label class="@if(in_array(19, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(19, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="19">
                                                                                        Blackberry Enterprise Server
                                                                                </label>
    
                                                                                <label class="@if(in_array(20, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(20, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="20">
                                                                                        CellAsyst
                                                                                </label>
    
                                                                                <label class="@if(in_array(21, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(21, $tirerOneArray)) checked @endif class="upstream" name="spe_tier_1[{{$service->id}}][]" value="21">
                                                                                    CiscoAnyConnectVPN
                                                                                </label>
    
                                                                                <label class="@if(in_array(22, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(22, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="22">
                                                                                        Database Services (GeoCortex)
                                                                                </label>
    
                                                                                <label class="@if(in_array(23, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(23, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="23">
                                                                                        Database Services (GISSQL)
                                                                                </label>
                                                                                
                                                                                <label class="@if(in_array(24, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(24, $tirerOneArray)) checked @endif class="upstream" name="spe_tier_1[{{$service->id}}][]" value="24">
                                                                                    Database Services (MS Access)
                                                                                </label>
    
                                                                                <label class="@if(in_array(25, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(25, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="25">
                                                                                        Database Services (SQL)
                                                                                </label>
    
                                                                                <label class="@if(in_array(26, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(26, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="26">
                                                                                        Email (Microsoft Exchange) + Weblink
                                                                                </label>
    
                                                                                <label class="@if(in_array(27, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(27, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="27">
                                                                                        File Services (File Shares)
                                                                                </label>
    
    
                                                                                <label class="@if(in_array(28, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(28, $tirerOneArray)) checked @endif class="upstream" name="spe_tier_1[{{$service->id}}][]" value="28">
                                                                                    Internet Access
                                                                                </label>
    
                                                                                <label class="@if(in_array(29, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(29, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="29">
                                                                                        LogMeIn
                                                                                </label>
    
                                                                                <label class="@if(in_array(30, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(30, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="30">
                                                                                        Network Access
                                                                                </label>
    
                                                                                <label class="@if(in_array(31, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(31, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="31">
                                                                                        Print/Fax Service
                                                                                </label>
    
                                                                                <label class="@if(in_array(32, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(32, $tirerOneArray)) checked @endif class="upstream" name="spe_tier_1[{{$service->id}}][]" value="32">
                                                                                    SFTP(File Transfers)
                                                                                </label>
    
                                                                                <label class="@if(in_array(33, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(33, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="33">
                                                                                        Telephone (Cellular)
                                                                                </label>
    
                                                                                <label class="@if(in_array(34, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(34, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="34">
                                                                                        Telephone (ShoreTel System)
                                                                                </label>
    
                                                                                <label class="@if(in_array(35, $tirerOneArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(35, $tirerOneArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_1[{{$service->id}}][]" value="35">
                                                                                        ZendTo (File Transfers)
                                                                                </label>
    
    
                                                                             
    
    
                                                                                <input type="hidden" name="spe_tier_1[{{$service->id}}][]" value="0">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <div class="col-md-12 text-right">
                                                                                <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <td class="@if(count($tirerTwoArray )>1) bg-danger @else bg-success @endif " data-toggle="modal" data-target="#tirerTwoModal{{$key}}"></td>

                                                            <div class="modal fade invers" id="tirerTwoModal{{$key}}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <h4 class="modal-title"
                                                                                style="color:#ffffff;">IT Service Catalouge</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body text-left">
                                                                            <div class="firstHalf" style="width:50%; float:left;">
    
                                                                                <label class="@if(in_array(1, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(1, $tirerTwoArray)) checked @endif class="upstream" name="spe_tier_2[{{$service->id}}][]" value="1">
                                                                                    ADP Report Smith
                                                                                </label>
    
                                                                                <label class="@if(in_array(2, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(2, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="2">
                                                                                        Application Services (ArcGIS Server)
                                                                                </label>
    
                                                                                <label class="@if(in_array(3, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(3, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="3">
                                                                                        Application Services (Burnside Mobile)
                                                                                </label>
    
                                                                                <label class="@if(in_array(4, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(4, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="4">
                                                                                        Application Services (CityWorks)
                                                                                </label>
    
    
                                                                                <label class="@if(in_array(5, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(5, $tirerTwoArray)) checked @endif class="upstream" name="spe_tier_2[{{$service->id}}][]" value="5">
                                                                                    Application Services (CodeTwo)
                                                                                </label>
    
                                                                                <label class="@if(in_array(6, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(6, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="6">
                                                                                        Application Services (GeoCortex)
                                                                                </label>
    
                                                                                <label class="@if(in_array(7, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(7, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="7">
                                                                                        Application Services (InfoHR)
                                                                                </label>
    
                                                                                <label class="@if(in_array(8, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(8, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="8">
                                                                                        Application Services (LaserFiche + Weblink)
                                                                                </label>
    
                                                                                <label class="@if(in_array(9, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(9, $tirerTwoArray)) checked @endif class="upstream" name="spe_tier_2[{{$service->id}}][]" value="9">
                                                                                    Application Services (Maestro)
                                                                                </label>
    
                                                                                <label class="@if(in_array(10, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(10, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="10">
                                                                                        Application Services (Municipal Data Works)
                                                                                </label>
    
                                                                                <label class="@if(in_array(11, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(11, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="11">
                                                                                        Application Services (Orchid)
                                                                                </label>
    
                                                                                <label class="@if(in_array(12, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(12, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="12">
                                                                                        Application Services (Protege)
                                                                                </label>
    
                                                                                <label class="@if(in_array(13, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(13, $tirerTwoArray)) checked @endif class="upstream" name="spe_tier_2[{{$service->id}}][]" value="13">
                                                                                    Application Services (Sage Intelligence Report Viewer)
                                                                                </label>
    
                                                                                <label class="@if(in_array(14, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(14, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="14">
                                                                                        Application Services (TimeManager)
                                                                                </label>
    
                                                                                <label class="@if(in_array(15, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(15, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="15">
                                                                                        Application Services (Wellspring Print Boss)
                                                                                </label>
    
                                                                                <label class="@if(in_array(16, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(16, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="16">
                                                                                        Application Services (Winfuel)
                                                                                </label>
    
                                                                                <label class="@if(in_array(17, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(17, $tirerTwoArray)) checked @endif class="upstream" name="spe_tier_2[{{$service->id}}][]" value="17">
                                                                                    Application Services (WinPAK)
                                                                                </label>
    
                                                                                <label class="@if(in_array(18, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(18, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="18">
                                                                                        Avigilon Control Center/Cameras
                                                                                </label>
    
                                                                            
    
                                                                                
    
                                                                             
    
                                                                                
    
                                                                           
                                                                            </div>
    
                                                                            <div class="secondHalf"
                                                                                style="width:50%; float:left;">

                                                                                <label class="@if(in_array(19, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(19, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="19">
                                                                                        Blackberry Enterprise Server
                                                                                </label>
    
                                                                                <label class="@if(in_array(20, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(20, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="20">
                                                                                        CellAsyst
                                                                                </label>
    
                                                                                <label class="@if(in_array(21, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(21, $tirerTwoArray)) checked @endif class="upstream" name="spe_tier_2[{{$service->id}}][]" value="21">
                                                                                    CiscoAnyConnectVPN
                                                                                </label>
    
                                                                                <label class="@if(in_array(22, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(22, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="22">
                                                                                        Database Services (GeoCortex)
                                                                                </label>
    
                                                                                <label class="@if(in_array(23, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(23, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="23">
                                                                                        Database Services (GISSQL)
                                                                                </label>
                                                                                
                                                                                <label class="@if(in_array(24, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(24, $tirerTwoArray)) checked @endif class="upstream" name="spe_tier_2[{{$service->id}}][]" value="24">
                                                                                    Database Services (MS Access)
                                                                                </label>
    
                                                                                <label class="@if(in_array(25, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(25, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="25">
                                                                                        Database Services (SQL)
                                                                                </label>
    
                                                                                <label class="@if(in_array(26, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(26, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="26">
                                                                                        Email (Microsoft Exchange) + Weblink
                                                                                </label>
    
                                                                                <label class="@if(in_array(27, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(27, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="27">
                                                                                        File Services (File Shares)
                                                                                </label>
    
    
                                                                                <label class="@if(in_array(28, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(28, $tirerTwoArray)) checked @endif class="upstream" name="spe_tier_2[{{$service->id}}][]" value="28">
                                                                                    Internet Access
                                                                                </label>
    
                                                                                <label class="@if(in_array(29, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(29, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="29">
                                                                                        LogMeIn
                                                                                </label>
    
                                                                                <label class="@if(in_array(30, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(30, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="30">
                                                                                        Network Access
                                                                                </label>
    
                                                                                <label class="@if(in_array(31, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(31, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="31">
                                                                                        Print/Fax Service
                                                                                </label>
    
                                                                                <label class="@if(in_array(32, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(32, $tirerTwoArray)) checked @endif class="upstream" name="spe_tier_2[{{$service->id}}][]" value="32">
                                                                                    SFTP(File Transfers)
                                                                                </label>
    
                                                                                <label class="@if(in_array(33, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(33, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="33">
                                                                                        Telephone (Cellular)
                                                                                </label>
    
                                                                                <label class="@if(in_array(34, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(34, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="34">
                                                                                        Telephone (ShoreTel System)
                                                                                </label>
    
                                                                                <label class="@if(in_array(35, $tirerTwoArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(35, $tirerTwoArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_2[{{$service->id}}][]" value="35">
                                                                                        ZendTo (File Transfers)
                                                                                </label>
    
    
                                                                             
    
    
                                                                                <input type="hidden" name="spe_tier_2[{{$service->id}}][]" value="0">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <div class="col-md-12 text-right">
                                                                                <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <td class="@if(count($tirerThreeArray )>1) bg-danger @else bg-success @endif " data-toggle="modal" data-target="#tirerThreeModal{{$key}}" ></td>

                                                            <div class="modal fade invers" id="tirerThreeModal{{$key}}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <h4 class="modal-title"
                                                                                style="color:#ffffff;">IT Service Catalouge</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body text-left">
                                                                            <div class="firstHalf" style="width:50%; float:left;">
    
                                                                                <label class="@if(in_array(1, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(1, $tirerThreeArray)) checked @endif class="upstream" name="spe_tier_3[{{$service->id}}][]" value="1">
                                                                                    ADP Report Smith
                                                                                </label>
    
                                                                                <label class="@if(in_array(2, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(2, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="2">
                                                                                        Application Services (ArcGIS Server)
                                                                                </label>
    
                                                                                <label class="@if(in_array(3, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(3, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="3">
                                                                                        Application Services (Burnside Mobile)
                                                                                </label>
    
                                                                                <label class="@if(in_array(4, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(4, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="4">
                                                                                        Application Services (CityWorks)
                                                                                </label>
    
    
                                                                                <label class="@if(in_array(5, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(5, $tirerThreeArray)) checked @endif class="upstream" name="spe_tier_3[{{$service->id}}][]" value="5">
                                                                                    Application Services (CodeTwo)
                                                                                </label>
    
                                                                                <label class="@if(in_array(6, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(6, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="6">
                                                                                        Application Services (GeoCortex)
                                                                                </label>
    
                                                                                <label class="@if(in_array(7, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(7, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="7">
                                                                                        Application Services (InfoHR)
                                                                                </label>
    
                                                                                <label class="@if(in_array(8, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(8, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="8">
                                                                                        Application Services (LaserFiche + Weblink)
                                                                                </label>
    
                                                                                <label class="@if(in_array(9, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(9, $tirerThreeArray)) checked @endif class="upstream" name="spe_tier_3[{{$service->id}}][]" value="9">
                                                                                    Application Services (Maestro)
                                                                                </label>
    
                                                                                <label class="@if(in_array(10, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(10, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="10">
                                                                                        Application Services (Municipal Data Works)
                                                                                </label>
    
                                                                                <label class="@if(in_array(11, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(11, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="11">
                                                                                        Application Services (Orchid)
                                                                                </label>
    
                                                                                <label class="@if(in_array(12, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(12, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="12">
                                                                                        Application Services (Protege)
                                                                                </label>
    
                                                                                <label class="@if(in_array(13, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(13, $tirerThreeArray)) checked @endif class="upstream" name="spe_tier_3[{{$service->id}}][]" value="13">
                                                                                    Application Services (Sage Intelligence Report Viewer)
                                                                                </label>
    
                                                                                <label class="@if(in_array(14, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(14, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="14">
                                                                                        Application Services (TimeManager)
                                                                                </label>
    
                                                                                <label class="@if(in_array(15, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(15, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="15">
                                                                                        Application Services (Wellspring Print Boss)
                                                                                </label>
    
                                                                                <label class="@if(in_array(16, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(16, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="16">
                                                                                        Application Services (Winfuel)
                                                                                </label>
    
                                                                                <label class="@if(in_array(17, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(17, $tirerThreeArray)) checked @endif class="upstream" name="spe_tier_3[{{$service->id}}][]" value="17">
                                                                                    Application Services (WinPAK)
                                                                                </label>
    
                                                                                <label class="@if(in_array(18, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(18, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="18">
                                                                                        Avigilon Control Center/Cameras
                                                                                </label>
    
                                                                            
    
                                                                                
    
                                                                             
    
                                                                                
    
                                                                           
                                                                            </div>
    
                                                                            <div class="secondHalf"
                                                                                style="width:50%; float:left;">

                                                                                <label class="@if(in_array(19, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(19, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="19">
                                                                                        Blackberry Enterprise Server
                                                                                </label>
    
                                                                                <label class="@if(in_array(20, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(20, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="20">
                                                                                        CellAsyst
                                                                                </label>
    
                                                                                <label class="@if(in_array(21, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(21, $tirerThreeArray)) checked @endif class="upstream" name="spe_tier_3[{{$service->id}}][]" value="21">
                                                                                    CiscoAnyConnectVPN
                                                                                </label>
    
                                                                                <label class="@if(in_array(22, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(22, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="22">
                                                                                        Database Services (GeoCortex)
                                                                                </label>
    
                                                                                <label class="@if(in_array(23, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(23, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="23">
                                                                                        Database Services (GISSQL)
                                                                                </label>
                                                                                
                                                                                <label class="@if(in_array(24, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(24, $tirerThreeArray)) checked @endif class="upstream" name="spe_tier_3[{{$service->id}}][]" value="24">
                                                                                    Database Services (MS Access)
                                                                                </label>
    
                                                                                <label class="@if(in_array(25, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(25, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="25">
                                                                                        Database Services (SQL)
                                                                                </label>
    
                                                                                <label class="@if(in_array(26, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(26, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="26">
                                                                                        Email (Microsoft Exchange) + Weblink
                                                                                </label>
    
                                                                                <label class="@if(in_array(27, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(27, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="27">
                                                                                        File Services (File Shares)
                                                                                </label>
    
    
                                                                                <label class="@if(in_array(28, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(28, $tirerThreeArray)) checked @endif class="upstream" name="spe_tier_3[{{$service->id}}][]" value="28">
                                                                                    Internet Access
                                                                                </label>
    
                                                                                <label class="@if(in_array(29, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(29, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="29">
                                                                                        LogMeIn
                                                                                </label>
    
                                                                                <label class="@if(in_array(30, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(30, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="30">
                                                                                        Network Access
                                                                                </label>
    
                                                                                <label class="@if(in_array(31, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(31, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="31">
                                                                                        Print/Fax Service
                                                                                </label>
    
                                                                                <label class="@if(in_array(32, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(32, $tirerThreeArray)) checked @endif class="upstream" name="spe_tier_3[{{$service->id}}][]" value="32">
                                                                                    SFTP(File Transfers)
                                                                                </label>
    
                                                                                <label class="@if(in_array(33, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(33, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="33">
                                                                                        Telephone (Cellular)
                                                                                </label>
    
                                                                                <label class="@if(in_array(34, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(34, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="34">
                                                                                        Telephone (ShoreTel System)
                                                                                </label>
    
                                                                                <label class="@if(in_array(35, $tirerThreeArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(35, $tirerThreeArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_3[{{$service->id}}][]" value="35">
                                                                                        ZendTo (File Transfers)
                                                                                </label>
    
    
                                                                             
    
    
                                                                                <input type="hidden" name="spe_tier_3[{{$service->id}}][]" value="0">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <div class="col-md-12 text-right">
                                                                                <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <td class="@if(count($tirerFourArray )>1) bg-danger @else bg-success @endif " data-toggle="modal" data-target="#tirerFourModal{{$key}}" ></td>

                                                            <div class="modal fade invers" id="tirerFourModal{{$key}}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <h4 class="modal-title"
                                                                                style="color:#ffffff;">IT Service Catalouge</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body text-left">
                                                                            <div class="firstHalf" style="width:50%; float:left;">
    
                                                                                <label class="@if(in_array(1, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(1, $tirerFourArray)) checked @endif class="upstream" name="spe_tier_4[{{$service->id}}][]" value="1">
                                                                                    ADP Report Smith
                                                                                </label>
    
                                                                                <label class="@if(in_array(2, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(2, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="2">
                                                                                        Application Services (ArcGIS Server)
                                                                                </label>
    
                                                                                <label class="@if(in_array(3, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(3, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="3">
                                                                                        Application Services (Burnside Mobile)
                                                                                </label>
    
                                                                                <label class="@if(in_array(4, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(4, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="4">
                                                                                        Application Services (CityWorks)
                                                                                </label>
    
    
                                                                                <label class="@if(in_array(5, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(5, $tirerFourArray)) checked @endif class="upstream" name="spe_tier_4[{{$service->id}}][]" value="5">
                                                                                    Application Services (CodeTwo)
                                                                                </label>
    
                                                                                <label class="@if(in_array(6, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(6, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="6">
                                                                                        Application Services (GeoCortex)
                                                                                </label>
    
                                                                                <label class="@if(in_array(7, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(7, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="7">
                                                                                        Application Services (InfoHR)
                                                                                </label>
    
                                                                                <label class="@if(in_array(8, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(8, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="8">
                                                                                        Application Services (LaserFiche + Weblink)
                                                                                </label>
    
                                                                                <label class="@if(in_array(9, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(9, $tirerFourArray)) checked @endif class="upstream" name="spe_tier_4[{{$service->id}}][]" value="9">
                                                                                    Application Services (Maestro)
                                                                                </label>
    
                                                                                <label class="@if(in_array(10, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(10, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="10">
                                                                                        Application Services (Municipal Data Works)
                                                                                </label>
    
                                                                                <label class="@if(in_array(11, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(11, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="11">
                                                                                        Application Services (Orchid)
                                                                                </label>
    
                                                                                <label class="@if(in_array(12, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(12, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="12">
                                                                                        Application Services (Protege)
                                                                                </label>
    
                                                                                <label class="@if(in_array(13, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(13, $tirerFourArray)) checked @endif class="upstream" name="spe_tier_4[{{$service->id}}][]" value="13">
                                                                                    Application Services (Sage Intelligence Report Viewer)
                                                                                </label>
    
                                                                                <label class="@if(in_array(14, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(14, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="14">
                                                                                        Application Services (TimeManager)
                                                                                </label>
    
                                                                                <label class="@if(in_array(15, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(15, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="15">
                                                                                        Application Services (Wellspring Print Boss)
                                                                                </label>
    
                                                                                <label class="@if(in_array(16, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(16, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="16">
                                                                                        Application Services (Winfuel)
                                                                                </label>
    
                                                                                <label class="@if(in_array(17, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(17, $tirerFourArray)) checked @endif class="upstream" name="spe_tier_4[{{$service->id}}][]" value="17">
                                                                                    Application Services (WinPAK)
                                                                                </label>
    
                                                                                <label class="@if(in_array(18, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(18, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="18">
                                                                                        Avigilon Control Center/Cameras
                                                                                </label>
    
                                                                            
    
                                                                                
    
                                                                             
    
                                                                                
    
                                                                           
                                                                            </div>
    
                                                                            <div class="secondHalf"
                                                                                style="width:50%; float:left;">

                                                                                <label class="@if(in_array(19, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(19, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="19">
                                                                                        Blackberry Enterprise Server
                                                                                </label>
    
                                                                                <label class="@if(in_array(20, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(20, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="20">
                                                                                        CellAsyst
                                                                                </label>
    
                                                                                <label class="@if(in_array(21, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(21, $tirerFourArray)) checked @endif class="upstream" name="spe_tier_4[{{$service->id}}][]" value="21">
                                                                                    CiscoAnyConnectVPN
                                                                                </label>
    
                                                                                <label class="@if(in_array(22, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(22, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="22">
                                                                                        Database Services (GeoCortex)
                                                                                </label>
    
                                                                                <label class="@if(in_array(23, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(23, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="23">
                                                                                        Database Services (GISSQL)
                                                                                </label>
                                                                                
                                                                                <label class="@if(in_array(24, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(24, $tirerFourArray)) checked @endif class="upstream" name="spe_tier_4[{{$service->id}}][]" value="24">
                                                                                    Database Services (MS Access)
                                                                                </label>
    
                                                                                <label class="@if(in_array(25, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(25, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="25">
                                                                                        Database Services (SQL)
                                                                                </label>
    
                                                                                <label class="@if(in_array(26, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(26, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="26">
                                                                                        Email (Microsoft Exchange) + Weblink
                                                                                </label>
    
                                                                                <label class="@if(in_array(27, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(27, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="27">
                                                                                        File Services (File Shares)
                                                                                </label>
    
    
                                                                                <label class="@if(in_array(28, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(28, $tirerFourArray)) checked @endif class="upstream" name="spe_tier_4[{{$service->id}}][]" value="28">
                                                                                    Internet Access
                                                                                </label>
    
                                                                                <label class="@if(in_array(29, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(29, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="29">
                                                                                        LogMeIn
                                                                                </label>
    
                                                                                <label class="@if(in_array(30, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(30, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="30">
                                                                                        Network Access
                                                                                </label>
    
                                                                                <label class="@if(in_array(31, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(31, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="31">
                                                                                        Print/Fax Service
                                                                                </label>
    
                                                                                <label class="@if(in_array(32, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(32, $tirerFourArray)) checked @endif class="upstream" name="spe_tier_4[{{$service->id}}][]" value="32">
                                                                                    SFTP(File Transfers)
                                                                                </label>
    
                                                                                <label class="@if(in_array(33, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(33, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="33">
                                                                                        Telephone (Cellular)
                                                                                </label>
    
                                                                                <label class="@if(in_array(34, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(34, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="34">
                                                                                        Telephone (ShoreTel System)
                                                                                </label>
    
                                                                                <label class="@if(in_array(35, $tirerFourArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(35, $tirerFourArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_4[{{$service->id}}][]" value="35">
                                                                                        ZendTo (File Transfers)
                                                                                </label>
    
    
                                                                             
    
    
                                                                                <input type="hidden" name="spe_tier_4[{{$service->id}}][]" value="0">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <div class="col-md-12 text-right">
                                                                                <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <td class="@if(count($tirerFiveArray )>1) bg-danger @else bg-success @endif " data-toggle="modal" data-target="#tirerFiveModal{{$key}}"></td>

                                                            <div class="modal fade invers" id="tirerFiveModal{{$key}}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <h4 class="modal-title"
                                                                                style="color:#ffffff;">IT Service Catalouge</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body text-left">
                                                                            <div class="firstHalf" style="width:50%; float:left;">
    
                                                                                <label class="@if(in_array(1, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(1, $tirerFiveArray)) checked @endif class="upstream" name="spe_tier_5[{{$service->id}}][]" value="1">
                                                                                    ADP Report Smith
                                                                                </label>
    
                                                                                <label class="@if(in_array(2, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(2, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="2">
                                                                                        Application Services (ArcGIS Server)
                                                                                </label>
    
                                                                                <label class="@if(in_array(3, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(3, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="3">
                                                                                        Application Services (Burnside Mobile)
                                                                                </label>
    
                                                                                <label class="@if(in_array(4, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(4, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="4">
                                                                                        Application Services (CityWorks)
                                                                                </label>
    
    
                                                                                <label class="@if(in_array(5, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(5, $tirerFiveArray)) checked @endif class="upstream" name="spe_tier_5[{{$service->id}}][]" value="5">
                                                                                    Application Services (CodeTwo)
                                                                                </label>
    
                                                                                <label class="@if(in_array(6, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(6, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="6">
                                                                                        Application Services (GeoCortex)
                                                                                </label>
    
                                                                                <label class="@if(in_array(7, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(7, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="7">
                                                                                        Application Services (InfoHR)
                                                                                </label>
    
                                                                                <label class="@if(in_array(8, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(8, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="8">
                                                                                        Application Services (LaserFiche + Weblink)
                                                                                </label>
    
                                                                                <label class="@if(in_array(9, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(9, $tirerFiveArray)) checked @endif class="upstream" name="spe_tier_5[{{$service->id}}][]" value="9">
                                                                                    Application Services (Maestro)
                                                                                </label>
    
                                                                                <label class="@if(in_array(10, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(10, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="10">
                                                                                        Application Services (Municipal Data Works)
                                                                                </label>
    
                                                                                <label class="@if(in_array(11, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(11, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="11">
                                                                                        Application Services (Orchid)
                                                                                </label>
    
                                                                                <label class="@if(in_array(12, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(12, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="12">
                                                                                        Application Services (Protege)
                                                                                </label>
    
                                                                                <label class="@if(in_array(13, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(13, $tirerFiveArray)) checked @endif class="upstream" name="spe_tier_5[{{$service->id}}][]" value="13">
                                                                                    Application Services (Sage Intelligence Report Viewer)
                                                                                </label>
    
                                                                                <label class="@if(in_array(14, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(14, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="14">
                                                                                        Application Services (TimeManager)
                                                                                </label>
    
                                                                                <label class="@if(in_array(15, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(15, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="15">
                                                                                        Application Services (Wellspring Print Boss)
                                                                                </label>
    
                                                                                <label class="@if(in_array(16, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(16, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="16">
                                                                                        Application Services (Winfuel)
                                                                                </label>
    
                                                                                <label class="@if(in_array(17, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(17, $tirerFiveArray)) checked @endif class="upstream" name="spe_tier_5[{{$service->id}}][]" value="17">
                                                                                    Application Services (WinPAK)
                                                                                </label>
    
                                                                                <label class="@if(in_array(18, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(18, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="18">
                                                                                        Avigilon Control Center/Cameras
                                                                                </label>
    
                                                                            
    
                                                                                
    
                                                                             
    
                                                                                
    
                                                                           
                                                                            </div>
    
                                                                            <div class="secondHalf"
                                                                                style="width:50%; float:left;">

                                                                                <label class="@if(in_array(19, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(19, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="19">
                                                                                        Blackberry Enterprise Server
                                                                                </label>
    
                                                                                <label class="@if(in_array(20, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(20, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="20">
                                                                                        CellAsyst
                                                                                </label>
    
                                                                                <label class="@if(in_array(21, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(21, $tirerFiveArray)) checked @endif class="upstream" name="spe_tier_5[{{$service->id}}][]" value="21">
                                                                                    CiscoAnyConnectVPN
                                                                                </label>
    
                                                                                <label class="@if(in_array(22, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(22, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="22">
                                                                                        Database Services (GeoCortex)
                                                                                </label>
    
                                                                                <label class="@if(in_array(23, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(23, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="23">
                                                                                        Database Services (GISSQL)
                                                                                </label>
                                                                                
                                                                                <label class="@if(in_array(24, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(24, $tirerFiveArray)) checked @endif class="upstream" name="spe_tier_5[{{$service->id}}][]" value="24">
                                                                                    Database Services (MS Access)
                                                                                </label>
    
                                                                                <label class="@if(in_array(25, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(25, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="25">
                                                                                        Database Services (SQL)
                                                                                </label>
    
                                                                                <label class="@if(in_array(26, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(26, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="26">
                                                                                        Email (Microsoft Exchange) + Weblink
                                                                                </label>
    
                                                                                <label class="@if(in_array(27, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(27, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="27">
                                                                                        File Services (File Shares)
                                                                                </label>
    
    
                                                                                <label class="@if(in_array(28, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(28, $tirerFiveArray)) checked @endif class="upstream" name="spe_tier_5[{{$service->id}}][]" value="28">
                                                                                    Internet Access
                                                                                </label>
    
                                                                                <label class="@if(in_array(29, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(29, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="29">
                                                                                        LogMeIn
                                                                                </label>
    
                                                                                <label class="@if(in_array(30, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(30, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="30">
                                                                                        Network Access
                                                                                </label>
    
                                                                                <label class="@if(in_array(31, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(31, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="31">
                                                                                        Print/Fax Service
                                                                                </label>
    
                                                                                <label class="@if(in_array(32, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(32, $tirerFiveArray)) checked @endif class="upstream" name="spe_tier_5[{{$service->id}}][]" value="32">
                                                                                    SFTP(File Transfers)
                                                                                </label>
    
                                                                                <label class="@if(in_array(33, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(33, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="33">
                                                                                        Telephone (Cellular)
                                                                                </label>
    
                                                                                <label class="@if(in_array(34, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(34, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="34">
                                                                                        Telephone (ShoreTel System)
                                                                                </label>
    
                                                                                <label class="@if(in_array(35, $tirerFiveArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(35, $tirerFiveArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_tier_5[{{$service->id}}][]" value="35">
                                                                                        ZendTo (File Transfers)
                                                                                </label>
    
    
                                                                             
    
    
                                                                                <input type="hidden" name="spe_tier_5[{{$service->id}}][]" value="0">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <div class="col-md-12 text-right">
                                                                                <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                          
                                                        </tr>
                                                        
                                                    @endforeach
                                                    
                                                @endif

                                                </table>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </form>



                        </div>

                        <div class="card mt-2">

                            <form method="POST" id="biaServiceFormFive">

                                @csrf
                                <input type="hidden" name="company_id" value="{{$department->company_id}}">
                                <input type="hidden" name="bia_id" value="{{$department->bia_id}}">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <h3 class="title bold">5. List ALL additional functions (cloud providers, mobile apps, suppliers, clients, etc.) that the service/process requires to function</h3>
                                            <p>Indicate if this dependency would be required to meet RTO at the MSL</p>
                                        </div>
                                        <div class="col-sm-1">
                                            {{-- <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i> Submit</button> --}}
                                        </div>

                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr class="bg-dark">
                                                        <td>EXTERNAL DEPENDENCIES (SERVICE/PROCESS)</td>
                                                        <td>CLOUD PROVIDERS	</td>
                                                        <td>MOBILE APPS</td>
                                                        <td>OTHER EXTERNAL FUNCTIONS (SUPPLIERS, CLIENTS, ETC.)</td>
                                                   
                                                    </tr>
                                                    

                                                    @if ($department->biaService)

                                                    @foreach ($department->biaService as $index=>$service)

                                                        @php
                                                            $cloudProvidersArray = array();
                                                            $mobileAppsArray = array();
                                                        @endphp
                
                                                        @if ($service->biaServiceResult)
                                                            @php
                                                                

                                                                if ($service->biaServiceResult->spe_mobile_apps) {
                                                                    $cloudProvidersArray = json_decode($service->biaServiceResult->spe_cloud_providers, true);
                                                                }else{
                                                                    $cloudProvidersArray  = array();
                                                                }

                                                                if ($service->biaServiceResult->spe_mobile_apps) {
                                                                    $mobileAppsArray = json_decode($service->biaServiceResult->spe_mobile_apps, true);
                                                                }else{
                                                                    $mobileAppsArray = array();
                                                                }

                        
                                                            @endphp
                                                        @endif

        
                                                        <tr>
                                                            <td class="bg-light bold">{{$service->name}}</td>
                                                            <td class=" @if(count($cloudProvidersArray)>1) bg-danger  @else bg-success @endif  " data-toggle="modal" data-target="#cloudProvidersModal{{$index}}">

                                                            </td>
                                                            <div class="modal fade invers" id="cloudProvidersModal{{$index}}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <h4 class="modal-title"
                                                                                style="color:#ffffff;">Cloud Providers</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body text-left">
                                                                            <div class="firstHalf" style="width:50%; float:left;">
    
                                                                                <label class="@if(in_array(1, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(1, $cloudProvidersArray)) checked @endif class="upstream" name="spe_cloud_providers[{{$service->id}}][]" value="1">
                                                                                    Activty Pro (SPH)
                                                                                </label>
    
                                                                                <label class="@if(in_array(2, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(2, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="2">
                                                                                        Agora Pulse
                                                                                </label>
    
                                                                                <label class="@if(in_array(3, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(3, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="3">
                                                                                        ArcGIS Online
                                                                                </label>
    
                                                                                <label class="@if(in_array(4, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(4, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="4">
                                                                                        Canva
                                                                                </label>


                                                                                <label class="@if(in_array(5, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(5, $cloudProvidersArray)) checked @endif class="upstream" name="spe_cloud_providers[{{$service->id}}][]" value="5">
                                                                                    CCAC-HPG (SPH)
                                                                                </label>
    
                                                                                <label class="@if(in_array(6, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(6, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="6">
                                                                                        CIBC CMO
                                                                                </label>
    
                                                                                <label class="@if(in_array(7, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(7, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="7">
                                                                                        CIBC Online
                                                                                </label>
    
                                                                                <label class="@if(in_array(8, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(8, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="8">
                                                                                        CIBC PWM
                                                                                </label>

                                                                                <label class="@if(in_array(9, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(9, $cloudProvidersArray)) checked @endif class="upstream" name="spe_cloud_providers[{{$service->id}}][]" value="9">
                                                                                    CIRA (DNS)
                                                                                </label>
    
                                                                                <label class="@if(in_array(10, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(10, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="10">
                                                                                        CityWide
                                                                                </label>
    
                                                                                <label class="@if(in_array(11, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(11, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="11">
                                                                                        Clinical Connect
                                                                                </label>
    
                                                                                <label class="@if(in_array(12, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(12, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="12">
                                                                                        Debit/Credit Machine (EWSWA)
                                                                                </label>

                                                                                <label class="@if(in_array(13, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(13, $cloudProvidersArray)) checked @endif class="upstream" name="spe_cloud_providers[{{$service->id}}][]" value="13">
                                                                                    eHealth (SPH and EMS)
                                                                                </label>
    
                                                                                <label class="@if(in_array(14, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(14, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="14">
                                                                                        eSolutions Bids and Tenders
                                                                                </label>
    
                                                                                <label class="@if(in_array(15, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(15, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="15">
                                                                                        eSolutions County Connect
                                                                                </label>
    
                                                                                <label class="@if(in_array(16, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(16, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="16">
                                                                                        eSolutions eclaims
                                                                                </label>

                                                                                <label class="@if(in_array(17, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(17, $cloudProvidersArray)) checked @endif class="upstream" name="spe_cloud_providers[{{$service->id}}][]" value="17">
                                                                                    eSolutions Form Builder
                                                                                </label>
    
                                                                                <label class="@if(in_array(18, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(18, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="18">
                                                                                        eSolutions Recruit Right
                                                                                </label>
    
                                                                                <label class="@if(in_array(19, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(19, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="19">
                                                                                        GeoLogic (GCS)
                                                                                </label>
    
                                                                                <label class="@if(in_array(20, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(20, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="20">
                                                                                        GreenShield
                                                                                </label>

                                                                                <label class="@if(in_array(21, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(21, $cloudProvidersArray)) checked @endif class="upstream" name="spe_cloud_providers[{{$service->id}}][]" value="21">
                                                                                    Harvard Manage Mentor (Online Training)
                                                                                </label>
    
                                                                                <label class="@if(in_array(22, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(22, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="22">
                                                                                        HR Downloads (Online Training)
                                                                                </label>
    
                                                                                <label class="@if(in_array(23, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(23, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="23">
                                                                                        KnowBe4
                                                                                </label>
    
                                                                             

                                                                                
    
                                                                           
                                                                            </div>
    
                                                                            <div class="secondHalf"
                                                                                style="width:50%; float:left;">
    
                                                                                
                                                                                <label class="@if(in_array(24, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(24, $cloudProvidersArray)) checked @endif class="upstream" name="spe_cloud_providers[{{$service->id}}][]" value="24">
                                                                                    Life Labs
                                                                                </label>
    
                                                                                <label class="@if(in_array(25, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(25, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="25">
                                                                                        Meda Compiance
                                                                                </label>
    
                                                                                <label class="@if(in_array(26, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(26, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="26">
                                                                                        Meeting Management (eScribe)
                                                                                </label>
    
                                                                                <label class="@if(in_array(27, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(27, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="27">
                                                                                        Menu Stream
                                                                                </label>


                                                                                <label class="@if(in_array(28, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(28, $cloudProvidersArray)) checked @endif class="upstream" name="spe_cloud_providers[{{$service->id}}][]" value="28">
                                                                                    MESH
                                                                                </label>
    
                                                                                <label class="@if(in_array(29, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(29, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="29">
                                                                                        MOHLCT Enhanced Rate Reduction (E-RRISA)
                                                                                </label>
    
                                                                                <label class="@if(in_array(30, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(30, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="30">
                                                                                        Moneris
                                                                                </label>
    
                                                                                <label class="@if(in_array(31, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(31, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="31">
                                                                                        MPAC Municipal Connect
                                                                                </label>

                                                                                <label class="@if(in_array(32, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(32, $cloudProvidersArray)) checked @endif class="upstream" name="spe_cloud_providers[{{$service->id}}][]" value="32">
                                                                                    MSDSonline
                                                                                </label>
    
                                                                                <label class="@if(in_array(33, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(33, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="33">
                                                                                        MTE (Property Taxes)
                                                                                </label>
    
                                                                                <label class="@if(in_array(34, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(34, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="34">
                                                                                        OMERS
                                                                                </label>
    
                                                                                <label class="@if(in_array(35, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(35, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="35">
                                                                                        ONE online (Finance)
                                                                                </label>

                                                                                <label class="@if(in_array(36, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(36, $cloudProvidersArray)) checked @endif class="upstream" name="spe_cloud_providers[{{$service->id}}][]" value="36">
                                                                                    Pharmacy (Policy Manager )
                                                                                </label>
    
                                                                                <label class="@if(in_array(37, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(37, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="37">
                                                                                        Point Click Care
                                                                                </label>
    
                                                                                <label class="@if(in_array(38, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(38, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="38">
                                                                                        Spend Dynamics (BMO)
                                                                                </label>
    
                                                                                <label class="@if(in_array(39, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(39, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="39">
                                                                                        SunLife
                                                                                </label>

                                                                                <label class="@if(in_array(40, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(40, $cloudProvidersArray)) checked @endif class="upstream" name="spe_cloud_providers[{{$service->id}}][]" value="40">
                                                                                    SurgeLearning
                                                                                </label>
    
                                                                                <label class="@if(in_array(41, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(41, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="41">
                                                                                        Sysco
                                                                                </label>
    
                                                                                <label class="@if(in_array(42, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(42, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="42">
                                                                                        TextNet
                                                                                </label>
    
                                                                                <label class="@if(in_array(43, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(43, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="43">
                                                                                        Weather Stations (EWSWA)
                                                                                </label>

                                                                                <label class="@if(in_array(44, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(44, $cloudProvidersArray)) checked @endif class="upstream" name="spe_cloud_providers[{{$service->id}}][]" value="44">
                                                                                    WSIB
                                                                                </label>
    
                                                                                <label class="@if(in_array(45, $cloudProvidersArray)) active @endif">
                                                                                    <input type="checkbox" @if(in_array(45, $cloudProvidersArray)) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_cloud_providers[{{$service->id}}][]" value="45">
                                                                                        Xirrus
                                                                                </label>
    
    
                                                                                <input type="hidden" name="spe_cloud_providers[{{$service->id}}][]" value="0">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <div class="col-md-12 text-right">
                                                                                <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <td class="@if(count($mobileAppsArray)>1) bg-danger  @else bg-success @endif" data-toggle="modal" data-target="#mobileAppsModal{{$index}}" >
                                                              
                                                            </td>
                                                                <div class="modal fade invers" id="mobileAppsModal{{$index}}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="exampleModalLabel">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header"
                                                                                style="background-color:#000000bf; color:#ffffff;">
                                                                                <h4 class="modal-title"
                                                                                    style="color:#ffffff;">MOBILE APPS</h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close"><span
                                                                                        aria-hidden="true">&times;</span></button>
                                                                            </div>
                                                                            <div class="modal-body text-left">
                                                                                <div class="firstHalf" style="width:50%; float:left;">
        
                                                                                    <label class="@if(in_array(1, $mobileAppsArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(1, $mobileAppsArray)) checked @endif class="upstream" name="spe_mobile_apps[{{$service->id}}][]" value="1">
                                                                                        Mobile 1
                                                                                    </label>
        
                                                                                    <label class="@if(in_array(2, $mobileAppsArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(2, $mobileAppsArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="spe_mobile_apps[{{$service->id}}][]" value="2">
                                                                                            Mobile 2
                                                                                    </label>
        
                                                                                    <label class="@if(in_array(3, $mobileAppsArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(3, $mobileAppsArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="spe_mobile_apps[{{$service->id}}][]" value="3">
                                                                                            Mobile 3
                                                                                    </label>
        
                                                                                    <label class="@if(in_array(4, $mobileAppsArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(4, $mobileAppsArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="spe_mobile_apps[{{$service->id}}][]" value="4">
                                                                                            Mobile 4
                                                                                    </label>
        
                                                                               
                                                                                </div>
        
                                                                                <div class="secondHalf"
                                                                                    style="width:50%; float:left;">
        
                                                                                    <label class="@if(in_array(5, $mobileAppsArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(5, $mobileAppsArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="spe_mobile_apps[{{$service->id}}][]" value="5">
                                                                                            Mobile 5
                                                                                    </label>
        
                                                                                    <label class="@if(in_array(6, $mobileAppsArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(6, $mobileAppsArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="spe_mobile_apps[{{$service->id}}][]" value="6">
                                                                                            Mobile 6
                                                                                    </label>
        
                                                                                    <label class="@if(in_array(7, $mobileAppsArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(7, $mobileAppsArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="spe_mobile_apps[{{$service->id}}][]" value="7">
                                                                                            Mobile 7
                                                                                    </label>
        
                                                                                    <input type="hidden" name="spe_mobile_apps[{{$service->id}}][]" value="0">
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer"
                                                                                style="background-color:#000000bf; color:#ffffff;">
                                                                                <div class="col-md-12 text-right">
                                                                                    <button type="button"
                                                                                        class="btn btn-primary"
                                                                                        data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <td >
                                                                <textarea name="spe_external_functions[{{$service->id}}]"  cols="30" rows="5"> @if ($service->biaServiceResult) {{$service->biaServiceResult->spe_external_functions}} @endif</textarea>
                                                            </td>
                                                        </tr>
                                                        
                                                    @endforeach
                                                    
                                                @endif

                                                </table>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </form>



                        </div>


                        <div class="card mt-2">

                            <form method="POST" id="biaServiceFormSix">

                                @csrf
                                <input type="hidden" name="company_id" value="{{$department->company_id}}">
                                <input type="hidden" name="bia_id" value="{{$department->bia_id}}">
                                <input type="hidden" name="bia_department_id" value="{{$department->id}}">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <h3 class="title bold">6. Delivery of service/process - information and technology requirements
                                            </h3>
                                            <p>It is important to identify and protect those files, records and databases that are imperative for departmental operations
                                                Some records are needed to make and receive payments, protect legal and financial rights and maintain confidential information</p>
                                        </div>
                                        <div class="col-sm-1">
                                            {{-- <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i> Submit</button> --}}
                                        </div>

                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr class="bg-primary">
                                                        <td colspan="5">VITAL RECORDS</td>
                                                    </tr>
                                                    <tr class="bg-dark">
                                                        <td>FILES/DATABASES/PAPER -PLEASE SPECIFY</td>
                                                        <td>DESCRIPTION</td>
                                                        <td>LOCATION OF VITAL RECORDS</td>
                                                        <td>FORMAT</td>
                                                        <td>UPDATED</td>
                                                   
                                                    </tr>

                                                    @if($department->biaDepartmentResult)
                                                        @php
                                                            $spe_vital_records_files = json_decode($department->biaDepartmentResult->spe_vital_records_files, true);
                                                            $spe_vital_records_description = json_decode($department->biaDepartmentResult->spe_vital_records_description, true);
                                                            $spe_vital_records_location = json_decode($department->biaDepartmentResult->spe_vital_records_location, true);
                                                            $spe_vital_records_format = json_decode($department->biaDepartmentResult->spe_vital_records_format, true);
                                                            $spe_vital_records_updated = json_decode($department->biaDepartmentResult->spe_vital_records_updated, true);

                                                        @endphp
    
                                                    @endif

                                                    @if ($department->se_row_vital_record)
                                                    @for ($i = 0; $i < $department->se_row_vital_record; $i++)
                                                    <tr>
                                                        <td><textarea name="spe_vital_records_files[]" class="form-control"  rows="3">@if($department->biaDepartmentResult && $spe_vital_records_files){{$spe_vital_records_files[$i]}}@endif</textarea></td>
                                                        <td><textarea name="spe_vital_records_description[]" class="form-control"  rows="3">@if($department->biaDepartmentResult && $spe_vital_records_description){{$spe_vital_records_description[$i]}}@endif</textarea></td>
                                                        <td><textarea name="spe_vital_records_location[]" class="form-control" rows="3">@if($department->biaDepartmentResult && $spe_vital_records_location){{$spe_vital_records_location[$i]}}@endif</textarea></td>
                                                        <td><textarea name="spe_vital_records_format[]" class="form-control" rows="3">@if($department->biaDepartmentResult && $spe_vital_records_format){{$spe_vital_records_format[$i]}}@endif</textarea></td>
                                                        <td><textarea name="spe_vital_records_updated[]" class="form-control" rows="3">@if($department->biaDepartmentResult && $spe_vital_records_updated){{$spe_vital_records_updated[$i]}}@endif</textarea></td>
                                                    </tr>
                                                   @endfor
                                                    @endif
                                                  
                                                 

                                                   

                                                  

                                                </table>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>Please detail the technology required to deliver the service/process. Include critical applications/function along with the primary support contact</p>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr class="bg-primary">
                                                        <td colspan="7">TECHNOLOGY REQUIRED</td>
                                                    </tr>
                                                    <tr class="bg-dark">
                                                        <td>COMPUTERS, MOBILE DEVICES, NETWORK ACCESS – PLEASE SPECIFY</td>
                                                        <td>NORMAL</td>
                                                        <td>#MSL</td>
                                                        <td>DESKTOP APPLICATIONS</td>
                                                        <td>FUNCTION</td>
                                                        <td>SUPPORT CONTACT</td>
                                                        <td>COMMENTS</td>
                                                   
                                                    </tr>

                                                    @if($department->biaDepartmentResult)
                                                        @php
                                                            $spe_technology_computers = json_decode($department->biaDepartmentResult->spe_technology_computers, true);
                                                            $spe_technology_normal = json_decode($department->biaDepartmentResult->spe_technology_normal, true);
                                                            $spe_technology_msl = json_decode($department->biaDepartmentResult->spe_technology_msl, true);
                                                            // $spe_technology_desktop_applications = json_decode($department->biaDepartmentResult->spe_technology_desktop_applications, true);
                                                            $spe_technology_function = json_decode($department->biaDepartmentResult->spe_technology_function, true);
                                                            $spe_technology_support_contact = json_decode($department->biaDepartmentResult->spe_technology_support_contact, true);
                                                            $spe_technology_comments = json_decode($department->biaDepartmentResult->spe_technology_comments, true);

                                                        @endphp
    
                                                    @endif

                                                @php
                                                    $desktopApplicationsArray = array();
                                                @endphp
        
                                               
                                                @if ($department->biaDepartmentResult)
                                                    @php
                                                        

                                                        if ($department->biaDepartmentResult->spe_technology_desktop_applications) {
                                                            $desktopApplicationsArray = json_decode($department->biaDepartmentResult->spe_technology_desktop_applications, true);
                                                        }else{
                                                            $desktopApplicationsArray  = array();
                                                        }

                                                        // print_r($desktopApplicationsArray);

                                                    @endphp
                                                @endif
                                                
                                                @if ($department->se_row_technology_required)
                                                    @for ($i = 0; $i < $department->se_row_technology_required; $i++)
                                                        <tr>
                                                            <td><textarea name="spe_technology_computers[]" class="form-control"  rows="3">@if($department->biaDepartmentResult && $spe_technology_computers){{$spe_technology_computers[$i]}}@endif</textarea></td>
                                                            <td><textarea name="spe_technology_normal[]" class="form-control"  rows="3">@if($department->biaDepartmentResult && $spe_technology_normal){{$spe_technology_normal[$i]}}@endif</textarea></td>
                                                            <td><textarea name="spe_technology_msl[]" class="form-control" rows="3">@if($department->biaDepartmentResult && $spe_technology_msl){{$spe_technology_msl[$i]}}@endif</textarea></td>
                                                            
                                                            @if (!empty($department->biaDepartmentResult->spe_technology_desktop_applications))
                                                                <td class=" @if(count($desktopApplicationsArray[$i])>1 ) bg-success @else bg-danger @endif" data-toggle="modal" data-target="#desktopApplicationModal{{$i}}" >
                                                                </td>
                                                            
                                                            @else 
                                                                <td class=" bg-danger" data-toggle="modal" data-target="#desktopApplicationModal{{$i}}" >
                                                                </td>
                                                            
                                                            @endif
                                                        

                                                            <div class="modal fade invers" id="desktopApplicationModal{{$i}}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <h4 class="modal-title"
                                                                                style="color:#ffffff;">Desktop Applications</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>

                                                                        @if (!empty($department->biaDepartmentResult->spe_technology_desktop_applications))

                                                                        <div class="modal-body text-left">
                                                                            <div class="firstHalf" style="width:50%; float:left;">

                                                                                <label class="@if(in_array(1, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(1, $desktopApplicationsArray[$i])) checked @endif class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="1">
                                                                                    Access Database
                                                                                </label>

                                                                                <label class="@if(in_array(2, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(2, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="2">
                                                                                        ACT!
                                                                                </label>

                                                                                <label class="@if(in_array(3, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(3, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="3">
                                                                                        Adobe Pro DC
                                                                                </label>

                                                                                <label class="@if(in_array(4, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(4, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="4">
                                                                                        Adobe Reader DC
                                                                                </label>


                                                                                <label class="@if(in_array(5, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(5, $desktopApplicationsArray[$i])) checked @endif class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="5">
                                                                                    ADP
                                                                                </label>

                                                                                <label class="@if(in_array(6, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(6, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="6">
                                                                                        ADP Report Smith
                                                                                </label>

                                                                                <label class="@if(in_array(7, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(7, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="7">
                                                                                        APC/Liebert Alerting
                                                                                </label>

                                                                                <label class="@if(in_array(8, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(8, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="8">
                                                                                        ArcGIS Desktop
                                                                                </label>

                                                                                <label class="@if(in_array(9, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(9, $desktopApplicationsArray[$i])) checked @endif class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="9">
                                                                                    ArcGIS Pro
                                                                                </label>

                                                                                <label class="@if(in_array(10, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(10, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="10">
                                                                                        AutoCAD Civil3D
                                                                                </label>

                                                                                <label class="@if(in_array(11, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(11, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="11">
                                                                                        Avigilon Control Center/Cameras
                                                                                </label>

                                                                                <label class="@if(in_array(12, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(12, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="12">
                                                                                        CAD (EWSWA)
                                                                                </label>

                                                                                <label class="@if(in_array(13, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(13, $desktopApplicationsArray[$i])) checked @endif class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="13">
                                                                                    Clinical Connect
                                                                                </label>

                                                                                <label class="@if(in_array(14, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(14, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="14">
                                                                                        CODE-STAT
                                                                                </label>

                                                                                <label class="@if(in_array(15, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(15, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="15">
                                                                                        Email (Microsoft Exchange) + Weblink
                                                                                </label>

                                                                                <label class="@if(in_array(16, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(16, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="16">
                                                                                        FitPro
                                                                                </label>

                                                                                <label class="@if(in_array(17, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(17, $desktopApplicationsArray[$i])) checked @endif class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="17">
                                                                                    GeoCortex Report Designer
                                                                                </label>

                                                                                <label class="@if(in_array(18, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(18, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="18">
                                                                                        GeoCortex Workflow Designer
                                                                                </label>

                                                                                <label class="@if(in_array(19, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(19, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="19">
                                                                                        GeoExpress (LizardTech)
                                                                                </label>

                                                                                

                                                                            

                                                                                

                                                                        
                                                                            </div>

                                                                            <div class="secondHalf"
                                                                                style="width:50%; float:left;">

                                                                                <label class="@if(in_array(20, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(20, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="20">
                                                                                        Geologix (GPS Software)
                                                                                </label>

                                                                                <label class="@if(in_array(21, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(21, $desktopApplicationsArray[$i])) checked @endif class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="21">
                                                                                    GEOWare
                                                                                </label>

                                                                                <label class="@if(in_array(22, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(22, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="22">
                                                                                        GridSmart
                                                                                </label>

                                                                                <label class="@if(in_array(23, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(23, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="23">
                                                                                        InfoHR
                                                                                </label>
                                                                                
                                                                                <label class="@if(in_array(24, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(24, $desktopApplicationsArray[$i])) checked @endif class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="24">
                                                                                    Laserfiche + Weblink
                                                                                </label>

                                                                                <label class="@if(in_array(25, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(25, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="25">
                                                                                        LogMeIn
                                                                                </label>

                                                                                <label class="@if(in_array(26, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(26, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="26">
                                                                                        MESH
                                                                                </label>

                                                                                <label class="@if(in_array(27, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(27, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="27">
                                                                                        Microsoft Office 2019
                                                                                </label>


                                                                                <label class="@if(in_array(28, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(28, $desktopApplicationsArray[$i])) checked @endif class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="28">
                                                                                    NexTalk TextNet Client
                                                                                </label>

                                                                                <label class="@if(in_array(29, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(29, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="29">
                                                                                        PriijectorMMX
                                                                                </label>

                                                                                <label class="@if(in_array(30, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(30, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="30">
                                                                                        Protege
                                                                                </label>

                                                                                <label class="@if(in_array(31, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(31, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="31">
                                                                                        Sage 300 Accounting (Accpac)
                                                                                </label>

                                                                                <label class="@if(in_array(32, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(32, $desktopApplicationsArray[$i])) checked @endif class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="32">
                                                                                    Synchro Traffic Software
                                                                                </label>

                                                                                <label class="@if(in_array(33, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(33, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="33">
                                                                                        TES Map
                                                                                </label>

                                                                                <label class="@if(in_array(34, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(34, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="34">
                                                                                        TextNet
                                                                                </label>

                                                                                <label class="@if(in_array(35, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(35, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="35">
                                                                                        Wellspring Print Boss
                                                                                </label>

                                                                                <label class="@if(in_array(36, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(36, $desktopApplicationsArray[$i])) checked @endif class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="36">
                                                                                    Winfuel
                                                                                </label>

                                                                                <label class="@if(in_array(37, $desktopApplicationsArray[$i])) active @endif">
                                                                                    <input type="checkbox" @if(in_array(37, $desktopApplicationsArray[$i])) checked @endif
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="37">
                                                                                        Zoom
                                                                                </label>

                                                                            


                                                                                <input type="hidden" name="spe_technology_desktop_applications[{{$i}}][]" value="0">
                                                                            </div>
                                                                        </div>

                                                                        @else

                                                                        <div class="modal-body text-left">
                                                                            <div class="firstHalf" style="width:50%; float:left;">

                                                                                <label class="">
                                                                                    <input type="checkbox" class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="1">
                                                                                    Access Database
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox"
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="2">
                                                                                        ACT!
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox"
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="3">
                                                                                        Adobe Pro DC
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox"
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="4">
                                                                                        Adobe Reader DC
                                                                                </label>


                                                                                <label class="">
                                                                                    <input type="checkbox" class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="5">
                                                                                    ADP
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="6">
                                                                                        ADP Report Smith
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox"
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="7">
                                                                                        APC/Liebert Alerting
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="8">
                                                                                        ArcGIS Desktop
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="9">
                                                                                    ArcGIS Pro
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="10">
                                                                                        AutoCAD Civil3D
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="11">
                                                                                        Avigilon Control Center/Cameras
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="12">
                                                                                        CAD (EWSWA)
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="13">
                                                                                    Clinical Connect
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="14">
                                                                                        CODE-STAT
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="15">
                                                                                        Email (Microsoft Exchange) + Weblink
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="16">
                                                                                        FitPro
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox"  class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="17">
                                                                                    GeoCortex Report Designer
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox"
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="18">
                                                                                        GeoCortex Workflow Designer
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="19">
                                                                                        GeoExpress (LizardTech)
                                                                                </label>

                                                                                

                                                                            

                                                                                

                                                                        
                                                                            </div>

                                                                            <div class="secondHalf"
                                                                                style="width:50%; float:left;">

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="20">
                                                                                        Geologix (GPS Software)
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="21">
                                                                                    GEOWare
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="22">
                                                                                        GridSmart
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="23">
                                                                                        InfoHR
                                                                                </label>
                                                                                
                                                                                <label class="">
                                                                                    <input type="checkbox"  class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="24">
                                                                                    Laserfiche + Weblink
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="25">
                                                                                        LogMeIn
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="26">
                                                                                        MESH
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="27">
                                                                                        Microsoft Office 2019
                                                                                </label>


                                                                                <label class="">
                                                                                    <input type="checkbox"  class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="28">
                                                                                    NexTalk TextNet Client
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="29">
                                                                                        PriijectorMMX
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="30">
                                                                                        Protege
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="31">
                                                                                        Sage 300 Accounting (Accpac)
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="32">
                                                                                    Synchro Traffic Software
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="33">
                                                                                        TES Map
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox"
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="34">
                                                                                        TextNet
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" 
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="35">
                                                                                        Wellspring Print Boss
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox" class="upstream" name="spe_technology_desktop_applications[{{$i}}][]" value="36">
                                                                                    Winfuel
                                                                                </label>

                                                                                <label class="">
                                                                                    <input type="checkbox"
                                                                                        class="upstream"
                                                                                        name="spe_technology_desktop_applications[{{$i}}][]" value="37">
                                                                                        Zoom
                                                                                </label>

                                                                            


                                                                                <input type="hidden" name="spe_technology_desktop_applications[{{$i}}][]" value="0">
                                                                            </div>
                                                                        </div>

                                                                        @endif
                                                                        

                                                                        




                                                                        <div class="modal-footer"
                                                                            style="background-color:#000000bf; color:#ffffff;">
                                                                            <div class="col-md-12 text-right">
                                                                                <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <td><textarea name="spe_technology_function[]" class="form-control" rows="3">@if($department->biaDepartmentResult && $spe_technology_function){{$spe_technology_function[0]}}@endif</textarea></td>
                                                            <td><textarea name="spe_technology_support_contact[]" class="form-control" rows="3">@if($department->biaDepartmentResult && $spe_technology_support_contact){{$spe_technology_support_contact[0]}}@endif</textarea></td>
                                                            <td><textarea name="spe_technology_comments[]" class="form-control" rows="3">@if($department->biaDepartmentResult && $spe_technology_comments){{$spe_technology_comments[0]}}@endif</textarea></td>

                                                        </tr>    
                                                    @endfor
                                                @endif
                                                    

                                                  

                                                  

                                                </table>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </form>



                        </div>

                        <div class="card mt-2">

                            <form method="POST" id="biaServiceFormNine">

                                @csrf
                                <input type="hidden" name="company_id" value="{{$department->company_id}}">
                                <input type="hidden" name="bia_id" value="{{$department->bia_id}}">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <h3 class="title bold">9. Other Internal Dependencies (Upstream/Downstream) - For each service/process please list all Upstream and Downstream service/process dependencies:
                                                ( THESE DEPENDENCIES ARE TYPICALLY DEFINED AS A SERVICE/PROCESS DELIVERED FROM ANOTHER DEPARTMENT WITHIN YOUR ORGANIZATION )</h3>
                                        </div>
                                        <div class="col-sm-1">
                                            {{-- <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i> Submit</button> --}}
                                        </div>

                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr class="bg-primary">
                                                        <td colspan="4">UPSTREAM DEPENDENCY - A SERVICES/PROCESS REQUIRED TO SUPPORT THE DELIVERY OF ANOTHER SERVICE/PROCESS</td>
                                                    </tr>
                                                    <tr class="bg-primary">
                                                        <td colspan="4">DOWNSTREAM DEPENDENCIES - A SERVICES/PROCESS THAT REQUIRES THE SUPPORT OF ANOTHER SERVICE/PROCESS FOR DELIVERY</td>
                                                    </tr>
                                                    <tr class="bg-dark">
                                                        <td>SERVICE/PROCESS	</td>
                                                        <td>UPSTREAM DEPENDENCY	</td>
                                                        <td>DOWNSTREAM DEPENDENCY</td>
                                                        <td>COMMENTS</td>
                                                   
                                                    </tr>

                                                    @if ($department->biaService)

                                                    @foreach ($department->biaService as $service)
        
                                                        <tr>
                                                            <td class="bg-light bold">{{$service->name}}</td>
                                                            <td ><textarea name="spe_internal_upstream_dependency[{{$service->id}}]"  cols="30" rows="3"> @if ($service->biaServiceResult){{$service->biaServiceResult->spe_internal_upstream_dependency}} @endif</textarea></td>
                                                            <td ><textarea name="spe_internal_downstream_dependency[{{$service->id}}]"  cols="30" rows="3"> @if ($service->biaServiceResult){{$service->biaServiceResult->spe_internal_downstream_dependency}} @endif</textarea></td>
                                                            <td ><textarea name="spe_internal_comments[{{$service->id}}]"  cols="30" rows="3"> @if ($service->biaServiceResult){{$service->biaServiceResult->spe_internal_comments}} @endif</textarea></td>
                                                        </tr>
                                                        
                                                    @endforeach
                                                    
                                                @endif

                                                </table>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </form>



                        </div>


                    </div>
                </div>
            <!--end::Container-->

            <!--end::Footer-->
        </div>
        <!--end::Content-->

    </div>
    <!--end::Wrapper-->


@endsection

@section('script')

@endsection