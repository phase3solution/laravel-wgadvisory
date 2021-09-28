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
               

                <div class="row align-items-center">
                  <div class="col-md-6">
                    <h4 class="card-title">{{ __('Edit Company') }}</h4>
                    <p class="card-category">{{ __('Company information') }}</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info btn-sm" rel="tooltip" title="View List" href="{{route('company.index')}}"><i class="fa fa-list"></i></a>
                  </div>
                </div>


              </div>
              <div class="card-body ">

               
                <div style="display: none" class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span class="alert-message"></span>
                </div>

                <div class="row">

                  <div class="col-sm-9">

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Name') }} <span class="text-danger">*</span> </label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$company->name}}" required="true" aria-required="true"/>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description"></textarea>
                        </div>
                      </div>
                    </div>

                    
    
                
                
    
                      
                

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Status') }} <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                          <div class="form-group">
                            <input type="radio" name="status" value="1" checked id="active-status" required>
                            <label for="active-status">Active</label>

                            <input type="radio" name="status" value="0" id="inactive-status">
                            <label for="inactive-status">Inactive</label>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Dashboard Type') }} <span class="text-danger">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <select class="form-control select2" name="dashboard_type" required>
                            <option value="">Select Dashboard Type</option>
                            <option value="1" selected >DASHBOARD A</option>
                            <option value="2">DASHBOARD B</option>
                            <option value="3">DASHBOARD C</option>
                            <option value="4">DASHBOARD D</option>
                          </select>
                        </div>
                      </div>
                    </div>
    
                
    
                
    
    
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Profile Picture') }}</label>
                        <div class="col-sm-10">
                         <input type="file" class="input-image" name="image">
                        </div>
                    </div>

                  </div>

                  <div class="col-sm-3">
                    <label class="col-form-label">Preview Image</label> <br>
                    <img src="{{asset('no-image-found.jpeg')}}" class="preview-image card" alt="" class="card" style="max-width: 250px; max-height:250px" srcset="">
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