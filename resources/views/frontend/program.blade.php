@extends('frontend/layouts.template')

@section('content')

<head>
    <title>Responsive Vertical Bootstrap 5 Tabs/Pills Example</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.0/darkly/bootstrap.min.css"> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ url('frontend/css/custom.css')}}" rel="stylesheet">
</head>

<section class="hero_in general">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span>Program</h1>
        </div>
    </div>
</section>



<body>
    <div class="container" style="margin:90px auto">

        <div class="row">
            <div class="col-lg-3">
                <div class="d-flex align-items-start responsive-tab-menu">
                    <ul class="nav flex-column nav-pills nav-tabs-dropdown me-3" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        @foreach ($program as $data)
                        <li class="nav-item">
                            <a class="nav-link text-start" href="#v-pills-{{$data->slug}}"
                                id="v-pills-{{$data->slug}}-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-{{$data->slug}}" role="tab"
                                aria-controls="v-pills-{{$data->slug}}" aria-selected="true">
                                <h6><u>{{$data->nama}}</u></h6>
                                <p>
                                    {{$data->metode_kegiatan}} <br>
                                    {{$data->jumlah_sks}} SKS, 4 Bulan <br>
                                    Bersertifikat
                                </p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="col-md-12" >
                        <div class="tab-content responsive-tab-content" id="v-pills-tabContent">
                            @foreach ($program as $data)
                            <div class="tab-pane fade show" id="v-pills-{{$data->slug}}" role="tabpanel"
                                aria-labelledby="v-pills-{{$data->slug}}-tab" tabindex="0">
                                {{-- <br><br> --}}
                                <div class="col-md-12" style="padding-top: 30px">
                                    <img src="{{ url('assets/dashboard/img/otakkanan.png')}}" width="150" height="36"
                                        alt=""></p>
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
                                                        src="{{url('frontend/img/check.png')}}" alt=""></span>
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
                                                        src="{{url('frontend/img/home_city.png')}}" alt=""></span>
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
                                    <div class="modal fade" id="{{$item->slug}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script>
        $('.nav-tabs-dropdown')
            .on("click", ".nav-link:not('.active')", function (event) {
                $(this).closest('ul').removeClass("open");
            })
            .on("click", ".nav-link.active", function (event) {
                $(this).closest('ul').toggleClass("open");
            });

    </script>
</body>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1VDDWMRSTH"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-1VDDWMRSTH');

</script>
<script>
    try {
        fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {
            method: 'HEAD',
            mode: 'no-cors'
        })).then(function (response) {
            return true;
        }).catch(function (e) {
            var carbonScript = document.createElement("script");
            carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
            carbonScript.id = "_carbonads_js";
            document.getElementById("carbon-block").appendChild(carbonScript);
        });
    } catch (error) {
        console.log(error);
    }

</script>
@endsection
