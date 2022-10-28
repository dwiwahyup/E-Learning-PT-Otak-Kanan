<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Panagea - Premium site template for travel agencies, hotels and restaurant listing.">
    <meta name="author" content="Ansonika">
    {{-- <title>Panagea | Premium site template for travel agencies, hotels and restaurant listing.</title> --}}
    <title>PT OTAK KANAN</title>
	{{-- <title> {{config('app.name')}}</title> --}}
    <!-- Favicons-->
    <link href="{{ url('frontend/img/favicon.ico')}}"rel="shortcut icon"  type="image/x-icon">
    <link href="{{ url('frontend/img/apple-touch-icon-57x57-precomposed.png')}}"rel="apple-touch-icon" type="image/x-icon">
    <link href="{{ url('frontend/img/apple-touch-icon-72x72-precomposed.png')}}" rel="apple-touch-icon" type="image/x-icon" sizes="72x72">
    <link href="{{ url('frontend/img/apple-touch-icon-114x114-precomposed.png')}}"rel="apple-touch-icon" type="image/x-icon" sizes="114x114">
    <link href="{{ url('frontend/img/apple-touch-icon-144x144-precomposed.png')}}"rel="apple-touch-icon" type="image/x-icon" sizes="144x144" >

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- BASE CSS -->

    <link href="{{ url('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{ url('frontend/css/vendors.css')}}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ url('frontend/css/custom.css')}}" rel="stylesheet">

	<!-- SPECIFIC CSS -->
	<link href="{{url('frontend/css/blog.css')}}" rel="stylesheet">
	
	<!-- Modernizr -->
	<script src="{{ url('frontend/js/modernizr.js')}}"></script>

</head>

<body>
		
	<div id="page">
		
@include('frontend/layouts.navbar')
	<!-- /header -->
@yield('content')
	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-5 col-md-12 p-r-5">
					<p><img src="{{ url('assets/dashboard/img/otakkanan.png')}}" width="150" height="36" alt=""></p>
					<p>PT Otak Kanan (OK) is a creative company based in Surabaya, Indonesia.
						We create, build and operate companies that challenge the status quo. PT Otak Kanan has prototyped and tested hundreds of ideas, and from those, has served more than 100 companies spanning a wide range of markets..</p>
					<div class="follow_us">
						<ul>
							<li>Follow us</li>
							<li><a href="https://www.facebook.com/ptOtakKanan/"><i class="ti-facebook"></i></a></li>
							<li><a href="https://twitter.com/otakkanan"><i class="ti-twitter-alt"></i></a></li>
							{{-- <li><a href="#0"><i class="ti-google"></i></a></li>
							<li><a href="#0"><i class="ti-pinterest"></i></a></li>
							<li><a href="#0"><i class="ti-instagram"></i></a></li> --}}
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 ml-lg-auto">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="{{url('/about')}}">About</a></li>
						<li><a href="{{ route('login') }}">Login</a></li>
						<li><a href="{{url('/register')}}">Register</a></li>
						{{-- <li><a href="blog.html">News &amp; Events</a></li>
						<li><a href="contacts.html">Contacts</a></li> --}}
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://61280932400"><i class="ti-mobile"></i>085 77 59 36999</a></li>
						<li><a href="mailto:info@Panagea.com"><i class="ti-email"></i>info@otakkanan.co.id</a></li>
					</ul>
					<div id="newsletter">
					<h6>Newsletter</h6>
					<div id="message-newsletter"></div>
					<form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
						<div class="form-group">
							<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
							<input type="submit" value="Submit" id="submit-newsletter">
						</div>
					</form>
					</div>
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-lg-6">
					<ul id="footer-selector">
						<li>
							<div >
							</div>
						</li>
						<li>
							<div >
							</div>
						</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
						<li><span>© 2019 Panagea</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="{{ url('frontend/js/common_scripts.js')}}"></script>
    <script src="{{ url('frontend/js/main.js')}}"></script>
	<script src="{{ url('frontend/assets/validate.js')}}"></script>
	
</body>
</html>
