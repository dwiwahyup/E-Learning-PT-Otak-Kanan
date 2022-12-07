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
            @foreach ($query as $item)
            <div class="col-xl-4 col-lg-6 col-md-6 isotope-item popular">
                <div class="box_grid">
                    <figure>
                        {{-- <a href="#0" class="wish_bt"></a> --}}
                        <a href="/chapteruser/{{$item->slug}}"><img src="{{ $item->image_url }}" class="img-fluid" alt="" width="800" height="533">
                            <div class="read_more"><span>Read more</span></div>
                        </a>
                        <small>{{$item->name}}</small>
                    </figure>
                    <div class="wrapper">
                        <h3><a href="/chapteruser/{{$item->slug}}">{{$item->name}}</a></h3>
                        <p>{!! Str::limit($item->introduction, 150) !!}</p>
                        <span class="price"> <strong>{{$item->chapters_count}}</strong> Chapters and <strong>{{$item->mentors_count}} </strong> Profesional Mentors</span>
                    </div>
                    <ul>
                        <li><i ></i> </li>
                        <li><div class="score"><a href=""><strong>Start Now</strong></a></div></li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>

        </div>

        
        <p class="text-center"><a href="#0" class="btn_1 rounded add_top_30">Load more</a></p>
        
    </div>

</main>

    
@endsection