@extends('frontend/layouts.template')

@section('content')
<main>
    <section class="hero_in general">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>Panagea blog</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-9">
                <div class="bloglist singlepost">

                    @foreach ($query as $data)
                        
                        @if ($data->vidio == null)
                        @else
                            <iframe style="height: 405px; overflow-x:auto; "
                                src="{{$data->vidio}}">
                            </iframe>   
                        @endif
                            
                        @if ($data->thumbnaile == null)
                            
                        @else
                            <p><img alt="" class="img-fluid"  style="width: 800px; height: 400px;" src="{{url('/content/thumbnaile/'.$data->thumbnaile)}}"></p>
                        @endif
                        <!-- /post meta -->
                        <div class="post-content">
                            <p>{!! $data->text !!}</p>
                        </div>
                    @endforeach

                    <!-- /post -->
                </div>
                <!-- /single-post -->
            </div>
            <!-- /col -->

            {{-- <aside class="col-lg-3">
                <div class="widget">
                    <form>
                        <div class="form-group">
                            <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
                        </div>
                        <button type="submit" id="submit" class="btn_1 rounded"> Search</button>
                    </form>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Recent Posts</h4>
                    </div>
                    <ul class="comments-list">
                        <li>
                            <div class="alignleft">
                                <a href="#0"><img src="img/blog-5.jpg" alt=""></a>
                            </div>
                            <small>11.08.2016</small>
                            <h3><a href="#" title="">Verear qualisque ex minimum...</a></h3>
                        </li>
                        <li>
                            <div class="alignleft">
                                <a href="#0"><img src="img/blog-6.jpg" alt=""></a>
                            </div>
                            <small>11.08.2016</small>
                            <h3><a href="#" title="">Verear qualisque ex minimum...</a></h3>
                        </li>
                        <li>
                            <div class="alignleft">
                                <a href="#0"><img src="img/blog-4.jpg" alt=""></a>
                            </div>
                            <small>11.08.2016</small>
                            <h3><a href="#" title="">Verear qualisque ex minimum...</a></h3>
                        </li>
                    </ul>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Blog Categories</h4>
                    </div>
                    <ul class="cats">
                        <li><a href="#">Admissions <span>(12)</span></a></li>
                        <li><a href="#">News <span>(21)</span></a></li>
                        <li><a href="#">Events <span>(44)</span></a></li>
                        <li><a href="#">Focus in the lab <span>(31)</span></a></li>
                    </ul>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Popular Tags</h4>
                    </div>
                    <div class="tags">
                        <a href="#">Information tecnology</a>
                        <a href="#">Students</a>
                        <a href="#">Community</a>
                        <a href="#">Carreers</a>
                        <a href="#">Literature</a>
                        <a href="#">Seminars</a>
                    </div>
                </div>
                <!-- /widget -->
            </aside> --}}
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!-- /main -->

@endsection