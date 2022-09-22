<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="#"><img src="{{url('assets/dashboard/img/otakkanan.png')}}" data-retina="true" alt="" width="138" height="39"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{url('/dashboard')}}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Mahasiswa">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMylistings" data-parent="#mylistings">
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                    <span class="nav-link-text">Data Mahasiswa</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMylistings">
                    <li>
                        <a href="{{url('/mahasiswa/create')}}">Mahasiswa <span class="badge badge-pill badge-primary"></span></a>
                    </li>
                    </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Materi">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMateri" data-parent="#Materi">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <span class="nav-link-text">Materi</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMateri">
                    <li>
                        <a href="{{url('/content')}}">Data Materi</a>
                    </li>
                    <li>
                        <a href="{{url('/content/create')}}">Tambah Materi</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Kelas">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseKelas" data-parent="#Kelas">
                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                    <span class="nav-link-text">Kelas</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseKelas">
                    <li>
                        <a href="{{url('/class')}}">Data Kelas</a>
                    </li>
                    </ul>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>