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
                    <div class="card mt-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="thum">

                                        {{-- <img src="{{asset('frontend/assets')}}/img/dr-readiness.jpeg" alt=""> --}}

                                        <!-- Image Map Generated by http://www.image-map.net/ -->
                                        <img src="http://staging.wgadvisory.ca/wp-content/themes/advisory-services/images/eva.png"
                                            usemap="#image-map">


                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="graph_item_maturity purple">
                                        <div class="wrap">
                                            <img src="http://staging.wgadvisory.ca/wp-content/themes/advisory-services/images/csma/banner-right.png"
                                                usemap="#image-map">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                                    <td class="csmaFuncAvg">
                                                        <h4 class="title"> Function Average: </h4>

                                                        @if ($assessment->cybersecurityMaturityResult)

                                                        @if ($assessment->cybersecurityMaturityResult->function_average >=5  )
                                                        <span data-toggle="tooltip" data-placement="top" title="" class="functionAverageS c-5" data-original-title="{{$assessment->cybersecurityMaturityResult->function_average}}">OPTIMIXED</span>

                                                        @elseif($assessment->cybersecurityMaturityResult->function_average >= 4 )
                                                        <span data-toggle="tooltip" data-placement="top" title="" class="functionAverageS c-4" data-original-title="{{$assessment->cybersecurityMaturityResult->function_average}}">MANAGED</span>

                                                        @elseif($assessment->cybersecurityMaturityResult->function_average >=3 )
                                                        <span data-toggle="tooltip" data-placement="top" title="" class="functionAverageS c-3" data-original-title="{{$assessment->cybersecurityMaturityResult->function_average}}">DEFINED</span>

                                                        @elseif($assessment->cybersecurityMaturityResult->function_average >=2)
                                                        <span data-toggle="tooltip" data-placement="top" title="" class="functionAverageS c-2" data-original-title="{{$assessment->cybersecurityMaturityResult->function_average}}">REPEATABLE</span>

                                                        @else                                                         
                                                        <span data-toggle="tooltip" data-placement="top" title="" class="functionAverageS c-1" data-original-title="{{$assessment->cybersecurityMaturityResult->function_average}}">INITIAL</span>

                                                            
                                                        @endif


                                                        <input type="hidden" name="function_average[{{$assessment->id}}]" class="functionAverageI" value="{{$assessment->cybersecurityMaturityResult->function_average}}">
                                                        @else 
                                                        <span data-toggle="tooltip" data-placement="top" title="" class="functionAverageS c-1" data-original-title="">INITIAL</span>
                                                        <input type="hidden" name="function_average[{{$assessment->id}}]" class="functionAverageI" value="0">
                                                        @endif

                                                        
                                                    </td>
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

                                <form class="cybersecurityMaturityForm" method="POST">
                                    @csrf

                                    <input type="hidden" name="company_id" value="{{ $userCheck->company_id }}">


                                  
                                    <input type="hidden" name="function_average[{{$assessment->id}}]" class="functionAverageI" @if ($assessment->cybersecurityMaturityResult) value="{{$assessment->cybersecurityMaturityResult->function_average}}" @else value="0" @endif  >
                                    
                                    


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
                                                            <h4 class="title"> Category Average: </h4>

                                                            @if ($category->cybersecurityMaturityResult)

                                                                @if ($category->cybersecurityMaturityResult->category_average >=5  )
                                                                <span data-toggle="tooltip" data-placement="top" title="" class="categoryAverageS c-5" data-original-title="{{$category->cybersecurityMaturityResult->category_average}}">OPTIMIXED</span>
        
                                                                @elseif($category->cybersecurityMaturityResult->category_average >= 4 )
                                                                <span data-toggle="tooltip" data-placement="top" title="" class="categoryAverageS c-4" data-original-title="{{$category->cybersecurityMaturityResult->category_average}}">MANAGED</span>
        
                                                                @elseif($category->cybersecurityMaturityResult->category_average >=3 )
                                                                <span data-toggle="tooltip" data-placement="top" title="" class="categoryAverageS c-3" data-original-title="{{$category->cybersecurityMaturityResult->category_average}}">DEFINED</span>
        
                                                                @elseif($category->cybersecurityMaturityResult->category_average >=2)
                                                                <span data-toggle="tooltip" data-placement="top" title="" class="categoryAverageS c-2" data-original-title="{{$category->cybersecurityMaturityResult->category_average}}">REPEATABLE</span>
        
                                                                @else                                                         
                                                                <span data-toggle="tooltip" data-placement="top" title="" class="categoryAverageS c-1" data-original-title="{{$category->cybersecurityMaturityResult->category_average}}">INITIAL</span>
        
                                                                    
                                                                @endif
    
    
                                                                <input type="hidden" name="category_average[{{$category->id}}]" value="{{$category->cybersecurityMaturityResult->category_average}}" class="categoryAverageI">
                                                            @else 

                                                                <span data-toggle="tooltip" data-placement="top" title="" class="categoryAverageS c-1" data-original-title="">INITIAL</span>
                                                                <input type="hidden" name="category_average[{{$category->id}}]" value="0.0" class="categoryAverageI">
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
                                                        <tr>
                                                            <td colspan="4">
                                                                <div class="card-title">
                                                                    <h4 class="title">Maturity Rating: </h4> 
                                                                        
                                                                        @if ($control->cybersecurityMaturityResult)

                                                                            @if ($control->cybersecurityMaturityResult->maturity_rating >=5  )
                                                                            <span data-toggle="tooltip" data-placement="top" title="" class="averageValueS c-5" data-original-title="{{$control->cybersecurityMaturityResult->maturity_rating}}">OPTIMIXED</span>
                    
                                                                            @elseif($control->cybersecurityMaturityResult->maturity_rating >= 4 )
                                                                            <span data-toggle="tooltip" data-placement="top" title="" class="averageValueS c-4" data-original-title="{{$control->cybersecurityMaturityResult->maturity_rating}}">MANAGED</span>
                    
                                                                            @elseif($control->cybersecurityMaturityResult->maturity_rating >=3 )
                                                                            <span data-toggle="tooltip" data-placement="top" title="" class="averageValueS c-3" data-original-title="{{$control->cybersecurityMaturityResult->maturity_rating}}">DEFINED</span>
                    
                                                                            @elseif($control->cybersecurityMaturityResult->maturity_rating >=2)
                                                                            <span data-toggle="tooltip" data-placement="top" title="" class="averageValueS c-2" data-original-title="{{$control->cybersecurityMaturityResult->maturity_rating}}">REPEATABLE</span>
                    
                                                                            @else                                                         
                                                                            <span data-toggle="tooltip" data-placement="top" title="" class="averageValueS c-1" data-original-title="{{$control->cybersecurityMaturityResult->maturity_rating}}">INITIAL</span>
                    
                                                                            @endif
                
                
                                                                            <input type="hidden" name="maturity_rating[{{$control->id}}]" value="{{$control->cybersecurityMaturityResult->maturity_rating}}" class="averageValueI">
                                                                        @else 

                                                                        <span data-toggle="tooltip" data-placement="top" title="" class="averageValueS c-1" data-original-title="">INITIAL</span>   
                                                                        <input type="hidden" name="maturity_rating[{{$control->id}}]" value="0.0" class="averageValueI">
                                                                        @endif



                                                                    
                                                                   
                                                                </div>
                                                            </td>
                                                        </tr>
                                                       <tr class="bg-dark">
                                                            <td colspan="4">Control Statement-{{++$serial}}: {{$control->name}} </td>
                                                       </tr>
                                                       <tr class="bg-primary">
                                                           <td style="width: 70%">Question</td>
                                                           <td>Response</td>
                                                           <td>Score</td>
                                                           <td>Comments</td>
                                                       </tr>

                                                        @if (count($control->children) > 0)

                                                            @foreach ($control->children as $key => $question)
                                                               <tr>
                                                                   <td>{{++$key}}<span>.</span> {{$question->name}}</td>
                                                                   <td>
                                                                       <select name="response[{{$question->id}}]" id="">


                                                                        @if($question->cybersecurityMaturityResult)

                                                                                <option value="0" @if($question->cybersecurityMaturityResult->response ==0 ) selected @endif >N/A</option>
                                                                                <option value="1" @if($question->cybersecurityMaturityResult->response ==1 ) selected @endif>NO</option>
                                                                                <option value="2" @if($question->cybersecurityMaturityResult->response ==2 ) selected @endif>YES</option>
                                                                                <option value="3" @if($question->cybersecurityMaturityResult->response ==3 ) selected @endif>PARTIAL</option>
                                                                           

                                                                            @else 
                                                                            <option value="0">N/A</option>
                                                                            <option value="1">NO</option>
                                                                            <option value="2">YES</option>
                                                                            <option value="3">PARTIAL</option>
                                                                            @endif


                                                                           
                                                                       </select>
                                                                   </td>
                                                                   <td @if($question->cybersecurityMaturityResult)

                                                                    @if($question->cybersecurityMaturityResult->score ==0 ) 
                                                                        class="c-0"
                                                                    @elseif($question->cybersecurityMaturityResult->score ==1 )
                                                                        class="c-1"
                                                                    @elseif($question->cybersecurityMaturityResult->score ==2 )
                                                                        class="c-2"
                                                                    @elseif($question->cybersecurityMaturityResult->score ==3 )
                                                                        class="c-3"
                                                                    @elseif($question->cybersecurityMaturityResult->score ==4 )
                                                                        class="c-4"
                                                                    @elseif($question->cybersecurityMaturityResult->score ==5 )
                                                                        class="c-5"
                                                                    @endif
                                                                @else 
                                                                class="c-0"
                                                                
                                                                @endif >
                                                                        <select name="score[{{$question->id}}]"
                                                                            

                                                                            @if($question->cybersecurityMaturityResult)

                                                                                @if($question->cybersecurityMaturityResult->score ==0 ) 
                                                                                    class="rating_variable c-0"
                                                                                @elseif($question->cybersecurityMaturityResult->score ==1 )
                                                                                    class="rating_variable c-1"
                                                                                @elseif($question->cybersecurityMaturityResult->score ==2 )
                                                                                    class="rating_variable c-2"
                                                                                @elseif($question->cybersecurityMaturityResult->score ==3 )
                                                                                    class="rating_variable c-3"
                                                                                @elseif($question->cybersecurityMaturityResult->score ==4 )
                                                                                    class="rating_variable c-4"
                                                                                @elseif($question->cybersecurityMaturityResult->score ==5 )
                                                                                    class="rating_variable c-5"
                                                                                @endif
                                                                                
                                                                            @else 
                                                                                class="rating_variable c-0"
                                                                            @endif
                                                                        
                                                                        >
                                                                            @if($question->cybersecurityMaturityResult)

                                                                                <option value="0" @if($question->cybersecurityMaturityResult->score ==0 ) selected @endif >N/A</option>
                                                                                <option value="1" @if($question->cybersecurityMaturityResult->score ==1 ) selected @endif>1</option>
                                                                                <option value="2" @if($question->cybersecurityMaturityResult->score ==2 ) selected @endif>2</option>
                                                                                <option value="3" @if($question->cybersecurityMaturityResult->score ==3 ) selected @endif>3</option>
                                                                                <option value="4" @if($question->cybersecurityMaturityResult->score ==4 ) selected @endif>4</option>
                                                                                <option value="5" @if($question->cybersecurityMaturityResult->score ==5 ) selected @endif>5</option>

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
                                                                   <td><textarea name="comment[{{$question->id}}]">@if($question->cybersecurityMaturityResult){{$question->cybersecurityMaturityResult->comment}}@endif</textarea></td>
                                                               </tr>
                                                            @endforeach

                                                        @endif



                                                    </table>
                                                </div>

                                            @endforeach

                                        @endif


                                    </div>


                                </form>

                            @endforeach


                        @endif





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
                var $colorValue = $(this).val();


                if ($colorValue == 1) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-1");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-1");

                } else if ($colorValue == 2) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-2");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-2");

                } else if ($colorValue == 3) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-3");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-3");
                } else if ($colorValue == 4) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-4");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-4");
                } else if ($colorValue == 5) {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-5");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-5");
                } else {
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-0");

                    $(this).removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $(this).addClass("c-0");
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



                        if(avg >=5){
                            $findAverageValueS.html("OPTIMIZED");

                            $findAverageValueS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                            $findAverageValueS.addClass("c-5");
                        }else if( avg >=4){
                            $findAverageValueS.html("MANAGED");
                            $findAverageValueS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                            $findAverageValueS.addClass("c-4");
                        }else if( avg >= 3){
                            $findAverageValueS.html("DEFINED");
                            $findAverageValueS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                            $findAverageValueS.addClass("c-3");
                        }else if( avg >=2){
                            $findAverageValueS.html("REPEATABLE");
                            $findAverageValueS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                            $findAverageValueS.addClass("c-2");
                        }else{
                            $findAverageValueS.html("INITIAL");
                            $findAverageValueS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                            $findAverageValueS.addClass("c-1");
                        }

                        // $findAverageValueS.html(avg);



                        $findAverageValueS.attr('title',avg);
                        $findAverageValueI.val(avg);
                    } else {

                        $findAverageValueS.html("INITIAL");
                        $findAverageValueS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                        $findAverageValueS.addClass("c-1");
                        // $findAverageValueS.html(avg);



                        $findAverageValueS.attr('title',avg);
                        $findAverageValueI.val(avg);
                    }


                } else {

                    // $findAverageValueS.html(avg);


                    $findAverageValueS.html("INITIAL");
                    $findAverageValueS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $findAverageValueS.addClass("c-1");
                    $findAverageValueS.attr('title',avg);
                    $findAverageValueI.val(avg);

                }



                var $findCard = $(this).closest(".category-card");
                var $findMaturityRating = $findCard.find(".averageValueI");


                var $findCategoryAverageS = $findCard.find(".categoryAverageS");
                var $findCategoryAverageI = $findCard.find(".categoryAverageI");




                var categoryResult = 0;
                var categoryCurrentValue = 0;
                var categoryI = 0;
                var categoryAvg = 0.0;

                $.each($findMaturityRating, function() {

                    categoryI = categoryI + 1;

                    categoryCurrentValue = parseInt($(this).val());
                    categoryResult = categoryResult + categoryCurrentValue;

                    // console.log(result);

                });


                 if (categoryI) {

                    if (categoryResult) {
                        categoryAvg = (categoryResult / categoryI).toFixed(2);


                        if(categoryAvg >=5){
                            $findCategoryAverageS.html("OPTIMIZED");

                            $findCategoryAverageS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                            $findCategoryAverageS.addClass("c-5");
                        }else if( categoryAvg >=4){
                            $findCategoryAverageS.html("MANAGED");
                            $findCategoryAverageS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                            $findCategoryAverageS.addClass("c-4");
                        }else if( categoryAvg >= 3){
                            $findCategoryAverageS.html("DEFINED");
                            $findCategoryAverageS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                            $findCategoryAverageS.addClass("c-3");
                        }else if( categoryAvg >=2){
                            $findCategoryAverageS.html("REPEATABLE");
                            $findCategoryAverageS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                            $findCategoryAverageS.addClass("c-2");
                        }else{
                            $findCategoryAverageS.html("INITIAL");
                            $findCategoryAverageS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                            $findCategoryAverageS.addClass("c-1");
                        }
                        // $findCategoryAverageS.html(categoryAvg);


                        $findCategoryAverageS.attr('title',categoryAvg);
                        $findCategoryAverageI.val(categoryAvg);
                    } else {

                        $findCategoryAverageS.html("INITIAL");
                        $findCategoryAverageS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                        $findCategoryAverageS.addClass("c-1");
                        // $findCategoryAverageS.html(categoryAvg);


                        $findCategoryAverageS.attr('title',categoryAvg);
                        $findCategoryAverageI.val(categoryAvg);
                    }


                } else {

                    $findCategoryAverageS.html("INITIAL");
                    $findCategoryAverageS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $findCategoryAverageS.addClass("c-1");
                    // $findCategoryAverageS.html(categoryAvg);


                    $findCategoryAverageS.attr('title',categoryAvg);
                    $findCategoryAverageI.val(categoryAvg);

                }


                // function-card

                var $findFunctionCard = $(this).closest(".function-card");
                var $findCategoryAverage = $findFunctionCard.find(".categoryAverageI");


                var $findFunctionAverageS = $findFunctionCard.find(".functionAverageS");
                var $findFunctionAverageI = $findFunctionCard.find(".functionAverageI");

                var functionResult = 0;
                var functionCurrentValue = 0;
                var functionI = 0;
                var functionAvg = 0.0;

                $.each($findMaturityRating, function() {

                    functionI = functionI + 1;

                    functionCurrentValue = parseInt($(this).val());
                    functionResult = functionResult + functionCurrentValue;

                    // console.log(result);

                });



                if (functionI) {

                        if (functionResult) {
                            functionAvg = (functionResult / functionI).toFixed(2);

                            if(functionAvg >=5){
                                $findFunctionAverageS.html("OPTIMIZED");

                                $findFunctionAverageS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                                $findFunctionAverageS.addClass("c-5");
                            }else if( functionAvg >=4){
                                $findFunctionAverageS.html("MANAGED");
                                $findFunctionAverageS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                                $findFunctionAverageS.addClass("c-4");
                            }else if( functionAvg >= 3){
                                $findFunctionAverageS.html("DEFINED");
                                $findFunctionAverageS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                                $findFunctionAverageS.addClass("c-3");
                            }else if( functionAvg >=2){
                                $findFunctionAverageS.html("REPEATABLE");
                                $findFunctionAverageS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                                $findFunctionAverageS.addClass("c-2");
                            }else{
                                $findFunctionAverageS.html("INITIAL");
                                $findFunctionAverageS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                                $findFunctionAverageS.addClass("c-1");
                            }
                            // $findFunctionAverageS.html(functionAvg);


                            $findFunctionAverageS.attr('title',functionAvg);
                            $findFunctionAverageI.val(functionAvg);
                        } else {
                            $findFunctionAverageS.html("INITIAL");
                            $findFunctionAverageS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                            $findFunctionAverageS.addClass("c-1");
                            // $findFunctionAverageS.html(functionAvg);



                            $findFunctionAverageS.attr('title',functionAvg);
                            $findFunctionAverageI.val(functionAvg);
                        }


                } else {

                    $findFunctionAverageS.html("INITIAL");
                    $findFunctionAverageS.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $findFunctionAverageS.addClass("c-1");
                    // $findFunctionAverageS.html(functionAvg);

                    $findFunctionAverageS.attr('title',functionAvg);
                    $findFunctionAverageI.val(functionAvg);

                }









            })



            $('.cybersecurityMaturityForm').on('submit', function(e) {

                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ url('cybersecurity-maturity-assessment-result-store') }}",
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
                url: "{{ url('cybersecurity-maturity-assessment-result-reset') }}/" + company_id,
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
            var $form = $('.drmForm');

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
                url: "{{ url('cybersecurity-maturity-assessment-result-publish') }}/" + assessment_id,
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




@endsection
