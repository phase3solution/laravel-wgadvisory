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
            <div class="">
                <!--begin::Container-->
                <div class="container-fluid">
                    <div class="text-center">
                        <div class="card mt-1">
                            <div class="card-body">
                                <a class="btn btn-lg btn-info btn-publish bold"
                                    onclick="publishBia({{ $department->bia_id }})"
                                    href="javascript:;">Publish</a>
                                <a class="btn btn-lg btn-success btn-publish bold" onclick="saveAll()"
                                    href="javascript:;">Save All</a>
                                <a class="btn btn-lg btn-warning btn-publish bold"
                                    onclick="resetBia({{$department->bia_id}})"
                                    href="javascript:;">Reset</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--end::Container-->
            </div>

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
                            <div class="card-body">
                                <form method="POST" id="biaDepartmentFormOne">
                                    @csrf
                                    <input type="hidden" name="company_id" value="{{$department->company_id}}">
                                    <input type="hidden" name="bia_id" value="{{$department->bia_id}}">
                                    <input type="hidden" name="bia_department_id" value="{{$department->id}}">

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group row mb-0">
                                                <label class="col-4 col-form-label bold">Department:</label>
                                                <div class="col-8">
                                                    <input class="form-control" type="text" value="{{$department->name}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group row mb-0">
                                                <label class="col-4 col-form-label bold">Staff:</label>
                                                <div class="col-8">
                                                    @if ($department->biaDepartmentResult)
                                                        <input class="form-control" type="text" name="staff" value="{{$department->biaDepartmentResult->staff}}" >
                                                    @else 
                                                        <input class="form-control" name="staff" type="text" value="">
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group row mb-0">
                                                <label class="col-4 col-form-label bold">Contact:</label>
                                                <div class="col-8">
                                                    @if ($department->biaDepartmentResult)
                                                        <input class="form-control" type="text" name="contact" value="{{$department->biaDepartmentResult->contact}}" >
                                                    @else 
                                                        <input class="form-control" type="text" name="contact" value="" >
                                                    @endif
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group row mb-0">
                                                <label class="col-3 col-form-label bold">Date:</label>
                                                <div class="col-9">
                                                    @if ($department->biaDepartmentResult)
                                                        <input class="form-control" type="date" name="date" value="{{$department->biaDepartmentResult->date}}">
                                                    @else 
                                                        <input class="form-control" type="date" name="date" value="">
                                                    @endif

                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-1">
                                            <div class="form-group row mb-0">
                                               <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i>  Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="card mt-2">
                            <form method="POST" id="biaDepartmentFormTwo">

                                @csrf
                                <input type="hidden" name="company_id" value="{{$department->company_id}}">
                                <input type="hidden" name="bia_id" value="{{$department->bia_id}}">
                                <input type="hidden" name="bia_department_id" value="{{$department->id}}">


                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <h3 class="title bold">1. Provide a high level description of how your business line supports the mission and corporate priorities:</h3>
                                        </div>

                                        <div class="col-sm-1">
                                            <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i> Submit</button>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-sm-12">

                                            @if ($department->biaDepartmentResult)
                                                <textarea name="high_level_description" rows="7" class="form-control text-16 bold align-items-start" >{{$department->biaDepartmentResult->high_level_description}}</textarea>
                                            @else 
                                                <textarea name="high_level_description" rows="7" class="form-control text-16 bold align-items-start" ></textarea>
                                            @endif
                                        </div>

                                    </div>
                                    
                                </div>
                            </form>
                        </div>



                        <div class="card mt-2">
                            <form method="POST" id="biaDepartmentFormThree">

                                @csrf
                                <input type="hidden" name="company_id" value="{{$department->company_id}}">
                                <input type="hidden" name="bia_id" value="{{$department->bia_id}}">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <h3 class="title bold">2. List All services/processess provided by this business line.</h3>
                                        </div>

                                        <div class="col-sm-1">
                                            <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i> Submit</button>
                                        </div>

                                    </div>
                                    <table class="table table-bordered section-table">
                                        <tr>
                                            <td class="sub-title-txt bg-gray">SERVICE/PROCESS</td>
                                            <td class="sub-title-txt bg-gray">DESCRIBE THE KEY PURPOSE OF THE SERVICE/PROCESS AND ANY CONSEQUENCES RESULTING FROM A FAILURE TO PERFORM</td>
                                            <td class="sub-title-txt bg-gray">CRITICAL&nbsp;DATES</td>
                                        </tr>
                                        @if ($department->biaService)

                                            @foreach ($department->biaService as $service)

                                                <tr>
                                                    <td class="bg-light bold">{{$service->name}}</td>
                                                    <td><textarea name="key_purpose[{{$service->id}}]" class="form-control" rows="5"> @if($service->biaServiceResult){{$service->biaServiceResult->key_purpose}}@endif</textarea></td>
                                                    <td><textarea name="critical_dates[{{$service->id}}]" class="form-control" rows="5">@if($service->biaServiceResult){{$service->biaServiceResult->critical_dates}}@endif</textarea></td>
                                                </tr>
                                                
                                            @endforeach
                                            
                                        @endif
                                        
                                    
                                    </table>
                                </div>

                            </form>


                        </div>

                        <div class="card mt-2">

                            <form method="POST" id="biaDepartmentFormFour">

                                @csrf
                                <input type="hidden" name="company_id" value="{{$department->company_id}}">
                                <input type="hidden" name="bia_id" value="{{$department->bia_id}}">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <h3 class="title bold">3. Please explain for your business line only, what informal steps would be taken today if a disaster were to occur.</h3>
                                        </div>

                                        <div class="col-sm-1">
                                            <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i> Submit</button>
                                        </div>

                                    </div>
                                    
                                    <table class="table table-bordered section-table">
                                        <tr>
                                            <td class="sub-title-txt bg-gray">SERVICE/PROCESS</td>
                                            <td class="sub-title-txt bg-gray">ACTIVITY</td>
                                            <td class="sub-title-txt bg-gray">RESPONSIBILITY</td>
                                            <td class="sub-title-txt bg-gray">ESTIMATE HOW LONG THIS STEP WILL TAKE</td>

                                        </tr>
                                        @if ($department->biaService)

                                            @foreach ($department->biaService as $service)

                                                <tr>
                                                    <td class="bg-light bold">{{$service->name}}</td>
                                                    <td><textarea name="activity[{{$service->id}}]" class="form-control" rows="5"> @if ($service->biaServiceResult) {{$service->biaServiceResult->activity}} @endif </textarea></td>
                                                    <td><textarea name="responsibility[{{$service->id}}]" class="form-control" rows="5">@if($service->biaServiceResult){{$service->biaServiceResult->activity}}@endif</textarea></td>
                                                    <td><textarea name="estimate[{{$service->id}}]" class="form-control" rows="5">@if($service->biaServiceResult){{$service->biaServiceResult->estimate}}@endif</textarea></td>
                                                </tr>
                                                
                                            @endforeach
                                            
                                        @endif
                                        
                                    
                                    </table>
                                </div>

                            </form>


                        </div>

                        <div class="card mt-2">

                            <form method="POST" id="biaDepartmentFormFive">

                                @csrf
                                <input type="hidden" name="company_id" value="{{$department->company_id}}">
                                <input type="hidden" name="bia_id" value="{{$department->bia_id}}">
                                <input type="hidden" name="bia_department_id" value="{{$department->id}}">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <h3 class="title bold">4.  Explain any issues that would impact these steps.</h3>
                                        </div>
                                        <div class="col-sm-1">
                                            <button class="btn btn-success" type="submit"> <i class="fa fa-save"></i> Submit</button>
                                        </div>

                                    </div>
                                    
                                    @if ($department->biaDepartmentResult)
                                        <textarea name="explan_any_issue" rows="7" class="form-control text-16 bold align-items-start" >{{$department->biaDepartmentResult->explan_any_issue}}</textarea>
                                    @else 
                                        <textarea name="explan_any_issue" class="form-control" rows="10"></textarea>
                                    @endif
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

    <script>
        $(document).ready(function(){

            $('#biaDepartmentFormOne').on('submit', function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{url('bia-department-questionnarie-form-one')}}",
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
                            title: 'Server Error'
                        })

                    }
                })


            })

            $('#biaDepartmentFormTwo').on('submit', function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{url('bia-department-questionnarie-form-two')}}",
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
                            title: 'Server Error'
                        })

                    }
                })


            })

            $('#biaDepartmentFormFive').on('submit', function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{url('bia-department-questionnarie-form-five')}}",
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
                            title: 'Server Error'
                        })

                    }
                })


            })

            $('#biaDepartmentFormThree').on('submit', function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{url('bia-department-questionnarie-form-three')}}",
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
                            title: 'Server Error'
                        })

                    }
                })


            })

            $('#biaDepartmentFormFour').on('submit', function(e){
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{url('bia-department-questionnarie-form-four')}}",
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
                            title: 'Server Error'
                        })

                    }
                })


            })






            
            
        })


        function resetBia(bia_id) {


            if(confirm('Are you sure?')){
                $.ajax({
                type: "GET",
                url: "{{ url('bia-assessment-result-reset') }}/"+bia_id,
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

            }else{

                return false;
            }
           

        }

        function saveAll() {

            if (confirm('Are you sure?')) {

                $('#biaDepartmentFormOne').submit();
                $('#biaDepartmentFormTwo').submit();
                $('#biaDepartmentFormThree').submit();
                $('#biaDepartmentFormFour').submit();
                $('#biaDepartmentFormFive').submit();
               
            }else{
                return false;
            }


        }

        function publishBia(bia_id) {

            if(confirm('Are you sure?')){

                $.ajax({
                type: "GET",
                url: "{{ url('bia-assessment-result-publish')}}/"+bia_id,
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

            }else{
                return false;
            }


           
        }
    </script>
    
@endsection