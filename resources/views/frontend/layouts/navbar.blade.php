<header class="header menu_fixed">
    <div id="preloader"><div data-loader="circle-side"></div></div><!-- /Page Preload -->
    <div id="logo">
        <a href="{{url('/')}}">
            <img src="{{ url('assets/dashboard/img/otakkanan.png')}}" width="150" height="36" alt="" class="logo_normal">
        {{-- <img src="{{ url('frontend/img/logo_sticky.svg')}}" width="150" height="36" alt="" class="logo_sticky"> --}}
        </a>
    </div>
    {{-- <ul id="top_menu">
        <li><a href="cart-1.html" class="cart-menu-btn" title="Cart"><strong>4</strong></a></li>
        <li><a href="#sign-in-dialog" id="sign-in" class="login" title="Sign In">Sign In</a></li>
        <li><a href="wishlist.html" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>
    </ul> --}}
    <!-- /top_menu -->
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
            <li><span><a href="#0">Course</a></span>
                <ul>
                    <li>
                        <span><a href="#0">Front-End Developer</a></span>
                        <ul>
                            <li><a href="tours-grid-isotope.html">HTML 1</a></li>
                            <li><a href="tours-grid-sidebar.html">HTML 2</a></li>
                            <li><a href="tours-grid-sidebar-2.html">CSS</a></li>
                            <li><a href="tours-grid.html">Framework</a></li>
                        </ul>
                    </li>
                    <li>
                        <span><a href="#0">Back-End Developer</a></span>
                        <ul>
                            <li><a href="tours-list-isotope.html">Database</a></li>
                            <li><a href="tours-list-sidebar.html">MySql</a></li>
                            <li><a href="tours-list-sidebar-2.html">MongoDB</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><span><a href="{{url('/about')}}">About</a></span>
            </li>
            <li><span><a href="#0">Account</a></span>
                <ul>
                    <li><a href="{{url('/profile')}}">Profile</a></li>
                    <li><a href="{{url('/logbook')}}">LogBook</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>