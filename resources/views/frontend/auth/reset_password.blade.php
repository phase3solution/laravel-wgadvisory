
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
		{{-- <div class="item right">
			<div class="login-form">

                <form class="form" method="POST" id="resetPasswordForm" >
                    @csrf

                    <h3 class="title">
						<i class="fa fa-lg fa-fw fa-user"></i>Reset Password
					</h3>
					
					<div class="inner-wrap">

							<div class="form-group">
								<label>New Password <span class="text-danger">*</span> </label>
								<input class="form-control" required type="password" name="password" placeholder="*******">
								<label class="password-error error"></label>

							</div>

							<div class="form-group">
								<label>Confirm Password <span class="text-danger">*</span> </label>
								<input class="form-control" required type="password" name="password_confirmation" placeholder="*******">
								<label class="password_confirmation-error error"></label>
							</div>



						<label id="checkme"> <a href="{{route('signin')}}">Signin ?</a> </label>
					
						<button type="submit" id="kt_login_signup_submit" class="btn btn-primary font-weight-bold btn-block">Submit</button>
						<p>By accessing this portal, you are agreeing to these <a href="#">Terms of Use</a>.</p>
					</div>
					<div class="footer-logo">
						<img src="{{asset('frontend')}}/assets/img/loginLogo.png" alt="">
					</div>
				</form>


			</div>
		</div> --}}
	

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
							success:function(response){

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
