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
                {{-- <div class="container-fluid">
                    <div class="text-center">
                        <div class="card mt-1">
                            <div class="card-body">
                                <a class="btn btn-lg btn-success btn-publish bold" onclick="saveAll()"
                                    href="javascript:;">Save All</a>
                                <a class="btn btn-lg btn-warning btn-publish bold"
                                    onclick="confirm('Are you sure?');resetAssessment({{ $userCheck->company_id }})"
                                    href="javascript:;">Reset</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
           
                <div class="container-fluid function-card">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-csmaFunction">
                                            <tbody>
                                                <tr>
                                                    <td class="functionTitle">
                                                        <h2 class="title">Function: {{$assessment->name}} </h2>
                                                        <p class="subTitle">{{$assessment->description}}</p>
                                                    </td>
                                                    {{-- <td class="csmaFuncAvg">
                                                        <h4 class="title"> Function Summary </h4>
                                                        <button type="button" class="btn btn-primary"> <i class="fa fa-eye"></i>  Preview</button>
                                                    </td> --}}
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                    <div class="">


                        @if (count($assessment->children) > 0)

                            @foreach ($assessment->children as $index=>$category)

                                <form class="cybersecurityMaturityRegisterForm" method="POST">
                                    @csrf

                                    <input type="hidden" name="company_id" value="{{ $userCheck->company_id }}">
                                    

                                    <div class="card mt-1 category-card">

                                        <div class="card-title ">
                                            <div class="row align-items-center">
                                                <div class="col-sm-9 bg-blue">
                                                    <div class="card-section-title">
                                                        <div class="icon">
                                                            <h2 class="title-txt">Category-{{++$index}}: {{ $category->name }} </h2>
                                                            <p>{{ $category->description }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                            <h4 class="title"> Last Updated </h4>

                                                    @php
                                                        $updateDateFind = DB::table('cybersecurity_maturity_register_results')->where('company_id', $userCheck->company_id)->first();
                                                    @endphp

                                                    @if ($updateDateFind)
                                                        <p class="updateDate">{{ date("F j, Y", strtotime($updateDateFind->updated_at))}} </p>
                                                    @else 
                                                        <p class="updateDate">Please save updated</p>
                                                    @endif
                                                            
                                                            

                                                           
                                                </div>
                                                <div class="col-sm-1">
                                                    <button class="btn btn-success btn-sm bold" type="submit">
                                                        <i class="fas fa-save"></i> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>



                                        @if (count($category->children) > 0)

                                            @foreach ($category->children as $serial=>$control)




                                                <div class="card-body">
                                                    <table class="table section-table table-bordered">
                                                        
                                                       <tr class="bg-dark">
                                                            <td colspan="9">Control Statement-{{++$serial}}: {{$control->name}} </td>
                                                            <td>Summary</td>
                                                       </tr>
                                                       <tr>
                                                           <td>MATURITY RATING:</td>
                                                           <td 
                                                                @if($control->cybersecurityMaturityRegisterResult)

                                                                    @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 0) class="rating_variableS c-0" @endif 
                                                                    @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 1) class="rating_variableS c-1" @endif
                                                                    @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 2) class="rating_variableS c-2" @endif
                                                                    @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 3) class="rating_variableS c-3" @endif
                                                                    @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 4) class="rating_variableS c-4" @endif
                                                                    @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 5) class="rating_variableS c-5" @endif
                                                                @else 
                                                                    class="rating_variableS c-0"
                                                                @endif>
                                                            
                                                                <span class="rating_Title">
                                                                    @if($control->cybersecurityMaturityRegisterResult)
                                                                        @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 0) INITIAL @endif 
                                                                        @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 1) INITIAL @endif
                                                                        @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 2) REPEATABLE  @endif
                                                                        @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 3) DEFINED @endif
                                                                        @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 4) MANAGED @endif
                                                                        @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 5) OPTIMIZED @endif
                                                                    @else 
                                                                        INITIAL
                                                                    @endif

                                                                </span>
                                                    
                                                            </td>
                                                           <td @if($control->cybersecurityMaturityRegisterResult)
                                                            @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 0) class="rating_variableTd c-0" @endif 
                                                            @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 1) class="rating_variableTd c-1" @endif
                                                            @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 2) class="rating_variableTd c-2" @endif
                                                            @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 3) class="rating_variableTd c-3" @endif
                                                            @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 4) class="rating_variableTd c-4" @endif
                                                            @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 5) class="rating_variableTd c-5" @endif
                                                        @else 
                                                        class="rating_variableTd c-0"
                                                        @endif
                                                        >
                                                               <select name="maturity_rating[{{$control->id}}]" 
                                                                
                                                                @if($control->cybersecurityMaturityRegisterResult)
                                                                    @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 0) class="rating_variable c-0" @endif 
                                                                    @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 1) class="rating_variable c-1" @endif
                                                                    @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 2) class="rating_variable c-2" @endif
                                                                    @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 3) class="rating_variable c-3" @endif
                                                                    @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 4) class="rating_variable c-4" @endif
                                                                    @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 5) class="rating_variable c-5" @endif
                                                                @else 
                                                                class="rating_variable c-0"
                                                                @endif
                                                                
                                                                >

                                                                @if($control->cybersecurityMaturityRegisterResult)
                                                                    <option value="0" @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 0) selected @endif >N/A</option>
                                                                    <option value="1" @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 1) selected @endif>1</option>
                                                                    <option value="2" @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 2) selected @endif>2</option>
                                                                    <option value="3" @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 3) selected @endif>3</option>
                                                                    <option value="4" @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 4) selected @endif>4</option>
                                                                    <option value="5" @if ($control->cybersecurityMaturityRegisterResult->maturity_rating == 5) selected @endif>5</option>
                                                                @else 
                                                                    <option value="0">N/A</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                @endif
                                                               
                                                               </select>
                                                           </td>
                                                           <td>RESPONSE (ACTION PLAN):</td>
                                                           <td class="bg-success" data-toggle="modal" data-target="#actionModal{{$index}}{{$serial}}" ></td>
                                                           <div class="modal fade actionModal" id="actionModal{{$index}}{{$serial}}" tabindex="-1" role="dialog" aria-labelledby="actionModal{{$index}}{{$serial}}">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" style="background-color:#000000bf; color:#ffffff;">
                                                                            <h4>RESPONSE (ACTION PLAN):</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        
                                                                        
                                                                            <textarea class="action_textarea" name="action_plan[{{$control->id}}]">@if($control->cybersecurityMaturityRegisterResult){{$control->cybersecurityMaturityRegisterResult->action_plan}}@endif</textarea>



                                                                        </div>
                                                                        <div class="modal-footer" style="background-color:#000000bf; color:#ffffff;">
                                                                            <div class="col-md-12 text-right">
                                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                           <td>PRIORITY:</td>
                                                           <td
                                                           @if($control->cybersecurityMaturityRegisterResult) 
                                                           @if ($control->cybersecurityMaturityRegisterResult->priority == 1)
                                                                class="c-1"
                                                           @elseif($control->cybersecurityMaturityRegisterResult->priority == 2 )
                                                                class="c-2"
                                                           @elseif($control->cybersecurityMaturityRegisterResult->priority == 3 )
                                                               class="c-3"
                                                           @endif

                                                           @else 
                                                            class="c-1"
                                                           @endif
                                                           
                                                           >
                                                               <select name="priority[{{$control->id}}]" 
                                                                
                                                                @if($control->cybersecurityMaturityRegisterResult) 
                                                                    @if ($control->cybersecurityMaturityRegisterResult->priority == 1)
                                                                            class="priority c-1"
                                                                    @elseif($control->cybersecurityMaturityRegisterResult->priority == 2 )
                                                                            class="priority c-2"
                                                                    @elseif($control->cybersecurityMaturityRegisterResult->priority == 3 )
                                                                        class="priority c-3"
                                                                    @endif

                                                                    @else 
                                                                        class="priority c-1 "
                                                                    @endif
                                                                
                                                                >

                                                                @if($control->cybersecurityMaturityRegisterResult)
                                                                    <option value="1" @if ($control->cybersecurityMaturityRegisterResult->priority == 1 ) selected @endif >LOW</option>
                                                                    <option value="2" @if ($control->cybersecurityMaturityRegisterResult->priority == 2 ) selected @endif>MEDIUM</option>
                                                                    <option value="3" @if ($control->cybersecurityMaturityRegisterResult->priority == 3 ) selected @endif>HIGH</option>

                                                                @else 
                                                                    <option value="1">LOW</option>
                                                                    <option value="2">MEDIUM</option>
                                                                    <option value="3">HIGH</option>

                                                                @endif

                                                                   
                                                               </select>
                                                           </td>
                                                           <td>ACCOUNTABLE:</td>
                                                           <td><textarea name="accountable[{{$control->id}}]">@if($control->cybersecurityMaturityRegisterResult){{$control->cybersecurityMaturityRegisterResult->accountable}}@endif</textarea></td>
                                                           <td data-toggle="modal" data-target="#summaryModal{{$index}}{{$serial}}" class="bg-danger"> </td>

                                                            
                                                       </tr>

                                                      
                                                    </table>

                                                    <div class="modal fade summaryModal" id="summaryModal{{$index}}{{$serial}}" tabindex="-1" role="dialog" aria-labelledby="summaryModal{{$index}}{{$serial}}">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:#000000bf; color:#ffffff;">
                                                                    <h4>Summary</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                            aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                
                                                
                                                                            @if (count($control->children))
                                                                                @foreach ($control->children as $key=>$question)
                                                                                    <tr>
                                                                                        <td style="width: 90%">{{++$key}}<span>.</span> {{$question->name}}</td>
                                                                                        <td> 
                                                                                            <select name="response[{{$question->id}}]">
                                                
                                                                                                @if($question->cybersecurityMaturityRegisterResult)
                                                                                                    <option value="0" @if($question->cybersecurityMaturityRegisterResult->response == 0) selected @endif >N/A</option>
                                                                                                    <option value="1" @if($question->cybersecurityMaturityRegisterResult->response == 1) selected @endif>NO</option>
                                                                                                    <option value="2" @if($question->cybersecurityMaturityRegisterResult->response == 2) selected @endif>YES</option>
                                                                                                    <option value="3" @if($question->cybersecurityMaturityRegisterResult->response == 3) selected @endif>PARTIAL</option>
                                                                                                @else 
                                                                                                    <option value="0">N/A</option>
                                                                                                    <option value="1">NO</option>
                                                                                                    <option value="2">YES</option>
                                                                                                    <option value="3">PARTIAL</option>
                                                                                                @endif
                                                
                                                                                                
                                                                                            </select>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td colspan="2">
                                                                                            Comment: <textarea class="comment-textarea" name="comment[{{$question->id}}]" >@if($question->cybersecurityMaturityRegisterResult){{$control->cybersecurityMaturityRegisterResult->comment}}@endif</textarea>
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                
                                                                            @else
                                                                                    N/A
                                                                            @endif
                                                                                
                                                                            
                                                                            
                                                                        </table>
                                                                    </div>
                                                                    
                                                
                                                
                                                                </div>
                                                                <div class="modal-footer" style="background-color:#000000bf; color:#ffffff;">
                                                                    <div class="col-md-12 text-right">
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            @endforeach

                                        @endif


                                    </div>


                                </form>

                            @endforeach


                        @endif





                    </div>

                    <div class="row">
                        <div class="col-md-12">

                           
                            <form class="cybersecurityMaturityRegisterForm" method="POST">
                                @csrf

                                <input type="hidden" name="company_id" value="{{ $userCheck->company_id }}">
                                

                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-csmaFunction">
                                                <tbody>
                                                    <tr>
                                                        <td class="functionTitle">
                                                            <h2 class="title">Summary:</h2>
                                                        </td>
                                                        <td class="csmaFuncAvg">
                                                            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i>  Save</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Summary 1</label><br>
                                                <textarea class="summary" name="summary1[{{$assessment->id}}]">@if($assessment->cybersecurityMaturityRegisterResult){{$assessment->cybersecurityMaturityRegisterResult->summary1}}@endif</textarea>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="">Summary 2</label><br>
                                                <textarea class="summary" name="summary2[{{$assessment->id}}]">@if($assessment->cybersecurityMaturityRegisterResult){{$assessment->cybersecurityMaturityRegisterResult->summary2}}@endif</textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
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


    <script>
        $(document).ready(function() {



            $('.rating_variable').on('change', function() {


                var $colorChange = $(this).closest("td");
                var $colorValue =   $(this).val();

                var $findTR = $(this).closest("tr");
                var $findRating_variableS = $findTR.find('.rating_variableS');
                var $findRatingTitle = $findTR.find('.rating_Title');


                if ($colorValue == 1) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-1");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-1");

                    $findRating_variableS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $findRating_variableS.addClass("c-1");

                    $findRatingTitle.html('INITIAL') ;


                } else if ($colorValue == 2) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-2");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-2");

                    $findRating_variableS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $findRating_variableS.addClass("c-2");

                    $findRatingTitle.html('REPEATABLE') ;

                } else if ($colorValue == 3) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-3");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-3");

                    $findRating_variableS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $findRating_variableS.addClass("c-3");

                    $findRatingTitle.html('DEFINED') ;
                } else if ($colorValue == 4) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-4");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-4");

                    $findRating_variableS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $findRating_variableS.addClass("c-4");

                    $findRatingTitle.html('MANAGED') ;
                } else if ($colorValue == 5) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-5");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-5");

                    $findRating_variableS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $findRating_variableS.addClass("c-5");

                    $findRatingTitle.html('OPTIMIZED') ;
                } else {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-0");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-0");

                    $findRating_variableS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $findRating_variableS.addClass("c-0");

                    $findRatingTitle.html('INITIAL') ;

                }

            });


            $('.priority').on('change', function(){

                var $colorChangePriority = $(this).closest("td");
                var $colorValuePriority =   $(this).val();

                if ($colorValuePriority == 1) {
                    $colorChangePriority.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChangePriority.addClass("c-1");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-1");

                }else if($colorValuePriority == 2){
                    $colorChangePriority.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChangePriority.addClass("c-2");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-2");
                }else if($colorValuePriority == 3){
                    $colorChangePriority.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChangePriority.addClass("c-3");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-3");
                }else{
                    $colorChangePriority.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChangePriority.addClass("c-1");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-1");
                }


            })



            $('.cybersecurityMaturityRegisterForm').on('submit', function(e) {

                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ url('cybersecurity-maturity-register-assessment-result-store') }}",
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

<script>
    tinymce.init({
    selector: '.action_textarea'
    });

    tinymce.init({
    selector: '.comment-textarea'
    });

    tinymce.init({
    selector: '.summary'
    });
</script>




@endsection
