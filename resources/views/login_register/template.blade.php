<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Panagea - Premium site template for travel agencies, hotels and restaurant listing.">
    <meta name="author" content="Ansonika">
    <title>PT OTAK KANAN</title>

    
    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ url('https://res.cloudinary.com/djbbzawzs/image/upload/v1673887767/picture_assets_frontend/cropped-ok-ico-32x32_e4lvma.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('frontend/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('frontend/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('frontend/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('frontend/img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ url('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('frontend/css/style.css')}}" rel="stylesheet">
	<link href="{{ url('frontend/css/vendors.css')}}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ url('frontend/css/custom.css')}}" rel="stylesheet">

</head>

<body id="login_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	
@yield('content')

		
	<!-- COMMON SCRIPTS -->
    <script src="{{ url('frontend/js/common_scripts.js')}}"></script>
    <script src="{{ url('frontend/js/main.js')}}"></script>
	<script src="{{ url('frontend/assets/validate.js')}}"></script>	
    
    <!-- SPECIFIC SCRIPTS -->
	<script src="{{ url('frontend/js/pw_strenght.js')}}"></script>

</body>
</html>