<!DOCTYPE html>
<html lang="en">
    <head>

				<meta charset="utf-8" />
				<title>MAIN DASHBOARD | WGAdvisory Portal</title>
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
				<meta name="csrf-token" content="{{ csrf_token() }}">


				<!--begin::Fonts-->
				<link rel="preconnect" href="https://fonts.gstatic.com">
				<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700&display=swap" rel="stylesheet">

				<link rel="preconnect" href="https://fonts.gstatic.com">
				<link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
				<!--end::Fonts-->
				<!--begin::Page Vendors Styles(used by this page)-->
				<link href="{{asset('frontend')}}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
				<!--end::Page Vendors Styles-->
				<!--begin::Global Theme Styles(used by all pages)-->
				<link href="{{asset('frontend')}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
				<link href="{{asset('frontend')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
				<link href="{{asset('frontend')}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
				<!--end::Global Theme Styles-->
				<!--begin::Layout Themes(used by all pages)-->
				<link href="{{asset('frontend')}}/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
				<link href="{{asset('frontend')}}/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
				<link href="{{asset('frontend')}}/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
				<link href="{{asset('frontend')}}/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />

				<!--end::Layout Themes-->
				<link rel="shortcut icon" href="{{asset('frontend')}}/assets/media/logos/favicon.png" />
				<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/jquery.mCustomScrollbar.css">
				<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/custom.css">
				<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/new-custom.css">


				<style>
						form .error {
							color: #ff0000 !important;
						}

						form .valid {
							color: green !important;
						}

						.login-wrap .item.right .login-form {
							position: absolute;
							top: 0;
							bottom: 0;
							left: 50px;
							margin: auto;
							background: #fff;
							height: 800px;
							width: 360px;
							border-radius: 5px;
							box-shadow: 0px 29px 147.5px 102.5px rgb(0 0 0 / 6%), 0px 29px 95px 0px rgb(0 0 0 / 36%);
						}
				</style>
		
		
	</head>
<body>

	<div class="login-wrap">
		<div class="item left">
			<img class="logo-thum" src="{{asset('frontend')}}/assets/img/encaselogo.png" alt="">
		</div>
		<div class="item right">
			<div class="login-form">

				{{-- action="{{ route('signinCheck') }}" --}}
                <form class="form" method="POST" id="foregtPasswordForm" >
                    @csrf

                    <h3 class="title">
						<i class="fa fa-lg fa-fw fa-user"></i>Forget Password
					</h3>
					
					<div class="inner-wrap">


						<div class="form-group">
							<label>Email <span class="text-danger">*</span> </label>
							<input class="form-control" required type="email" name="email" placeholder="Email">
						</div>

						<div style="display: none" class="otpValidation">
							<label class="text-danger otp-message">An otp sent to your email.</label>
							<div class="form-group">
								<label>OTP <span class="text-danger">*</span> </label>
								<input class="form-control" required type="text" name="otp" placeholder="OTP">
								<span class="otp-error error"></span>
							</div>

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

						</div>

               
						
					

						<div class="form-group">

							{!! NoCaptcha::renderJs() !!}
							{!! NoCaptcha::display() !!}
							
						</div>

						<label id="checkme" class="error"></label>
					
						<button type="submit" id="kt_login_signup_submit" class="btn btn-primary font-weight-bold btn-block">Submit</button>
						<p>By accessing this portal, you are agreeing to these <a href="#">Terms of Use</a>.</p>
					</div>
					<div class="footer-logo">
						<img src="{{asset('frontend')}}/assets/img/loginLogo.png" alt="">
					</div>
				</form>


			</div>
		</div>
	</div>


	<!--   Core JS Files   -->
	<script src="{{ asset('material') }}/js/core/jquery.min.js"></script>

	<!--  Plugin for Sweet Alert -->
	<script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
	<script> const Toast = Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false,timer: 3000, }); </script>

	<!-- Forms Validations Plugin -->
	<script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>


	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>

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
								grecaptcha.reset();

								if(response.status == true){

									$(".otp-message").html(response.messageShow);
									$(".otpValidation").show();


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

								if(response.passwordReset){

									setTimeout(function(){
										window.location.href = "{{route('signin')}}";
									},200)

								}
								

								// setTimeout(function(){
								// 	window.location.href = "{{route('dashboard')}}";

								// },200)


							},
							error:function(xhr, status, error){
								grecaptcha.reset();
								var	responseText = jQuery.parseJSON(xhr.responseText);

								Toast.fire({
									type: 'error',
									title: responseText.message
								})

								$(".otp-error").html(responseText.otpMessage);
								$("#email-error").html(responseText.messageShow);

								$.each(responseText.errors, function (key, val) {
									$("#" + key + "-error").text(val[0]);

									if(key == 'g-recaptcha-response'){
										$("#checkme").text(val[0]);
										$("#checkme").show();
									}else{
										$("#checkme").hide();
									}
								});

								
							}

						})

					}

				});

			
		})
	</script>


</body>
</html>