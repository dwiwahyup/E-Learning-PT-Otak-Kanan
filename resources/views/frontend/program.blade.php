@extends('frontend/layouts.template')

@section('content')



<head>
    <title>Responsive Vertical Bootstrap 5 Tabs/Pills Example</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.0/darkly/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<section class="hero_in general">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span>LogBook</h1>
        </div>
    </div>
</section>

<body>
    <div class="container" style="margin:150px auto">
        <div class="d-flex align-items-start responsive-tab-menu">

            <ul class="nav flex-column nav-pills nav-tabs-dropdown me-3" id="v-pills-tab" role="tablist"
                aria-orientation="vertical">
                @foreach ($program as $index => $item)
                    <li class="nav-item">
                        <a class="nav-link text-start {{$index == 0 ? 'active' : ''}}" href="#" id="v-pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#v-{{$item->slug}}" role="tab" aria-controls="v-pills-home"
                            aria-selected="true">{{$item->nama}}</a>
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

            <div class="tab-content responsive-tab-content" id="v-pills-tabContent">
                    @foreach ($program as $index => $item)
                    <div class="tab-pane fade
                        @if ($index == 0)
                        show active 
                        @endif
                    
                    " id="v-{{$item->slug}}" role="tabpanel"
                        aria-labelledby="v-pills-home-tab" tabindex="0">
                        {{$item->nama}}
                    </div>
                    @endforeach
                </div>
                {{-- <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                    tabindex="0">Profile content</div>
                <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                    tabindex="0">Contact content</div> --}}

        </div>
    </div>
    <style>
        .responsive-tab-menu .nav-pills .nav-link.active,
        .responsive-tab-menu .nav-pills .show>.nav-link {
            color: unset;
        }

        @media (max-width: 767px) {

            .responsive-tab-content,
            .responsive-tab-menu {
                display: block !important;
            }

            .nav-pills.nav-tabs-dropdown,
            .nav-tabs-dropdown {
                border: 1px solid #dddddd;
                border-radius: 5px;
                overflow: hidden;
                position: relative;
            }

            .nav-pills.nav-tabs-dropdown::after,
            .nav-tabs-dropdown::after {
                content: "???";
                position: absolute;
                top: 8px;
                right: 15px;
                z-index: 2;
                pointer-events: none;
            }

            .nav-pills.nav-tabs-dropdown.open a,
            .nav-tabs-dropdown.open a {
                position: relative;
                display: block;
            }

            /* .nav-pills.nav-tabs-dropdown.open>li.active>a,
            .nav-tabs-dropdown.open>li.active>a {
                background-color: #eeeeee;
            } */

            .nav-pills.nav-tabs-dropdown li,
            .nav-tabs-dropdown li {
                display: block;
                padding: 0;
                vertical-align: bottom;
            }

            .nav-pills.nav-tabs-dropdown>li>a,
            .nav-tabs-dropdown>li>a {
                position: absolute;
                top: 0;
                left: 0;
                margin: 0;
                width: 100%;
                height: 100%;
                display: inline-block;
                border-color: transparent;
            }

            .nav-pills.nav-tabs-dropdown>li>a:focus,
            .nav-tabs-dropdown>li>a:focus,
            .nav-pills.nav-tabs-dropdown>li>a:hover,
            .nav-tabs-dropdown>li>a:hover,
            .nav-pills.nav-tabs-dropdown>li>a:active,
            .nav-tabs-dropdown>li>a:active {
                border-color: transparent;
            }

            /* hh */
            .nav-pills.nav-tabs-dropdown>li>a.active,
            .nav-tabs-dropdown>li>a.active {
                display: block;
                border-color: transparent;
                position: relative;
                z-index: 1;
                background: rgb(165, 165, 165);
            }

            .nav-pills.nav-tabs-dropdown>li.active>a:focus,
            .nav-tabs-dropdown>li.active>a:focus,
            .nav-pills.nav-tabs-dropdown>li.active>a:hover,
            .nav-tabs-dropdown>li.active>a:hover,
            .nav-pills.nav-tabs-dropdown>li.active>a:active,
            .nav-tabs-dropdown>li.active>a:active {
                border-color: transparent;
            }
        }

    </style>
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
