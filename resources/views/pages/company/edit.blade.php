@extends('layouts.app', ['activePage' => 'company', 'titlePage' => __('Company')])

@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('company.update',$company->id) }}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Company') }}</h4>
                <p class="card-category">{{ __('Company information') }}</p>
              </div>
              <div class="card-body ">

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$company->name}}" required="true" aria-required="true"/>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <textarea class="form-control" name="description" id="" cols="60" rows="5"  placeholder="Description">{{$company->description}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Dashboard Type') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <select class="form-control select2" name="dashboard_type">
                        <option value="">Select Dashboard Type</option>
                        <option value="1" @if ($company->dashboard_type == 1)
                            selected
                        @endif >DASHBOARD A</option>
                        <option value="2" @if ($company->dashboard_type == 2)
                          selected
                      @endif>DASHBOARD B</option>
                        <option value="3" @if ($company->dashboard_type == 3)
                          selected
                      @endif>DASHBOARD C</option>
                        <option value="4" @if ($company->dashboard_type == 4)
                          selected
                      @endif>DASHBOARD D</option>
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
                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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