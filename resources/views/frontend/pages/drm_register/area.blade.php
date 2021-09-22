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
                        <h5 class="font-weight-bold mt-2 mb-2 mr-5">{{ $assessment->parent->name }}</h5>
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                        <h5 class="font-weight-bold text-muted mt-2 mb-2 mr-5">{{ $assessment->name }}</h5>

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



        @php
            $home_url = url('/');
        @endphp

        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Entry-->
            <div class="">
                <!--begin::Container-->

                <div class="container-fluid">

                    @if ($assessment)

                        @if (count($assessment->children)>0)
                            @foreach ($assessment->children as $area)
                            <div class="row mb-5">
                                <div class="container">
                                    <div class="col-md-12">

                                        <form class="drmRegisterForm" method="post">
                                            @csrf

                                            <input type="hidden" name="company_id" value="{{ $userCheck->company_id }}">





                                            <div class="card">
                                                <div class="card-title">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h4 class="title"> <strong>Category: {{$assessment->name}}</strong> <br>
                                                                <small>Area : {{$area->name}}</small>   
                                                            </h4>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button class="btn btn-success float-right" type="submit">
                                                                <i class="fa fa-save"></i> Save</button>
                                                        </div>
        
                                                    </div>
                                                   
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive table-dynamic-registry">
                                                        <table class="table table-bordered table-survey mb-none">
                                                            <thead>
                                                                <tr class="bg-dark">
                                                                    <th colspan="3" class="t-heading-dark font-120p">
                                                                        <strong>Description</strong></th>
                                                                    <th colspan="2" class="t-heading-dark font-120p">
                                                                        <strong>Owner</strong></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="3" class="no-padding">
                                                                        <textarea name="description[{{$area->id}}]" class="form-control strong font-110p">@if($area->drmRegisterResult){{$area->drmRegisterResult->description}}@endif</textarea>
                                                                    </td>
                                                                    <td colspan="2" class="no-padding">
                                                                        <textarea name="owner[{{$area->id}}]" class="form-control strong font-110p">@if($area->drmRegisterResult){{$area->drmRegisterResult->owner}}@endif</textarea>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="table table-bordered table-survey mb-0">
                                                            <tbody>
                                                                <tr class="bg-dark">
                                                                    <th class="t-heading-l-dark font-120p">Last Assessment</th>
                                                                    <th class="t-heading-l-dark text-center font-120p">
                                                                        Rating
                                                                    </th>
                                                                    <th class="t-heading-l-dark text-center font-120p">
                                                                        Recommendation
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="no-padding" style="width:15%">
                                                                        <textarea name="last_assessment[{{$area->id}}]" class="form-control strong font-110p">@if($area->drmRegisterResult){{$area->drmRegisterResult->last_assessment}}@endif</textarea>
                                                                    </th>
                                                                    <td class="text-center font-14px bg-red" style="width:9%">
                                                                        <select name="rating[{{$area->id}}]"  class="invisible-opt fullHeightSelect bg-red">
                                                                            @if($area->drmRegisterResult)
                                                                            <option value="1" @if ($area->drmRegisterResult->rating == 1) selected @endif >Optimizing</option>
                                                                            <option value="2" @if ($area->drmRegisterResult->rating == 2) selected @endif >Measured</option>
                                                                            <option value="3" @if ($area->drmRegisterResult->rating == 3) selected @endif >Defined</option>
                                                                            <option value="4" @if ($area->drmRegisterResult->rating == 4) selected @endif >Managed</option>
                                                                            <option value="5" @if ($area->drmRegisterResult->rating == 5) selected @endif >Initial</option>
                                                                        @else 
                                                                            <option value="1" >Optimizing</option>
                                                                            <option value="2">Measured</option>
                                                                            <option value="3">Defined</option>
                                                                            <option value="4">Managed</option>
                                                                            <option value="5">Initial</option>
                                                                        @endif 
                                                                        </select>
                                                                    
                                                                    </td>
                                                                    <td class="no-padding width-65p" style="width:76%">
                                                                        <textarea name="recommendation[{{$area->id}}]" class="form-control strong font-110p">@if($area->drmRegisterResult){{$area->drmRegisterResult->recommendation}}@endif</textarea>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="table table-bordered table-survey">
                                                            <tbody>
                                                                <tr class="bg-dark">
                                                                    <th colspan="2"
                                                                        class="t-heading-l-dark text-center font-120p">&nbsp;
                                                                    </th>
                                                                    <th colspan="2"
                                                                        class="t-heading-l-dark text-center font-120p">Notes
                                                                    </th>
                                                                    <th class="t-heading-l-dark text-center font-120p">Target
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 12%"
                                                                        class="t-heading-ll-dark text-center">Target Start Date
                                                                    </th>
                                                                    <th style="width: 12%"
                                                                        class="t-heading-ll-dark text-center">Target End Date
                                                                    </th>
                                                                    <td colspan="2" style="width: 70%" rowspan="2"
                                                                        class="no-padding">
                                                                        <textarea name="notes[{{$area->id}}]" class="form-control strong font-110p">@if($area->drmRegisterResult){{$area->drmRegisterResult->notes}}@endif</textarea>
                                                                    </td>
                                                                    <td style="width: 6%" rowspan="2" class="no-padding color-five">
                                                                        <select name="target[{{$area->id}}]" id=""
                                                                            class="invisible-opt fullHeightSelect color-five">
                                                                            @if($area->drmRegisterResult)
                                                                                <option value="1" @if ($area->drmRegisterResult->target == 1) selected @endif >Optimizing</option>
                                                                                <option value="2" @if ($area->drmRegisterResult->target == 2) selected @endif >Measured</option>
                                                                                <option value="3" @if ($area->drmRegisterResult->target == 3) selected @endif >Defined</option>
                                                                                <option value="4" @if ($area->drmRegisterResult->target == 4) selected @endif >Managed</option>
                                                                                <option value="5" @if ($area->drmRegisterResult->target == 5) selected @endif >Initial</option>
                                                                            @else 
                                                                                <option value="1" >Optimizing</option>
                                                                                <option value="2">Measured</option>
                                                                                <option value="3">Defined</option>
                                                                                <option value="4">Managed</option>
                                                                                <option value="5">Initial</option>
                                                                            @endif 

                                                                           
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="no-padding">
                                                                        <textarea name="start_date[{{$area->id}}]" class="form-control strong font-110p">@if($area->drmRegisterResult){{$area->drmRegisterResult->start_date}}@endif</textarea>
                                                                    </td>
                                                                    <td class="no-padding">
                                                                        <textarea name="end_date[{{$area->id}}]" class="form-control strong font-110p">@if($area->drmRegisterResult){{$area->drmRegisterResult->end_date}}@endif</textarea>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            @endforeach
                        @endif
                        
                    @endif




                </div>

                <!--end::Container-->
            </div>

            <!--end::Footer-->
        </div>
        <!--end::Content-->


    </div>
    <!--end::Wrapper-->


@endsection



@section('script')
    <script src="{{ asset('frontend/assets/js/jquery.rwdImageMaps.min.js') }}"></script>

    <script>
        $(document).ready(function(e) {
            $('img[usemap]').rwdImageMaps();
        });
    </script>

    <script>
        $(document).ready(function() {

            $('.rating_variable').on('change', function() {



                var $colorChange = $(this).closest("td");
                var $colorValue = $(this).val();


                if ($colorValue == 1) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-1");
                } else if ($colorValue == 2) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-2");
                } else if ($colorValue == 3) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-3");
                } else if ($colorValue == 4) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-4");
                } else if ($colorValue == 5) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-5");
                } else {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-0");
                }







                var $findTable = $(this).closest("table");
                var $findRatingVariables = $findTable.find(".rating_variable");

                var $findTotalValueS = $findTable.find(".totalValueS");
                var $findAverageValueS = $findTable.find(".averageValueS");

                var $findTotalValueI = $findTable.find(".totalValueI");
                var $findAverageValueI = $findTable.find(".averageValueI");

                var result = 0;
                var currentValue = 0;
                var i = 0;
                var avg = 0.0;

                $.each($findRatingVariables, function() {

                    i = i + 1;

                    currentValue = parseInt($(this).val());
                    result = result + currentValue;

                    // console.log(result);

                });

                $findTotalValueS.html(result);
                $findTotalValueI.val(result);


                if (i) {

                    if (result) {
                        avg = (result / i).toFixed(2);

                        $findAverageValueS.html(avg);
                        $findAverageValueI.val(avg);
                    } else {
                        $findAverageValueS.html(avg);
                        $findAverageValueI.val(avg);
                    }


                } else {

                    $findAverageValueS.html(avg);
                    $findAverageValueI.val(avg);

                }

            })



            $('.drmRegisterForm').on('submit', function(e) {

                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ url('drm-register-result-store') }}",
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



      

  
    </script>




@endsection
