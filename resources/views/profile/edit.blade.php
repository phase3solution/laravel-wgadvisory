@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          {{-- action="{{ route('profile.update') }}" --}}
          <form method="post" id="profileUpdateForm"  autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Profile') }}</h4>
                <p class="card-category">{{ __('User information') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                     
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />

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
                @if (session('status_password'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status_password') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Current Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required />
                      @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
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

    // $("#signinForm").validate({ // initialize the plugin
		// 			rules: {
		// 				email: {
		// 					required: true,
		// 					email: true
		// 				},
		// 				name: {
		// 					required: true,
		// 					minlength: 3
		// 				}
		// 			},

		// 			messages: {
		// 				password: {
		// 				minlength: jQuery.validator.format("Weak password!")
		// 				}
		// 			},
		// 			success: function(label) {
		// 				// label.addClass("valid").text("Ok!")
		// 			},

		// 			submitHandler: function(form) {
		// 				// do other things for a valid form

		// 			  var formData = form.serialize();

    //         $.ajax({
    //           type:"post",
    //           url:"{{route('profile.update')}}",
    //           data: formData,
    //           success:function(response){

    //             if(response.status){
    //               Toast.fire({
    //                   type: 'success',
    //                   title: response.message
    //               })
    //             }

    //           },
    //           error:function(err){

    //             Toast.fire({
    //                 type: 'error',
    //                 title: "Server Error !"
    //             })

    //           }
    //         })

		// 			}

		// });

      

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
              }

            },
            error:function(err){

              Toast.fire({
                  type: 'error',
                  title: "Server Error !"
              })

            }
          })

      })

      $("#passwordUpdateForm").on('submit', function(e){
        e.preventDefault();
        var newPassword = $("#input-password").val();
        var confirmPassword = $("#input-password-confirmation").val();

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
              }else{
                Toast.fire({
                    type: 'error',
                    title: response.message
                })

              }

            },
            error:function(err){
              Toast.fire({
                  type: 'error',
                  title: "Server Error !"
              })
            }
          })


        }else{

          Toast.fire({
              type: 'error',
              title: "New and confirm password does not match !"
          })

        }

          


      })
   
  })
</script>
    
@endpush


