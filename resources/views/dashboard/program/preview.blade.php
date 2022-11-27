@extends('frontend/layouts.template')

@section('content')

<section class="hero_in general">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span>Faq Section</h1>
        </div>
    </div>
</section>

<div class="container margin_60_20">
    <div class="row">
        <div class="col-lg-12" id="faq">
            <div class="tabs-verical m-5">
                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link active py-4" id="v-pills-home-tab" data-toggle="pill"
                                href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"
                                name="v-pills-home-tab">
                                <h6><u>{{$program->nama}}</u></h6>
                                <p>
                                    {{$program->metode_kegiatan}} <br>
                                    {{$program->jumlah_sks}} SKS, 4 Bulan <br>
                                    Bersertifikat
                                </p>
                            </a>
                        </div>
                    </div>

                    {{-- @foreach ($collection as $item)
                        
                    @endforeach --}}
                    <div class="col-9">
                        <div class="card">
                            <div class="col-md-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <br>
                                        <br>

                                        <section id="description">
                                            <div class="col-md-12">
                                                <img src="{{ url('assets/dashboard/img/otakkanan.png')}}" width="150"
                                                    height="36" alt=""></p>

                                                <h2>{{$program->nama}}</h2>
                                                <hr>
                                                <h6>Infromasi Kegiatan</h6>
                                                <p>Jumlah SKS : <strong>{{$program->jumlah_sks}}</strong><br>
                                                    Metode Kegiatan : <strong>{{$program->metode_kegiatan}}</strong><br>
                                                    Periode Kegiatan : <strong>{{$program->tanggal_mulai}} sampai {{$program->tanggal_selesai}}</strong></p>
                                                <p class="btn_home">
                                                    <a href="" class="btn_1">Register Now</a>
                                                </p>
                                            </div>
                                            <hr>
                                            <div class="reviews-container">
                                                <div class="review-box clearfix">
                                                    <figure class="rev-thumb">
                                                        <div class="font-icon-list ">
                                                            <div class="font-icon-detail"><img
                                                                    src="{{url('frontend/img/check.png')}}"
                                                                    alt=""></span>
                                                            </div>
                                                        </div>
                                                    </figure>
                                                    <div class="rev-content">
                                                        <div class="rev-info">
                                                            <h4>Magang Bersertifikat</h4>
                                                        </div>
                                                        <div class="rev-text">
                                                            <p>
                                                                Konversi SKS dan kualitas kegiatan dijamin oleh tim
                                                                Kemendikbudristek
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="reviews-container">
                                                <div class="review-box clearfix">
                                                    <figure class="rev-thumb">
                                                        <div class="font-icon-list">
                                                            <div class="font-icon-detail"><img
                                                                    src="{{url('frontend/img/home_city.png')}}"
                                                                    alt=""></span>
                                                            </div>
                                                        </div>
                                                    </figure>
                                                    <div class="rev-content">
                                                        <div class="rev-info">
                                                            <h4>Kerja dari Rumah & Kantor</h4>
                                                        </div>
                                                        <div class="rev-text">
                                                            <p>
                                                                Kegiatan ini membutuhkan kamu untuk sesekali ke kantor
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h2>Description</h2>
                                            <h6>{{$program->kegiatan}}</h6>
                                            <p>{!! $program->rincian_kegiatan !!}</p>
                                            {{-- <p>Per consequat adolescens ex, cu nibh commune, ad sumo viris eloquentiam
                                                sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere
                                                democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an
                                                meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis,
                                                tamquam vulputate pertinacia eum at.</p>
                                            <p>Cum et probo menandri. Officiis consulatu pro et, ne sea sale invidunt,
                                                sed ut sint efficiendi. Atomorum explicari eu qui, est enim quaerendum
                                                te. Quo harum viris id. Per ne quando dolore evertitur, pro ad cibo
                                                commune.</p>
                                            <p>Donec ut pretium est. Donec non rutrum nisl, vitae ullamcorper ipsum.
                                                Vivamus molestie, lacus vitae ornare vestibulum, nisi diam maximus diam,
                                                porttitor tempor massa justo in sem. Pellentesque et velit massa.
                                                Vivamus leo nunc, scelerisque at auctor quis, imperdiet sed urna. Orci
                                                varius natoque penatibus et magnis dis parturient montes, nascetur
                                                ridiculus mus. Sed volutpat gravida felis, fringilla varius eros dapibus
                                                vel. Maecenas eu urna turpis. Vivamus eget quam sit amet purus vulputate
                                                condimentum. Aliquam fermentum nec nulla in imperdiet. Etiam tincidunt
                                                tempus nunc bibendum porttitor. Etiam quis massa nec lectus eleifend
                                                facilisis. Morbi euismod odio at massa lacinia, id cursus augue
                                                ultrices.</p> --}}


                                            <h6>Kompetensi yang Dikembangakan</h6>
                                            
                                            <div class="container">
                                                @foreach ($program->Kompetensi as $data)
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn_1" data-toggle="modal"
                                                    data-target="#{{$data->slug}}">
                                                    {{-- Problem Solving dan Berpikir Kritis --}} 
                                                    {{$data->nama_kompetensi}}
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="{{$data->slug}}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                                    {{$data->nama_kompetensi}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6>Target Pengembangan Keterampilan</h6>
                                                                <p>{{$data->target_pengembangan_keterampilan}}</p>
                                                                <h6>Detail Pembelajaran</h6>
                                                                <p>{{$data->detail_pembelajaran}}</p>
                                                                <h6>Metode Assesment</h6>
                                                                <p>{{$data->metode_asesment}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <button type="button" class="btn btn_1" data-toggle="modal"
                                                    data-target="#exampleModalCenter1">
                                                    Etika Kerja dan Profesionalisme
                                                </button> --}}
                                                <!-- Modal -->
                                                {{-- <div class="modal fade" id="exampleModalCenter1" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Etika
                                                                    Kerja dan Profesionalisme</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6>Target Pengembangan Keterampilan</h6>
                                                                <p>sssssssssssssss</p>
                                                                <h6>Detail Pembelajaran</h6>
                                                                <p>sssssssssssssss</p>
                                                                <h6>Metode Assesment</h6>
                                                                <p>sssssssssssssss</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                @endforeach
                                            </div>
                                            
                                            <br>
                                            <h6>Kriteria Peserta</h6>
                                            <p>{!! $program->kriteria_peserta !!}</p>
                                            {{-- <ul class="list-unstyled">
                                                <li>Jurusan: Teknik Informatika/Sistem Informasi/Ilmu Komputer/Manajemen
                                                    Informatika/Teknik Komputer/Teknologi Informasi/Software
                                                    Engineering/Rekayasa Perangkat Lunak</li>
                                                <li>Jenjang: D3 / D4 / S1</li>
                                                <li>Semester: Semester 5 s.d 7 (D4/S1), Semester 4 s.d 6 (D3)</li>
                                                <br>
                                                <li>Kriteria hard skills:
                                                    <ul>
                                                        <li>- Memiliki kemampuan analisis</li>
                                                        <li>- Dapat bekerja dalam tim</li>
                                                        <li>- Memiliki inisiatif tinggi</li>
                                                    </ul>
                                                </li>
                                                <br>
                                                <li>Kriteria Lainnya:
                                                    <ul>
                                                        <li>- Memiliki attitude baik</li>
                                                        <li>- Sehat jasmani dan rohani</li>
                                                        <li>- Tidak merokok</li>
                                                        <li>- Tidak mengkonsumsi/menggunakan narkoba, psikotropika,
                                                            serta zat-zat adiktif lainnya</li>
                                                    </ul>
                                                </li>
                                            </ul> --}}
                                            <h6>Infromasi Tambahan</h6>
                                        </section>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        Bar
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                        aria-labelledby="v-pills-messages-tab">
                                        FooBar
                                    </div>
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
