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
						<div class="card mb-2">
							<div class="card-body">
								<div class="main-graphics">
									<img src="{{ asset('frontend')}}/assets/media/dashboard-graphics/encase.png" alt="">
								</div>
							</div>
						</div>
						<div class="card mb-2">
							<div class="card-header border-0 pt-5 pb-0 pl-5">
								<div class="custom-title">
									<h1 class="title">Assessment Library</h1>
									<h6 class="sub-title"><span>Quick Reference Guides</span></h6>
								</div>
							</div>
							
							<div class="card-body pt-2 pb-2">
								<div class="table-responsive">
									<table class="table table-bordered mb-0">
										<thead>
											<tr class="bg-dark">
												<th class="text-white">Category</th>
												<th class="text-white text-center">Date</th>
												<th class="text-white" style="width: 225px;">&nbsp;</th>
											</tr>
										</thead>
									
										
										<tbody>

											@if (count($companyAssessments)>0)
												@foreach ($companyAssessments as $companyAssessment)
													@if ($companyAssessment->assessment)

													<tr>
														<td class="bold">{{$companyAssessment->assessment->name}}</td>
														<td class="bold text-center">{{ date("F j, Y", strtotime($companyAssessment->assessment->updated_at))}}</td>
														<td class="text-center">
															<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
																<div class="btn-group" role="group">
																	<button id="btnGroupDrop1" type="button" class="btn btn-light-success font-weight-bold dropdown-toggle no-icon" data-toggle="dropdown" title="View">
																		<span class="la la-eye la-lg"></span>
																	</button>
																	<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
																		
																		@if (count($companyAssessment->assessment->children)>0)

																			@foreach ($companyAssessment->assessment->children as $item)
																				<a class="dropdown-item" href="{{route('assessmentView.type',[$companyAssessment->assessmentType->slug,$item->id])}}" target="_blank">{{$item->name}}</a>
																			@endforeach
																			
																		@endif

														
																	</div>
																</div>
																<div class="btn-group" role="group">
																	<button id="btnGroupDrop1" type="button" class="btn btn-light-primary font-weight-bold dropdown-toggle no-icon" data-toggle="dropdown" title="View">
																		<span class="la la-edit la-lg"></span>
																	</button>
																	<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
																
																		@if (count($companyAssessment->assessment->children)>0)

																			@foreach ($companyAssessment->assessment->children as $item)
																				<a class="dropdown-item" href="{{route('assessment.type',[$companyAssessment->assessmentType->slug,$item->id] )}}" target="_blank">{{$item->name}}</a>
																			@endforeach
																			
																		@endif
																	</div>
																</div>
																<div class="btn-group" role="group">
																	<button id="btnGroupDrop1" type="button" class="btn btn-light-warning font-weight-bold no-icon" title="View">
																		<span class="la la-lock la-lg"></span>
																	</button>
																</div>
																<div class="btn-group" role="group">
																	<button id="btnGroupDrop1" type="button" class="btn btn-light-danger font-weight-bold no-icon" title="View">
																		<span class="la la-trash la-lg"></span>
																	</button>
																</div>
															</div>
														</td>
													</tr>

													
													@endif
												@endforeach

											@else

										
											<tr>
												<td colspan="3" class="text-center">Data Not Found !</td>
											</tr>	
											@endif

											@if ($bias)
												@foreach ($bias as $bia)
												<tr>
													<td class="bold">{{$bia->name}}</td>
													<td class="bold text-center">{{ date("F j, Y", strtotime($bia->updated_at))}}</td>
													<td class="text-center">
														<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
															<div class="btn-group" role="group">
																<button id="btnGroupDrop1" type="button" class="btn btn-light-success font-weight-bold dropdown-toggle no-icon" data-toggle="dropdown" title="View">
																	<span class="la la-eye la-lg"></span>
																</button>
																<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
																	
																	@if (count($bia->biaDepartment)>0)

																		@foreach ($bia->biaDepartment as $department)
																			<a class="dropdown-item" href="{{route('biaView.department',$department->id)}}" target="_blank">{{$department->name}}</a>
																		@endforeach
																		
																	@endif

													
																</div>
															</div>
															<div class="btn-group" role="group">
																<button id="btnGroupDrop1" type="button" class="btn btn-light-primary font-weight-bold dropdown-toggle no-icon" data-toggle="dropdown" title="View">
																	<span class="la la-edit la-lg"></span>
																</button>
																<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
															
																	@if (count($bia->biaDepartment)>0)

																		@foreach ($bia->biaDepartment as $department)
																			<a class="dropdown-item" href="{{route('bia.department',$department->id)}}" target="_blank">{{$department->name}}</a>
																		@endforeach
																		
																	@endif
																</div>
															</div>
															<div class="btn-group" role="group">
																<button id="btnGroupDrop1" type="button" class="btn btn-light-warning font-weight-bold no-icon" title="View">
																	<span class="la la-lock la-lg"></span>
																</button>
															</div>
															<div class="btn-group" role="group">
																<button id="btnGroupDrop1" type="button" class="btn btn-light-danger font-weight-bold no-icon" title="View">
																	<span class="la la-trash la-lg"></span>
																</button>
															</div>
														</div>
													</td>
												</tr>
												@endforeach
											@endif

											

										</tbody>
					
										
			
									</table>
								</div>
							</div>
							<!--end::Body-->
						</div>
					</div>
					<div class="col-sm-6 col-lg-6 col-xxl-4">
						<div class="sticky-right2">
							<div class="card fixedItem2">
								<div class="card-body">

									<div class="card-select-fixed">	
										<div class="form-group">
											<input type="radio" class="score_card_option" value="1" name="score_card_option" id="bia_scorecard">
											<label for="bia_scorecard">Bia</label>
											<input type="radio" class="score_card_option" value="2" name="score_card_option" id="other_scorecard">
											<label for="other_scorecard">Other</label>

										</div>
										<form action="">
											<select name="score_card" id="scoreCardSelection" class="form-control value-scorecard bold others">
												<option value="">Select Scorecard</option>
												@if (count($companyAssessments)>0)
													@foreach ($companyAssessments as $key=>$companyAssessment)
														@if ($companyAssessment->assessment)
															<option value="{{$companyAssessment->assessment->id}}">{{$companyAssessment->assessment->name}} - {{ date("F j, Y", strtotime($companyAssessment->assessment->updated_at))}}</option>
														@endif
													@endforeach
												@endif
											</select>
											<select name="bia_score_card" id="biaScoreCard"  class="form-control value-scorecard bold biaCardSelection" style="display: none">
												<option value="0">Select Bia Scorecard</option>
												@if ($bias) 
													@foreach ($bias as $bia)
														<option value="{{$bia->id}}">{{$bia->name}} - {{ date("F j, Y", strtotime($bia->updated_at))}}</option>
													@endforeach  
												@endif

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

		$('.score_card_option').on('change', function(){

			if($(this).prop("checked")){
				var choseScorecCar =$(this).val();

				if(choseScorecCar == 1){
					$('.others').hide();
					$('.biaCardSelection').show();
				}else if(choseScorecCar == 2){
					$('.biaCardSelection').hide();
					$('.others').show();
				}
				
			}

			


		})




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


		$("#biaScoreCard").on('change', function(e){
			e.preventDefault();
			var scorecardValue = $(this).val();




			if(scorecardValue){

				$.ajax({
                    type: "GET",
                    url: "{{ url('find-bia-scorecard') }}/"+scorecardValue,
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