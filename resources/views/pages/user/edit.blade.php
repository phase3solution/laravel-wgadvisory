@extends('layouts.app', ['activePage' => 'user', 'titlePage' => __('User Management')])
@php
  $userCheck = \App\Models\UserRole::where('user_id',Auth::id() )->first();
@endphp
@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-md-12">

          {{-- action="{{ route('user.update', $user->id) }}" --}}
          <form method="post" id="userUpdateForm" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')
            <input type="hidden" class="update-id" name="id" value="{{$user->id}}">
            
            <div class="card ">
              <div class="card-header card-header-primary">

                <div class="row align-items-center">
                  <div class="col-md-6">
                    <h4 class="card-title">{{ __('Edit User') }}</h4>
                    <p class="card-category">{{ __('User information') }}</p>
                  </div>
                  <div class="col-md-6 text-right">
                    <a class="btn btn-info btn-sm" rel="tooltip" title="View List" href="{{route('user.index')}}"><i class="fa fa-list"></i></a>
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
                          <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{$user->name}}" required="true" aria-required="true"/>
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Email') }} <span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                        <div class="form-group">
                            <input class="form-control" name="email" id="input-name" type="email" placeholder="{{ __('Email') }}" value="{{$user->email}}" required="true" aria-required="true"/>
    
                        </div>
                      </div>
                    </div>
    

                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Status') }} <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                          <div class="form-group">
                            <input type="radio" name="status" value="1" @if ($user->status == 1) checked @endif id="active-status" required>
                            <label for="active-status">Active</label>

                            <input type="radio" name="status" value="0" @if ($user->status == 0) checked @endif id="inactive-status">
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
                                            <option value="{{$role->id}}" @if ($userCheck->role_id != 1 && $role->id ==1) style="display:none" @endif  
                                              @if ($user->userRole) 
                                                @if ($user->userRole->role_id == $role->id)
                                                    selected
                                                @endif
                                              @endif  >{{$role->name}}</option>
                                        @endforeach
                                    </select>
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
                                          <option value="{{$company->id}}" @if ($user->userCompany) 
                                            @if ($user->userCompany->company_id == $company->id)
                                                selected
                                            @endif
                                          @endif  >{{$company->name}}</option>
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
                        </div>
                    </div>

                  </div>

                  <div class="col-sm-3">
                    <label class="col-form-label">Preview Image</label> <br>

                    @if ($user->image)
                      <img src="{{asset($user->image)}}" class="preview-image card" alt="" class="card" style="max-width: 250px; max-height:250px" srcset="">
                    @else 
                      <img src="{{asset('no-image-found.jpeg')}}" class="preview-image card" alt="" class="card" style="max-width: 250px; max-height:250px" srcset="">
                    @endif

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




      <div class="row">
        <div class="col-md-12">

          {{-- action="{{ route('update.password') }}" --}}

          <form method="post" id="updatePasswordForm"  class="form-horizontal">
            @csrf

            <input type="hidden" class="update-password-id" name="id" value="{{$user->id}}">

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Change password') }}</h4>
                <p class="card-category">{{ __('Password') }}</p>
              </div>
              <div class="card-body ">


                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="confirm_password" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
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

    $("#userUpdateForm").on('submit', function(e){
        e.preventDefault();

        var id = $(this).find('.update-id').val();


        $.ajax({
            url: "{{url('user')}}/"+id,
            data:new FormData(this),
            processData: false,
            contentType: false,
            type: 'POST',
            success:function(response){
                console.log(response);
                Toast.fire({
                    type: 'success',
                    title: response.message
                })

                $('.alert-success').show();
                $('.alert-message').html(response.message);
           

            },
            error:function(error){
                console.log(error);
            
                Toast.fire({
                    type: 'error',
                    title: 'Server error!'
                })

                $('.alert-success').hide();
             
            }
        })
          
    })

    $("#updatePasswordForm").on('submit', function(e){
        e.preventDefault();

        var password = $("#input-password").val();
        var cpassword = $("#input-password-confirmation").val();


        if(password == cpassword){

          $.ajax({
            url: "{{ route('change.password')}}",
            data:new FormData(this),
            processData: false,
            contentType: false,
            type: 'POST',
            success:function(response){
                console.log(response);
                Toast.fire({
                    type: 'success',
                    title: response.message
                })

             setTimeout(function(){

              location.reload();

             },3000)
           

            },
            error:function(error){
                console.log(error);
            
                Toast.fire({
                    type: 'error',
                    title: 'Server error!'
                })

             
            }
        })

        }else{

          Toast.fire({
                    type: 'error',
                    title: 'Password and confirm password does not match!'
                })

        }

       
          
    })

});
</script>
    
@endpush