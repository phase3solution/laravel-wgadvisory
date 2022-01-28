@extends('frontend.auth.auth_master')

@section('authContent')
    
    <div class="form-wrap">
        <div class="inner">
            <div class="title">Check OTP</div>

            <div class="alert" style="display: none">
                <p><strong class="alert-message"></strong></p>
                <button class="alert-btn">&#10006;</button>
            </div>
    
    
    
            <form class="form" method="POST" id="otpCheckForm" >
                @csrf
                <div class="form-field">
                    <small class="success">An otp sent to your email.</small>
                    <input class="form-control" required type="text" name="otp" placeholder="OTP">
                    <small class="error otp-error"></small>
                </div>
    
                <div class="form-field">
                    <a href="{{route('signin')}}">Sign in?</a>
                </div>
    
                <div class="form-field">
                    <button type="submit" class="btn btn-login">Submit OTP <span class="ph3-loading-button"><i class="fa fa-spinner fa-spin"></i></span></button>
                </div>
            </form>
            <div class="terms">
    			By accessing this portal, you are agreeing to these <a href="javascript:void(0)" id="myModalBtn" >Terms of Use</a>.
            </div>
        </div>
        
        <div class="form-footer">
            <div class="thum">
                <img src="{{asset('login/media/login-logo.png')}}" alt="encaselogo">
            </div>
        </div>
    </div>



@endsection


@section('authScript')
    
	<script>
		$(document).ready(function(){

			$("#otpCheckForm").validate({ // initialize the plugin
					rules: {
						otp: {
							required: true,
                            minlength: 6,
                            maxlength: 6,
						},
					
					},

					
					success: function(label) {
						// label.addClass("valid").text("Ok!")
					},

					submitHandler: function(form, event) {
						// do other things for a valid form
						event.preventDefault();

						$.ajax({
							type:"POST",
							url: "{{route('otpCheck')}}",
							data: $('#otpCheckForm').serialize(),
							beforeSend: function() {
								$("#otpCheckForm").find(".ph3-loading-button").show();
							},
							success:function(response){
								$("#otpCheckForm").find(".ph3-loading-button").hide();
								if(response.status == true){

									$(".alert").removeClass("danger");
									$(".alert").addClass("success");
									$(".alert-message").html(response.message);
									$(".alert").show();

									Toast.fire({
										type: 'success',
										title: response.message
									})

                                    setTimeout(function(){
										window.location.href = "{{route('resetPassword')}}";
									},200)




								}else{

									Toast.fire({
										type: 'error',
										title: response.message
									})

                                    $(".alert").removeClass("success");
									$(".alert").addClass("danger");
									$(".alert-message").html(response.message);
									$(".alert").show();

								}

								

							},
							error:function(xhr, status, error){
								$("#otpCheckForm").find(".ph3-loading-button").hide();
								var	responseText = jQuery.parseJSON(xhr.responseText);
								Toast.fire({
									type: 'error',
									title: responseText.message
								})

								    $(".alert").removeClass("success");
									$(".alert").addClass("danger");
									$(".alert-message").html(responseText.message);
									$(".alert").show();

								$.each(responseText.errors, function (key, val) {
									$("#" + key + "-error").text(val[0]);

								});

								
							}

						})

					}

				});

			
		})
	</script>
@endsection

