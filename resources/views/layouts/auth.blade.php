<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Jobick : Job Admin Bootstrap 5 Template">
	<meta property="og:title" content="Jobick : Job Admin Bootstrap 5 Template">
	<meta property="og:description" content="Jobick : Job Admin Bootstrap 5 Template">
	<meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>@yield('title', 'Page title') - {{ config('app.name') }}</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ url('images/favicon.png') }}">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                @yield('content')
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ url('vendor/global/global.min.js')}} "></script>
    <script src="{{ url('js/custom.min.js')}} "></script>
    <script src="{{ url('js/dlabnav-init.js')}} "></script>
	<script src="{{ url('js/styleSwitcher.js')}} "></script>

    @yield('scripts')
</body>
</html>