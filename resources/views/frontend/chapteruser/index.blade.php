@extends('frontend/layouts.template')
@section('content')
<main>
    <section class="hero_in general">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>{{$course_categories->name}}</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="container margin_60_35">
        <div class="row">
            <aside class="col-lg-3" id="sidebar">
                <div class="box_style_cat" id="faq_box">
                    <ul id="cat_nav">
                        @foreach ($chapter as $index => $data)
                            <li><a href="#{{$data->slug}}" class="{{$index == 0 ? 'active' : ''}}"><i class="icon_document_alt"></i>{{$data->name}}</a></li>
                        @endforeach
                            {{-- <li><a href="#tips"><i class="icon_document_alt"></i>HTML</a></li>
                            <li><a href="#reccomendations"><i class="icon_document_alt"></i>CSS</a></li>
                            <li><a href="#terms"><i class="icon_document_alt"></i>Java Script</a></li>
                            <li><a href="#booking"><i class="icon_document_alt"></i>Vue JS</a></li> --}}
                    </ul>
                </div>
            </aside>
            <!--/aside -->
            {{-- @dd($new) --}}
            <div class="col-lg-9" id="faq">
                @foreach ($test as $index => $data)
                {{-- @dd($data->contents->title) --}}
                    <h4 class="nomargin_top">{{$data->name}}</h4>
                    <div role="tablist" class="add_bottom_45 accordion_2" id="{{$data->slug}}">
                        <div class="card">
                            <div class="card-header" role="tab">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapse{{$data->slug}}" aria-expanded="true"><i
                                            class="indicator ti-minus"></i>
                                            {{$data->name}}
                                        </a>
                                </h5>
                            </div>
                            <div id="collapse{{$data->slug}}" 
                                class=" @if ($index == 0)
                                    collapse show
                                @else
                                    collapse
                                @endif" 
                                role="tabpanel" data-parent="#{{$data->slug}}">
                                @foreach ($data->contents as $item)
                                    <div class="card">
                                        <div class="box_list">
                                            <div class="row no-gutters">
                                                <div class="col-lg-5">
                                                    <figure>
                                                        <small>{{$item->title}}</small>
                                                        <a href="contentuser/{{$item->slug}}"><img
                                                                src="{{$item->thumbnaile_url ?? "https://res.cloudinary.com/djbbzawzs/image/upload/v1667293149/picture_assets_frontend/banner4_qxe9c8.jpg"}}"
                                                                class="img-fluid" alt="" width="800" height="533">
                                                            <div class="read_more"><span>Read more</span></div>
                                                        </a>
                                                    </figure>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="wrapper">
                                                        <h3><a href="contentuser/{{$item->slug}}">{{$item->title}}</a></h3>
                                                        <p> <strong>Deskripsi Content</strong> 
                                                            {!! Str::limit($item->text, 300) !!}
                                                        </p>
                                                        <hr>
                                                        <p class="btn_home">
                                                            <p class="btn_home_align"><a href="/contentuser/{{$item->slug}}" class="btn_1 rounded">Start Learn</a></p>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection
