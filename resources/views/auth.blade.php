<!doctype html>
<html lang="en">

<head>
	<!-- // Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Required meta tags // -->

    <meta name="description" content="Login and Register Form HTML Template - developed by 'ceosdesigns' - sold exclusively on 'themeforest.net'">
	<meta name="author" content="ceosdesigns.sk">

    <title> @yield('title') - {{ env('APP_NAME') }}</title>

	<!-- // Favicon -->
	<link href="images/favicon.png" rel="icon">
	<!-- Favicon // -->

	<!-- // Google Web Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;display=swap" rel="stylesheet">
	<!-- Google Web Fonts // -->

	<!-- // Font Awesome 5 Free -->
	<link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous" rel="stylesheet">
	<!-- Font Awesome 5 Free // -->

    <!-- // Template CSS files -->
	<link href="{{asset('auth_tem/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('auth_tem/css/styles.css')}}?version={{ \Str::random(34) }}" rel="stylesheet">
    @livewireStyles
	<!-- Template CSS files  // -->
    @yield('css')
    <style>
        form{
            box-shadow: 1px 3px 11px 3px gray;
    padding: 24px;
    border-radius: 1px;

        }
        @media(max-width:768px){
            form{
            box-shadow: 1px 3px 11px 3px gray;
    padding: 4px;
    border-radius: 1px;

        }
        }
    </style>
</head>
<body>
	<!-- // Preloader -->

	<!-- Preloader // -->

	<main id="page-content" class="d-flex nm-aic nm-vh-md-100">

		<!-- // Form side -->
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-6 offset-xl-3 nm-st nm-st-md">
					@yield('body')
				</div>
			</div>
		</div>
		<!-- Form Side // -->

		<!-- // Non-form side -->

		<!-- Non-form Side // -->
	</main>

	<!-- // Vendor JS files -->
	<script src="{{asset('auth_tem/js/jquery-3.6.0.min.js')}}"></script>
	<script src="{{asset('auth_tem/js/bootstrap.bundle.min.js')}}"></script>
	<!-- Vendor JS files // -->

	<!-- Template JS files // -->
	<script src="{{asset('auth_tem/js/script.js')}}"></script>
	<!-- Template JS files // -->

@yield('js')
@livewireScripts
</body>

</html>
