<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!--begin::Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <!--end::Fonts-->

    <title>Login</title>
    <link rel="stylesheet" href="{{asset('login/css/style.css')}}">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-section">
            <div class="item bg-logo-section">
                <div class="login-logo">
                    <img src="{{asset('login/media/encaselogo.png')}}" alt="encaselogo">    
                </div>
            </div>
            <div class="item content-wrap">

                @yield('authContent')

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
            $(".alert-btn").on('click', function(){
                $(".alert").hide();
            })
        })

    </script>

    @yield('authScript')


</body>
</html>