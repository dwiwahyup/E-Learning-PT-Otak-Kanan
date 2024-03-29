@extends('frontend/layouts.template')
@section('content')

<main>
    <section class="hero_in general">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>{{$course->name}}</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="bg_color_1">
        <nav class="secondary_nav sticky_horizontal">
            <div class="container">
                <ul class="clearfix">
                    <li><a href="#description" class="active">Description</a></li>
                    <li><a href="#sidebar"></a></li>
                </ul>
            </div>
        </nav>
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">
                    <section id="description">
                        <h2>Description</h2>
                        
                        @if ($data->vidio == null)
                        @else
                            <iframe style="height: 405px; overflow-x:auto; "
                                src="{{$data->vidio}}">
                            </iframe>   
                        @endif
                            
                        @if ($data->thumbnaile_url == null)
                            
                        @else
                            <p><img alt="" class="img-fluid"  style="width: 800px; height: 400px;" src="{{$data->thumbnaile_url}}"></p>
                        @endif
                        <div class="post-content">
                            <p>{!! $data->text !!}</p>
                        </div>
                    </section>
                    <hr>
                </div>
                <aside class="col-lg-4" id="sidebar">
                    <div class="box_detail booking">
                        <div>
                            <h6>Pada kelas ini, anda mempelajari</h6>
                            <p>
                                {!! $data->title !!}
                            </p>
                            <hr>
                            @if ($next == null)
                                @if ($next_chapter == null)
                                    <a href="/chapteruser/{{$course->slug}}">
                                        <h5 class="d-inline">Akhir materi</h5>
                                        <br>    
                                        <p>{{$end_content->title}}
                                            {{-- <i class="icon-left"></i>  --}}
                                        </p>
                                    </a>
                                @else
                                <a href="/contentuser/{{$next_chapter->slug ?? $end_content->name}}">
                                    <h5 class="d-inline">Selanjutnya</h5>
                                    <br>    
                                    <p>{{$next_chapter->title ?? $end_content->title}}
                                        <i class="icon-left"></i> 
                                    </p>
                                </a>
                                @endif
                            @else
                                <a href="/contentuser/{{$next->slug}}">
                                    <h5 class="d-inline">Selanjutnya</h5>
                                    <br>    
                                    <p>{{$next->title}}<i class=" icon-left"></i> </p>
                                </a>
                            @endif

                        </div>

                </aside>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->
</main>


@endsection



