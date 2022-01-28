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

    <title>Sign in</title>
    <link rel="stylesheet" href="{{asset('login/css/style.css')}}">
    <link href="{{ asset('backend') }}/css/loader.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

    @auth

        <script type="text/javascript">location.href = "{{route('home')}}"</script>
      
    @endauth

    <div class="login-wrapper">
        <div class="login-section">
            <div class="item bg-logo-section">
                <div class="login-logo">
                    <img src="{{asset('login/media/encaselogo.png')}}" alt="encaselogo">    
                </div>
            </div>
            <div class="item content-wrap">

                @yield('authContent')


                {{-- <div id="ph3-loader" style="display: none">
                    <div class="loading">Loading&#8230;</div>
                </div> --}}

            </div>
        </div>
        
    </div>

   

    <div class="modal fade in" id="myModal" style="">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-inverse">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Terms of Use</h4>
                </div>
                <div class="modal-body"><iframe width="100%" height="600" src="{{asset('frontend/assets/media')}}/pdf/Portal_Privacy_Policy_2020.pdf"></iframe></div>
               
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>




    <!--   Core JS Files   -->
	<script src="{{ asset('material') }}/js/core/jquery.min.js"></script>

	<!--  Plugin for Sweet Alert -->
	<script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
	<script> const Toast = Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false,timer: 3000, }); </script>

	<!-- Forms Validations Plugin -->
	<script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>
    {{-- Page Loader --}}
    {{-- <script src="{{asset('backend/js/loader.js')}}"></script> --}}

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

    <script>


        $(document).on('click', '#myModalBtn', function(){
            $("#myModal").show();
        })

        $(document).on('click', '.close', function(){
            $("#myModal").hide();
        })

        // $(window).on('click', function(){
        //     $("#myModal").hide();
        // })


    </script>

    @yield('authScript')


</body>
</html>