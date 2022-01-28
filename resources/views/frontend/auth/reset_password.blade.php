
@extends('frontend.auth.auth_master')

@section('authContent')

<div class="form-wrap">
    <div class="inner">
        <div class="title">Reset Password</div>

        <div class="alert" style="display: none">
            <p><strong class="alert-message"></strong></p>
            <button class="alert-btn">&#10006;</button>
        </div>
    
    
    
        <form class="form" method="POST" id="resetPasswordForm" >
            @csrf
            <div class="form-field">
                <input class="form-control" required type="password" name="password" placeholder="Password">
    
                <small class="error password-error"></small>
            </div>
            <div class="form-field">
                <input class="form-control" required type="password" name="password_confirmation" placeholder="Confirm Password">
                <small class="error password_confirmation-error"></small>
            </div>
    
            <div class="form-field">
    
                <a href="{{route('signin')}}">Sign in?</a>
            </div>
      
            <div class="form-field">
                <button type="submit" class="btn btn-login">Submit <span class="ph3-loading-button"><i class="fa fa-spinner fa-spin"></i></span></button>
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

			$("#resetPasswordForm").validate({ // initialize the plugin
					rules: {
						password: {
							required: true,
                            minlength: 8,
                            maxlength: 20,
						},

                        password_confirmation: {
							required: true,
                            minlength: 8,
                            maxlength: 20,
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
							url: "{{route('passwordReset')}}",
							data: $('#resetPasswordForm').serialize(),
							beforeSend: function() {
								$("#resetPasswordForm").find(".ph3-loading-button").show();
							},
							success:function(response){
								$("#resetPasswordForm").find(".ph3-loading-button").hide();

								if(response.status == true){

									Toast.fire({
										type: 'success',
										title: response.message
									})

                                    setTimeout(function(){
										window.location.href = "{{route('signin')}}";
									},200)

                                    $(".alert").removeClass("danger");
									$(".alert").addClass("success");
									$(".alert-message").html(response.message);
									$(".alert").show();


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
								$("#resetPasswordForm").find(".ph3-loading-button").hide();
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
