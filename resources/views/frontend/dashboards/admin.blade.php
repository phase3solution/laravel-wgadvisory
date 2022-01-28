
@extends('frontend.master')

@section('style')
	<link href="{{ asset('css/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
@include('frontend.layouts.sidebar_admin')

<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
	@include('frontend.layouts.header_admin')
	
	<div class="container-fluid">
		<div class="d-flex flex-column-fluid mt-1">
			<div class="card p-5" style="width:100%">
				<!--begin::Header-->
				<div class="card-header border-0 p-5 pl-8">
					<div class="custom-title">
						<h1 class="title">Previous Health Check</h1>
						<h6 class="sub-title"><span>Content Goes Here</span></h6>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body d-flex flex-column">
					<div class="mb-7">
						<div class="row align-items-center">
							<div class="col-sm-10">
								<div class="row align-items-center">
									<div class="col-md-4 my-2 my-md-0">
										<div class="input-icon">
											<input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>
									<div class="col-md-6 my-2 my-md-0">
										<div class="d-flex align-items-center">
											<label class="mr-3 mb-0 d-none d-md-block">Company:</label>
											<select class="form-control" id="kt_datatable_search_status">
												<option value="">Select</option>
												@if (!empty($companies))

													@foreach ($companies as $company)
													<option value="{{$company->name}}">{{$company->name}}</option>
													@endforeach
												@else 

												<option value="">Data Not Found</option>
													
												@endif
											</select>
										</div>
									</div>
									<div class="col-md-2 my-2 my-md-0">
										<div class="d-flex align-items-center">
											<label class="mr-3 mb-0 d-none d-md-block">Year:</label>
											<select class="form-control" id="kt_datatable_search_type">
												<option value="">Year</option>
												<option value="2022">2022</option>
												<option value="2021">2021</option>
												<option value="2020">2020</option>
												<option value="2019">2019</option>
												<option value="2018">2018</option>
												<option value="2017">2017</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 mt-5 mt-lg-0">
								<a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
							</div>
						</div>
					</div>
					<table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
						<thead>
							<tr>
								<th title="Field #1">Company</th>
								<th title="Field #2">Category</th>
								<th title="Field #3">Published</th>
								<th title="Field #4">Modified</th>
								<th title="Field #5">&nbsp;</th>
								<th title="Field #6">Action</th>
							</tr>
						</thead>
						<tbody>


							@if (!empty($assessments))

							

								@foreach ($assessments as $assessment)
									<tr>
										<td>{{$assessment->assignCompany->company->name}}</td>
										<td>{{$assessment->name}}</td>
										<td>{{date('F d ,Y', strtotime($assessment->published_at))}}</td>
										<td>{{date('F d ,Y', strtotime($assessment->updated_at))}}</td>
										<td>
											<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
												<div class="btn-group" role="group">
													<button id="btnGroupDrop1" type="button" class="btn btn-primary font-weight-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="View">
													<span class="la la-eye la-lg"></span>
													</button>
													<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
														@if (!empty($assessment->children))
															@foreach ($assessment->children as $subcategory)
																<a class="dropdown-item" href="#">{{$subcategory->name}}</a>
															@endforeach
														@else 

														<a class="dropdown-item" href="#">Not Found</a>
															
														@endif
														
													
													</div>
												</div>
											
												<button type="button" class="btn btn-dark font-weight-bold" title="Scorecard">
													<span class="la la-chart-area la-lg"></span>
												</button>
		
												<div class="btn-group" role="group">
													<button id="btnGroupDrop1" type="button" class="btn btn-warning font-weight-bold" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Edit">
													<span class="la la-edit la-lg"></span>
													</button>
													<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
														@if (!empty($assessment->children))
															@foreach ($assessment->children as $subcategory)
																<a class="dropdown-item" href="#">{{$subcategory->name}}</a>
															@endforeach
														@else 

														<a class="dropdown-item" href="#">Not Found</a>
															
														@endif
													</div>
												</div>
		
												<button type="button" class="btn btn-danger font-weight-bold" title="Delete">
													<span class="la la-trash la-lg"></span>
												</button>
											</div>
										</td>
										<td></td>
									</tr>
								@endforeach

							

							@else 
							<tr>
								<td colspan="6" class="text-center" style="text-align:center">No Data Found</td>
							</tr>
							@endif
							 
						
							
						</tbody>
					</table>
				</div>
				<!--end::Body-->
			</div>
		</div>
	</div>

</div>
<!--end::Wrapper-->


@endsection



@section('scripts')
	<script src="{{ asset('js/html-table.js') }}"></script>
@endsection