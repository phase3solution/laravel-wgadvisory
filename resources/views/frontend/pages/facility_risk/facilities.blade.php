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
                        <img class="menu-icon-thum" src="{{ asset($assessment->parent->image) }}" alt="">
                        <h5 class="font-weight-bold mt-2 mb-2 mr-5">{{$assessment->parent->name}}</h5>
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                        <h5 class="font-weight-bold text-muted mt-2 mb-2 mr-5">{{$assessment->name}}</h5>
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                        <h5 class="font-weight-bold text-muted mt-2 mb-2 mr-5">
                            <a href="javascript:;"  data-toggle="modal" data-target="#infoPdf">
                                <img class="title-icon" src="{{asset('frontend/assets')}}/img/icon/pdf.png" alt="">
                            </a>
                        </h5>
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                        <h5 class="font-weight-bold text-muted mt-2 mb-2 mr-5">
                            <a href="javascript:;" data-toggle="modal" data-target="#infoImage">
                                <img class="title-icon" src="{{asset('frontend/assets')}}/img/icon/info.png" alt="">
                            </a>
                        </h5>
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
            <div class="">
                <!--begin::Container-->
                <div class="container-fluid">
                    <div class="text-center">
                        <div class="card mt-1">
                            <div class="card-body">
                                <a class="btn btn-lg btn-info btn-publish bold"
                                    onclick="confirm('Are you sure?');publishAssessment({{ $assessment->parent_id }})"
                                    href="javascript:;">Publish</a>
                                <a class="btn btn-lg btn-success btn-publish bold" onclick="saveAll()"
                                    href="javascript:;">Save All</a>
                                <a class="btn btn-lg btn-warning btn-publish bold"
                                    onclick="confirm('Are you sure?');resetAssessment({{ $userCheck->company_id }})"
                                    href="javascript:;">Reset</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="text-center">
                        <div class="card mt-1">
                            <div class="card-body">
                                <img src="{{ asset('frontend/assets/img/risk_process.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                @if (count($assessment->children))
                    @foreach ($assessment->children as $index => $threat)
                        <form class="facilityRiskForm" method="post">
                            @csrf
                            <input type="hidden" name="company_id" value="{{ $userCheck->company_id }}">


                            <div class="container-fluid mb-5">
                                <div class="">
                                    <div class="card mt-1">
                                        <div class="card-title bg-blue">
                                            <div class="row align-items-center">
                                                <div class="col-sm-9">
                                                    <div class="card-section-title">
                                                        <div class="icon">
                                                            <h2 class="title-txt">Threat Cats: {{ $threat->name }}</h2>
                                                            <div class="bold">{{ $threat->description }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="text-right">
                                                        <button class="btn btn-success btn-sm bold" type="submit">
                                                            <i class="fas fa-save"></i> Save
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                        <div class="card-title">
                                            <div class="row align-items-center">
                                                <div class="col-sm-6">
                                                    <div class="card-section-title">
                                                        <div class="icon">
                                                            <a href="javascript:;" data-toggle="modal"
                                                                data-target="#summaryModal{{ $index }}">
                                                                <img class="h80"
                                                                    src="{{ asset('frontend/assets/img/summary.png') }}"
                                                                    alt="">

                                                            </a>
                                                            <a href="javascript:;" data-toggle="modal"
                                                                data-target="#historicalModal{{ $index }}">

                                                                <img class="h80"
                                                                    src="{{ asset('frontend/assets/img/historical_evidence.png') }}"
                                                                    alt="">
                                                            </a>
                                                        </div>

                                                        <div class="modal fade" id="summaryModal{{ $index }}"
                                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header"
                                                                        style="background-color:#000000bf; color:#ffffff;">
                                                                        <h4 class="modal-title" style="color:#ffffff;">
                                                                            Summary</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <textarea class="summaryTextArea"
                                                                            name="summary[{{ $threat->id }}]" id=""
                                                                            cols="80"
                                                                            rows="10">@if ($threat->facilityRiskResult){{ $threat->facilityRiskResult->summary }}@endif</textarea>
                                                                    </div>
                                                                    <div class="modal-footer"
                                                                        style="background-color:#000000bf; color:#ffffff;">
                                                                        <div class="col-md-12 text-right">
                                                                            <button type="button" class="btn btn-primary"
                                                                                data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal fade" id="historicalModal{{ $index }}"
                                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header"
                                                                        style="background-color:#000000bf; color:#ffffff;">
                                                                        <h4 class="modal-title" style="color:#ffffff;">
                                                                            Historical Evidence</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <textarea class="historicalTextArea"
                                                                            name="historical_evidence[{{ $threat->id }}]"
                                                                            id="" cols="80"
                                                                            rows="10">@if ($threat->facilityRiskResult){{ $threat->facilityRiskResult->historical_evidence }}@endif</textarea>
                                                                    </div>
                                                                    <div class="modal-footer"
                                                                        style="background-color:#000000bf; color:#ffffff;">
                                                                        <div class="col-md-12 text-right">
                                                                            <button type="button" class="btn btn-primary"
                                                                                data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="text-right">
                                                        <table class="table table-bordered text-center">
                                                            <tr>
                                                                @php
                                                                    $assetCodesArray = array();
                                                                    $vulnerabilityCodesArray = array();
                                                                @endphp
                                                                <td class="bold color-two" rowspan="2">High - Avg:
                                                                    @if ($threat->facilityRiskResult)

                                                                    @php
                                                                        $assetCodesArray = json_decode($threat->facilityRiskResult->asset_codes, true);
                                                                        $vulnerabilityCodesArray = json_decode($threat->facilityRiskResult->vulnerability_codes, true);
                                
                                                                    @endphp

                                                                        <span
                                                                            class="avg_value">{{ $threat->facilityRiskResult->average }}</span>
                                                                        <input type="hidden"
                                                                            name="average[{{ $threat->id }}]"
                                                                            class="avg_value_input"
                                                                            value="{{ $threat->facilityRiskResult->average }}">
                                                                    @else
                                                                        <span class="avg_value">1.00</span>
                                                                        <input type="hidden"
                                                                            name="average[{{ $threat->id }}]"
                                                                            class="avg_value_input" value="1.00">
                                                                    @endif

                                                                </td>
                                                                <td class="bold bg-blue">ASSET CODES (AFFECTED ASSETS)</td>

                                                                <td class="bold bg-blue">VULNERABILITY CODES</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-toggle="modal"
                                                                    data-target="#assetModal{{ $index }}"
                                                                    class="color-one">&nbsp;</td>

                                                                <div class="modal fade invers" id="assetModal{{ $index }}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header"
                                                                                style="background-color:#000000bf; color:#ffffff;">
                                                                                <h4 class="modal-title"
                                                                                    style="color:#ffffff;">ASSET CODES
                                                                                    (AFFECTED ASSETS)</h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close"><span
                                                                                        aria-hidden="true">&times;</span></button>
                                                                            </div>
                                                                            <div class="modal-body text-left">
                                                                                <div class="firstHalf" style="width:50%; float:left;">

                                                                                    <label class="@if(in_array(1, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(1, $assetCodesArray)) checked @endif class="upstream" name="asset_codes[{{$threat->id}}][]" value="1">
                                                                                        B1_BUSINESS PROCESSES_CRITICAL
                                                                                    </label>

                                                                                    <label class="@if(in_array(2, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(2, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="2">
                                                                                        B2_BUSINESS PROCESSES_SECRET
                                                                                    </label>

                                                                                    <label class="@if(in_array(3, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(3, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="3">
                                                                                        B3_BUSINESS PROCESSES_KEY
                                                                                    </label>

                                                                                    <label class="@if(in_array(4, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(4, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="4">
                                                                                        B4_BUSINESS PROCESSES_REGULATORY
                                                                                    </label>

                                                                                    <label class="@if(in_array(5, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(5, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="5">
                                                                                        F1_FACILITIES_EXTERNAL
                                                                                    </label>

                                                                                    <label class="@if(in_array(6, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox"
                                                                                            class="upstream" @if(in_array(6, $assetCodesArray)) checked @endif
                                                                                            name="asset_codes[{{$threat->id}}][]" value="6">
                                                                                        F2_FACILITIES_PREMISES
                                                                                    </label>

                                                                                    <label class="@if(in_array(7, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(7, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="7">
                                                                                        F3_FACILITIES_BRANCH
                                                                                    </label>

                                                                                    <label class="@if(in_array(8, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(8, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="8">
                                                                                        F4_FACILITIES_ESSENTIAL
                                                                                    </label>

                                                                                    <label class="@if(in_array(9, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(9, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="9">
                                                                                        F5_FACILITIES_COMMUNICATION
                                                                                    </label>

                                                                                    <label class="@if(in_array(10, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(10, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="10">
                                                                                        F6_FACILITIES_UTILITIES
                                                                                    </label>

                                                                                    <label class="@if(in_array(11, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(11, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="11">
                                                                                        H1_HARDWARE_SERVER
                                                                                    </label>

                                                                                    <label class="@if(in_array(12, $assetCodesArray)) active @endif"> 
                                                                                        <input type="checkbox"
                                                                                            class="upstream" @if(in_array(12, $assetCodesArray)) checked @endif
                                                                                            name="asset_codes[{{$threat->id}}][]" value="12">
                                                                                        H2_HARDWARE_WORKSTATION
                                                                                    </label>

                                                                                    <label class="@if(in_array(13, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(13, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="13">
                                                                                        H3_HARDWARE_STORAGE
                                                                                    </label>

                                                                                    <label class="@if(in_array(14, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(14, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="14">
                                                                                        H4_HARDWARE_MOBILE
                                                                                    </label>

                                                                                    <label class="@if(in_array(15, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(15, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="15">
                                                                                        H5_HARDWARE_PERIPHERAL
                                                                                    </label>

                                                                                    <label class="@if(in_array(16, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(16, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="16">
                                                                                        I1_INFORMATION_CONFIDENTIAL
                                                                                    </label>
                                                                                </div>

                                                                                <div class="secondHalf"
                                                                                    style="width:50%; float:left;">

                                                                                    <label class="@if(in_array(17, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(17, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="17">
                                                                                        I2_INFORMATION_RESTRICTED
                                                                                    </label>

                                                                                    <label class="@if(in_array(18, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(18, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="18">
                                                                                        I3_INFORMATION_INTERNAL
                                                                                    </label>

                                                                                    <label class="@if(in_array(19, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(19, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="19">
                                                                                        I4_INFORMATION_PUBLIC
                                                                                    </label>

                                                                                    <label class="@if(in_array(20, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(20, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="20">
                                                                                        I5_INFORMATION_HARDCOPY
                                                                                    </label>

                                                                                    <label class="@if(in_array(21, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(21, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="21">
                                                                                        N1_NETWORK_CONNECTIVITY
                                                                                    </label>

                                                                                    <label class="@if(in_array(22, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(22, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="22">
                                                                                        N2_NETWORK_DEVICES
                                                                                    </label>

                                                                                    <label class="@if(in_array(23, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(23, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="23">
                                                                                        N3_NETWORK_TELEPHONY
                                                                                    </label>

                                                                                    <label class="@if(in_array(24, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(24, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="24">
                                                                                        N4_NETWORK_CLOUD
                                                                                    </label>

                                                                                    <label class="@if(in_array(25, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(25, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="25">
                                                                                        P1_PERSONNEL_MANAGEMENT
                                                                                    </label>

                                                                                    <label class="@if(in_array(26, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(26, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="26">
                                                                                        P2_PERSONNEL_OPERATIONS
                                                                                    </label>

                                                                                    <label class="@if(in_array(27, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(27, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="27">
                                                                                        P3_PERSONNEL_DEVELOPERS
                                                                                    </label>

                                                                                    <label class="@if(in_array(28, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(28, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="28">
                                                                                        S1_SOFTWARE_OS
                                                                                    </label>

                                                                                    <label class="@if(in_array(29, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(29, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="29">
                                                                                        S2_SOFTWARE_APPLICATION
                                                                                    </label>

                                                                                    <label class="@if(in_array(30, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(30, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="30">
                                                                                        S3_SOFTWARE_CUSTOM
                                                                                    </label>

                                                                                    <label class="@if(in_array(31, $assetCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(31, $assetCodesArray)) checked @endif
                                                                                            class="upstream"
                                                                                            name="asset_codes[{{$threat->id}}][]" value="31">
                                                                                        S4_SOFTWARE_SUPPORTING
                                                                                    </label>
                                                                                    <input type="hidden" name="asset_codes[{{$threat->id}}][]" value="0">
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


                                                                <td data-toggle="modal"
                                                                    data-target="#vulnerabilityModal{{ $index }}"
                                                                    class="color-one">&nbsp;</td>

                                                                <div class="modal fade invers"
                                                                    id="vulnerabilityModal{{ $index }}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header"
                                                                                style="background-color:#000000bf; color:#ffffff;">
                                                                                <h4 class="modal-title"
                                                                                    style="color:#ffffff;">VULNERABILITY
                                                                                    CODES</h4>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close"><span
                                                                                        aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body text-left">
                                                                                <div class="firstHalf" style="width:50%;float:left;">
                                                                                    
                                                                                    <label class="@if(in_array(1, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(1, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="1">
                                                                                         V1_SENSITIVE DATA_IDENTIFICATION
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(2, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(2, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="2">
                                                                                        V2_SENSITIVE DATA_CLASSIFICATION
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(3, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input  type="checkbox" @if(in_array(3, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="3">
                                                                                        V3_SENSITIVE DATA_PROTECTION
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(4, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(4, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="4"> 
                                                                                        V4_SENSITIVE DATA_DATA LOSS PREVENTION
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(5, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(5, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="5">
                                                                                        V5_SENSITIVE MEDIA_SANITIZATION
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(6, $vulnerabilityCodesArray)) active @endif">
                                                                                        
                                                                                        <input type="checkbox" @if(in_array(6, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="6"> 
                                                                                        V6_CYBERSECURITY_PROGRAM
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(7, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(7, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="7"> 
                                                                                        V7_CYBERSECURITY_TRAINING
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(8, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(8, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="8">
                                                                                        V8_CYBERSECURITY_MATURITY
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(9, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(9, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="9">
                                                                                        V9_SECURITY LIFECYCLE_SYSTEM ACCESS
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(10, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(10, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="10">
                                                                                        V10_SECURITY LIFECYCLE_THIRD-PARTY ACCESS
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(11, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(11, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="11">
                                                                                        V11_SECURITY LIFECYCLE_PATCH MANAGEMENT
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(12, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(12, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="12">
                                                                                        V12_SECURITY LIFECYCLE_RESOURCE ALLOCATION
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(13, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(13, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="13">
                                                                                        V13_SERVICE MANAGEMENT_CHANGE MANAGEMENT
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(14, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(14, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="14">
                                                                                        V14_SERVICE MANAGEMENT_INCIDENT MANAGEMENT
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(15, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(15, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="15">
                                                                                        V15_SERVICE MANAGEMENT_PROBLEM MANAGEMENT
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(16, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(16, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="16">
                                                                                        V16_SERVICE MANAGEMENT_KNOWLEDGE MANAGEMENT
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(17, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(17, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="17">
                                                                                        V17_SERVICE MANAGEMENT_ASSET MANAGEMENT
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(18, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(18, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="18">
                                                                                        V18_SYSTEM AND DATA INTEGRITY_HIGH AVAILABILITY
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(19, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(19, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="19">
                                                                                        V19_SYSTEM AND DATA INTEGRITY_ANTI-VIRUS
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(20, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(20, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="20">
                                                                                        V20_SYSTEM AND DATA INTEGRITY_INTRUSION DETECTION
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(21, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(21, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="21">
                                                                                        V21_SYSTEM AND DATA INTEGRITY_SECURITY MANAGEMENT
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(22, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(22, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="22">
                                                                                        V22_NETWORK RESILIENCY_SINGLE POINT OF FAILURE
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(23, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(23, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="23">
                                                                                        V23_NETWORK RESILIENCY_CONTRACT MANAGEMENT
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(24, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(24, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="24"> 
                                                                                        V24_NETWORK MONITORING_MONITORING
                                                                                    </label>

                                                                                    <label class="@if(in_array(25, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(25, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="25">
                                                                                        V25_NETWORK LOGGING &amp;AUDITING_LOGGING AND REPORTING
                                                                                    </label>
                                                                                </div>

                                                                                <div class="secondHalf" style="width:50%;float:left;">
                                                                                    
                                                                                    <label class="@if(in_array(26, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(26, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="26"> 
                                                                                        V26_NETWORK LOGGING &amp; AUDITING_SCHEDULED REVIEWS
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(27, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(27, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="27">
                                                                                        V27_IDENTIFICATION AND AUTHENTICATION_ACCESS CONTROL
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(28, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(28, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="28">
                                                                                        V28_IDENTIFICATION AND AUTHENTICATION_ACCOUNT REVIEWS
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(29, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(29, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="29"> 
                                                                                        V29_BUSINESS CONTINUITY AND DISASTER RECOVERY_BACKUP
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(30, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(30, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="30">
                                                                                        V30_BUSINESS CONTINUITY AND DISASTER RECOVERY_PLANNING
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(31, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(31, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="31">
                                                                                        V31_BUSINESS CONTINUITY AND DISASTER RECOVERY_ASSETS
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(32, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(32, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="32">
                                                                                        V32_BUSINESS CONTINUITY AND DISASTER RECOVERY_TESTING
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(33, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(33, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="33">
                                                                                        V33_DATA CENTRE FACILITY_FIRE SUPRESSION
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(34, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(34, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="34">
                                                                                        V34_DATA CENTRE FACILITY_POWER AND COOLING
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(35, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(35, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="35">
                                                                                        V35_DATA CENTRE FACILITY_WATER DAMAGE
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(36, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(36, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="36">
                                                                                        V36_RESOURCE_LOSS OF STAFF
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(37, $vulnerabilityCodesArray)) active @endif"> 
                                                                                        <input type="checkbox" @if(in_array(37, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="37">
                                                                                        V37_RESOURCE_CROSS-TRAINING
                                                                                    </label>

                                                                                    <label class="@if(in_array(38, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(38, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="38">
                                                                                        V38_CLOUD_USER PROVISIONING
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(39, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(39, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="39">
                                                                                        V39_CLOUD_HYPERVISOR
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(40, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(40, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="40">
                                                                                        V40_CLOUD_POOR KEY MANAGEMENT PROCEDURES
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(41, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(41, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="41">
                                                                                        V41_CLOUD_LACK OF SECURITY AWARENESS
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(42, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(42, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="42">
                                                                                        V42_CLOUD_INADEQUATE PHYSICAL SECURITY PROCEDURES
                                                                                    </label>

                                                                                    <label class="@if(in_array(43, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(43, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="43">
                                                                                        V43_CLOUD_LACK OF RESOURCE ISOLATION
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(44, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(44, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="44">
                                                                                        V44_CLOUD_USER DEPROVISIONING
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(45, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(45, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="45">
                                                                                        V45_CLOUD_ ENCRYPTION OF ARCHIVES AND DATA IN TRANSIT
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(46, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input  type="checkbox" @if(in_array(46, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="46">
                                                                                        V46_CLOUD_DATA PORTABILITY
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(47, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(47, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="47">
                                                                                        V47_CLOUD_INTEROPERABILITY
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(48, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(48, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="48">
                                                                                        V48_CLOUD_VENDOR LOCK-IN
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(49, $vulnerabilityCodesArray)) active @endif">
                                                                                        <input type="checkbox" @if(in_array(49, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="49">
                                                                                        V49_CLOUD_PROVIDER DUE DILIGENCE
                                                                                    </label>
                                                                                    
                                                                                    <label class="@if(in_array(50, $vulnerabilityCodesArray)) active @endif" >
                                                                                        <input type="checkbox" @if(in_array(50, $vulnerabilityCodesArray)) checked @endif class="upstream" name="vulnerability_codes[{{$threat->id}}][]" value="50">
                                                                                        V50_CLOUD_CORPORATE CLOUD POLICY
                                                                                    </label>

                                                                                    <input type="hidden" name="vulnerability_codes[{{$threat->id}}][]" value="0">
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
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table class="table section-table table-bordered">
                                                @if (count($threat->children) > 0)
                                                    @foreach ($threat->children as $key => $statement)

                                                        <tr>
                                                            <td class="sub-title-txt bg-gray">
                                                                Statement&nbsp;{{ ++$key }}</td>
                                                            <td colspan="4" class="sub-title-txt bg-gray">
                                                                {{ $statement->name }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold text-center bg-blue width-0">Threat</td>
                                                            <td class="bold text-center bg-blue width-0">Vulnerability</td>
                                                            <td class="bold text-center bg-blue width-0">Impact</td>
                                                            <td class="bold text-center bg-blue width-0">Risk</td>
                                                            <td class="bold bg-blue">Comment</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bold relative">

                                                                @if ($statement->facilityRiskResult)
                                                                    <span
                                                                        class="triangle-topleft color-{{ $statement->facilityRiskResult->vulnerability }}"></span>
                                                                @else
                                                                    <span class="triangle-topleft color-1"></span>
                                                                @endif

                                                                <select name="threat[{{ $statement->id }}]"
                                                                    class="risk_variable">

                                                                    @if ($statement->facilityRiskResult)
                                                                        <option value="1" @if ($statement->facilityRiskResult->threat == 1) selected @endif>LOW</option>
                                                                        <option value="2" @if ($statement->facilityRiskResult->threat == 2) selected @endif>MED</option>
                                                                        <option value="3" @if ($statement->facilityRiskResult->threat == 3) selected @endif>HIGH</option>
                                                                      
                                                                    @else
                                                                        <option value="1">LOW</option>
                                                                        <option value="2">MED</option>
                                                                        <option value="3">HIGH</option>
                                                                    @endif



                                                                </select>
                                                            </td>
                                                            <td class="bold relative">

                                                                @if ($statement->facilityRiskResult)
                                                                    <span
                                                                        class="triangle-topleft color-{{ $statement->facilityRiskResult->impact }}"></span>
                                                                @else
                                                                    <span class="triangle-topleft color-1"></span>
                                                                @endif

                                                                <select name="vulnerability[{{ $statement->id }}]"
                                                                    class="risk_variable">

                                                                    @if ($statement->facilityRiskResult)
                                                                        <option value="1" @if ($statement->facilityRiskResult->vulnerability == 1) selected @endif>LOW</option>
                                                                        <option value="2" @if ($statement->facilityRiskResult->vulnerability == 2) selected @endif>MED</option>
                                                                        <option value="3" @if ($statement->facilityRiskResult->vulnerability == 3) selected @endif>HIGH</option>
                                                                    
                                                                    @else
                                                                    <option value="1">LOW</option>
                                                                    <option value="2">MED</option>
                                                                    <option value="3">HIGH</option>
                                                                    @endif


                                                                </select>
                                                            </td>
                                                            <td class="bold relative">
                                                                @if ($statement->facilityRiskResult)
                                                                    <span
                                                                        class="triangle-topleft color-{{ $statement->facilityRiskResult->probability }}"></span>
                                                                @else
                                                                    <span class="triangle-topleft color-1"></span>
                                                                @endif



                                                                <select name="impact[{{ $statement->id }}]"
                                                                    class="risk_variable">
                                                                    @if ($statement->facilityRiskResult)
                                                                        <option value="1" @if ($statement->facilityRiskResult->impact == 1) selected @endif>VERY LOW</option>
                                                                        <option value="2" @if ($statement->facilityRiskResult->impact == 2) selected @endif>LOW</option>
                                                                        <option value="3" @if ($statement->facilityRiskResult->impact == 3) selected @endif>MODERATE</option>
                                                                        <option value="4" @if ($statement->facilityRiskResult->impact == 4) selected @endif>HIGH</option>
                                                                        <option value="5" @if ($statement->facilityRiskResult->impact == 5) selected @endif>VERY HIGH</option>
                                                                    @else
                                                                        <option value="1">VERY LOW</option>
                                                                        <option value="2">LOW</option>
                                                                        <option value="3">MODERATE</option>
                                                                        <option value="4">HIGH</option>
                                                                        <option value="5">VERY HIGH</option>
                                                                    @endif

                                                                </select>
                                                            </td>
                                                            <td class="bold text-center color-two">

                                                                @if ($statement->facilityRiskResult)
                                                                    <span
                                                                        class="risk_value">{{ $statement->facilityRiskResult->risk }}</span>
                                                                    <input type="hidden" name="risk[{{ $statement->id }}]"
                                                                        class="risk_value_input"
                                                                        value="{{ $statement->facilityRiskResult->risk }}">
                                                                @else
                                                                    <span class="risk_value">1</span>
                                                                    <input type="hidden" name="risk[{{ $statement->id }}]"
                                                                        class="risk_value_input" value="1">
                                                                @endif


                                                            </td>
                                                            <td class="p-0" data-toggle="modal" data-target="#demoModal">
                                                                <textarea name="comment[{{ $statement->id }}]" id=""
                                                                    rows="1" class="form-control text-16 bold"
                                                                    spellcheck="false">@if ($statement->facilityRiskResult){{ $statement->facilityRiskResult->comment }}@endif</textarea>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="5" class="p-0" >
                                                                <table class="table section-table table-bordered">
                                                                    <tbody>
                                                                        @if (count($statement->children)>0)

                                                                            @foreach ($statement->children  as  $question)
                                                                                <tr>
                                                                                    <td class="bold bg-light-gray">
                                                                                        {{$question->name}}
                                                                                    </td>
                                                                                    <td class="p-0 bg-gray">
                                                                                        <select name="answer[{{$question->id}}]" class="form-control bg-gray">
                                                                                            
                                                                                            @if ($question->facilityRiskResult)
                                                                                                <option value="1" @if ($question->facilityRiskResult->answer == 1) selected @endif >Yes</option>
                                                                                                <option value="2" @if ($question->facilityRiskResult->answer == 2) selected @endif>No</option>
                                                                                                <option value="3" @if ($question->facilityRiskResult->answer == 3) selected @endif>Partial</option>
                                                                                                <option value="4" @if ($question->facilityRiskResult->answer == 4) selected @endif>Unsure</option>
                                                                                                <option value="5" @if ($question->facilityRiskResult->answer == 5) selected @endif>N/A</option>
                                                                                            @else 
                                                                                                <option value="1">Yes</option>
                                                                                                <option value="2">No</option>
                                                                                                <option value="3">Partial</option>
                                                                                                <option value="4">Unsure</option>
                                                                                                <option value="5">N/A</option> 
                                                                                            @endif
                                                                                            
                                                                                            
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            
                                                                        @endif

                                                                       
                                                                    </tbody>
                                                                </table>
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
                    @endforeach
                @endif


                <!--end::Container-->
            </div>

            <!--end::Footer-->
        </div>
        <!--end::Content-->

    </div>
    <!--end::Wrapper-->







    <div class="modal fade" id="infoImage" tabindex="-1" role="dialog" aria-labelledby="infoImage">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#000000bf; color:#ffffff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="http://staging.wgadvisory.ca/wp-content/themes/advisory-services/images/risk_definitions.png">
                </div>
                <div class="modal-footer" style="background-color:#000000bf; color:#ffffff;">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="infoPdf" tabindex="-1" role="dialog" aria-labelledby="infoPdf">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#000000bf; color:#ffffff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="600" src="{{asset('frontend/assets/media/pdf')}}/Asset_and_Vulnerability_Codes.pdf"></iframe>
                </div>
                <div class="modal-footer" style="background-color:#000000bf; color:#ffffff;">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')
    <script>
        $(document).ready(function() {

            $('.risk_variable').on('change', function() {

                // alert("Getting");

                var $colorTd = $(this).closest("td");
                var $colorChange = $colorTd.find(".triangle-topleft");
                var $colorValue = $(this).val();


                if ($colorValue == 1) {
                    $colorChange.removeClass("color-1 color-2 color-3 color-4 color-5");
                    $colorChange.addClass("color-1");
                } else if ($colorValue == 2) {
                    $colorChange.removeClass("color-1 color-2 color-3 color-4 color-5");
                    $colorChange.addClass("color-2");
                } else if ($colorValue == 3) {
                    $colorChange.removeClass("color-1 color-2 color-3 color-4 color-5");
                    $colorChange.addClass("color-3");
                } else if ($colorValue == 4) {
                    $colorChange.removeClass("color-1 color-2 color-3 color-4 color-5");
                    $colorChange.addClass("color-4");
                } else if ($colorValue == 5) {
                    $colorChange.removeClass("color-1 color-2 color-3 color-4 color-5");
                    $colorChange.addClass("color-5");
                }



                var $row = $(this).closest("tr"),
                    $tds = $row.find(".risk_variable");

                var $riskValue = $row.find(".risk_value");
                var $riskValueInput = $row.find(".risk_value_input");

                var result = 1;
                var currentValue = 1;
                $.each($tds, function() {

                    currentValue = parseInt($(this).val());
                    result = result * currentValue;

                    // console.log(result);

                });



                $riskValue.html(result);
                $riskValueInput.val(result);

                // if (result == 1) {
                //     $riskValue.html("1");
                //     $riskValueInput.val(1);
                // } else {
                //     $riskValue.html(result);
                //     $riskValueInput.val(result);
                // }



                var $table = $(this).closest("table");
                var $riskValTds = $table.find(".risk_value");

                var $card = $table.closest('.card');
                var $avg_value = $card.find(".avg_value");
                var $avg_value_input = $card.find(".avg_value_input");


                var avgResult = 0;
                var currentValue = 0;
                var sumCurrentValue = 0;
                var i = 0;
                $.each($riskValTds, function() {
                    i = i + 1;
                    currentValue = parseInt($(this).text());
                    sumCurrentValue = sumCurrentValue + currentValue;

                    // console.log("Sum:"+ sumCurrentValue);
                    // console.log("Num:"+ i);

                });

                if (sumCurrentValue != 0) {
                    avgResult = sumCurrentValue / i;
                    // console.log("avg:"+avgResult);

                }

                $avg_value.html(avgResult.toFixed(2));
                $avg_value_input.val(avgResult.toFixed(2));


            })



            $('.facilityRiskForm').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ url('facility-risk-assessment-result-store') }}",
                    data: formData,
                    success: function(response) {
                        if (response.status) {

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });

                            Toast.fire({
                                type: 'success',
                                title: response.message
                            })

                        } else {


                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });

                            Toast.fire({
                                type: 'error',
                                title: response.message
                            })

                        }
                    },
                    error: function(err) {


                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            type: 'error',
                            title: 'Server Error !'
                        })

                    }
                })
            })




        })

        function resetAssessment(company_id) {



            $.ajax({
                type: "GET",
                url: "{{ url('facility-risk-assessment-result-reset') }}/" + company_id,
                success: function(response) {
                    if (response.status) {

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            type: 'success',
                            title: response.message
                        })


                        setTimeout(function() {
                            location.reload();
                        }, 2000)

                    } else {


                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            type: 'error',
                            title: response.message
                        })

                    }
                },
                error: function(err) {


                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        type: 'error',
                        title: 'Server Error'
                    })

                }
            })

        }

        function saveAll() {
            var $form = $('.facilityRiskForm');

            if (confirm('Are you sure?')) {
                $.each($form, function() {
                    $(this).submit();
                });
            } else {
                return false;
            }


        }

        function publishAssessment(assessment_id) {
            $.ajax({
                type: "GET",
                url: "{{ url('facility-risk-assessment-result-publish') }}/" + assessment_id,
                success: function(response) {
                    if (response.status) {

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            type: 'success',
                            title: response.message
                        })


                        setTimeout(function() {
                            location.reload();
                        }, 2000)

                    } else {


                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            type: 'error',
                            title: response.message
                        })

                    }
                },
                error: function(err) {


                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        type: 'error',
                        title: 'Server Error'
                    })

                }
            })
        }
    </script>




<script>
    tinymce.init({
      selector: '.summaryTextArea'
    });

    tinymce.init({
      selector: '.historicalTextArea'
    });
</script>

@endsection
