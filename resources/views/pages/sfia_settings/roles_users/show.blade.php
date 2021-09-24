@extends('layouts.app', ['activePage' => 'sfiaRoleUser', 'titlePage' => __('SFIA Role User')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title ">SFIA Role User</h4>
                    <p class="card-category">SFIA Role User Information</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info  btn-sm" href="{{route('sfiaRoleUser.index')}}" rel="tooltip" title="Add New" ><i class="material-icons">list</i></a>
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