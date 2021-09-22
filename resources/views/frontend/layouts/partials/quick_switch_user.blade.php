<div id="kt_quick_panel" class="offcanvas offcanvas-right p-10 switch-user-scroll">
	<div class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5">
		<h3 class="font-weight-bold m-0">Switch User</h3>
		<div class="offcanvas-close mt-n1 pr-5">
			<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_panel_close">
				<i class="ki ki-close icon-xs text-muted"></i>
			</a>
		</div>
	</div>
        @php
            $userCheck = \App\Models\UserRole::where('user_id',Auth::id() )->first();
            $userCompanies = \App\Models\UserCompany::with('user', 'company')->get();
        @endphp
    @if ( $userCheck->rolde_id !=3 )
		<div class="navi navi-icon-circle navi-spacer-x-0" style="max-height: 90vh; overflow-y: scroll;">
			@foreach ($userCompanies  as $userCompany )
			
					<a href="{{route('switch-user', $userCompany->user_id)}}" class="navi-item">
						<div class="navi-link rounded">
							<div class="symbol symbol-50 mr-3">
								<div class="symbol-label">
									@if ($userCompany->user->image)
									<img src="{{$userCompany->user->image}}" class="h-75 align-self-end" alt="" />
									@else
									<img src="" class="h-75 align-self-end" alt="" />
									@endif
									
								</div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold font-size-lg">{{$userCompany->user->name}}</div>
								<div class="text-muted">{{ $userCompany->company->name }}</div>
							</div>
						</div>
					</a>
			
			@endforeach
		</div>
	@endif
</div>