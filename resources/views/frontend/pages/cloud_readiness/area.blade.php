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
                            <a class="btn btn-lg btn-info btn-publish bold" onclick="confirm('Are you sure?');publishAssessment({{ $assessment->parent_id }})" href="javascript:;">Publish</a>
                            <a class="btn btn-lg btn-success btn-publish bold" onclick="saveAll()" href="javascript:;">Save All</a>
                            <a class="btn btn-lg btn-warning btn-publish bold" onclick="confirm('Are you sure?');resetAssessment({{ $userCheck->company_id }})" href="javascript:;">Reset</a>
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
                            <img src="{{asset('frontend/assets')}}/img/dr-readiness.jpeg" usemap="#image-map">

                            <map name="image-map">
                                <area target="" alt="Organizational " title="Organizational " href="" coords="513,501,10,2" shape="rect">
                                <area target="" alt="Technology" title="Technology" href="" coords="514,7,1015,499" shape="rect">
                                <area target="" alt="Maintenance" title="Maintenance" href="" coords="515,510,1010,997" shape="rect">
                                <area target="" alt="Recovery" title="Recovery" href="" coords="10,509,506,997" shape="rect">
                            </map>
                                
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="graph_item_maturity purple">
                                    <div class="title">Organizational Readiness</div>
                                    <div class="wrap">
                                        <p>A successful IT Disaster Recivery Program requires leadership, sponsorship & commitment of the most senior levels of management. Hence, responsibility for defining business continuity objectives, and for monitoring compliance, must remain with executive management; it cannot be delegated to individual business units.</p>
                                        <p>The DR readiness Dashboard will include an optional Risk Registry that will capture/track all controls or improvements added to the system. This will allow an organization to easily monitor changes throuhout the lifecycle to the program.</p>

                                        <div class="row">
                                            <div class="col-sm-7">
                                                <p>Other activities include:</p>
                                                <ul>
                                                    <li>Executive Management committed to corporate resiliency efforts</li>
                                                    <li>Strategic and tactical program planning process Key personnel trained and ready to respond</li>
                                                    <li>Emergency response and crisis communications plans have been developed and tested</li>
                                                    <li>Formalized training and awareness program exists</li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="thum">
                                                    <div class="thum"><img src="{{asset('frontend/assets')}}/img/icon/icon-business_solutions.png" alt=""></div>
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
            <div class="container-fluid">
                <div class="">
                    

                    @if (count($assessment->children)> 0)

                        @foreach ($assessment->children as $section)

                            <form class="cloudReadinessForm" method="POST">
                                @csrf

                                <input type="hidden" name="company_id" value="{{ $userCheck->company_id }}">

                                <div class="card mt-1">

                                    <div class="card-title bg-blue">
                                        <div class="row align-items-center">
                                            <div class="col-sm-9">
                                                <div class="card-section-title">
                                                    <div class="icon">
                                                        <h2 class="title-txt">{{$section->name}}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="text-right">
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary btn-sm bold" type="button" data-toggle="modal" data-target="#demoModal">
                                                            Criteria Rating Definitions
                                                        </button>
                                                        <button class="btn btn-success btn-sm bold" type="submit">
                                                            <i class="fas fa-save"></i> Save
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    @if (count($section->children)>0)

                                        @foreach ($section->children as $table)

                                            <div class="card-body">
                                                <table class="table section-table table-bordered">
                                                    <tr>
                                                        <td class="sub-title-txt bg-gray text-center">{{$table->name}} : Topic Area </td>
                                                        <td class="sub-title-txt bg-gray text-center">

                                                            Rating<br>

                                                            @if (count($table->children)>0)
                                                            (<span class="totalValueS">@if ($table->cloudReadinessResult) {{$table->cloudReadinessResult->total}} @else 0 @endif</span> out of <span>{{count($table->children)*5}}</span> / Avg: <span class="averageValueS">@if ($table->cloudReadinessResult) {{$table->cloudReadinessResult->average}} @else 0 @endif</span> )
                                                            @else
                                                            (<span class="totalValueS">@if ($table->cloudReadinessResult) {{$table->cloudReadinessResult->total}} @else 0 @endif</span> out of 0 / Avg: <span class="averageValueS">@if ($table->cloudReadinessResult) {{$table->cloudReadinessResult->average}} @else 0 @endif</span> )
                                                            @endif
                                                           
                                                            @if ($table->cloudReadinessResult)
                                                            <input type="hidden" name="total[{{$table->id}}]" class="totalValueI" value="{{$table->cloudReadinessResult->total}}">
                                                            <input type="hidden" name="average[{{$table->id}}]" class="averageValueI" value="{{$table->cloudReadinessResult->average}}">

                                                            @else 
                                                            <input type="hidden" name="total[{{$table->id}}]" class="totalValueI" value="0">
                                                            <input type="hidden" name="average[{{$table->id}}]" class="averageValueI" value="0.0">
                                                                
                                                            @endif

                                                           

                                                        </td>
                                                        <td class="sub-title-txt bg-gray text-center" style="min-width: 300px">Comments</td>
                                                    </tr>

                                                    @if (count($table->children)>0)

                                                        @foreach ($table->children as $key=>$question)
                                                        <tr>
                                                            <td class="text-16">{{++$key}}. {{$question->name}}</td>
                                                            <td class="p-0 @if ($question->cloudReadinessResult) c-{{$question->cloudReadinessResult->answer}} @else c-0 @endif ">
                                                                <select name="answer[{{$question->id}}]" class="form-control text-16 transparent rating_variable @if ($question->cloudReadinessResult) c-{{$question->cloudReadinessResult->answer}} @else c-0 @endif">
                                                                  
                                                                  @if ($question->cloudReadinessResult)

                                                                  <option value="0" @if($question->cloudReadinessResult->answer == 0) selected @endif >N\A</option>
                                                                  <option value="1" @if($question->cloudReadinessResult->answer == 1) selected @endif >Initial</option>
                                                                  <option value="2" @if($question->cloudReadinessResult->answer == 2) selected @endif >Managed</option>
                                                                  <option value="3" @if($question->cloudReadinessResult->answer == 3) selected @endif >Defined</option>
                                                                  <option value="4" @if($question->cloudReadinessResult->answer == 4) selected @endif >Measured</option>
                                                                  <option value="5" @if($question->cloudReadinessResult->answer == 5) selected @endif >Optimizing</option>

                                                                  @else

                                                                  <option value="0">N\A</option>
                                                                  <option value="1">Initial</option>
                                                                  <option value="2">Managed</option>
                                                                  <option value="3">Defined</option>
                                                                  <option value="4">Measured</option>
                                                                  <option value="5">Optimizing</option>
                                                                      
                                                                  @endif
                                                                  
                                                                   
                                                                </select>
                                                            </td>
                                                            <td class="p-0">
                                
                                                                <textarea name="comment[{{$question->id}}]" class="form-control text-16 bold comment" cols="10" rows="1">@if($question->cloudReadinessResult){{$question->cloudReadinessResult->comment}}@endif</textarea>
                                                            </td>
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
<script src="{{asset('frontend/assets/js/jquery.rwdImageMaps.min.js')}}"></script>
<script>
    $(document).ready(function(e) {
        $('img[usemap]').rwdImageMaps();
    });
</script>

<script>
    $(document).ready(function(){

        $('.rating_variable').on('change', function(){



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
                }else{
                    $colorChange.removeClass("c-0 c-1 c-2 c-3 c-4 c-5");
                    $colorChange.addClass("c-0");
                }







            var $findTable = $(this).closest("table");
            var $findRatingVariables = $findTable.find(".rating_variable");

            var $findTotalValueS =  $findTable.find(".totalValueS");
            var $findAverageValueS =  $findTable.find(".averageValueS");

            var $findTotalValueI =  $findTable.find(".totalValueI");
            var $findAverageValueI =  $findTable.find(".averageValueI");

            var result = 0;
            var currentValue = 0;
            var i = 0;
            var avg = 0.0;

            $.each($findRatingVariables, function() {

                i = i+1;

                currentValue = parseInt($(this).val());
                result = result + currentValue;

                // console.log(result);

            });

            $findTotalValueS.html(result);
            $findTotalValueI.val(result);


            if(i){

                if(result){
                    avg = (result/i).toFixed(2);

                    $findAverageValueS.html(avg);
                    $findAverageValueI.val(avg);
                }else{
                    $findAverageValueS.html(avg);
                    $findAverageValueI.val(avg);
                }

               
            }else{

                $findAverageValueS.html(avg);
                $findAverageValueI.val(avg);

            }

        })



        $('.cloudReadinessForm').on('submit', function(e){

                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ url('cloud-readiness-assessment-result-store') }}",
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
                url: "{{ url('cloud-readiness-assessment-result-reset') }}/" + company_id,
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
        var $form = $('.cloudReadinessForm');

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
            url: "{{ url('cloud-readiness-assessment-result-publish') }}/" + assessment_id,
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