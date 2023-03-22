@extends('frontend/layouts.template')

@section('content')
<section class="hero_in general">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span>Testimonial</h1>
        </div>
    </div>
</section>

<div class="container margin_60_35">
    <div class="row">
        <div class="col-lg-12">
            @foreach ($testimonials as $data)
            <article class="blog wow fadeIn">
                <div class="row no-gutters">
                    <div class="col-lg-7">
                        <figure>
                            <a href="blog-post.html"><img
                                    src="{{$data->users->courses->image_url ?? url('https://res.cloudinary.com/djbbzawzs/image/upload/v1673540850/picture_assets_frontend/124-1247377_website-development-auckland-web-development-png-images-hd_qzz4bh.png')}}"
                                    alt="">
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
                            <p>{{Str::limit($data->review, 440)}}</p>
                            <ul>
                                <li>
                                    <div class="thumb"><img
                                            src="{{$data->users->user_details->profile_photo ?? 'https://res.cloudinary.com/djbbzawzs/image/upload/v1669355293/picture_assets_frontend/avatar_twx4zp.jpg'}}"
                                            alt="">
                                    </div>{{$data->users->name}}
                                </li>
                                <li><i class=""></i> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
            <!-- /article -->

{{$testimonials->links('vendor.pagination.bootstrap-5')}}

@if (Auth::check())
    @if (Auth::user()->testimonial ==  null)
    <div class="add-review">
        <h5>Leave a Review</h5>
        <form action="{{route('user_testimonial.store')}}" method="POST">
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
                    <textarea name="review" id="review_text" class="form-control" style="height:130px;"></textarea>
                </div>
                <div class="form-group col-md-12 add_top_20">
                    <input type="submit" value="Submit" class="btn_1" id="submit-review">
                </div>
            </div>
        </form>
    </div>
    
    @else
    <div class="add-review">
        <h5>Update Your Review</h5>
        <form action="{{route('user_testimonial.update', $data->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Name *</label>
                    <input type="text" name="name" id="name_review" disabled value="{{Auth::user()->name}}" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Email *</label>
                    <input type="email" name="email" id="email_review" disabled value="{{Auth::user()->email}}" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Rating </label>
                    <div class="custom-select-form">
                        <select name="rating" id="rating_review" class="wide">
                            <option value="" selected>{{old('rating') ?? $data->rating}}</option>
                            <option value="1">1 (lowest)</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5 (highest)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label>Your Review</label>
                    <textarea name="review" id="review_text" class="form-control" style="height:130px;">{{old('review') ?? $data->review}}</textarea>
                </div>
                <div class="form-group col-md-12 add_top_20">
                    <input type="submit" value="Submit" class="btn_1" id="submit-review">
                </div>
            </div>
        </form>
    </div>    
    @endif
@endif
<!-- /pagination -->
</div>
<!-- /col -->


<!-- /aside -->
</div>
<!-- /row -->
</div>

@endsection
