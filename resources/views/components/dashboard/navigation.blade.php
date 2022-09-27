<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{url('/dashboard')}}"><img src="{{url('assets/dashboard/img/otakkanan.png')}}" data-retina="true" alt="" width="138" height="39"></a>
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
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
                <a class="nav-link" href="{{('/dashboard/mahasiswa')}}">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                <span class="nav-link-text">User</span>
                </a>
            </li>   
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
                <a class="nav-link" href="{{('/dashboard/coursecategory')}}">
                    <i class="fa fa-address-card-o" aria-hidden="true"></i>
                <span class="nav-link-text">Courses</span>
                </a>
            </li>   
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
                <a class="nav-link" href="#">
                    <i class="fa fa-window-restore" aria-hidden="true"></i>
                <span class="nav-link-text">Quiz</span>
                </a>
            </li>    
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
                    <a class="nav-link" href="{{url('/dashboard/logbook')}}">
                        <i class="fa fa-book" aria-hidden="true"></i>
                    <span class="nav-link-text">Logbook</span>
                    </a>
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