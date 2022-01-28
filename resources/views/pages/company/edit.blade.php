@extends('layouts.app', ['activePage' => 'company', 'titlePage' => __('Company')])

@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">

          <form method="post" id="companyUpdateForm"  enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')

            <input type="hidden" class="update-id" name="id" value="{{$company->id}}">
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

               
                <div  class="alert ">
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
                          <small class="error name-error text-danger "></small>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                            <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description">{{$company->description}}</textarea>
                        </div>
                      </div>
                    </div>

                    
    
                
                
    
                      
                

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Status') }} <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                          <div class="form-group">
                            <input type="radio" name="status" value="1" @if ($company->status == 1) checked @endif  id="active-status" required>
                            <label for="active-status">Active</label>

                            <input type="radio" name="status" value="0" @if ($company->status == 0) checked @endif id="inactive-status">
                            <label for="inactive-status">Inactive</label>
                            <small class="error status-error text-danger "></small>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Dashboard Type') }} <span class="text-danger">*</span></label>
                      <div class="col-sm-7">
                        <div class="form-group">
                          <select class="form-control select2" name="dashboard_type" required>
                            <option value="">Select Dashboard Type</option>
                            <option value="1" @if ($company->dashboard_type == 1) selected @endif>DASHBOARD A</option>
                            <option value="2" @if ($company->dashboard_type == 2) selected @endif>DASHBOARD B</option>
                            <option value="3" @if ($company->dashboard_type == 3) selected @endif>DASHBOARD C</option>
                            <option value="4" @if ($company->dashboard_type == 4) selected @endif>DASHBOARD D</option>
                          </select>
                          <small class="error dashboard_type-error text-danger "></small>
                        </div>
                      </div>
                    </div>
    
                
    
                
    
    
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Profile Picture') }}</label>
                        <div class="col-sm-10">
                         <input type="file" class="input-image" name="image">
                         <small class="error image-error text-danger "></small>
                        </div>
                    </div>

                  </div>

                  <div class="col-sm-3">
                    <label class="col-form-label">Preview Image</label> <br>

                    @if ($company->image)
                      <img src="{{asset($company->image)}}" class="preview-image card" alt="" class="card" style="max-width: 250px; max-height:250px" srcset="">

                    @else 
                      <img src="{{asset('no-image-found.jpeg')}}" class="preview-image card" alt="" class="card" style="max-width: 250px; max-height:250px" srcset="">

                    @endif

                  </div>

                </div>
                
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('Update') }} <span class="ph3-loading-button"><i class="fa fa-spinner fa-spin"></i></span> </button>
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

    $("#companyUpdateForm").on('submit', function(e){
        e.preventDefault();

        var id = $(this).find('.update-id').val();


        $.ajax({
            url: "{{url('company')}}/"+id,
            data:new FormData(this),
            processData: false,
            contentType: false,
            type: 'POST',
            beforeSend: function() {
									$("#companyUpdateForm").find(".ph3-loading-button").show();
						},
            success:function(response){

              $("#companyUpdateForm").find(".ph3-loading-button").hide();

              if(response.status){

                Toast.fire({
                    type: 'success',
                    title: response.message
                })

                $("#companyUpdateForm").find(".alert").removeClass("alert-danger");
								$("#companyUpdateForm").find(".alert").addClass("alert-success");
								$("#companyUpdateForm").find(".alert-message").html(response.message);
                $("#companyUpdateForm").find(".error").html("");



              }

           

            },
            error:function(xhr, status, error){

              $("#companyUpdateForm").find(".ph3-loading-button").hide();

                 var	responseText = jQuery.parseJSON(xhr.responseText);

              Toast.fire({
									type: 'error',
									title: responseText.message
								})
                
								$("#companyUpdateForm").find(".alert").removeClass("alert-success");
								$("#companyUpdateForm").find(".alert").addClass("alert-danger");
								$("#companyUpdateForm").find(".alert-message").html(responseText.message);

                if(responseText.errors){
                  $.each(responseText.errors, function (key, val) {
                    $("." + key + "-error").text(val[0]);
                  });
                }
             
            }
        })
          
    })

});
</script>
    
@endpush