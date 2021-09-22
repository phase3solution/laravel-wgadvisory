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
                        <img class="menu-icon-thum" src="{{ asset('frontend') }}/assets/media/icons/sfial.png" alt=""
                            style="background-color:#282828;border-radius:8px">
                        <h5 class="font-weight-bold mt-2 mb-2 mr-5">{{$sfia->name}}</h5>

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
                            <!--begin::Container-->
                            <div class="
                    container-fluid">
                    <div class="text-center">
                        <div class="card mt-1">
                            <div class="card-body">
                                <a class="btn btn-lg btn-primary btn-publish bold" href="javascript:;">Publish</a>
                                <a class="btn btn-lg btn-danger btn-publish bold" href="javascript:;">Reset All</a>
                                <a class="btn btn-lg btn-warning btn-publish bold" href="javascript:;">Publish All</a>
                                <a class="btn btn-lg btn-success btn-publish bold" href="javascript:;">Report Preview</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end::Container-->




                <div class="card mt-2">
                    <div class="card-body">



                        {{-- USER ID --}}
                        <div class="row">

                            <div class="col-md-12">

                                <h1 style="display: none" class="user_id">ID: <span class="userID">CSM001</span></h1>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-6 col-lg-6 col-xxl-8">
                              
                                <div class="row">

                                    <div class="col-md-3">
                                        <a href="{{ route('sfia.dashboard', $sfia->id) }}"> <img
                                                src="{{ asset('frontend') }}/assets/img/sfia/sfia-logo.png" alt=""
                                                srcset=""> </a>
                                    </div>


                                    {{-- TEAM/GROUP --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="team"><img src="{{ asset('frontend') }}/assets/img/sfia/team.png" alt="" srcset=""></label>
                                            <select class="form-control" name="select_team" id="team">
                                                <option value="">Select Team</option>
                                                @if ($sfiaTeams)
                                                    @foreach ($sfiaTeams as $sfiaTeam)
                                                        <option value="{{$sfiaTeam->id}}">{{$sfiaTeam->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>


                                    {{-- ASSIGN ROLE/NAME --}}
                                    <div class="col-md-3">

                                        <div class="form-group">
                                            <label for="name"><img src="{{ asset('frontend') }}/assets/img/sfia/name.png"
                                                    alt="" srcset=""></label>
                                            <select class="form-control" name="select_team" disabled id="name">
                                                <option value="">Select Name</option>
                                            </select>
                                        </div>


                                    </div>


                                    {{-- ALL ROLE/TITLE --}}
                                    <div style="display: none" class="col-md-3 allRoles">

                                        <div class="form-group">
                                            <label for="role"><img src="{{ asset('frontend') }}/assets/img/sfia/role.png"
                                                    alt="" srcset=""></label>
                                            <select class="form-control" name="select_team" id="role">
                                                <option value="">Role/Title</option>
                                                @if ($sfiaRoles)

                                                    @foreach ($sfiaRoles as $sfiaRole)
                                                        <option value="{{$sfiaRole->id}}">{{$sfiaRole->name}}</option>
                                                    @endforeach
                                                    
                                                @endif

                                            </select>
                                        </div>


                                    </div>

                                </div>




                                <div class="row descriptionRow" style="display: none">

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="notes"><img src="{{ asset('frontend') }}/assets/img/sfia/notes.png"
                                                    alt="" srcset=""></label>

                                            <textarea class="form-control" name="notes" id="notes" rows="7"></textarea>

                                        </div>

                                    </div>

                                    <div class="col-md-2 text-center">
                                        <label for="level_desc"><img
                                                src="{{ asset('frontend') }}/assets/img/sfia/level_desc.png" alt=""
                                                srcset=""></label>

                                            <select name="level_desc" class="form-control" id="level_desc">
                                                <option value="1">Level 1 </option>
                                                <option value="2">Level 2 </option>
                                                <option value="3">Level 3 </option>
                                                <option value="4">Level 4 </option>
                                                <option value="5">Level 5 </option>
                                                <option value="6">Level 6 </option>
                                                <option value="7">Level 7 </option>

                                            </select>
                                            
                                    </div>

                                </div>

                                <div class="row" style="display: none">


                                    <div class="col-md-10">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="skill_fit"> <img
                                                        src="{{ asset('frontend') }}/assets/img/sfia/skills_fit.png"
                                                        alt="" srcset=""> </label>
                                                <p>72%</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="technical_score"> <img
                                                        src="{{ asset('frontend') }}/assets/img/sfia/technica_score.png"
                                                        alt="" srcset=""> </label>
                                                <p>N/A</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="start_edit"> <img
                                                        src="{{ asset('frontend') }}/assets/img/sfia/start-red.png"
                                                        alt="" srcset=""> </label>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-2">
                                    </div>

                                </div>







                                </div>



                                <div class="col-sm-6 col-lg-6 col-xxl-4">
                                    <div class="sticky-right2">
                                        <div class="">
                                                <div class="">
                    
                                                        <div class=" sub-dashboard-titlebar">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="main-db-thum">
                                                        {{-- <a href="">
                                                                        <img src="{{asset('frontend')}}/assets/media/icons/encase-icon.png" alt="">
                                                                    </a> --}}
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="right-bar it-skill">
                                                        <div class="row ">

                                                            <div class="col-sm-12 col-xxl-12">
                                                                <div class="sfia-title-icons text-left">
                                                                    <div class="item">
                                                                        <a class="d-flex " href="javascript:;"
                                                                            data-toggle="modal" data-target="#howItWork">
                                                                            <img src="{{ asset('frontend') }}/assets/media/icons/information-button.png"
                                                                                alt="">
                                                                            <span>How SFIA Works</span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="item">
                                                                        <a class="d-flex " href="javascript:;"
                                                                            data-toggle="modal"
                                                                            data-target="#levelsOfResponsibility">
                                                                            <img src="{{ asset('frontend') }}/assets/media/icons/user.png"
                                                                                alt="">
                                                                            <span>Levels of Responsibility</span>
                                                                        </a>
                                                                    </div>
                                                                    <div class="item">
                                                                        <a class="d-flex " href="javascript:;"
                                                                            data-toggle="modal"
                                                                            data-target="#skillsManagement">
                                                                            <img src="{{ asset('frontend') }}/assets/media/icons/settings.png"
                                                                                alt="">
                                                                            <span>Skills Management</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                        <div class="sfia-color-items mt-5">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="item d-flex">
                                                        <div class="color item-one"></div>
                                                        <div class="txt">
                                                            <a href="javascript:;" data-toggle="modal"
                                                                data-target="#strategyAndArchitecture">
                                                                Strategy and Architecture
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="item d-flex">
                                                        <div class="color item-two"></div>
                                                        <div class="txt">
                                                            <a href="javascript:;" data-toggle="modal"
                                                                data-target="#changeAndTransformation">
                                                                Change and Transformation
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="item d-flex">
                                                        <div class="color item-three"></div>
                                                        <div class="txt">
                                                            <a href="javascript:;" data-toggle="modal"
                                                                data-target="#developmentAndImplementation">
                                                                Development and Implementation
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="item d-flex">
                                                        <div class="color item-four"></div>
                                                        <div class="txt">
                                                            <a href="javascript:;" data-toggle="modal"
                                                                data-target="#deliveryAndOperation">
                                                                Delivery and Operation
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="item d-flex">
                                                        <div class="color item-five"></div>
                                                        <div class="txt">
                                                            <a href="javascript:;" data-toggle="modal"
                                                                data-target="#skillAndQuality">
                                                                Skills and Quality
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="item d-flex">
                                                        <div class="color item-six"></div>
                                                        <div class="txt">
                                                            <a href="javascript:;" data-toggle="modal"
                                                                data-target="#relationshipAndEngasement">
                                                                Relationships and Engagement
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <button class="btn btn-primary"> <i class="fa fa-plus"></i> Add User</button>

                        </div>

                        <div class="col-md-6 text-right">
                            <button class="btn btn-success"> <i class="fa fa-save"></i> Save</button>

                        </div>

                    </div>

                </div>
            </div>


            <div class="assessmentBody" style="display: none">
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
    
                                <div class="table-responsive">
    
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>CATEGORY</th>
                                                <th>SUB-CATEGORY</th>
                                                <th>SKILL</th>
                                                <th>CODE</th>
                                                <th>RANK</th>
                                                <th>TARGET</th>
                                                <th>EVALUATION</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Delivery And Operation</td>
                                                <td>Service Design</td>
                                                <td>Availa</td>
                                                <td>AVMT</td>
                                                <td>Core</td>
                                                <td>Level 4</td>
                                                <td>Level 5</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary"> <i
                                                            class="fa fa-info"></i> </button>
                                                    <button type="button" class="btn btn-danger"> <i
                                                            class="fa fa-trash"></i> </button>
    
                                                </td>
                                            </tr>
                                        </tbody>
    
                                    </table>
    
                                </div>
    
                            </div>
    
                        </div>
    
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add
                                    Skill</button>
                                <button type="button" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
    
                            </div>
    
                        </div>
    
                    </div>
    
                </div>
    
                <div class="card mt-5">
    
                    <div class="card-body">
                        <h1 class="card-title">Summary 1</h1>
                        <div class="row">
                            <div class="col-md-12">
    
                                <div class="form-group">
                                    <textarea name="" class="form-control" rows="10"></textarea>
    
                                </div>
    
                            </div>
    
                        </div>
    
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="button" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
    
                            </div>
    
                        </div>
    
                    </div>
    
                </div>
    
                <div class="card mt-5">
    
                    <div class="card-body">
                        <h1 class="card-title">Summary 2</h1>
                        <div class="row">
                            <div class="col-md-12">
    
                                <div class="form-group">
                                    <textarea name="" class="form-control" rows="10"></textarea>
    
                                </div>
    
                            </div>
    
                        </div>
    
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="button" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
    
                            </div>
    
                        </div>
    
                    </div>
    
                </div>
            </div>

           






        </div>
    </div>
    <!--end::Container-->

    <!--end::Footer-->
    </div>
    <!--end::Content-->

    </div>
    <!--end::Wrapper-->



    <div class="modal fade" id="howItWork" tabindex="-1" role="dialog" aria-labelledby="howItWork">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#000000bf; color:#ffffff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="600"
                        src="{{ asset('frontend/assets/sfia/dashboard') }}/how_it_works.pdf"></iframe>
                </div>
                <div class="modal-footer" style="background-color:#000000bf; color:#ffffff;">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- skillsManagement --}}

    <div class="modal fade" id="skillsManagement" tabindex="-1" role="dialog" aria-labelledby="skillsManagement">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#000000bf; color:#ffffff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="600"
                        src="{{ asset('frontend/assets/sfia/dashboard') }}/skills_management.pdf"></iframe>
                </div>
                <div class="modal-footer" style="background-color:#000000bf; color:#ffffff;">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- levelsOfResponsibility --}}
    <div class="modal fade" id="levelsOfResponsibility" tabindex="-1" role="dialog"
        aria-labelledby="levelsOfResponsibility">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#000000bf; color:#ffffff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="600"
                        src="{{ asset('frontend/assets/sfia/dashboard') }}/levels_of_responsibility.pdf"></iframe>
                </div>
                <div class="modal-footer" style="background-color:#000000bf; color:#ffffff;">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- strategyAndArchitecture --}}
    <div class="modal fade" id="strategyAndArchitecture" tabindex="-1" role="dialog"
        aria-labelledby="strategyAndArchitecture">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#000000bf; color:#ffffff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img width="100%" height="600"
                        src="{{ asset('frontend/assets/sfia/pdf') }}/strategyandarchitecture.png">
                </div>
                <div class="modal-footer" style="background-color:#000000bf; color:#ffffff;">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- deliveryAndOperation --}}
    <div class="modal fade" id="deliveryAndOperation" tabindex="-1" role="dialog"
        aria-labelledby="deliveryAndOperation">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#000000bf; color:#ffffff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('frontend/assets/sfia/pdf') }}/deliveryandoperation.png">
                </div>
                <div class="modal-footer" style="background-color:#000000bf; color:#ffffff;">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- changeAndTransformation --}}
    <div class="modal fade" id="changeAndTransformation" tabindex="-1" role="dialog"
        aria-labelledby="changeAndTransformation">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#000000bf; color:#ffffff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('frontend/assets/sfia/pdf') }}/changeandtransformation.png">
                </div>
                <div class="modal-footer" style="background-color:#000000bf; color:#ffffff;">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- skillAndQuality --}}
    <div class="modal fade" id="skillAndQuality" tabindex="-1" role="dialog" aria-labelledby="skillAndQuality">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#000000bf; color:#ffffff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('frontend/assets/sfia/pdf') }}/skillsandquality.png">
                </div>
                <div class="modal-footer" style="background-color:#000000bf; color:#ffffff;">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- developmentAndImplementation --}}
    <div class="modal fade" id="developmentAndImplementation" tabindex="-1" role="dialog"
        aria-labelledby="developmentAndImplementation">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#000000bf; color:#ffffff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('frontend/assets/sfia/pdf') }}/developmentandimplementation.png">
                </div>
                <div class="modal-footer" style="background-color:#000000bf; color:#ffffff;">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- relationshipAndEngasement --}}
    <div class="modal fade" id="relationshipAndEngasement" tabindex="-1" role="dialog"
        aria-labelledby="relationshipAndEngasement">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#000000bf; color:#ffffff;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('frontend/assets/sfia/pdf') }}/relationshipsandmanagement.png">
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
    $(document).ready(function(){

        $("#team").on('change', function(e){
            e.preventDefault();
            var team_id = $(this).val();

            if(team_id){


                $.ajax({
                    url : "{{url('/find-sfia-role-by-team')}}/"+team_id,
                    type: "GET",
                    success: function(response){
                    
                        $('#name').html(response);

                        $('#name').prop('disabled', false);

                    },
                    error:function(err){
                        console.err;
                    }
                    
                })
            }else{
                $('#name').prop('disabled', true);
            }

        })

        $('#name').on('change', function(e){
            e.preventDefault();
            var role_id = $(this).val();

            if(role_id){

                $.ajax({
                    url : "{{url('/find-sfia-user-by-role')}}/"+role_id,
                    type: "GET",
                    success: function(response){

                        if(response.status){

                            $('.userID').html(response.userName);

                            $('.user_id').show();
                            $('.descriptionRow').show();
                            $('.assessmentBody').show();




                        }else{
                            console.log(response);
                        }
                    
                       

                       
                    },
                    error:function(err){
                        console.err;
                    }
                    
                })

            }else{

                $('.user_id').hide();
                $('.descriptionRow').hide();
                $('.assessmentBody').hide();

            }

        })






    })
</script>


@endsection
