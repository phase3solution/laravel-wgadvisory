@extends('frontend.auth.auth_master')
@section('authContent')
<div class="form-wrap">
	<div class="inner">
	    <div class="title">Forget Password</div>

    	<div class="alert" style="display: none">
    		<p><strong class="alert-message"></strong></p>
    		<button class="alert-btn">&#10006;</button>
    	</div>
    
    
    
    	<form class="form" method="POST" id="foregtPasswordForm" >
    		@csrf
    		<div class="form-field">
    		    <label for="email">EMAIL</label>
    			<input class="form-control" required type="email" name="email" placeholder="Email">
    			<small class="error email-error"></small>
    		</div>
    
    		<div class="form-field">
    			<a href="{{route('signin')}}">Sign in?</a>
    		</div>
    
    		<div class="form-field ">
    			<button type="submit" class="btn btn-login">Submit</button>
    		</div>
    	</form>
    	<div class="terms">
    		By accessing this portal, you are agreeing to these <a href="#">Terms of Use</a>.
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

			$("#foregtPasswordForm").validate({ // initialize the plugin
					rules: {
						email: {
							required: true,
							email: true,
                            minlength: 7,
                            maxlength: 190,
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
							url: "{{route('passwordForget')}}",
							data: $('#foregtPasswordForm').serialize(),
							success:function(response){

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
										window.location.href = "{{route('checkOtp')}}";

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
