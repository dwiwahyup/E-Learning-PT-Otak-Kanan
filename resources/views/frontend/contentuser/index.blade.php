@extends('frontend/layouts.template')
@section('content')

<main>
    <section class="hero_in tours_detail">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>Tour detail page</h1>
            </div>
            <span class="magnific-gallery">
                <a href="" class="btn_photos" title="Photo title" data-effect="mfp-zoom-in">View Photo</a>
                <a href="img/gallery/tour_list_2.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
                <a href="img/gallery/tour_list_3.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
            </span>
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

                        @foreach ($data as $dataa)
                        
                        @if ($dataa->vidio == null)
                        @else
                            <iframe style="height: 405px; overflow-x:auto; "
                                src="{{$dataa->vidio}}">
                            </iframe>   
                        @endif
                            
                        @if ($dataa->thumbnaile_url == null)
                            
                        @else
                            <p><img alt="" class="img-fluid"  style="width: 800px; height: 400px;" src="{{$dataa->thumbnaile_url}}"></p>
                        @endif
                        <!-- /post meta -->
                        <div class="post-content">
                            <p>{!! $dataa->text !!}</p>
                        </div>
                    @endforeach

                        {{-- <p>Per consequat adolescens ex, cu nibh commune <strong>temporibus vim</strong>, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.</p>
                        <p>Cum et probo menandri. Officiis consulatu pro et, ne sea sale invidunt, sed ut sint <strong>blandit</strong> efficiendi. Atomorum explicari eu qui, est enim quaerendum te. Quo harum viris id. Per ne quando dolore evertitur, pro ad cibo commune.</p>
                        <h3>Instagram photos feed</h3>
                        <div id="instagram-feed" class="clearfix"></div>
                        <hr>

                        <h3>Program <small>(60 minutes)</small></h3>
                        <p>
                            Iudico omnesque vis at, ius an laboramus adversarium. An eirmod doctus admodum est, vero numquam et mel, an duo modo error. No affert timeam mea, legimus ceteros his in. Aperiri honestatis sit at. Eos aeque fuisset ei, case denique eam ne. Augue invidunt has ad, ullum debitis mea ei, ne aliquip dignissim nec.
                        </p>
                        <ul class="cbp_tmtimeline">
                            <li>
                                <time class="cbp_tmtime" datetime="09:30"><span>30 min.</span><span>09:30</span>
                                </time>
                                <div class="cbp_tmicon">
                                    1
                                </div>
                                <div class="cbp_tmlabel">
                                    <div class="hidden-xs">
                                        <img src="img/tour_plan_1.jpg" alt="" class="rounded-circle thumb_visit">
                                    </div>
                                    <h4>Interior of the cathedral</h4>
                                    <p>
                                        Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius diam vivendo ne.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <time class="cbp_tmtime" datetime="11:30"><span>2 hours</span><span>11:30</span>
                                </time>
                                <div class="cbp_tmicon">
                                    2
                                </div>
                                <div class="cbp_tmlabel">
                                    <div class="hidden-xs">
                                        <img src="img/tour_plan_2.jpg" alt="" class="rounded-circle thumb_visit">
                                    </div>
                                    <h4>Statue of Saint Reparata</h4>
                                    <p>
                                        Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius diam vivendo ne.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <time class="cbp_tmtime" datetime="13:30"><span>1 hour</span><span>13:30</span>
                                </time>
                                <div class="cbp_tmicon">
                                    3
                                </div>
                                <div class="cbp_tmlabel">
                                    <div class="hidden-xs">
                                        <img src="img/tour_plan_3.jpg" alt="" class="rounded-circle thumb_visit">
                                    </div>
                                    <h4>Huge clock decorated</h4>
                                    <p>
                                        Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius diam vivendo ne.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <time class="cbp_tmtime" datetime="14:30"><span>2 hours</span><span>14:30</span>
                                </time>
                                <div class="cbp_tmicon">
                                    4
                                </div>
                                <div class="cbp_tmlabel">
                                    <div class="hidden-xs">
                                        <img src="img/tour_plan_4.jpg" alt="" class="rounded-circle thumb_visit">
                                    </div>
                                    <h4>Vasari's fresco</h4>
                                    <p>
                                        Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius diam vivendo ne.
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <hr>
                        <p>Mea appareat omittantur eloquentiam ad, nam ei quas <strong>oportere democritum</strong>. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="bullets">
                                    <li>Dolorem mediocritatem</li>
                                    <li>Mea appareat</li>
                                    <li>Prima causae</li>
                                    <li>Singulis indoctum</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="bullets">
                                    <li>Timeam inimicus</li>
                                    <li>Oportere democritum</li>
                                    <li>Cetero inermis</li>
                                    <li>Pertinacia eum</li>
                                </ul>
                            </div>
                        </div> --}}
                        <!-- /row -->
                        
                        <!-- End Map -->
                    </section>
                    <!-- /section -->
                    <hr>

                        {{-- <div class="add-review">
                            <h5>Leave a Review</h5>
                            <form>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Name and Lastname *</label>
                                        <input type="text" name="name_review" id="name_review" placeholder="" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email *</label>
                                        <input type="email" name="email_review" id="email_review" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Rating </label>
                                        <div class="custom-select-form">
                                        <select name="rating_review" id="rating_review" class="wide">
                                            <option value="1">1 (lowest)</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5" selected>5 (medium)</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10 (highest)</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Your Review</label>
                                        <textarea name="review_text" id="review_text" class="form-control" style="height:130px;"></textarea>
                                    </div>
                                    <div class="form-group col-md-12 add_top_20">
                                        <input type="submit" value="Submit" class="btn_1" id="submit-review">
                                    </div>
                                </div>
                            </form>
                        </div> --}}
                </div>
                <!-- /col -->
                
                <aside class="col-lg-4" id="sidebar">
                    <div class="box_detail booking">
                        <div class="price">
                            <h5 class="d-inline">Contact us</h5>
                            <div class="score"><span>Good<em>350 Reviews</em></span><strong>7.0</strong></div>
                        </div>
                        <div id="message-contact-detail"></div>
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
                    </div>
                    <ul class="share-buttons">
                        <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
                        <li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Tweet</a></li>
                        <li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
                    </ul>
                </aside>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->
</main>


@endsection



