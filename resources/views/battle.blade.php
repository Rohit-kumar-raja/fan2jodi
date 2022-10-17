<x-layout>
    @slot('title', 'battle')
    @slot('body')


        <!-- Start Main Banner Area -->
        <div class="home-slides owl-carousel owl-theme">
            <div class="single-banner-item banner-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div class="main-banner-content">
                                <div class="logo">
                                    {{-- <img src="{{asset('img/zelda.png')}}" alt="image"> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-12">
                            <div class="main-banner-image">
                                {{-- <img src="assets/img/banner-img1.png" alt="image"> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-banner-item banner-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div class="main-banner-content">
                                <div class="logo">
                                    {{-- <img src="{{asset('img/zelda.png')}}" alt="image"> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-12">
                            <div class="main-banner-image">
                                {{-- <img src="assets/img/banner-img1.png" alt="image"> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-banner-item banner-bg3 jarallax" data-jarallax='{"speed": 0.3}'>
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div class="main-banner-content">
                                <div class="logo">
                                    {{-- <img src="{{asset('img/zelda.png')}}" alt="image"> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-12">
                            <div class="main-banner-image">
                                {{-- <img src="assets/img/banner-img1.png" alt="image"> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
      

        <!-- Start Products Details Area -->
        <section class="products-details-area white-bg">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-12 col-md-12">
                        <div class="products-details-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item"><a class="text-black nav-link active" id="description-tab"
                                        data-bs-toggle="tab" href="#description" role="tab"
                                        aria-controls="description">Upcoming</a></li>
                                <li class="nav-item"><a class="text-black nav-link" id="reviews-tab" data-bs-toggle="tab"
                                        href="#reviews" role="tab" aria-controls="reviews">Finished</a></li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    <div class="single-matches-box">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12 col-md-12">
                                                {{-- <img src="{{asset('img/team1.png')}}" class="wow animate__animated animate__fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms" alt="image"> --}}
                                                <div class="flex-container mt--10">
                                                    <div class="flex-child c1">
                                                        <img src="{{ asset('img/t1.png') }}" alt="image">
                                                    </div>
                                                    <div class="flex-child c2">
                                                        <div class="content blue-bg text-center">
                                                            <h3 class="text-white mb-0">SA vs SL T20</h3>
                                                            <div id="timer" class="flex-wrap d-flex justify-content-center text-white">
                                                                <div id="days" class="align-items-center flex-column d-flex justify-content-center"></div>D &nbsp;
                                                                <div id="hours" class="align-items-center flex-column d-flex justify-content-center"></div>H &nbsp;
                                                                <div id="minutes" class="align-items-center flex-column d-flex justify-content-center"></div>M &nbsp;
                                                                <div id="seconds" class="align-items-center flex-column d-flex justify-content-center"></div>S &nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-child c3">
                                                        <img src="{{ asset('img/t2.png') }}" alt="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                {{-- <img src="{{asset('img/team1.png')}}" class="wow animate__animated animate__fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms" alt="image"> --}}
                                                <div class="flex-container mt--10">
                                                    <div class="flex-child c1">
                                                        <img src="{{ asset('img/t3.png') }}" alt="image">
                                                    </div>
                                                    <div class="flex-child c2">
                                                        <div class="content blue-bg text-center">
                                                            <h3 class="text-white">ENG vs IND TEST</h3>
                                                            <div id="timer" class="flex-wrap d-flex justify-content-center text-white">
                                                                <div id="days" class="align-items-center flex-column d-flex justify-content-center"></div>
                                                                <div id="hours" class="align-items-center flex-column d-flex justify-content-center"></div>
                                                                <div id="minutes" class="align-items-center flex-column d-flex justify-content-center"></div>
                                                                <div id="seconds" class="align-items-center flex-column d-flex justify-content-center"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-child c3">
                                                        <img src="{{ asset('img/t8.png') }}" alt="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                {{-- <img src="{{asset('img/team1.png')}}" class="wow animate__animated animate__fadeInLeft" data-wow-delay="00ms" data-wow-duration="1500ms" alt="image"> --}}
                                                <div class="flex-container mt--10">
                                                    <div class="flex-child c1">
                                                        <img src="{{ asset('img/t5.png') }}" alt="image">
                                                    </div>
                                                    <div class="flex-child c2">
                                                        <div class="content blue-bg text-center">
                                                            <h3 class="text-white">KKR vs CSL</h3>
                                                            <div id="timer" class="flex-wrap d-flex justify-content-center text-white">
                                                                <div id="days" class="align-items-center flex-column d-flex justify-content-center"></div>
                                                                <div id="hours" class="align-items-center flex-column d-flex justify-content-center"></div>
                                                                <div id="minutes" class="align-items-center flex-column d-flex justify-content-center"></div>
                                                                <div id="seconds" class="align-items-center flex-column d-flex justify-content-center"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-child c3">
                                                        <img src="{{ asset('img/t6.png') }}" alt="image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="single-matches-box">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12 col-md-12">                                            
                                                <div class="flex-container mt--10">
                                                    <div class="flex-child c1">
                                                        <img src="{{ asset('img/t1.png') }}" alt="image">
                                                    </div>
                                                    <div class="flex-child c2">
                                                        <div class="content blue-bg text-center">
                                                            <h3 class="text-white mb-0">SL vs SA T20</h3>
                                                            <h6 class="text-white">2 days</h6>
                                                        </div>
                                                    </div>
                                                    <div class="flex-child c3">
                                                        <img src="{{ asset('img/t2.png') }}" alt="image">
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- End Products Details Area -->


        <div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>

        <div class="zelda-cursor"></div>
        <div class="zelda-cursor2"></div>

    @endslot
</x-layout>
