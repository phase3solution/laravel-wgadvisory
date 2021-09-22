<!DOCTYPE html>
<html lang="en">
    <head>

				<meta charset="utf-8" />
				<title>MAIN DASHBOARD | WGAdvisory Portal</title>
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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


		
		
	</head>
<body>

	<div class="login-wrap">
		<div class="item left">
			<img class="logo-thum" src="{{asset('frontend')}}/assets/img/encaselogo.png" alt="">
		</div>
		<div class="item right">
			<div class="login-form">
                <form class="form" method="POST" action="{{ route('signinCheck') }}">
                    @csrf					
                    <h3 class="title">
						<i class="fa fa-lg fa-fw fa-user"></i>SIGN IN
					</h3>
					
					<div class="inner-wrap">

						@if (Session::get('signFailed'))
							<label style="background-color: red" class="btn btn-danger text-light btn-block">{{Session::get('signFailed')}}</label>
						@endif

						<div class="form-group">
							<label>Email</label>
							<input class="form-control" type="email" name="email" placeholder="Email">
						</div>
                        @if ($errors->has('email'))
                            <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                            <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
						<div class="form-group">
							<label>Password</label>
							<input class="form-control" name="password" type="password" placeholder="Password">
						</div>
                        @if ($errors->has('password'))
                        <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                          <strong>{{ $errors->first('password') }}</strong>
                        </div>
                      @endif
						<div class="form-group fv-plugins-icon-container has-success">
							<label class="checkbox mb-0">
							<input type="checkbox" class="is-valid">
							<span></span> &nbsp;&nbsp;<div class="text-normal">Stay Signed in</div>
						</div>
						<button type="submit" id="kt_login_signup_submit" class="btn btn-primary font-weight-bold btn-block">Sign in</button>
						<p>By accessing this portal, you are agreeing to these <a href="#">Terms of Use</a>.</p>
					</div>
					<div class="footer-logo">
						<img src="{{asset('frontend')}}/assets/img/loginLogo.png" alt="">
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>