@extends('frontend/layouts.template')
@section('content')

<main>
		
    <section class="hero_in tours">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>Paris tours grid</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->
    <div class="container margin_60_35">
        <div class="isotope-wrapper">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 isotope-item popular">
                <div class="box_grid">
                    <figure>
                        {{-- <a href="#0" class="wish_bt"></a> --}}
                        <a href="tour-detail.html"><img src="{{ url('frontend/img/banner4.jpg')}}" class="img-fluid" alt="" width="800" height="533">
                            <div class="read_more"><span>Read more</span></div>
                        </a>
                        <small>Front-End Developer</small>
                    </figure>
                    <div class="wrapper">
                        <h3><a href="tour-detail.html">Front-End Developer</a></h3>
                        <p>Front-end web development, also known as client-side development The challenge associated aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                        <span class="price"> <strong>25</strong> Chapters and <strong>1 </strong> Profesional Mentors</span>
                    </div>
                    <ul>
                        <li><i class="icon-clock-6" ></i>25 Hours </li>
                        <li><div class="score"><a href=""><strong>Start Now</strong></a></div></li>
                    </ul>
                </div>
            </div>
            <!-- /box_grid -->
            <div class="col-xl-4 col-lg-6 col-md-6 isotope-item latest">
                <div class="box_grid">
                    <figure>
                        <a href="tour-detail.html"><img src="{{ url('frontend/img/banner5.jpg')}}" class="img-fluid" alt="" width="800" height="533">
                            <div class="read_more"><span>Read more</span></div>
                        </a>
                        <small>Back-End Developer</small>
                    </figure>
                    <div class="wrapper">
                        <h3><a href="tour-detail.html">Back-End Developer</a></h3>
                        <p>Back-end developers are the experts who build and maintain the mechanisms that process data and perform actions on websites.</p>

                        <span class="price"> <strong>25</strong> Chapters and <strong>1 </strong> Profesional Mentors</span>
                    </div>
                    <ul>
                        <li><i class="icon-clock-6" ></i>25 Hours </li>
                        <li><div class="score"><a href=""><strong>Start Now</strong></a></div></li>
                    </ul>
                </div>
            </div>
            <!-- /box_grid -->
            <div class="col-xl-4 col-lg-6 col-md-6 isotope-item popular">
                <div class="box_grid">
                    <figure>
                        {{-- <a href="#0" class="wish_bt"></a> --}}
                        <a href="tour-detail.html"><img src="{{ url('frontend/img/banner4.jpg')}}" class="img-fluid" alt="" width="800" height="533">
                            <div class="read_more"><span>Read more</span></div>
                        </a>
                        <small>Front-End Developer</small>
                    </figure>
                    <div class="wrapper">
                        <h3><a href="tour-detail.html">Front-End Developer</a></h3>
                        <p>Front-end web development, also known as client-side development The challenge associated aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                        <span class="price"> <strong>25</strong> Chapters and <strong>1 </strong> Profesional Mentors</span>
                    </div>
                    <ul>
                        <li><i class="icon-clock-6" ></i>25 Hours </li>
                        <li><div class="score"><a href=""><strong>Start Now</strong></a></div></li>
                    </ul>
                </div>
            </div>
            <!-- /box_grid -->
        </div>
        <!-- /row -->
        </div>
        <!-- /isotope-wrapper -->
        
        <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p>
        
    </div>
    <!-- /container -->
    <!-- /bg_color_1 -->
    
</main>
<!--/main-->
    
@endsection