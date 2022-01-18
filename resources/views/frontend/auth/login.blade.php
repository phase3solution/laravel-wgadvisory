
@extends('frontend.auth.auth_master')


@section('authContent')
	<div class="form-wrap">
	    <div class="inner">
	        <div class="title"><span><img src="{{asset('login/media/user.png')}}"></span> Sign In</div>

    		<div class="alert" style="display: none">
    			<p><strong class="alert-message"></strong></p>
    			<button class="alert-btn">&#10006;</button>
    		</div>
    
    
    
    		<form class="form" method="POST" id="signinForm" >
    			@csrf
    			<div class="form-field">
    			    <label for="email">EMAIL</label>
    				<input id="email" class="form-control" required type="email" name="email" placeholder="Email">
    				<small class="error email-error"></small>
    			</div>
    			<div class="form-field">
    			    <label for="password">PASSWORD</label>
    				<input id="password" class="form-control" required  name="password" type="password" placeholder="Password">
    				<small class="error password-error"></small>
    			</div>
    			<div class="form-field col-2">
    				<label for="remenberMe">
    					<input type="checkbox" name="remember_me" value="" id="remenberMe" placeholder="Password"> <span>Remember me</span>
    				</label>
    				<a href="{{route('forgetPasswordPage')}}">Forgot your password?</a>
    			</div>
    			<div class="form-field">
    				<div class="captcha">
    					{!! NoCaptcha::renderJs() !!}
    					{!! NoCaptcha::display() !!}
    				</div>
    				<small id="checkme" class="error"></small>
    			</div>
    			<div class="form-field">
    				<button type="submit" class="btn btn-login">Sign In</button>
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

				$("#signinForm").validate({ // initialize the plugin
						rules: {
							email: {
								required: true,
								email: true
							},
							password: {
								required: true,
							}
						},
						success: function(label) {
							// label.addClass("valid").text("Ok!")
						},

						submitHandler: function(form) {
							// do other things for a valid form

							$.ajax({
								type:"POST",
								url: "{{route('signinCheck')}}",
								data: $("#signinForm").serialize(),
								success:function(response){

									Toast.fire({
										type: 'success',
										title: response.message
									})

									$(".alert").removeClass("danger");
									$(".alert").addClass("success");
									$(".alert-message").html(response.message);
									$(".alert").show();

									setTimeout(function(){
										window.location.href = "{{route('dashboard')}}";

									},200)


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

										if(key == 'g-recaptcha-response'){
											$("#checkme").text(val[0]);
											$("#checkme").show();
										}else{
											$("#checkme").hide();
										}

										grecaptcha.reset();

									});

									
								}

							})

						}

					});

				
			})
		</script>
	@endsection

