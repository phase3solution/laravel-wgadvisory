@extends('frontend.master')

@section('content')

@php
     $userRoleCheck = \App\Models\UserRole::where('user_id', Auth::id())->first();
@endphp

@if ($userRoleCheck->role_id == 3 )
 @include('frontend.layouts.sidebar_user')
@else 
 @include('frontend.layouts.sidebar_admin')
@endif

   

    <!--begin::Wrapper-->
    <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
        {{-- @include('frontend.layouts.header_user') --}}

        <!--begin::Header-->
        <div id="kt_header" class="header header-fixed">
            <!--begin::Container-->
            <div class="container-fluid d-flex align-items-stretch justify-content-between">
                <!--begin::Page Title-->
                <div class="d-flex align-items-center flex-wrap mr-2">

                    @php
                        $userCheck = \App\Models\UserCompany::with('company')
                            ->where('user_id', Auth::id())
                            ->first();
                        
                        if (Session::get('old_user')) {
                            $userRole = \App\Models\UserRole::where('user_id', Session::get('old_user'))->first();
                        }
                        
                    @endphp

                    <!--begin::Page Title-->
                        <h2 class="text-dark mt-2 mb-2 mr-5 text-weight">User profile</h2>
                    <!--end::Page Title-->


                </div>
                <!--end::Page Title-->
                <!--begin::Topbar-->
                <div class="topbar">
                    <div class="topbar-item">
                        {{-- {{Session::get('old_user')}} --}}
                   
                            @if ($userRoleCheck->role_id != 3)
                            <a href="javascript:;" class="btn btn-primary btn-fixed-height font-weight-bold px-2 px-lg-5 mr-2" id="kt_quick_panel_toggle" data-toggle="tooltip" data-placement="right">
                                <span class="svg-icon svg-icon-lg">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="d-none d-md-inline btn-lg mr-1">Switch User</span>
                            </a>
                            @endif
                     

                        {{-- <a href="#" class="btn btn-fixed-height btn-primary font-weight-bold px-2 px-lg-5 mr-2"> <span class="flaticon-support fa-lg mr-2"></span> <strong>Support</strong> </a> --}}

                        <!--begin::User-->
                        <div class="topbar-item">
                            <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                id="kt_quick_user_toggle">
                                <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                                <span
                                    class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->name }}</span>
                                <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                    <span class="symbol-label font-size-h5 font-weight-bold">


                                        @if (Auth::user()->image)
                                            <img src="{{ asset(Auth::user()->image) }}" height="24" width="24" alt="">
                                        @else

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <path
                                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                    <path
                                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>



                                        @endif

                                    </span>
                                </span>
                            </div>
                        </div>
                        <!--end::User-->
                    </div>
                </div>
                <!--end::Topbar-->
            </div>
            <!--end::Container-->
        </div>
        <!--edn::Header-->


   	<!--begin::Content-->
       <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						
        <div class="container-fluid">
            <div class="d-flex flex-row">
                <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                    <div class="card card-custom card-stretch">
                        <div class="card-body pt-4">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">

                                    @if (Auth::user()->image)
                                    <div class="symbol-label" style="background-image: url({{ asset(Auth::user()->image) }});"></div>
                                    @else
                                    <div class="symbol-label" style="background-image: url({{asset('frontend')}}/assets/media/admin.jpg);"></div>
                                    @endif

                                   
                                    <i class="symbol-badge bg-success"></i>
                                </div>
                                <div>
                                    <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{Auth::user()->name}}</a>
                                    @if (isset($userCheck->company->name))
                                    <div class="text-muted">{{$userCheck->company->name}}</div>
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="py-9">
                                <div class="d-flex align-items-center justify-content-between mb-2"><span class="font-weight-bold mr-2">Email:</span><span class="text-muted text-hover-primary"><a href="mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a></span></div>
                         
                            </div>
                            <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                                
                                <div class="navi-item mb-2">
                                    <a class="navi-link py-4 active" onclick="showDiv()" href="#" aria-current="page">
                                        <span class="navi-icon mr-2">
                                            <span class="svg-icon">
                                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    
                                                    <g id="Stockholm-icons-/-General-/-User" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" id="Mask" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" id="Mask-Copy" fill="#000000" fill-rule="nonzero"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="navi-text font-size-lg"  >Personal Information</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-row-fluid ml-2 personalInformationDiv">
                    <div class="card card-custom card-stretch">

                        {{-- action="{{url('/user/profile-update')}}"  --}}
                        {{-- id="profileForm" --}}

                        <form method="POST" id="profileForm"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{Auth::id()}}">
                            <div class="card-header py-3">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="align-items-start flex-column">
                                            <h3 class="card-label font-weight-bolder text-dark mb-0">Personal Information</h3>
                                            <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="card-toolbar">
                                            <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                                            {{-- <button type="button" class="btn btn-secondary" onclick="hideDiv()">Cancel</button> --}}
                                    
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                      <div class="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span class="text-light" ><i  style="color:#FFF" class="fa fa-times"></i> </span> 
                                        </button>
                                        <span class="alert-message"></span>
                                      </div>
                                    </div>
                                </div>
                         
                             
                            </div>

                            <div class="form">
                                <div class="card-body">


                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <h5 class="font-weight-bold mb-6">Customer Info</h5>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                        <div class="col-lg-9 col-xl-6">

                                           
                                            <div class="image-input image-input-outline" id="kt_profile_avatar">
                                    
                                                <div class="image-input-wrapper" >

                                                    @if (Auth::user()->image)
                                                    <img class="imagePreview" src="{{asset(Auth::user()->image)}}" alt="">
                                                    @else 
                                                    <img class="imagePreview" src="{{asset('frontend')}}/assets/media/admin.jpg" alt="">
                                                    @endif
                                                   
                                                  
                                                </div>

                                            </div>
                                            
                                            <span class="form-text text-muted mt-5">Allowed file types: png, jpg, jpeg.</span>
                                        </div>
                                    </div> 
                                    


                                
                                    <div class="row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Change Avatar</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="file" id="imgInput" name="image">
                                            <small class="error image-error text-danger "></small>
                                        </div>
                                    </div> 
                               

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="text" placeholder="Name" class="form-control form-control-lg form-control-solid " name="name" value="{{Auth::user()->name}}" required>
                                            <small class="error name-error text-danger "></small>
                                        </div>
                                    </div>
                            

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <input type="email" placeholder="Email" class="form-control form-control-lg form-control-solid" name="email" value="{{Auth::user()->email}}" required>
                                            </div>
                                            <small class="error email-error text-danger "></small>
                                        </div>
                                    </div>

                                    @if (isset($userCheck->company->name))
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Company Name</label>
                                        <div class="col-lg-9 col-xl-6"><input type="text" placeholder="Company name"  class="form-control form-control-lg form-control-solid" name="companyName" value="{{$userCheck->company->name}}" disabled></div>
                                    </div>
                                    @endif
                                
                                </div>
                            </div>
                        </form>

                        <form id="passwordUpdateForm" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{Auth::id()}}">
                  
                            <div class="form">
                                <div class="card-body">
                                    <div class="card-title align-items-start flex-column mb-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                            
                                                    <h3 class="card-label font-weight-bolder text-dark">Change Password</h3>
                                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account password</span>
                                            

                                            </div>

                                            <div class="col-md-6 text-right">
                                                <div class="card-toolbar">
                                                    <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                              <div class="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span class="text-light" ><i  style="color:#FFF" class="fa fa-times"></i> </span> 
                                                </button>
                                                <span class="alert-message"></span>
                                              </div>
                                            </div>
                                        </div>
                                        


                                    </div>
                                        


                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">Current Password</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="password" placeholder="Current Password" class="form-control form-control-lg form-control-solid mb-2 " name="old_password" value="" required>
                                                <small class="error old_password-error text-danger "></small>
                                                <a href="{{route('forgetPasswordPage')}}" target="_blank" class="text-sm font-weight-bold">Forgot password ?</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="password" placeholder="New Password" class="form-control form-control-lg form-control-solid password" name="password" value="" required>
                                                <small class="error password-error text-danger "></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">Confirm Password</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="password" placeholder="Confirm Password" class="form-control form-control-lg form-control-solid confirm_password" name="password_confirmation" value="" required>
                                                <small class="error password_confirmation-error text-danger "></small>
                                            </div>
                                        </div>
                                
                                </div>
    
                            </div>
                        </form>

                    </div>
                    
                </div>
            </div>
        </div>
        
        <!--end::Footer-->
        </div>
    <!--end::Content-->

    </div>
    <!--end::Wrapper-->










@endsection

@section('script')

<script>
   function hideDiv(){
    $('.personalInformationDiv').hide();
   }

   function showDiv(){
    $('.personalInformationDiv').show();
   }
</script>

<script>

    $(document).ready(function(){

        const Toast = Swal.mixin({toast: true, position: 'top-end', showConfirmButton: false,timer: 3000 });

        $("#profileForm").on('submit', function(e){
            e.preventDefault();
            $("#profileForm").find(".error").html("");
            var formData = $(this).serialize();
           
       

            $.ajax({
                    type: "POST",
                    url: "{{ url('/user/profile-update') }}",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status) {
                            Toast.fire({
                                type: 'success',
                                title: response.message
                            })
                            $("#profileForm").find(".alert").removeClass("alert-danger");
                            $("#profileForm").find(".alert").addClass("alert-success");
                            $("#profileForm").find(".alert-message").html(response.message);

                        } else {

                            Toast.fire({
                                type: 'error',
                                title: response.message
                            })

                            $("#profileForm").find(".alert").removeClass("alert-success");
                            $("#profileForm").find(".alert").addClass("alert-danger");
                            $("#profileForm").find(".alert-message").html(response.message);

                        }
                    },
                    error:function(xhr, status, error){
                                    
                            var	responseText = jQuery.parseJSON(xhr.responseText);
                
                            Toast.fire({
                                type: 'error',
                                title: responseText.message
                            })
            
                            $("#profileForm").find(".alert").removeClass("alert-success");
                            $("#profileForm").find(".alert").addClass("alert-danger");
                            $("#profileForm").find(".alert-message").html(responseText.message);

                            if(responseText.errors){
                                $.each(responseText.errors, function (key, val) {
                                    $("." + key + "-error").text(val[0]);
                                });
                            }  
                                                    
                                                        
                    }
            })


        })




        $("#passwordUpdateForm").on('submit', function(e){
            e.preventDefault();
            var newPassword = $(".password").val();
            var confirmPassword = $(".confirm_password").val();
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

                                  if(responseText.errors){
                                    $.each(responseText.errors, function (key, val) {
                                        $("." + key + "-error").text(val[0]);
                                    });
                                  }  
                                    
                                        
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

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.imagePreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgInput").change(function(){
        readURL(this);
    });
</script>
    
@endsection