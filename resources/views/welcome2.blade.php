   {{-- <style>   </style> --}}
<x-guest>
    @slot('title','login')
    @slot('body')

    <!-- Start Contact Area -->
    <footer class="bg-1b060a">
        <div class="container">
            <div class="footer-content">
                <div class="logo">
                    <a href="#" class="d-inline-block"><img src="{{url('img/logo.png')}}" alt="image"></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Contact Area -->
    <!-- Start Main Banner Area -->
    <div class="home-slides owl-carousel owl-theme">
        <div class="single-banner-item banner-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
            <div class="container-fluid">
                <div class="row align-items-center">
                  

                    <div class="col-lg-7 col-md-12">
                        <div class="main-banner-image">
                            <img src="{{url('img/battle.jpg')}}" alt="image" class="bor-rad-30">
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-12">
                        <div class="main-banner-content">
                            <!-- <span class="sub-title">Enjoy The Game</span> -->
                            <div class="logo  text-center">
                                
                                <img src="{{url('img/zelda.png')}}" alt="image">
                            </div>
                            <!-- <h6>Available Now</h6> -->
                            <div class="btn-box">
                                <a href="{{ route('register') }}" class="default-btn">Register Now</a>
                                <a href="{{route('login')}}" class="optional-btn">Login Here</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

       
    </div>
    <!-- End Main Banner Area -->

    @endslot
</x-guest>
