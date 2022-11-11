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

    <div class="container margin_60_35">
        <div class="row">
            <aside class="col-lg-3" id="sidebar">
                    <div class="box_style_cat" id="faq_box">
                        <ul id="cat_nav">
                            <li><a href="#payment" class="active"><i class="icon_document_alt"></i>Introdocution</a></li>
                            <li><a href="#tips"><i class="icon_document_alt"></i>HTML</a></li>
                            <li><a href="#reccomendations"><i class="icon_document_alt"></i>CSS</a></li>
                            <li><a href="#terms"><i class="icon_document_alt"></i>Java Script</a></li>
                            <li><a href="#booking"><i class="icon_document_alt"></i>Vue JS</a></li>
                        </ul>
                    </div>
                    <!--/sticky -->
                    <p><a href="#0" class="btn_1" data-toggle="modal" data-target="#exampleModal">Launch demo modal</a></p>
            </aside>
            <!--/aside -->
            
            <div class="col-lg-9" id="faq">
                <h4 class="nomargin_top">Introdocution</h4>
                <div role="tablist" class="add_bottom_45 accordion_2" id="payment">
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i class="indicator ti-minus"></i>Introdocution Front-End Developer</a>
                            </h5>
                        </div>

                        <div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
                            <div class="card-body">
                                {{-- <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p> --}}
                                <div class="box_list">
                                    <div class="row no-gutters">
                                        <div class="col-lg-5">
                                            <figure>
                                                <small>Historic</small>
                                                <a href="{{url('/contentuser/')}}"><img src="https://res.cloudinary.com/djbbzawzs/image/upload/v1667293149/picture_assets_frontend/banner4_qxe9c8.jpg" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
                                            </figure>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="wrapper">
                                                <a href="#0" class="wish_bt"></a>
                                                <h3><a href="{{url('/contentuser/')}}">Arc Triomphe</a></h3>
                                                <p>Dicam diceret ut ius, no epicuri dissentiet philosophia vix. Id usu zril tacimates neglegentur. Eam id legimus torquatos cotidieque, usu decore percipitur definitiones ex, nihil utinam recusabo mel no.</p>
                                                <span class="price">From <strong>$54</strong> /per person</span>
                                            </div>
                                            <ul>
                                                <li><i class="icon_clock_alt"></i> 1h 30min</li>
                                                <li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo_payment" aria-expanded="false">
                                    <i class="indicator ti-plus"></i>Tools
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo_payment" class="collapse" role="tabpanel" data-parent="#payment">
                            <div class="card-body">
                                <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseThree_payment" aria-expanded="false">
                                    <i class="indicator ti-plus"></i>Prepare Course
                                </a>
                            </h5>
                        </div>
                        <div id="collapseThree_payment" class="collapse" role="tabpanel" data-parent="#payment">
                            <div class="card-body">
                                <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->
                </div>
                <!-- /accordion payment -->
                
                <h4 class="nomargin_top">HTMl</h4>
                <div role="tablist" class="add_bottom_45 accordion_2" id="tips">
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapseOne_tips" aria-expanded="true"><i class="indicator ti-plus"></i>Introdocution</a>
                            </h5>
                        </div>

                        <div id="collapseOne_tips" class="collapse" role="tabpanel" data-parent="#tips">
                            <div class="card-body">
                                <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /accordion suggestions -->
                
                <h4 class="nomargin_top">CSS</h4>
                <div role="tablist" class="add_bottom_45 accordion_2" id="reccomendations">
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapseOne_reccomendations" aria-expanded="true"><i class="indicator ti-plus"></i>Introdocution</a>
                            </h5>
                        </div>

                        <div id="collapseOne_reccomendations" class="collapse" role="tabpanel" data-parent="#reccomendations">
                            <div class="card-body">
                                <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->                </div>
                <!-- /accordion Reccomendations -->
                
                <h4 class="nomargin_top">Java Sscript</h4>
                <div role="tablist" class="add_bottom_45 accordion_2" id="terms">
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapseOne_terms" aria-expanded="true"><i class="indicator ti-plus"></i>Introdocution</a>
                            </h5>
                        </div>

                        <div id="collapseOne_terms" class="collapse" role="tabpanel" data-parent="#terms">
                            <div class="card-body">
                                <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->
                </div>
                <!-- /accordion Terms -->
                
                <h4 class="nomargin_top">Vue JS</h4>
                <div role="tablist" class="add_bottom_45 accordion_2" id="booking">
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapseOne_booking" aria-expanded="true"><i class="indicator ti-plus"></i>Introdocution</a>
                            </h5>
                        </div>

                        <div id="collapseOne_booking" class="collapse" role="tabpanel" data-parent="#booking">
                            <div class="card-body">
                                <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /card -->
                </div>
                <!-- /accordion Booking -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!--/container-->
</main>
<!--/main-->
@endsection