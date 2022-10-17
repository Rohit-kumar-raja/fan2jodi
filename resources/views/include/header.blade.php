<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="zelda-responsive-nav">
        <div class="container">
            <div class="zelda-responsive-menu">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ url('img/logo2.png') }}" alt="logo" width="45px"><span
                            class="f-28 text-uppercase">&ensp;{{ $title }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="zelda-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="logo">
                </a>

                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">
                
                        <li class="nav-item"><a href="{{ route('player') }}" class="nav-link active">Player List</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('wallet') }}" class="nav-link active">Wallet</a></li>
                        <li class="nav-item"><a href="{{ route('add_cash') }}" class="nav-link active">Add Cash</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('account') }}" class="nav-link active">My Account</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('contest') }}" class="nav-link active">My Contest</a>
                        </li>
                    
                    </ul>

                    <div class="others-option align-items-center">
            
                        <div class="option-item">
                            <div class="side-menu-btn">
                                <i class="flaticon-null-2" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                            </div>
                        </div>
                    </div>
                    <div class="dark-version-btn">
                        <a href=""> <i class="fas fa-user-circle"></i> </a>
                    </div>
                    <div class="dark-version-btn">
                        <label id="switch" class="switch">
                            <input type="checkbox" onchange="toggleTheme()" id="slider">
                            <span class="slider round"></span>
                        </label>
                    </div>
                 
                </div>
            </nav>
        </div>
    </div>
</div>
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
