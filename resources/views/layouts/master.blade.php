<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Benchmark">
	<meta property="og:title" content="Benchmark">
	<meta property="og:description" content="Benchmark">
	<meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>@yield('title', 'Page title') - {{ config('app.name') }}</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{ url('images/favicon.png') }}">
	<link href="{{ url('vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" >
	<link href="{{ url('vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet" >
	{{-- <link href="{{ url('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet"> --}}
	
	<link href="{{ url('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{ url('vendor/toastr/css/toastr.min.css') }}">
	<!-- Style css -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet" >

    {{-- customs styles  --}}
    @yield('styles')
	
</head>
<body>

    @include('layouts.partials.preloader')

    <div id="main-wrapper">

        @include('layouts.partials.navheader')
		
        @include('layouts.partials.chatbox')
        
        @include('layouts.partials.header')
        
        @include('layouts.partials.sidebar')
		
		
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				@yield('content')
            </div>
        </div>
        @include('layouts.partials.footer')


	</div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ url('vendor/global/global.min.js') }}"></script>
	<script src="{{ url('vendor/chart.js/Chart.bundle.min.js') }}"></script>
	<script src="{{ url('vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ url('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
	<!-- Apex Chart -->
	<script src="{{ url('vendor/apexchart/apexchart.js') }}"></script>
	
	<script src="{{ url('vendor/chart.js/Chart.bundle.min.js') }}"></script>
	
	<!-- Chart piety plugin files -->
    <script src="{{ url('vendor/peity/jquery.peity.min.js') }}"></script>
	
	<script src="{{ url('vendor/owl-carousel/owl.carousel.js') }}"></script>
	
    <script src="{{ url('js/custom.min.js') }}"></script>
	<script src="{{ url('js/dlabnav-init.js') }}"></script>
	<script src="{{ url('js/demo.js') }}"></script>
    <script src="{{ url('js/styleSwitcher.js') }}"></script>
    <script src="{{ url('vendor/sweetalert2@11.6.5/sweetalert2.all.min.js') }}"></script>
    {{-- <script src="{{ url('js/plugins-init/toastr-init.js') }}"></script> --}}
    <script src="{{ url('vendor/toastr/js/toastr.min.js') }}"></script>

	<script>
		function JobickCarousel()
			{

				/*  testimonial one function by = owl.carousel.js */
				jQuery('.front-view-slider').owlCarousel({
					loop:false,
					margin:30,
					nav:true,
					autoplaySpeed: 3000,
					navSpeed: 3000,
					autoWidth:true,
					paginationSpeed: 3000,
					slideSpeed: 3000,
					smartSpeed: 3000,
					autoplay: false,
					animateOut: 'fadeOut',
					dots:true,
					navText: ['', ''],
					responsive:{
						0:{
							items:1
						},
						
						480:{
							items:1
						},			
						
						767:{
							items:3
						},
						1750:{
							items:3
						}
					}
				})
			}

			jQuery(window).on('load',function(){
				setTimeout(function(){
					JobickCarousel();
				}, 1000); 
			});
	</script>	
    {{-- Customs scripts --}}
    @yield('scripts')

</body>
</html>