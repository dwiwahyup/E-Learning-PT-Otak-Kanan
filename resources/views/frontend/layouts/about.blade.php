@extends('frontend/layouts.template')

@section('content')

<main>
		
		<section class="hero_in general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>About</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->
        <div class="container margin_80_55">
            <div class="main_title_2">
                <h2>PT OTAK KANAN GROUP</h2>
				<p>PT. OTAK KANAN is a company engaged in the field of creative </br>
                 located in the city of Surabaya and was officially named PT. OTAK KANAN in 2009.</p>
			</div>
			<div class="row">
                <div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#0">
						<i class="pe-7s-culture"></i>
						<h3>Head Office:</h3>
						<p>Graha Pena suite 1503 </br>
                        Jl. Ahmad Yani 88 Surabaya</p>
                        </br>
                        </br>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#0">
						<i class="pe-7s-credit"></i>
						<h3>Bank Account:</h3>
						<p>BCA: 216 99 36999 </br>
                        MANDIRI: 14200 499 36999</p>
                        </br>
                        </br>
					</a>
				</div>
				<div class="col-lg-4 col-md-6">
					<a class="box_feat" href="#0">
						<i class="pe-7s-help2"></i>
						<h3>Call Center:</h3>
						<p>Telp/Fax: (031) 828 61 55 </br>
                        SMS: 0856 88 36999 </br>
                        HP: 085 77 59 36999 </br>
                        Email: info@otakkanan.co.id</p>
					</a>
				</div>
			</div>
		</div>
		<div class="bg_color_1">
			<div class="container margin_80_55">
				<div class="main_title_2">
					<h2>LEGALITAS USAHA</h2>
				</div>
				<div class="row justify-content-between">
					<div class="col-lg-6 wow" data-wow-offset="150">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<img src="{{url('/frontend/img/g1.jpg')}}" class="img-fluid" alt="">
						</figure>
					</div>
					<div class="col-lg-5">
						<p align="justify"><strong>Akta Notaris :</strong> </br>
                        Notaris : Dicky Dwiharnanto, SH. </br>  
                        Akta Pendirian Perseroan Terbatas “PT Otak Kanan” Nomor 01 tanggal 21 Desember 2009</p>
						<p align="justify"><strong>Badan Hukum Perseroan : </strong> </br>
                        Keputusan Menteri Hukum dan HAM RI Nomor AHU-02110.AH.01.01.Tahun 2010 Tanggal 14 Januari 2010
                        Daftar Perseroan Nomor AHU-0003117.AH.01.09.Tahun 2010 Tanggal 14 Januari 2010</p>
					</div>
				</div>
				<!--/row-->
			</div>
			<!--/container-->
		</div>
		<!--/bg_color_1-->
	</main>

@endsection