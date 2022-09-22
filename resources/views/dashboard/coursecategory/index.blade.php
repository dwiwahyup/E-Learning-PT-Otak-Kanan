@extends('layouts.dashboard')
@section('content')

<!-- Favicons-->
<link rel="shortcut icon" href="{{ url('frontend/img/favicon.ico')}}" type="image/x-icon">
<link rel="apple-touch-icon" type="image/x-icon" href="{{ url('frontend/')}}img/apple-touch-icon-57x57-precomposed.png">
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

<div id="page">
<div class="content-wrapper">
  <div class="container-fluid">

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Logbook</li>
    </ol>

		<div class="container margin_60_35">
			<!-- /custom-search-input-2 -->
			<div class="isotope-wrapper">
			<div class="row">

        <!-- /box_grid -->
        @foreach ($data as $data)
				<div class="col-xl-4 col-lg-6 col-md-6 isotope-item popular">
					<div class="box_grid">
						<figure>
							<a href="hotel-detail.html"><img src="{{ url('frontend/img/frontend.jpg')}}" class="img-fluid" alt="" width="800" height="533"></a>
							{{-- <small>Front-End Web Developer</small> --}}
              <small>{{$data->name}}</small>
						</figure>
						<div class="wrapper">
							{{-- <h3><a href="hotel-detail.html">Front-End Web Developer</a></h3> --}}
              <h3><a href="hotel-detail.html">{{$data->name}}</a></h3>
							<p class="text-justify">Front-end web development is the development of the graphical user interface of a website, using HTML, CSS, and JavaScript hhhhhhhhhhhhhhhsssssse.</p>
							<span class="price"> <strong>25</strong> Chapter</span>
						</div>
						<ul>
							<li><i class="person"></i> <strong>164</strong>  Student</li>
							<li>
                <div class="score">
                  <a href=""><strong>Show</strong></a> <span></span>
                  <a href=""><strong>Edit</strong></a> <span></span>
                  <a href=""><strong>Delete</strong></a>
                </div>
              </li>
						</ul>
					</div>
				</div>
        @endforeach
				<!-- /box_grid -->
				{{-- <div class="col-xl-4 col-lg-6 col-md-6 isotope-item latest">
					<div class="box_grid">
						<figure>
							<a href="#0" class="wish_bt"></a>
							<a href="hotel-detail.html"><img src="{{ url('frontend/img/hotel_2.jpg')}}" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
							<small>Paris Centre</small>
						</figure>
						<div class="wrapper">
							<div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
							<h3><a href="hotel-detail.html">Mariott Hotel</a></h3>
							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
							<span class="price">From <strong>$124</strong> /per person</span>
						</div>
						<ul>
							<li><i class="ti-eye"></i> 164 views</li>
							<li><div class="score"><span>Good<em>350 Reviews</em></span><strong>7.0</strong></div></li>
						</ul>
					</div>
				</div> --}}
				<!-- /box_grid -->
			</div>
			<!-- /row -->
			</div>
			<!-- /isotope-wrapper -->
			<p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Add Course Category</a></p>
		
		</div>
	</div>
</div>
	<!--/footer-->
	</div>
	<!-- COMMON SCRIPTS -->
  {{ url('frontend/')}}
  <script src="{{ url('frontend/js/common_scripts.js')}}"></script>
  <script src="{{ url('frontend/js/main.js')}}"></script>
  <script src="{{ url('frontend/assets/validate.js')}}"></script>

  <!-- Map -->
  <script src="http://maps.googleapis.com/maps/api/js"></script>
  <script src="{{ url('frontend/js/markerclusterer.js')}}"></script>
  <script src="{{ url('frontend/js/map_hotels.js')}}"></script>
  <script src="{{ url('frontend/js/infobox.')}}"></script>

  <!-- Masonry Filtering -->
  <script src="{{ url('frontend/js/isotope.min.js')}}"></script>
  <script>
  $(window).on('load', function(){
    var $container = $('.isotope-wrapper');
    $container.isotope({ itemSelector: '.isotope-item', layoutMode: 'masonry' });
  });

  $('.filters_listing').on( 'click', 'input', 'change', function(){
    var selector = $(this).attr('data-filter');
    $('.isotope-wrapper').isotope({ filter: selector });
  });
  </script>

@endsection