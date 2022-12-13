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
                            @foreach ($program as $data)
                            <a class="nav-link py-4" id="v-pills-{{$data->slug}}-tab" data-toggle="pill"
                                href="#v-pills-{{$data->slug}}" role="tab" aria-controls="v-pills-{{$data->slug}}"
                                aria-selected="false" name="v-pills-{{$data->slug}}-tab">
                                <h6><u>{{$data->nama}}</u></h6>
                                <p>
                                    {{$data->metode_kegiatan}} <br>
                                    {{$data->jumlah_sks}} SKS, 4 Bulan <br>
                                    Bersertifikat
                                </p>
                            </a>
                            @endforeach
                        </div>

                    </div>

                    <div class="col-9">
                        <div class="card">
                            <div class="col-md-12">

                                {{-- 
                                    role : 
                                    1. jika tidak ingin tampil semua data saat pertama reload, hilangkan active (tapi background putih kanan tidak tampi)
                                    2. jika show di hilangkan, background putih sebelah kanan akan tampil. tapi memanjang kebawah
                                    3. jika show active di hilangkan, background putih tidak muncul
                                    --}}

                                <div class="tab-content" id="v-pills-tabContent">
                                    @foreach ($program as $data)
                                    <div class="tab-pane fade show " id="v-pills-{{$data->slug}}" role="tabpanel"
                                        aria-labelledby="v-pills-{{$data->slug}}-tab">
                                        <br>
                                        <br>
                                        <section id="description">
                                            <div class="col-md-12">
                                                <img src="{{ url('assets/dashboard/img/otakkanan.png')}}" width="150"
                                                    height="36" alt=""></p>
                                                <h2>{{$data->nama}}</h2>
                                                <hr>
                                                <h6>Infromasi Kegiatan</h6>
                                                <p>Jumlah SKS : <strong>{{$data->jumlah_sks}}</strong><br>
                                                    Metode Kegiatan : <strong>{{$data->metode_kegiatan}}</strong><br>
                                                    Periode Kegiatan : <strong>{{$data->tanggal_mulai}} -
                                                        {{$data->tanggal_selesai}} (4
                                                        Bulan)</strong></p>
                                                @if (Auth::user()->courses == null)
                                                    <p class="btn_home">
                                                        <form action="/program/register/{{$data->slug}}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn_1">Register Now</button>
                                                        </form>
                                                    </p>
                                                @endif
                                                {{-- @dd(Auth->user()) --}}
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
                                            <h6>{{$data->kegiatan}}</h6>
                                            <p>{!! $data->rincian_kegiatan !!}</p>


                                            <h6>Kompetensi yang Dikembangakan</h6>
                                            <div class="container">
                                                @foreach ($data->kompetensi as $item)
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn_1" data-toggle="modal"
                                                    data-target="#{{$item->slug}}">
                                                    {{$item->nama_kompetensi}}
                                                </button>
                                                @endforeach

                                                @foreach ($data->kompetensi as $item)
                                                    
                                                <!-- Modal -->
                                                <div class="modal fade" id="{{$item->slug}}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                                    {{$item->nama_kompetensi}}
                                                                </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h6>Target Pengembangan Keterampilan</h6>
                                                                <p>
                                                                    {{$item->target_pengembangan_keterampilan}}
                                                                </p>
                                                                <h6>Detail Pembelajaran</h6>
                                                                <p>
                                                                    {{$item->detail_pembelajaran}}
                                                                </p>
                                                                <h6>Metode Assesment</h6>
                                                                <p>
                                                                    {{$item->metode_asesment}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                            <br>
                                            <h6>Kriteria Peserta</h6>
                                            <p>{!! $data->kriteria_peserta !!}</p>
                                            <h6>Infromasi Tambahan</h6>
                                            <p>{!! $data->informasi_tambahan !!}</p>
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
                                    @endforeach
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
