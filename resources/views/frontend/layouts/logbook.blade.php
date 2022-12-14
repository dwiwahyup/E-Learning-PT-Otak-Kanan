@extends('frontend/layouts.template')

@section('content')

<main>
    <!--/hero_in-->
    <div class="container margin_80_55">
        <div class="content mx-3">
        </div>
        <div class="row">
            <div class="col-lg-8">
                <article class="blog wow fadeIn">
                    <div class="row no-gutters ml-2 mt-2">
                        <h6><a href="{{url('/logbook/view')}}">31 Okt - 04 Nov 2022 ></a></h6>
                    </div>
                    <p class="ml-2">Minggu Ke-1</p>
                </article>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <article class="blog wow fadeIn">
                    <div class="row no-gutters ml-2 mt-2">
                        <h6><a href="{{url('/logbook/view')}}">07 Nov - 11 Nov 2022 ></a></h6>
                    </div>
                    <p class="ml-2">Minggu Ke-2</p>
                </article>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <article class="blog wow fadeIn">
                    <div class="row no-gutters ml-2 mt-2">
                        <h6><a href="{{url('/logbook/view')}}">14 Nov - 18 Nov 2022 ></a></h6>
                    </div>
                    <p class="ml-2">Minggu Ke-3</p>
                </article>
            </div>
        </div>
    </div>
</main>

@endsection
