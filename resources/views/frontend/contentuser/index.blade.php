@extends('frontend/layouts.template')
@section('content')

<main>
    <section class="hero_in general">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>Frond-End Developer</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="bg_color_1">
        <nav class="secondary_nav sticky_horizontal">
            <div class="container">
                <ul class="clearfix">
                    <li><a href="#description" class="active">Description</a></li>
                    {{-- <li><a href="#reviews">Reviews</a></li> --}}
                    <li><a href="#sidebar">Contact</a></li>
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
                        <!-- /post meta -->
                        <div class="post-content">
                            <p>{!! $data->text !!}</p>
                        </div>

                    </section>
                    <!-- /section -->
                    <hr>
                </div>
                <!-- /col -->
                
                <aside class="col-lg-4" id="sidebar">
                    <div class="box_detail booking">
                        <div>
                            @if ($next == null)
                                @if ($next_chapter == null)
                                    <a href="/chapteruser/{{$slug_course}}">
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
                        {{-- <div id="message-contact-detail"></div>
                        <form method="post" action="assets/contact_detail.php" id="contact_detail" autocomplete="off">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Name" name="name_detail" id="name_detail">
                                <i class="ti-user"></i>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" placeholder="Email" name="email_detail" id="email_detail">
                                <i class="icon_mail_alt"></i>
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Your message" class="form-control" name="message_detail" id="message_detail"></textarea>
                                <i class="ti-pencil"></i>
                            </div>
                            <div class="form-group">
                                <input placeholder="Are you human? 3 + 1 =" class="form-control" type="text" id="verify_contact_detail" name="verify_contact_detail">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Contact us" class="add_top_30 btn_1 full-width purchase" id="submit-contact-detail">
                            </div>
                            <a href="wishlist.html" class="btn_1 full-width outline wishlist"><i class="icon_heart"></i> Add to wishlist</a>
                            <div class="text-center"><small>No money charged in this step</small></div>
                        </form>
                    </div> --}}
                    {{-- <ul class="share-buttons">
                        <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
                        <li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Tweet</a></li>
                        <li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
                    </ul> --}}
                </aside>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->
</main>


@endsection



