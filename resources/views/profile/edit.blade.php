@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" id="profileUpdateForm"  autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Profile') }}</h4>
                <p class="card-category">{{ __('User information') }}</p>
              </div>
              <div class="card-body ">
                
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert ">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span class="alert-message"></span>
                      </div>
                    </div>
                  </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                      <small class="error name-error text-danger "></small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control " name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />
                      <small class="error email-error text-danger "></small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-success">{{ __('Update Profile') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12">
          {{-- action="{{ route('update.password') }}" --}}
          <form method="post" id="passwordUpdateForm"  class="form-horizontal">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Change password') }}</h4>
                <p class="card-category">{{ __('Password') }}</p>
              </div>

              <div class="card-body ">

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span class="alert-message"></span>
                      </div>
                    </div>
                  </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Current Password') }} <br> 
                    <a href="{{route('forgetPasswordPage')}}" target="_blank" class="text-sm font-weight-bold">Forgot password ?</a>
                  </label>

                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required />
                      <small class="error old_password-error text-danger "></small>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                      <small class="error password-error text-danger "></small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
                      <small class="error password_confirmation-error text-danger "></small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-success">{{ __('Change password') }}</button>
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
  $(document).ready(function(){


      $("#profileUpdateForm").on('submit', function(e){
        e.preventDefault();

          var formData = $(this).serialize();

          $.ajax({
            type:"post",
            url:"{{route('profile.update')}}",
            data: formData,
            success:function(response){

              if(response.status){
                Toast.fire({
                    type: 'success',
                    title: response.message
                })

                $("#profileUpdateForm").find(".alert").removeClass("alert-danger");
								$("#profileUpdateForm").find(".alert").addClass("alert-success");
								$("#profileUpdateForm").find(".alert-message").html(response.message);
                $("#profileUpdateForm").find(".error").html("");


              }

            },
            error:function(xhr, status, error){
								
                var	responseText = jQuery.parseJSON(xhr.responseText);

								Toast.fire({
									type: 'error',
									title: responseText.message
								})
                
								$("#profileUpdateForm").find(".alert").removeClass("alert-success");
								$("#profileUpdateForm").find(".alert").addClass("alert-danger");
								$("#profileUpdateForm").find(".alert-message").html(responseText.message);

								$.each(responseText.errors, function (key, val) {
									$("." + key + "-error").text(val[0]);
								});
									
						}
          })

      })

      $("#passwordUpdateForm").on('submit', function(e){
        e.preventDefault();
        var newPassword = $("#input-password").val();
        var confirmPassword = $("#input-password-confirmation").val();
        $("#passwordUpdateForm").find(".error").html("");
        
        if(newPassword == confirmPassword){

          var formData = $(this).serialize();
          $.ajax({
            type:"post",
            url:"{{route('update.password')}}",
            data: formData,
            success:function(response){

              if(response.status){
                Toast.fire({
                    type: 'success',
                    title: response.message
                })

                $("#passwordUpdateForm").find(".alert").removeClass("alert-danger");
								$("#passwordUpdateForm").find(".alert").addClass("alert-success");
								$("#passwordUpdateForm").find(".alert-message").html(response.message);
                $("#passwordUpdateForm").find(".error").html("");

              }else{
                Toast.fire({
                    type: 'error',
                    title: response.message
                })

                $("#passwordUpdateForm").find(".alert").removeClass("alert-success");
								$("#passwordUpdateForm").find(".alert").addClass("alert-danger");
								$("#passwordUpdateForm").find(".alert-message").html(response.message);

              }

            },
            error:function(xhr, status, error){
								
                var	responseText = jQuery.parseJSON(xhr.responseText);

								Toast.fire({
									type: 'error',
									title: responseText.message
								})
                
								$("#passwordUpdateForm").find(".alert").removeClass("alert-success");
								$("#passwordUpdateForm").find(".alert").addClass("alert-danger");
								$("#passwordUpdateForm").find(".alert-message").html(responseText.message);

								$.each(responseText.errors, function (key, val) {
									$("." + key + "-error").text(val[0]);
								});
									
						}
          })


        }else{

          Toast.fire({
              type: 'error',
              title: "New and confirm password does not match !"
          })

          $("#passwordUpdateForm").find(".alert").removeClass("alert-success");
					$("#passwordUpdateForm").find(".alert").addClass("alert-danger");
					$("#passwordUpdateForm").find(".alert-message").html("New and confirm password does not match !");

        }

          


      })
   
  })
</script>
    
@endpush


