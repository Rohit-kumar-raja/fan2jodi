<style>

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Start Navbar Area -->
<div class="navbar-area">

    <section class="top-nav ">
        <div class="logos">
            <a href="{{ route('home') }}"> <img src="{{ asset('img/logo2.png') }}" alt="logo" width="45px"> <span
                    class="f-28 text-uppercase">&ensp;{{ $title }}</span></a>

        </div>
        <ul>
            <li class="nav-item "><a href="{{ route('account') }}" class="nav-link text-white">MY ACCOUNT</a>
            <li class="nav-item "><a href="{{ route('contest.my') }}" class="nav-link text-white">My Contest</a></li>
            <li class="nav-item "><a href="{{ route('wallet') }}" class="nav-link text-white">WALLET</a></li>
            <li class="nav-item "><a href="{{ route('withdraw') }}" class="nav-link text-white">Withdraw</a></li>
            <li class="nav-item "><a href="{{ route('wallet.transaction')}}"
                    class="nav-link text-white">Transaction's</a></li>
            <li class="nav-item "><a href="{{ route('add_cash') }}" class="nav-link text-white">ADD CASH</a></li>
            @if(!empty(Auth::user()))
                <li class="nav-item "> 
                    <a href="{{ route('logout') }}" class="nav-link text-red" 
                    onclick="event.preventDefault();
            document.getElementById('logout-form1').submit();">
                {{ __('Logout') }}</a>
            </li>
            <form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else
            <li class="nav-item "><a href="{{ route('login') }}" class="nav-link text-red">Login</a>
            </li>
            @endif
        </ul>
    </section>

    <div class="zelda-responsive-nav">
        <div class="container">
            <div class="zelda-responsive-menu">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="logo" width="45px"><span
                            class="f-28 text-uppercase">&ensp;{{ $title }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="side-menu-btn">
                    <i class="fa fa-bars" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Navbar Area -->
<!-- End Navbar Area -->



<!-- Search Overlay -->
<div class="search-overlay">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>

            <div class="search-overlay-close">
                <span class="search-overlay-close-line"></span>
                <span class="search-overlay-close-line"></span>
            </div>
        </div>
    </div>
</div>
<!-- End Search Overlay -->

<!-- Sidebar Modal -->
<div class="sidebarModal modal right fade" id="sidebarModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal"><i class='bx bx-x'></i></button>

            <div class="modal-body extra">
                <div class="logo">
                    <a href="{{ route('home') }}" class="d-inline-block"><img width="50px"
                            src="{{ asset('img/logo.png') }}" alt="image"></a>
                </div>

                <div class="white-bor mt-3">
                    <ul class="navbar-nav black-text">
                        <li class="nav-item "><a href="{{ route('account') }}" class="nav-link text-red">MY ACCOUNT</a>
                        <li class="nav-item "><a href="{{ route('contest.my') }}" class="nav-link text-red">My Contest</a>
                        </li>
                        <li class="nav-item "><a href="{{ route('wallet') }}" class="nav-link text-red">WALLET</a></li>
                        <li class="nav-item "><a href="{{ route('withdraw') }}" class="nav-link text-red">Withdraw</a>
                        </li>
                        <li class="nav-item "><a href="{{ route('wallet.transaction') }}"
                                class="nav-link text-red">Transaction's</a></li>
                        <li class="nav-item "><a href="{{ route('add_cash') }}" class="nav-link text-red">ADD CASH</a>
                        </li>
                        @if(!empty(Auth::user()))
                        <li class="nav-item "> 
                            <a href="{{ route('logout') }}" class="nav-link text-red" 
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @else
                        <li class="nav-item "><a href="{{ route('login') }}" class="nav-link text-red">Login</a>
                        </li>
                        @endif
                    </ul>
                </div>
                {{-- <div class="sidebar-contact-info">
                    <h2>
                        <a href="tel:+8802419268615">+880 241 926 8615</a>
                        <span>OR</span>
                        <a href="/cdn-cgi/l/email-protection#e9818c858586a9938c858d88c78a8684"><span
                                class="__cf_email__"
                                data-cfemail="2f474a4343406f554a434b4e014c4042">[email&#160;protected]</span></a>
                    </h2>
                </div> --}}

                <!-- <ul class="social-list">
                    <li><span>Follow Us On:</span></li>
                    <li><a href="#" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                    <li><a href="#" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                    <li><a href="#" target="_blank"><i class='bx bxl-youtube'></i></a></li>
                    <li><a href="#" target="_blank"><i class='bx bxl-twitch'></i></a></li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
<!-- End Sidebar Modal -->


<style>
    .extra {
        text-align: center;
        padding: 10px 0px 0px !important;
    }

    .modal.right.fade.show .modal-dialog {
        right: 0;
        width: 244px;
    }

    .fa-bars {
        font-size: 38px;
    }

    .top-nav ul {
        margin-top: 20px
    }

    .nav-link {
        display: block;
        padding: 0rem 0rem;
    }
</style>
