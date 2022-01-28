@extends('layouts.app', ['activePage' => 'role', 'titlePage' => __('User Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">

          <form method="post" id="roleUpdateForm" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')
            <input type="hidden" class="update-id" name="id" value="{{$role->id}}">
            <div class="card ">
              <div class="card-header card-header-primary">
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <h4 class="card-title">{{ __('Role Edit') }}</h4>
                    <p class="card-category">{{ __('Role information') }}</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info btn-sm" rel="tooltip" title="View List" href="{{route('role.index')}}"><i class="fa fa-list"></i></a>
                  </div>
                </div>
               
              </div>


              <div class="card-body ">

                <div  class="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span class="alert-message"></span>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }} <span class="text-danger">*</span> </label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$role->name}}" required="true" aria-required="true"/>
                      <small class="error name-error text-danger "></small>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                        <textarea class="form-control" name="description" id="" cols="60" rows="5" placeholder="Description">{{$role->description}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Status') }} <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <div class="form-group">
                        <input type="radio" name="status" value="1" @if($role->status==1) checked @endif  id="active-status" required>
                        <label for="active-status">Active</label>

                        <input type="radio" name="status" value="0" @if($role->status==0) checked @endif  id="inactive-status">
                        <label for="inactive-status">Inactive</label>
                      </div>
                    </div>
                </div>




              </div>


              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('Update') }} <span class="ph3-loading-button"><i class="fa fa-spinner fa-spin"></i></span></button>
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

    $("#roleUpdateForm").on('submit', function(e){
        e.preventDefault();

        var id = $(this).find('.update-id').val();


        $.ajax({
            url: "{{url('role')}}/"+id,
            data:new FormData(this),
            processData: false,
            contentType: false,
            type: 'POST',
            beforeSend: function() {
									$("#roleUpdateForm").find(".ph3-loading-button").show();
						},
            success:function(response){

              $("#roleUpdateForm").find(".ph3-loading-button").hide();
              if(response.status){
                Toast.fire({
                    type: 'success',
                    title: response.message
                })

                $("#roleUpdateForm").find(".alert").removeClass("alert-danger");
								$("#roleUpdateForm").find(".alert").addClass("alert-success");
								$("#roleUpdateForm").find(".alert-message").html(response.message);
                $("#roleUpdateForm").find(".error").html("");

              }
                
           

            },
            error:function(xhr, status, error){
              $("#roleUpdateForm").find(".ph3-loading-button").hide();
                var	responseText = jQuery.parseJSON(xhr.responseText);

								Toast.fire({
									type: 'error',
									title: responseText.message
								})
                
								$("#roleUpdateForm").find(".alert").removeClass("alert-success");
								$("#roleUpdateForm").find(".alert").addClass("alert-danger");
								$("#roleUpdateForm").find(".alert-message").html(responseText.message);

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