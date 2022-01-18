
@extends('frontend.master')

@section('style')
	<link href="{{ asset('css/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
@include('frontend.layouts.sidebar_guest')

<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
	@include('frontend.layouts.header_user')
	
	<div class="container-fluid">
		<div class="d-flex flex-column-fluid mt-1">
			<div class="card p-5" style="width:100%">
				<!--begin::Header-->
				<div class="card-header border-0 p-5 pl-8">
					<div class="custom-title">
						<h1 class="title">Guest Dashboard</h1>
						<h6 class="sub-title"><span>Welcome to our site</span></h6>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body d-flex flex-column">
					<div class="mb-7">
						
					</div>
				
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