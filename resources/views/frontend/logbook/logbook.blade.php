@extends('frontend/layouts.template')

@section('content')

<div class="container margin_60_35">
    <div class="container margin_60_35">
        <div class="row">
            <aside class="col-lg-3" id="sidebar">
                <div class="box_style_cat" id="faq_box">
                    <ul id="cat_nav">
                        <li><a href="#payment" class="active"><i class="icon_document_alt"></i>31 Okt - 04 Nov 2022 </a>
                        </li>
                        <p class="ml-2">Minggu Ke-1</p>
                    </ul>
                </div>
                <!--/sticky -->
            </aside>
            <div class="col-lg-9" id="faq">
                <div role="tablist" class="add_bottom_45 accordion_2" id="payment">
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i
                                        class="indicator ti-minus"></i>31 Oktober 2022</a>
                            </h5>
                        </div>
                        <div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
                            <div class="row no-gutters ml-2 mt-2">
                            </div>
                            <p class=""><a href="{{url('/my_logbooks/create')}}" class="btn_1 rounded">Buat Laporan
                                    Harian</a></p>
                            <p class="text-center">Laporan baru bisa dibuat setelah kamu mengisi semua laporan harian.
                            </p>
                        </div>
                    </div>
                    <!-- /card -->
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i
                                        class="indicator ti-minus"></i>01 November 2022</a>
                            </h5>
                        </div>
                        <div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
                            <div class="row no-gutters ml-2 mt-2">
                            </div>
                            <p class="btn-center"><a href="{{url('/my_logbooks/create')}}" class="btn_1 rounded">Buat
                                    Laporan Harian</a></p>
                            <p class="text-center">Laporan baru bisa dibuat setelah kamu mengisi semua laporan harian.
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i
                                        class="indicator ti-minus"></i>02 November 2022</a>
                            </h5>
                        </div>
                        <div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
                            <div class="row no-gutters ml-2 mt-2">
                            </div>
                            <p class="btn-center"><a href="{{url('/my_logbooks/create')}}" class="btn_1 rounded">Buat
                                    Laporan Harian</a></p>
                            <p class="text-center">Laporan baru bisa dibuat setelah kamu mengisi semua laporan harian.
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i
                                        class="indicator ti-minus"></i>03 November 2022</a>
                            </h5>
                        </div>
                        <div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
                            <div class="row no-gutters ml-2 mt-2">
                            </div>
                            <p class="btn-center"><a href="{{url('/my_logbooks/create')}}" class="btn_1 rounded">Buat
                                    Laporan Harian</a></p>
                            <p class="text-center">Laporan baru bisa dibuat setelah kamu mengisi semua laporan harian.
                            </p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i
                                        class="indicator ti-minus"></i>04 November 2022</a>
                            </h5>
                        </div>
                        <div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
                            <div class="row no-gutters ml-2 mt-2">
                            </div>
                            <p class="btn-center"><a href="{{url('/my_logbooks/create')}}" class="btn_1 rounded">Buat
                                    Laporan Harian</a></p>
                            <p class="text-center">Laporan baru bisa dibuat setelah kamu mengisi semua laporan harian.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
