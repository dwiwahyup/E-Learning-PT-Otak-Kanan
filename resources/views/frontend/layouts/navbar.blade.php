<header class="header menu_fixed">
    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Page Preload -->
    <div id="logo">
        <a href="{{url('/')}}">
            <img src="{{ url('assets/dashboard/img/otakkanan.png')}}" width="150" height="36" alt=""
                class="logo_normal">
        </a>
    </div>
    <a href="#menu" class="btn_mobile">
        <div class="hamburger hamburger--spin" id="hamburger">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </a>
    <nav id="menu" class="main-menu">
        <ul>
            <li><span><a href="{{url('/')}}">Home</a></span></li>
            <li><span><a href="{{url('/program/')}}">Program</a></span></li>
            <li><span><a href="{{url('/allcourse/')}}">Course</a></span></li>
            <li><span><a href="{{url('/about')}}">About</a></span></li>
            @guest
            <li><span><a href="{{ route('login') }}">Login</a></span>
                @endguest
                @auth()
            <li><span><a href="#0">Account</a></span>
                <ul>
                    <li><a href="{{route('MyProfile.index')}}">Profile</a></li>
                    <li><a href="{{route('my_logbooks.index')}}">LogBook</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                        @if (Auth::user()->roles == "USER")
                            <li><a href="{{route('MyProfile.index')}}">Profile</a></li>
                            <li><a href="{{route('my_logbooks.index')}}">LogBook</a></li>
                        @endif
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </ul>
            </li>
        </ul>
    </nav>
</header>
