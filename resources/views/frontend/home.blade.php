@extends('frontend/layouts.template')

@section('content')
<main>
    <section class="hero_single version_2">
        <div class="wrapper">
            <div class="container">
                <h3>Start Your Carrer</h3>
                <p>Expolore Your Interest and Upgrade Your Skills </p> 
                <br>
                <p class="btn_home">
                    <a href="" class="btn_1 rounded">Join Now</a>
                </p>
            </div>
        </div>
    </section>


    <div class="container container-custom margin_80_0">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>Our Course</h2>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        </div>
        <div id="reccomended" class="owl-carousel owl-theme">
            <div class="item">
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
            <!-- /item -->
            <div class="item">
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
            <!-- /item -->
        </div>
        <!-- /carousel -->
        <p class="btn_home_align"><a href="tours-grid-isotope.html" class="btn_1 rounded">View all Courses</a></p>
        <hr class="large">
    </div>
    <!-- /container -->

    <div class="container container-custom margin_30_95">
        <div class="banner mb-0">
            <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                <div>
                    <small>PT Otak Kanan</small>
                    <h3>Your Perfect<br>Advenure Experience</h3>
                    <p>Activities and accommodations</p>
                    {{-- <a href="adventure.html" class="btn_1">Read more</a> --}}
                </div>
            </div>
            <!-- /wrapper -->
        </div>
        <!-- /banner -->
    </div>
    <!-- /container -->

    <div class="container margin_95_40">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>Our Mentors</h2>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        </div>
        <div id="carousel" class="owl-carousel owl-theme">
            <div class="item">
                <a href="#0">
                    <div class="title">
                        <h4>Wahyu Prasetya
                            <em>Full Stack Developer</em>
                            <hr>
                            <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla condimentum est feugiat leo consectetur ultricies. Suspendisse tempus et ex ac accumsan.</em>
                        </h4>
                    </div>
                    <img src="{{ url('frontend/img/mentor1.jpg')}}" alt="">
                </a>
            </div>
            <div class="item">
                <a href="#0">
                    <div class="title">
                        <h4>Lucas Smith
                            <em>Marketing</em>
                            <hr>
                            <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla condimentum est feugiat leo consectetur ultricies. Suspendisse tempus et ex ac accumsan.</em>
                        </h4>
                    </div>
                    <img src="{{ url('frontend/img/mentor2.jpg')}}" alt="">
                </a>
            </div>
            <div class="item">
                <a href="#0">
                    <div class="title">
                        <h4>Paul Stephens<em>Business strategist
                            </em>
                            <hr>
                            <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla condimentum est feugiat leo consectetur ultricies. Suspendisse tempus et ex ac accumsan.</em>
                        </h4>
                    </div>
                    <img src="{{ url('frontend/img/mentor1.jpg')}}" alt="">
                </a>
            </div>
            <div class="item">
                <a href="#0">
                    <div class="title">
                        <h4>Pablo Himenez
                            <em>Customer Service</em>
                            <hr>
                            <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla condimentum est feugiat leo consectetur ultricies. Suspendisse tempus et ex ac accumsan.</em>
                        </h4>
                    </div>
                    <img src="{{ url('frontend/img/mentor2.jpg')}}" alt="">
                </a>
            </div>
            <div class="item">
                <a href="#0">
                    <div class="title">
                        <h4>Andrew Stuttgart
                            <em>Admissions</em>
                            <hr>
                            <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla condimentum est feugiat leo consectetur ultricies. Suspendisse tempus et ex ac accumsan.</em>
                        </h4>
                    </div>
                    <img src="{{ url('frontend/img/mentor1.jpg')}}" alt="">
                </a>
            </div>
        </div>
        <!-- /carousel -->
    </div>

    <div class="bg_color_1">
        <div class="container margin_80_55">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>Testimonials</h2>
                {{-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> --}}
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a class="box_news" href="#0">
                        <figure><img src="{{ url('frontend/img/news_home_1.jpg')}}" alt="">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>Firman Wahyudi</li>
                        </ul>
                        <div class="info">
                                <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
                            
                            </div>
                        {{-- <h4>Pri oportere scribentur eu</h4> --}}
                        <p align="justify">Magang di PT. Otak Kanan sangat seru dan materi yang disampaikan sangat jelas. Penyampaian materi juga diajarkan terlebih dahulu kemudian dicoba untuk prakter. Terima kasih PT. Otak Kanan.</p>
                    </a>
                </div>
                <!-- /box_news -->
                <div class="col-lg-6">
                    <a class="box_news" href="#0">
                        <figure><img src="{{ url('frontend/img/news_home_1.jpg')}}" alt="">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>Firman Wahyudi</li>
                        </ul>
                        <div class="info">
                                <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
                            
                            </div>
                        {{-- <h4>Pri oportere scribentur eu</h4> --}}
                        <p align="justify">Magang di PT. Otak Kanan sangat seru dan materi yang disampaikan sangat jelas. Penyampaian materi juga diajarkan terlebih dahulu kemudian dicoba untuk prakter. Terima kasih PT. Otak Kanan.</p>
                    </a>
                </div>
                <!-- /box_news -->
                <div class="col-lg-6">
                    <a class="box_news" href="#0">
                        <figure><img src="{{ url('frontend/img/news_home_1.jpg')}}" alt="">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>Firman Wahyudi</li>
                        </ul>
                        <div class="info">
                                <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
                            
                            </div>
                        {{-- <h4>Pri oportere scribentur eu</h4> --}}
                        <p align="justify">Magang di PT. Otak Kanan sangat seru dan materi yang disampaikan sangat jelas. Penyampaian materi juga diajarkan terlebih dahulu kemudian dicoba untuk prakter. Terima kasih PT. Otak Kanan.</p>
                    </a>
                </div>
                <!-- /box_news -->
                <div class="col-lg-6">
                    <a class="box_news" href="#0">
                        <figure><img src="{{ url('frontend/img/news_home_1.jpg')}}" alt="">
                            <figcaption><strong>28</strong>Dec</figcaption>
                        </figure>
                        <ul>
                            <li>Firman Wahyudi</li>
                        </ul>
                        <div class="info">
                                <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
                            
                            </div>
                        {{-- <h4>Pri oportere scribentur eu</h4> --}}
                        <p align="justify">Magang di PT. Otak Kanan sangat seru dan materi yang disampaikan sangat jelas. Penyampaian materi juga diajarkan terlebih dahulu kemudian dicoba untuk prakter. Terima kasih PT. Otak Kanan.</p>
                    </a>
                </div>
                <!-- /box_news -->
            </div>
            <!-- /row -->
            <p class="btn_home_align"><a href="blog.html" class="btn_1 rounded">View all news</a></p>
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->

    <div class="call_section">
        <div class="container clearfix">
            <div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
                <div class="block-reveal">
                    <div class="block-vertical"></div>
                    <div class="box_1">
                        <h3>Enjoy a GREAT travel with us</h3>
                        <p>Ius cu tamquam persequeris, eu veniam apeirian platonem qui, id aliquip voluptatibus pri. Ei mea primis ornatus disputationi. Menandri erroribus cu per, duo solet congue ut. </p>
                        <a href="#0" class="btn_1 rounded">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/call_section-->
</main>
<!-- /main -->

@endsection