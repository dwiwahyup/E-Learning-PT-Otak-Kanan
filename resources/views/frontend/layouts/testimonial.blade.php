@extends('frontend/layouts.template')

@section('content')

<div class="container margin_60_35">
    <div class="row">
        <div class="col-lg-12">
            @foreach ($testimonials as $data)
                <article class="blog wow fadeIn">
                    <div class="row no-gutters">
                        <div class="col-lg-7">
                            <figure>
                                <a href="blog-post.html"><img src="{{ url('frontend/img/banner3.jpg')}}" alt="">
                                </a>
                            </figure>
                        </div>
                        <div class="col-lg-5">
                            <div class="post_info">
                                <small>{{$data->created_at->toFormattedDateString()}}</small>
                                <div class="cat_star">
                                    @for ($i = 0; $i < $data->rating; $i++)
                                    <i class="icon_star"></i>
                                    @endfor
                                    {{-- <i class="icon_star"></i><i class="icon_star"></i><i
                                        class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i> --}}
                                    </div>
                                <h3><a href="blog-post.html">{{$data->name}}</a></h3>
                                <p>{{$data->review}}</p>
                                <ul>
                                    <li>
                                        <div class="thumb"><img src="{{$data->users->user_details->profile_photo ?? 'https://res.cloudinary.com/djbbzawzs/image/upload/v1669355293/picture_assets_frontend/avatar_twx4zp.jpg'}}" alt="">
                                        </div>{{$data->users->name}}
                                    </li>
                                    <li><i class="icon_comment_alt"></i> 20</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
            <!-- /article -->

            {{-- <article class="blog wow fadeIn">
                <div class="row no-gutters">
                    <div class="col-lg-7">
                        <figure>
                            <a href="blog-post.html"><img src="{{ url('frontend/img/banner5.jpg')}}" alt="">
                            </a>
                        </figure>
                    </div>
                    <div class="col-lg-5">
                        <div class="post_info">
                            <small>20 Nov. 2017</small>
                            <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i
                                    class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
                            <h3><a href="blog-post.html">Firman Wahyudi</a></h3>
                            <p>Magang di PT. Otak Kanan sangat seru dan materi yang disampaikan sangat jelas.
                                Penyampaian materi juga diajarkan terlebih dahulu kemudian dicoba untuk prakter. Terima
                                kasih PT. Otak Kanan.</p>
                            <ul>
                                <li>
                                    <div class="thumb"><img src="{{ url('assets/dashboard/img/avatar.jpg')}}" alt="">
                                    </div>Firman Wahyudi
                                </li>
                                <li><i class="icon_comment_alt"></i> 20</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </article> --}}
            <!-- /article -->

            {{-- <article class="blog wow fadeIn">
                <div class="row no-gutters">
                    <div class="col-lg-7">
                        <figure>
                            <a href="blog-post.html"><img src="{{ url('frontend/img/banner3.jpg')}}" alt="">
                            </a>
                        </figure>
                    </div>
                    <div class="col-lg-5">
                        <div class="post_info">
                            <small>20 Nov. 2017</small>
                            <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i
                                    class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
                            <h3><a href="blog-post.html">Firman Wahyudi</a></h3>
                            <p>Magang di PT. Otak Kanan sangat seru dan materi yang disampaikan sangat jelas.
                                Penyampaian materi juga diajarkan terlebih dahulu kemudian dicoba untuk prakter. Terima
                                kasih PT. Otak Kanan.</p>
                            <ul>
                                <li>
                                    <div class="thumb"><img src="{{ url('assets/dashboard/img/avatar.jpg')}}" alt="">
                                    </div>Firman Wahyudi
                                </li>
                                <li><i class="icon_comment_alt"></i> 20</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </article> --}}
            <!-- /article -->

            {{-- <article class="blog wow fadeIn">
                <div class="row no-gutters">
                    <div class="col-lg-7">
                        <figure>
                            <a href="blog-post.html"><img src="{{ url('frontend/img/banner5.jpg')}}" alt="">
                            </a>
                        </figure>
                    </div>
                    <div class="col-lg-5">
                        <div class="post_info">
                            <small>20 Nov. 2017</small>
                            <div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i
                                    class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
                            <h3><a href="blog-post.html">Firman Wahyudi</a></h3>
                            <p>Magang di PT. Otak Kanan sangat seru dan materi yang disampaikan sangat jelas.
                                Penyampaian materi juga diajarkan terlebih dahulu kemudian dicoba untuk prakter. Terima
                                kasih PT. Otak Kanan.</p>
                            <ul>
                                <li>
                                    <div class="thumb"><img src="{{ url('assets/dashboard/img/avatar.jpg')}}" alt="">
                                    </div>Firman Wahyudi
                                </li>
                                <li><i class="icon_comment_alt"></i> 20</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </article> --}}
            <!-- /article -->

            <nav aria-label="...">
                <ul class="pagination pagination-sm">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

            @if (Auth::check())
                <div class="add-review">
                    <h5>Leave a Review</h5>
                    <form action="{{route('user_testimonial.store')}}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Name *</label>
                                <input type="text" name="name" id="name_review" value="{{Auth::user()->name}}" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email *</label>
                                <input type="email" name="email" id="email_review" value="{{Auth::user()->email}}" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Rating </label>
                                <div class="custom-select-form">
                                    <select name="rating" id="rating_review" class="wide">
                                        <option value="1">1 (lowest)</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5" selected>5 (highest)</option>
                                        {{-- <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10 (highest)</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Your Review</label>
                                <textarea name="review" id="review_text" class="form-control"
                                    style="height:130px;"></textarea>
                            </div>
                            <div class="form-group col-md-12 add_top_20">
                                <input type="submit" value="Submit" class="btn_1" id="submit-review">
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            <!-- /pagination -->
        </div>
        <!-- /col -->


        <!-- /aside -->
    </div>
    <!-- /row -->
</div>

@endsection
