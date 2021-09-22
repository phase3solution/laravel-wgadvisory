@extends('frontend.master')

@section('content')

	@include('frontend.layouts.sidebar_user')

<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
	@include('frontend.layouts.header_user')

	@php
		$userCompany = \App\Models\UserCompany::with('company')->where('user_id',Auth::id() )->first();
		$companyAssessments = \App\Models\CompanyAssessmentType::with('company', 'assessmentType')
		->with(array('assessment'=>function($q1){
			$q1->with('children')->where('status', 5)->get();
		}))
		->where('company_id',$userCompany->company_id)
		->where('status', 1)
		->get();

		$bias = \App\Models\Bia::with('biaDepartment')->where('company_id',$userCompany->company_id )->where('status', 5)->get();


	@endphp 

	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Entry-->
		<div class="d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class="container-fluid">
				<!--begin::Dashboard-->
				<!--begin::Row-->
				<div class="row">
                    <div class="col-sm-6 col-lg-6 col-xxl-8">
                        <div class="fixed-scroll">
                            <div class="card mb-2">
                                <div class="card-body p-2">
                                    <div class="sub-dashboard-titlebar">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="main-db-thum">
                                                    <a href="{{asset('frontend')}}">
                                                        <img src="{{asset('frontend')}}/assets/media/icons/encase-icon.png" alt="">
                                                    </a>
                                                </div>	
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="right-bar it-skill text-center">
                                                    <div class="row align-items-center">
                                                        <div class="col-sm-4 col-xxl-3">
                                                            <a href="javascript:;">
                                                                <img class="sfia-title-thum" src="{{asset('frontend')}}/assets/media/icons/sfial.png" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-8 col-xxl-9">
                                                            <div class="sfia-title-icons text-left">
                                                                <div class="item">
                                                                    <a class="d-flex align-items-center" href="javascript:;">
                                                                        <img src="{{asset('frontend')}}/assets/media/icons/information-button.png" alt="">
                                                                        <span>How SFIA Works</span>
                                                                    </a>
                                                                </div>
                                                                <div class="item">
                                                                    <a class="d-flex align-items-center" href="javascript:;">
                                                                        <img src="{{asset('frontend')}}/assets/media/icons/user.png" alt="">
                                                                        <span>Levels of Responsibility</span>
                                                                    </a>
                                                                </div>
                                                                <div class="item">
                                                                    <a class="d-flex align-items-center" href="javascript:;">
                                                                        <img src="{{asset('frontend')}}/assets/media/icons/settings.png" alt="">
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
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-header border-0 pt-5 pb-0">
                                    <div class="custom-title">
                                        <h1 class="title">Corporate Skills</h1>
                                        <h6 class="sub-title"><span>SFIA Activity Page</span></h6>
                                    </div>
                                </div>
                                <div class="card-body p-2">
                                    <ul class="list-inline text-center">
                                        <li>
                                            <a href="javascript:;" type="button" class="btn btn-lg btn-success" data-toggle="modal" data-target="#allUsers"> 
                                                <span class="fa fa-users"></span> Users
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" id="btnGroupDrop1" type="button" class="btn btn-lg btn-warning dropdown-toggle no-icon" data-toggle="dropdown"> 
                                                <span class="fa fa-edit"></span> Review/Edit Role
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item" href="javascript:;">Network Group</a>
                                                <a class="dropdown-item" href="javascript:;">Development Group</a>
                                                <a class="dropdown-item" href="javascript:;">Helpdek Group</a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:;" type="button" class="btn btn-lg btn-primary">
                                                <span class="fa fa-user-plus"></span> Add Role
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" class="btn btn-lg btn-info">
                                                <span class="fa fa-user-plus"></span> Add Missing Skill
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="sfia-color-items">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="item d-flex">
                                                    <div class="color item-one"></div>
                                                    <div class="txt">
                                                        <a href="javascript:;">
                                                            Strategy and Architecture
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item d-flex">
                                                    <div class="color item-two"></div>
                                                    <div class="txt">
                                                        <a href="javascript:;">
                                                            Change and Transformation
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item d-flex">
                                                    <div class="color item-three"></div>
                                                    <div class="txt">
                                                        <a href="javascript:;">
                                                            Development and Implementation
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="item d-flex">
                                                    <div class="color item-four"></div>
                                                    <div class="txt">
                                                        <a href="javascript:;">
                                                            Delivery and Operation
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item d-flex">
                                                    <div class="color item-five"></div>
                                                    <div class="txt">
                                                        <a href="javascript:;">
                                                            Skills and Quality
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item d-flex">
                                                    <div class="color item-six"></div>
                                                    <div class="txt">
                                                        <a href="javascript:;">
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
					<div class="col-sm-6 col-lg-6 col-xxl-4">
						<div class="sticky-right2">
							<div class="card fixedItem2">
								<div class="card-body">

									<div class="card-select-fixed">	
										<form action="">
											<select name="score_card" id="scoreCardSelection" class="form-control value-scorecard bold">
												<option value="">Select Scorecard</option>
											
															<option value="">Name - DAte</option>
												
											</select>
										</form>
									</div>

									<div class="dynamicScoreCard">
										<div class="scorecard-item one">
											<div class="card-fixed-header">
												<div class="card-header-tabs-line scorecard-tab pb-5">
													<div class="custom-title">
														<h1 class="title">Value Scorecard</h1>
														<h6 class="sub-title"><span>Assessment</span></h6>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									
								
								</div>
							</div>
							{{-- <div class="border-bottom"></div> --}}
						</div>
					</div>
				</div>
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->

	</div>

</div>
<!--end::Wrapper-->


@endsection


@section('script')

<script>
	$(document).ready(function(){
		$("#scoreCardSelection").on('change', function(e){
			e.preventDefault();
			var scorecardValue = $(this).val();

			if(scorecardValue){

				$.ajax({
                    type: "GET",
                    url: "{{ url('find-scorecard') }}/"+scorecardValue,
                    success: function(response) {
                       $('.dynamicScoreCard').html(response);
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

			}else{
				console.log("Empty Value");
			}

		})
	})
</script>
	
@endsection