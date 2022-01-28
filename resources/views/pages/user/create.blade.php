@extends('layouts.app', ['activePage' => 'createUser', 'titlePage' => __('User Management')])
@php
  $userCheck = \App\Models\UserRole::where('user_id',Auth::id() )->first();
@endphp
@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">

          <form method="post" id="createUserForm" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <h4 class="card-title">{{ __('Add User') }}</h4>
                    <p class="card-category">{{ __('User information') }}</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info btn-sm" rel="tooltip" title="View List" href="{{route('user.index')}}"><i class="fa fa-list"></i></a>
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

                  <div class="col-sm-9">

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Name') }} <span class="text-danger">*</span> </label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="" required="true" aria-required="true"/>
                          <small class="error name-error text-danger "></small>

                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Email') }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <div class="form-group">
                            <input class="form-control" name="email" id="input-name" type="email" placeholder="{{ __('Email') }}" value="" required="true" aria-required="true"/>
                            <small class="error email-error text-danger "></small>

                            
    
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Password') }} <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input class="form-control" name="password" id="input-name" type="password" placeholder="{{ __('*******') }}" value="" required="true" aria-required="true"/>
                             <small class="error password-error text-danger "></small>

      
                          </div>
                        </div>
                      </div>
    
                      
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                          <div class="form-group">
                              <input class="form-control" name="confirm_password" id="input-name" type="password" placeholder="{{ __('*******') }}" value="" required="true" aria-required="true"/>
                              <small class="error confirm_password-error text-danger "></small>

                              
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
    
                    @if ($roles)
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Role') }} <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <select name="role_id" class="form-control select2" required >
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                     <small class="error role_id-error text-danger "></small>
                                </div>
                            </div>
                        </div>
                    @endif
    
                    @if ($companies)
                      <div class="row">
                          <label class="col-sm-2 col-form-label">{{ __('Company') }}</label>
                          <div class="col-sm-10">
                              <div class="form-group">
                                  <select name="company_id" class="form-control select2" >
                                      <option value="">Select Company</option>
                                      @foreach ($companies as $company)
                                          <option value="{{$company->id}}">{{$company->name}}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>
                    @endif
    
    
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
                    <img src="{{asset('no-image-found.jpeg')}}" class="preview-image card" alt="" class="card" style="max-width: 250px; max-height:250px" srcset="">

                  </div>

                </div>



              </div>
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary  save-btn">{{ __('Save') }} <span class="ph3-loading-button"><i class="fa fa-spinner fa-spin"></i></span></button>
                <a class="btn btn-success create-btn" style="display: none" href="">Create New</a>
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


    $("#createUserForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: "{{route('user.store')}}",
            data:new FormData(this),
            processData: false,
            contentType: false,
            type: 'POST',
            beforeSend: function() {
									$("#createUserForm").find(".ph3-loading-button").show();
						},
            success:function(response){
              $("#createUserForm").find(".ph3-loading-button").hide();
                // console.log(response);
                Toast.fire({
                    type: 'success',
                    title: response.message
                })

                $("#createUserForm").find(".alert").removeClass("alert-danger");
								$("#createUserForm").find(".alert").addClass("alert-success");
								$("#createUserForm").find(".alert-message").html(response.message);
                $("#createUserForm").find(".error").html("");

                $('.save-btn').hide();
                $('.create-btn').show();

            },
            error:function(xhr, status, error){
            
              $("#createUserForm").find(".ph3-loading-button").hide();

                $('.save-btn').show();
                $('.create-btn').hide();



              var	responseText = jQuery.parseJSON(xhr.responseText);

								Toast.fire({
									type: 'error',
									title: responseText.message
								})
                
								$("#createUserForm").find(".alert").removeClass("alert-success");
								$("#createUserForm").find(".alert").addClass("alert-danger");
								$("#createUserForm").find(".alert-message").html(responseText.message);

								$.each(responseText.errors, function (key, val) {
									$("." + key + "-error").text(val[0]);
								});



            }
        })
          
    })


});
</script>
    
@endpush