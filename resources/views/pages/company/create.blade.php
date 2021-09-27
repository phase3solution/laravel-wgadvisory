@extends('layouts.app', ['activePage' => 'createCompany', 'titlePage' => __('Company')])

@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('company.store') }}" autocomplete="off" enctype="multipart/form-data"  class="form-horizontal">
            @csrf
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Company') }}</h4>
                <p class="card-category">{{ __('Company information') }}</p>
              </div>
              <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description"></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Dashboard Type') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <select class="form-control select2" name="dashboard_type">
                        <option value="">Select Dashboard Type</option>
                        <option value="1">DASHBOARD A</option>
                        <option value="2">DASHBOARD B</option>
                        <option value="3">DASHBOARD C</option>
                        <option value="4">DASHBOARD D</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Company Logo') }}</label>
                  <div class="col-sm-7">
                    <input type="file" class="form-control" name="image">
                  </div>
                </div>
                
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection


@push('js')

<script>
  $(document).ready(function() {
    $('.select2').select2();
});
</script>
    
@endpush