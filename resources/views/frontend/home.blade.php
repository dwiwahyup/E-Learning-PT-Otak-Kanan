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
                    <a href="/program/" class="btn_1 rounded">Join Now</a>
                    
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
            {{-- <div class="item">
                <div class="box_grid">
                    <figure> --}}
            {{-- <a href="#0" class="wish_bt"></a> --}}
            {{-- <a href="{{url('/chapteruser/')}}"><img
                src="https://res.cloudinary.com/djbbzawzs/image/upload/v1667293149/picture_assets_frontend/banner4_qxe9c8.jpg"
                class="img-fluid" alt="" width="800" height="533">
            <div class="read_more"><span>Read more</span></div>
            </a>
            <small>Front-End Developer</small>
            </figure>
            <div class="wrapper">
                <h3><a href="{{url('/chapteruser/')}}">Front-End Developer</a></h3>
                <p>Front-end web development, also known as client-side development The challenge associated
                    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                <span class="price"> <strong>25</strong> Chapters and <strong>1 </strong> Profesional
                    Mentors</span>
            </div>
            <ul>
                <li><i class="icon-clock-6"></i>25 Hours </li>
                <li>
                    <div class="score"><a href=""><strong>Start Now</strong></a></div>
                </li>
            </ul>
        </div>
    </div> --}}
    <!-- /item -->
    @foreach ($query as $item)
    <div class="item">
        <div class="box_grid">
            <figure>
                <a href="/chapteruser/{{$item->slug}}"><img src="{{ $item->image_url }}" class="img-fluid" alt=""
                        width="800" height="533">
                    <div class="read_more"><span>Read more</span></div>
                </a>
                <small>{{$item->name}}</small>
            </figure>
            <div class="wrapper">
                <h3><a href="/chapteruser/{{$item->slug}}">{{$item->name}}</a></h3>
                <p>{!! Str::limit($item->introduction, 150) !!}</p>

                <span class="price"> <strong>{{$item->chapters_count}}</strong> Chapters and <strong>1 </strong>
                    Profesional
                    Mentors</span>
            </div>
            <ul>
                <li></li>
                <li>
                    <div class="score"><a href=""><strong>Start Now</strong></a></div>
                </li>
            </ul>
        </div>
    </div>
    @endforeach
    <!-- /item -->
    </div>
    <!-- /carousel -->
    <p class="btn_home_align"><a href="{{url('/allcourse/')}}" class="btn_1 rounded">View all Courses</a></p>
    <hr class="large">
    </div>
    <!-- /container -->

    <div class="bg_color_1">
        <div class="container container-custom margin_80_55">
            <div class="main_title_2">
                <h2>Why do you have to follow<br>
                    internship program at PT. Otak Kanan?</h2>
            </div>
            <div class="row adventure_feat">
                <div class="col-md-3">
                    <img src="frontend/img/paste-solid.svg" alt="" width="75" height="75"><br>
                    <p>Practical activities can be converted into credits</p>
                </div>
                <div class="col-md-3">
                    <img src="frontend/img/knowladge.png" alt="" width="75" height="75"><br>
                    <p>Ease of exploration of students' knowledge and abilities during the activity</p>
                </div>
                <div class="col-md-3">
                    <img src="frontend/img/networking.png" alt="" width="75" height="75"><br>
                    <p>Learn and expand networks outside of the home campus</p>
                </div>
                <div class="col-md-3">
                    <img src="frontend/img/teacher.png" alt="" width="75" height="75"><br>
                    <p>Gain knowledge and experience from professional and qualified partners.</p>
                </div>
            </div>
        </div>
        <!-- /container -->
    </div>



    <div class="container margin_95_40">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>Our Mentors</h2>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        </div>
        <div id="carousel" class="owl-carousel owl-theme">
            @foreach ( $mentors as $data)
            <div class="item">
                <a href="#0">
                    <div class="title">
                        <h4>{{$data->name}}
                            <em>{{$data->courses->name}}</em>
                            <hr>
                        </h4>
                    </div>
                    <img src="{{ $data->user_details->profile_photo }}" alt="">
                    {{-- url('frontend/img/mentor1.jpg') --}}
                </a>
            </div>
            @endforeach

            {{-- <div class="item">
                <a href="#0">
                    <div class="title">
                        <h4>Lucas Smith
                            <em>Marketing</em>
                            <hr>
                            
                        </h4>
                    </div>
                    <img src="{{ url('frontend/img/mentor2.jpg')}}" alt="">
            </a>
        </div> --}}
        {{-- <div class="item">
                <a href="#0">
                    <div class="title">
                        <h4>Paul Stephens<em>Business strategist
                            </em>
                            <hr>
                            <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla condimentum est feugiat
                                leo consectetur ultricies. Suspendisse tempus et ex ac accumsan.</em>
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
                    <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla condimentum est feugiat
                        leo consectetur ultricies. Suspendisse tempus et ex ac accumsan.</em>
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
                    <em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla condimentum est feugiat
                        leo consectetur ultricies. Suspendisse tempus et ex ac accumsan.</em>
                </h4>
            </div>
            <img src="{{ url('frontend/img/mentor1.jpg')}}" alt="">
        </a>
    </div>
    {{-- </div>
        <!-- /carousel -->
    </div> --}}
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
                @foreach ($testimonials as $item)
                    <div class="col-lg-6">
                        <a class="box_news" href="#0">
                            <figure><img src="{{$item->users->courses->image_url ?? url('frontend/img/news_home_1.jpg')}}" alt="">
                                <figcaption><strong>28</strong>Dec</figcaption>
                            </figure>
                            <ul>
                                <li>{{$item->name}}</li>
                            </ul>
                            <div class="info">
                                <div class="cat_star">
                                    @for ($i = 0; $i < $item->rating; $i++)
                                    <i class="icon_star"></i>
                                    @endfor
                                </div>
                            </div>
                            {{-- <h4>Pri oportere scribentur eu</h4> --}}
                            <p align="justify">{{$item->review}}</p>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- /row -->
            <p class="btn_home_align"><a href="{{route('user_testimonial.index')}}" class="btn_1 rounded">View all Testimonials</a>
            </p>
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->

    {{-- <div class="call_section">
        <div class="container clearfix">
            <div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
                <div class="block-reveal">
                    <div class="block-vertical"></div>
                    <div class="box_1">
                        <h3>Achieve a Better Future</h3>
                        <p align="justify">PT. Otak Kanan provide the best internship experience to shape a better and
                            career-appropriate future.</p>
                        {{-- <a href="#0" class="btn_1 rounded">Read more</a> --}}
    </div>
    </div>
    </div>
    </div>
    </div>
    <!--/call_section-->
</main>
<!-- /main -->

@endsection
