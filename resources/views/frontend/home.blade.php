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
            @foreach ($query as $item)
            <div class="item">
                <div class="box_grid">
                    <figure>
                        <a href="/chapteruser/{{$item->slug}}"><img src="{{ $item->image_url }}" class="img-fluid"
                                alt="" width="800" height="533">
                            <div class="read_more"><span>Read more</span></div>
                        </a>
                        <small>{{$item->name}}</small>
                    </figure>
                    <div class="wrapper">
                        <h3><a href="/chapteruser/{{$item->slug}}">{{$item->name}}</a></h3>
                        <p>{!! Str::limit($item->introduction, 150) !!}</p>
                        <span class="price"> <strong>{{$item->chapters_count}}</strong> Chapters and
                            <strong>{{$item->mentors_count}} </strong>
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
        </div>
        <p class="btn_home_align"><a href="{{url('/allcourse/')}}" class="btn_1 rounded">View all Courses</a></p>
        <hr class="large">
    </div>

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
                    <img src="{{ $data->user_details->profile_photo ?? "https://res.cloudinary.com/djbbzawzs/image/upload/v1667293146/picture_assets_frontend/mentor2_dg1wij.jpg" }}"
                        alt="">
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="bg_color_1">
        <div class="container margin_80_55">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>Testimonials</h2>
            </div>
            <div class="row">
                @foreach ($testimonials as $item)
                <div class="col-lg-6">
                    <a class="box_news" href="#0">
                        <figure><img src="{{$item->users->courses->image_url ?? url('frontend/img/news_home_1.jpg')}}"
                                alt="">
                        </figure>
                        <div class="info">
                            {{$item->created_at->toFormattedDateString()}}
                            <ul>
                                <li>
                                    <strong>{{$item->name}}</strong>
                                </li>
                            </ul>
                            <div class="cat_star">
                                @for ($i = 0; $i < $item->rating; $i++)
                                    <i class="icon_star"></i>
                                    @endfor
                            </div>
                        </div>
                        <p align="justify">{{$item->review}}</p>
                    </a>
                </div>
                @endforeach
            </div>
            <p class="btn_home_align"><a href="{{route('user_testimonial.index')}}" class="btn_1 rounded">View all
                    Testimonials</a>
            </p>
        </div>
    </div>
</main>


@endsection
