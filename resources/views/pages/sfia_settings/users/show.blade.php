@extends('layouts.app', ['activePage' => 'sfiaUser', 'titlePage' => __('SFIA Settings')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title ">SFIA User</h4>
                    <p class="card-category">SFIA User Information</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info  btn-sm" href="{{route('sfiaUser.index')}}" rel="tooltip" title="Add New" ><i class="material-icons">list</i></a>
                  </div>
              </div>
          </div>
          <div class="card-body">
           
          </div>
        </div>
      </div>
     
    </div>
  </div>
</div>
@endsection