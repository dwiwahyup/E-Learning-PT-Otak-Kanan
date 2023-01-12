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
    <div class="container" style="margin:150px auto">
        <div class="row">
            <div class="col-lg-3">
                <div class="d-flex align-items-start responsive-tab-menu">

                    <ul class="nav flex-column nav-pills nav-tabs-dropdown me-3" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        @foreach ($program as $index => $item)
                        <li class="nav-item">
                            <a class="nav-link text-start {{$index == 0 ? 'active' : ''}}" href="#"
                                id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-{{$item->slug}}"
                                role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <h6><u>{{$item->nama}}</u></h6>
                                <p>
                                    {{$item->metode_kegiatan}} <br>
                                    {{$item->jumlah_sks}} SKS, 4 Bulan <br>
                                    Bersertifikat
                                </p>
                            </a>
                        </li>
                        @endforeach
                        {{-- <li class="nav-item">
                            <a class="nav-link text-start" href="#" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-start" href="#" id="v-pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-contact" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">Contact</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="col-md-12">

                        <div class="tab-content responsive-tab-content" id="v-pills-tabContent">
                            @foreach ($program as $index => $item)
                            <div class="tab-pane fade
                                @if ($index == 0)
                                show active 
                                @endif
                            
                            " id="v-{{$item->slug}}" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                <div class="col-md-12">
                                    <img src="{{ url('assets/dashboard/img/otakkanan.png')}}" width="150" height="36"
                                        alt=""></p>
                                    <h2>{{$item->nama}}</h2>
                                    <hr>
                                    <h6>Infromasi Kegiatan</h6>
                                    <p>Jumlah SKS : <strong>{{$item->jumlah_sks}}</strong><br>
                                        Metode Kegiatan : <strong>{{$item->metode_kegiatan}}</strong><br>
                                        Periode Kegiatan : <strong>{{$item->tanggal_mulai}} -
                                            {{$item->tanggal_selesai}} (4
                                            Bulan)</strong></p>
                                    <p class="btn_home">
                                        <a href="" class="btn_1">Register Now</a>
                                    </p>
                                </div>
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
                                <h6>{{$item->kegiatan}}</h6>
                                <p>{!! $item->rincian_kegiatan !!}</p>
                                <h6>Kompetensi yang Dikembangakan</h6>
                                <div class="container">
                                    @foreach ($item->kompetensi as $data)
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn_1" data-toggle="modal"
                                        data-target="#{{$data->slug}}">
                                        {{$data->nama_kompetensi}}
                                    </button>
                                    @endforeach

                                    @foreach ($item->kompetensi as $data)

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{$data->slug}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        {{$data->nama_kompetensi}}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6>Target Pengembangan Keterampilan</h6>
                                                    <p>
                                                        {{$data->target_pengembangan_keterampilan}}
                                                    </p>
                                                    <h6>Detail Pembelajaran</h6>
                                                    <p>
                                                        {{$data->detail_pembelajaran}}
                                                    </p>
                                                    <h6>Metode Assesment</h6>
                                                    <p>
                                                        {{$data->metode_asesment}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                    <br>
                                    <h6>Kriteria Peserta</h6>
                                    <p>{!! $item->kriteria_peserta !!}</p>
                                    <h6>Infromasi Tambahan</h6>
                                    <p>{!! $item->informasi_tambahan !!}</p>


                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>

        </div>


        {{-- <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                    tabindex="0">Profile content</div>
                <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                    tabindex="0">Contact content</div> --}}

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
